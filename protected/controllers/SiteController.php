<?php

class SiteController extends Controller
{
	public $layout='/layouts/site';
	public $siteMenu = array();
	public $contentMenu = array();
	public $lang = 'en';

	/********************************************************************************************
	 *	Actions for SiteController
	 ********************************************************************************************/

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			//'page'=>array(
			//	'class'=>'CViewAction',
			//),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		//Yii::app()->session['lang'] = 'en';
		//echo Yii::app()->session['lang']; // Prints "value"
		$interestingArticles = $this->fetchInterestingArticles(Yii::app()->language);
		$albums = $this->fetchMainCarousal(Yii::app()->language);
		$this->render('index', array('interestingArticles' => $interestingArticles, 'album' => $albums[0]));
	}

	public function actionPage($view = '')
	{

		if ( $view != '' )
		{
			if($this->getViewFile('pages/'.$this->lang.'/'.$view)!==false)
			{
				$this->render('pages/'.$this->lang.'/'.$view);
				return;
			}
			else if($this->getViewFile('pages/'.$view)!==false)
			{
				$this->render('pages/'.$view);
				return;
			}
		}

		$this->render('index');

	}

	public function actionGallery()
	{

		$albums = $this->fetchGalleryAlbums(Yii::app()->language);

		$this->render('gallery', array('albums'=>$albums));
	}

	public function actionArticle($id=0)
	{

		$model = null;
		if ( $id != 0 )
		{
			$model = Article::model()->findByPk($id);

		}

		if ( $model == null )
		{
			$this->redirect(Yii::app()->homeUrl);
		}
		else
		{
			$this->render('article', array('model'=>$model));
		}
	}

	public function actionAdmin()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout='/layouts/main';
		$this->render('admin');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if (isset(Yii::app()->session['lang']))
		{
			$this->lang = Yii::app()->session['lang'];
		}
		Yii::app()->language = $this->lang;

		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{

		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout='/layouts/main';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		$this->layout='/layouts/main';
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionLanguage($lang='en')
	{
		Yii::app()->session['lang'] = $lang;
		$this->redirect(Yii::app()->user->returnUrl);
	}

	/********************************************************************************************
	 *	End of Actions for SiteController
	 ********************************************************************************************/

	/********************************************************************************************
	 *	Filters for SiteController
	 ********************************************************************************************/

	public function filters()
    {
        return array(
			'selectLang - language',
            'loadMenu + index, article, error, page, contact, gallery - language'
        );
    }

	public function filterSelectLang($filterChain)
	{
		if (isset(Yii::app()->session['lang']))
		{
			$this->lang = Yii::app()->session['lang'];
		}
		Yii::app()->language = $this->lang;
		//echo Yii::app()->language;
		$filterChain->run();
	}

	public function filterLoadMenu($filterChain)
	{
		$this->siteMenu = $this->fetchMenu('SITE', Yii::app()->language);
		$this->contentMenu = $this->fetchMenu('CONTENT', Yii::app()->language);

		$filterChain->run();
	}

	/********************************************************************************************
	 *	Filters for SiteController
	 ********************************************************************************************/

	/********************************************************************************************
	 *	Private helper functions for SiteController
	 ********************************************************************************************/

	private function fetchGalleryAlbums($lang)
	{
		$albums = Album::model()->findAllBySql('select id, album_cd, header_'.$lang.', desc_'.$lang.'
												from album where gallery = 1
												order by sort_order;');

		return $this->fetchAlbumImages($albums, $lang);
	}

	private function fetchMainCarousal($lang)
	{
		$albums = Album::model()->findAllBySql('select id, album_cd, header_'.$lang.', desc_'.$lang.'
												from album where album_cd = "MAINCAROUSAL"
												order by sort_order;');

		return $this->fetchAlbumImages($albums, $lang);
	}

	private function fetchAlbumImages($albums, $lang)
	{
		$returnAlbums = array();

		foreach($albums as $album) {

			$images = Image::model()->findAllBySql('	select id, image_cd, desc_'.$lang.', link, height, width 
														from image 
														where album_id = '.$album['id'].'
														order by sort_order;');

			if ( count($images) > 0 )
			{
				$imageList = array();
				foreach($images as $image) {

					$imageList[] = array(	'img' => $image['link'], 
											'desc' => $image['desc_'.$lang], 
											'height' => $image['height'], 
											'width' => $image['width']);
				}

				$returnAlbums[] = array(	'id' => $album['album_cd'], 
											'header' => $album['header_'.$lang], 
											'desc' => $album['desc_'.$lang], 
											'images' => $imageList);
			}

		}
		return $returnAlbums;

	}

	private function fetchInterestingArticles($lang)
	{
		$returnArticles = array();
		$articles = Article::model()->findAllBySql(	'select id, header_'.$lang.', content_'.$lang.'
													from article where interest > 0 
													order by id desc;');
		foreach($articles as $article) {
			// strip <h> tags from content
			$content = $article['content_'.$lang];
			$content = preg_replace('$<h[1-9]>$', '<b>', $content);
			$content = preg_replace('$</h[1-9]>$', '</b>', $content);


			$returnArticles[] = array(	'header' => $article['header_'.$lang], 
										'content' => $content,
										'link' => 'index.php?r=/site/article&id='.$article['id']);

		}
		return $returnArticles;
	}

	private function fetchMenu($type, $lang)
	{
		$returnMenu = array();
		$menus = Menu::model()->findAllBySql('	select id, desc_'.$lang.', image, action, menu_subtype 
												from menu 
												where menu_type = "'.$type.'" and parent_id is null
												order by sort_order;');
		foreach($menus as $menu) {

			$children = Menu::model()->findAllBySql('	select id, desc_'.$lang.', image, action, menu_subtype 
														from menu 
														where parent_id = '.$menu['id'].'
														order by sort_order;');

			if ( count($children) > 0 )
			{
				$childMenu = array();
				foreach($children as $childMenuItem) {
					if ($childMenuItem['menu_subtype'] == 'SEPARATOR')
					{
						$childMenu[] = array( 'isSeparator' => true);
					}
					else
					{
						$childMenu[] = array( 'desc' => $childMenuItem['desc_'.$lang], 'url' => $childMenuItem['action'], 'image' => $childMenuItem['image']);
					}
				}

				$returnMenu[] = array( 'desc' => $menu['desc_'.$lang], 'url' => $menu['action'], 'image' => $menu['image'], 'children' => $childMenu);
			}
			else
			{
				if ($menu['menu_subtype'] == 'SEPARATOR')
				{
					$returnMenu[] = array( 'isSeparator' => true);
				}
				else
				{
					$returnMenu[] = array( 'desc' => $menu['desc_'.$lang], 'url' => $menu['action'], 'image' => $menu['image']);
				}
			}

			

		}
		return $returnMenu;
	}

	/********************************************************************************************
	 *	End of Private helper functions for SiteController
	 ********************************************************************************************/

}
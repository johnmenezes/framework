<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $id
 * @property integer $article_category_id
 * @property string $header_en
 * @property string $header_th
 * @property integer $sort_order
 * @property string $content_en
 * @property string $content_th
 *
 * The followings are the available model relations:
 * @property ArticleCategory $articleCategory
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_category_id, header_en, header_th , sort_order, content_en, content_th', 'required'),
			array('article_category_id, sort_order', 'numerical', 'integerOnly'=>true),
			array('header_en, header_th', 'length', 'max'=>128),
			array('interest','boolean'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, article_category_id, header_en, header_th, sort_order, content_en, content_th, interest', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'articleCategory' => array(self::BELONGS_TO, 'ArticleCategory', 'article_category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'article_category_id' => 'Article category',
			'header_en' => 'English header',
			'header_th' => 'Thai header',
			'sort_order' => 'Sort order',
			'content_en' => 'English content',
			'content_th' => 'Thai content',
			'interest' => 'Mark for interest',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('article_category_id',$this->article_category_id);
		$criteria->compare('header_en',$this->header_en,true);
		$criteria->compare('header_th',$this->header_th,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('content_en',$this->content_en,true);
		$criteria->compare('content_th',$this->content_th,true);
		$criteria->compare('interest',$this->interest,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
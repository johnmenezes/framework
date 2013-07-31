<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $id
 * @property integer $parent_id
 * @property string $menu_cd
 * @property string $desc_en
 * @property string $desc_th
 * @property string $image
 * @property string $menu_type
 * @property string $menu_subtype
 * @property string $action
 * @property integer $sort_order
 *
 * The followings are the available model relations:
 * @property Menu $parent
 * @property Menu[] $menus
 */
class Menu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Menu the static model class
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
		return 'menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menu_cd, desc_en, desc_th, menu_type, menu_subtype, sort_order', 'required'),
			array('parent_id, sort_order', 'numerical', 'integerOnly'=>true),
			array('menu_cd, desc_en, desc_th, image, menu_type, menu_subtype, action', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, menu_cd, desc_en, desc_th, image, menu_type, menu_subtype, action, sort_order', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'Menu', 'parent_id'),
			'menus' => array(self::HAS_MANY, 'Menu', 'parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent menu',
			'menu_cd' => 'Menu Code',
			'desc_en' => 'English Description',
			'desc_th' => 'Thai Description',
			'image' => 'Menu Image',
			'menu_type' => 'Menu Type',
			'menu_subtype' => 'Menu Subtype',
			'action' => 'Action',
			'sort_order' => 'Sort order',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('menu_cd',$this->menu_cd,true);
		$criteria->compare('desc_en',$this->desc_en,true);
		$criteria->compare('desc_th',$this->desc_th,true);
		$criteria->compare('image',$this->image,true);		
		$criteria->compare('menu_type',$this->menu_type,true);
		$criteria->compare('menu_subtype',$this->menu_subtype,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('sort_order',$this->sort_order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
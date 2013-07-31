<?php

/**
 * This is the model class for table "album".
 *
 * The followings are the available columns in table 'album':
 * @property integer $id
 * @property string $album_cd
 * @property string $header_en
 * @property string $desc_en
 * @property string $header_th
 * @property string $desc_th
 * @property integer $sort_order
 * @property integer $gallery
 */
class Album extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Album the static model class
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
		return 'album';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('album_cd, header_en, header_th', 'required'),
			array('sort_order', 'numerical', 'integerOnly'=>true),
			array('album_cd, header_en, desc_en, header_th, desc_th', 'length', 'max'=>128),
			array('gallery','boolean'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, album_cd, header_en, desc_en, header_th, desc_th, sort_order, gallery', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'album_cd' => 'Album code',
			'header_en' => 'English header',
			'desc_en' => 'English description',
			'header_th' => 'Thai header',
			'desc_th' => 'Thai description',
			'sort_order' => 'Sort order',
			'gallery' => 'Part of gallery',
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
		$criteria->compare('album_cd',$this->album_cd,true);
		$criteria->compare('header_en',$this->header_en,true);
		$criteria->compare('desc_en',$this->desc_en,true);
		$criteria->compare('header_th',$this->header_th,true);
		$criteria->compare('desc_th',$this->desc_th,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('gallery',$this->gallery);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
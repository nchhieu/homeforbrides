<?php

/**
 * This is the model class for table "tbl_post_cat_slider".
 *
 * The followings are the available columns in table 'tbl_post_cat_slider':
 * @property integer $post_cat_slider_id
 * @property integer $cat_id
 * @property integer $slider_position
 * @property string $slider_url
 * @property integer $slider_sort
 * @property integer $slider_status
 */
class PostCatSlider extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PostCatSlider the static model class
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
		return 'tbl_post_cat_slider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cat_id, slider_position, slider_sort', 'numerical', 'integerOnly'=>true),
			array('slider_url,slider_photos', 'length', 'max'=>255),
			array('slider_status', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('post_cat_slider_id, cat_id, slider_position, slider_url, slider_sort, slider_status', 'safe', 'on'=>'search'),
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
			'post_cat_slider_id' => 'Slider',
			'cat_id' => 'Category',
			'slider_position' => 'Position',
			'slider_photos' => 'Photo',
			
			'slider_url' => 'Url',
			'slider_sort' => 'Sort',
			'slider_status' => 'Status',
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

		$criteria->compare('post_cat_slider_id',$this->post_cat_slider_id);
		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('slider_position',$this->slider_position);
		$criteria->compare('slider_url',$this->slider_url,true);
		$criteria->compare('slider_sort',$this->slider_sort);
		$criteria->compare('slider_status',$this->slider_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
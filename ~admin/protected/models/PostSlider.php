<?php

/**
 * This is the model class for table "tbl_post_slider".
 *
 * The followings are the available columns in table 'tbl_post_slider':
 * @property integer $post_slider_id
 * @property string $post_id
 * @property string $photos
 * @property integer $order
 *
 * The followings are the available model relations:
 * @property Post $post
 */
class PostSlider extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PostSlider the static model class
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
		return 'tbl_post_slider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('slider_sort,slider_position', 'numerical', 'integerOnly'=>true),
			array('post_id', 'length', 'max'=>9),
			array('photos', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png','maxSize' => (1024 * 10024)),
			//array('photos', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('post_slider_id, post_id, slider_sort,photos', 'safe', 'on'=>'search'),
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
			'post' => array(self::BELONGS_TO, 'Post', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'post_slider_id' => 'ID',
			'post_id' => 'Post ID',
			'photos' => 'Photos',
			'slider_sort' => 'Order',
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

		$criteria->compare('post_slider_id',$this->post_slider_id);
		$criteria->compare('post_id',$this->post_id,true);
		$criteria->compare('slider_position',$this->slider_position,true);
		
		
		$criteria->compare('photos',$this->photos,true);
		$criteria->compare('slider_sort',$this->slider_sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
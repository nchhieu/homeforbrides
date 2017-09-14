<?php

/**
 * This is the model class for table "tbl_location".
 *
 * The followings are the available columns in table 'tbl_location':
 * @property string $location_id
 * @property string $post_id
 * @property string $location_name
 * @property integer $city_id
 * @property integer $dist_id
 * @property string $location_address
 * @property string $location_phone
 * @property string $location_biz_open
 * @property string $location_price
 * @property string $location_status
 * @property integer $location_order
 *
 * The followings are the available model relations:
 * @property Event[] $events
 * @property LocationType $locationType
 * @property City $city
 */
class Location extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Location the static model class
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
		return 'tbl_location';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' city_id,  location_order', 'numerical', 'integerOnly'=>true),
			array('post_id', 'length', 'max'=>9),
			array('location_name, location_address', 'length', 'max'=>255),
			array('location_phone', 'length', 'max'=>32),
			
			array('location_biz_open', 'length', 'max'=>125),
			array('location_status', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('location_id, post_id,  location_name, city_id, dist_id, location_address, location_phone, location_biz_open, location_status, location_order', 'safe', 'on'=>'search'),
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
			'events' => array(self::HAS_MANY, 'Event', 'location_id'),
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'location_id' => 'Location',
			'post_id' => 'Post ID',
			'location_name' => 'Location name',
			'city_id' => 'City',
			'city_name' => 'City',
			'location_address' => 'Address',
			'location_phone' => 'Phone',
			'location_biz_open' => 'Opening time',
			'location_status' => 'Status',
			'location_order' => 'Order',
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

		$criteria->compare('location_id',$this->location_id,true);
		$criteria->compare('post_id',$this->post_id,true);
		$criteria->compare('location_name',$this->location_name,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('location_address',$this->location_address,true);
		$criteria->compare('location_phone',$this->location_phone,true);
		$criteria->compare('location_biz_open',$this->location_biz_open,true);
		$criteria->compare('location_status',$this->location_status,true);
		$criteria->compare('location_order',$this->location_order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
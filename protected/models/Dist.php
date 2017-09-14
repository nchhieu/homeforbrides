<?php

/**
 * This is the model class for table "tbl_dist".
 *
 * The followings are the available columns in table 'tbl_dist':
 * @property integer $dist_id
 * @property integer $city_id
 * @property string $dist_name
 * @property string $dist_alias
 * @property integer $dist_order
 * @property string $dist_status
 *
 * The followings are the available model relations:
 * @property City $city
 */
class Dist extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dist the static model class
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
		return 'tbl_dist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id,dist_name, ', 'required'),
			array('city_id, dist_order', 'numerical', 'integerOnly'=>true),
			array('dist_name, dist_alias,city_name', 'length', 'max'=>64),
			array('dist_status', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('dist_id, city_id, dist_name, dist_alias, dist_order, dist_status', 'safe', 'on'=>'search'),
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
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'dist_id' => 'Quận ID',
			'city_id' => 'Thành phố ID',
			'city_name'=>'Thành phố',
			'dist_name' => 'Tên quận',
			'dist_alias' => 'Alias',
			'dist_order' => 'Sắp xếp',
			'dist_status' => 'Trạng thái',
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

		$criteria->compare('dist_id',$this->dist_id);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('dist_name',$this->dist_name,true);
		$criteria->compare('dist_status',$this->dist_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
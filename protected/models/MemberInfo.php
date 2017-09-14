<?php

/**
 * This is the model class for table "tbl_member_info".
 *
 * The followings are the available columns in table 'tbl_member_info':
 * @property string $member_id
 * @property string $mobile
 * @property string $brithday
 * @property string $picture
 * @property string $city_name
 * @property integer $dist_id
 * @property string $dist_name
 * @property string $address
 * @property string $favourite
 * @property string $create_date
 */
class MemberInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MemberInfo the static model class
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
		return 'tbl_member_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id, create_date', 'required'),
			array('dist_id', 'numerical', 'integerOnly'=>true),
			array('member_id', 'length', 'max'=>9),
			array('mobile', 'length', 'max'=>16),
			array('picture, address, favourite', 'length', 'max'=>255),
			array('city_name, dist_name', 'length', 'max'=>32),
			array('brithday', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('member_id, mobile, brithday, picture, city_name, dist_id, dist_name, address, favourite, create_date', 'safe', 'on'=>'search'),
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
			'member_id' => 'Thành viên ID',
			'mobile' => 'Di động',
			'brithday' => 'Ngày sinh',
			'picture' => 'Hình ảnh',
			'city_name' => 'Thành phố',
			'dist_id' => 'Quận',
			'dist_name' => 'Tên quận',
			'address' => 'Địa chỉ',
			'favourite' => 'Sở thích',
			'create_date' => 'Ngày đăng ký',
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

		$criteria->compare('member_id',$this->member_id,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('city_name',$this->city_name,true);
		$criteria->compare('dist_name',$this->dist_name,true);
		$criteria->compare('create_date',$this->create_date,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "tbl_photographer".
 *
 * The followings are the available columns in table 'tbl_photographer':
 * @property integer $photographer_id
 * @property string $photographer_nick
 * @property string $photographer_fullname
 * @property string $photographer_phone
 * @property string $photographer_avatar
 * @property string $photographer_gender
 * @property string $photographer_status
 * @property integer $admin_id
 */
class Photographer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Photographer the static model class
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
		return 'tbl_photographer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('photographer_nick, photographer_fullname', 'required'),
			array('photographer_avatar', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png','maxSize' => (1024 * 100)),
			array('photographer_id, admin_id', 'numerical', 'integerOnly'=>true),
			array('photographer_nick, photographer_fullname', 'length', 'max'=>64),
			array('photographer_phone', 'length', 'max'=>32),
			array('photographer_avatar', 'length', 'max'=>125),
			array('photographer_gender', 'length', 'max'=>3),
			array('photographer_status', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('photographer_id, photographer_nick, photographer_fullname, photographer_phone, photographer_avatar, photographer_gender, photographer_status, admin_id', 'safe', 'on'=>'search'),
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
			'photographer_id' => 'Photographer',
			'photographer_nick' => 'Nick',
			'photographer_fullname' => 'Họ tên',
			'photographer_phone' => 'Điện thoại',
			'photographer_avatar' => 'Hình đại diện',
			'photographer_gender' => 'Giới tính',
			'photographer_status' => 'Trạng thái',
			'admin_id' => 'Người nhập',
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

		$criteria->compare('photographer_nick',$this->photographer_nick,true);
		$criteria->compare('photographer_fullname',$this->photographer_fullname,true);
		$criteria->compare('photographer_phone',$this->photographer_phone,true);
		$criteria->compare('photographer_gender',$this->photographer_gender,true);
		$criteria->compare('photographer_status',$this->photographer_status,true);
		$criteria->compare('admin_id',$this->admin_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
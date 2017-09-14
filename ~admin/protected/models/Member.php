<?php

/**
 * This is the model class for table "tbl_member".
 *
 * The followings are the available columns in table 'tbl_member':
 * @property string $member_id
 * @property string $fb_id
 * @property string $google_id
 * @property string $username
 * @property string $password
 * @property string $fullname
 * @property string $gender
 * @property integer $city_id
 * @property string $status
 * @property string $latest_log_date
 */
class Member extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Member the static model class
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
		return 'tbl_member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'unique', 'on' => 'insert', 'message' => '{attribute}:{value} đã tồn tại'),
			array('username, password, fullname, gender, latest_log_date', 'required'),
			array('city_id', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>125),
			array('password', 'length', 'max'=>32),
			array('fullname', 'length', 'max'=>64),
			array('gender', 'length', 'max'=>3),
			array('status', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('member_id, username, password, fullname, gender, city_id, status, latest_log_date', 'safe', 'on'=>'search'),
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
			'member_id' => 'ID',
			'username' => 'Tên đăng nhập',
			'password' => 'Mật khẩu',
			'fullname' => 'Họ tên',
			'gender' => 'Giới tính',
			'city_id' => 'Thành phố',
			'status' => 'Trạng thái',
			'latest_log_date' => 'Lần đăng nhập cuối',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('latest_log_date',$this->latest_log_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
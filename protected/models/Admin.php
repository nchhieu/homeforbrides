<?php

/**
 * This is the model class for table "tbl_admin".
 *
 * The followings are the available columns in table 'tbl_admin':
 * @property integer $admin_id
 * @property string $admin_email
 * @property string $admin_password
 * @property string $admin_name
 * @property string $admin_phone
 * @property string $admin_group
 * @property string $admin_rights
 * @property string $admin_avatar
 * @property string $admin_status
 * @property string $admin_created_date
 * @property string $admin_latest_login
 * @property integer $admin_login_times
 */
class Admin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Admin the static model class
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
		return 'tbl_admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('admin_email', 'unique', 'on' => 'insert', 'message' => '{attribute}:{value} đã tồn tại'),
            array('admin_avatar', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png','maxSize' => (1024 * 100)),
			array('admin_email,admin_password,admin_name','required'),
			array('admin_login_times', 'numerical', 'integerOnly'=>true),
			array('admin_email, admin_avatar', 'length', 'max'=>125),
			array('admin_email', 'email'),
			array('admin_password', 'length', 'max'=>32),
			array('admin_name', 'length', 'max'=>64),
			array('admin_phone', 'length', 'max'=>16),
			array('admin_group', 'length', 'max'=>5),
			array('admin_rights', 'length', 'max'=>255),
			array('admin_status', 'length', 'max'=>4),
			array('admin_created_date, admin_latest_login', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('admin_id, admin_email, admin_password, admin_name, admin_phone, admin_group, admin_rights, admin_avatar, admin_status, admin_created_date, admin_latest_login, admin_login_times', 'safe', 'on'=>'search'),
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
			'admin_id' => 'Admin',
			'admin_email' => 'Email',
			'admin_password' => 'Password',
			'admin_name' => 'Full name',
			'admin_phone' => 'Photo',
			'admin_group' => 'Group',
			'admin_rights' => 'Permission',
			'admin_avatar' => 'Avatar',
			'admin_status' => 'Status',
			'admin_created_date' => 'Created date',
			'admin_latest_login' => 'Latest loged in ',
			'admin_login_times' => 'Login times',
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

		$criteria->compare('admin_id',$this->admin_id);
		$criteria->compare('admin_email',$this->admin_email,true);
		$criteria->compare('admin_password',$this->admin_password,true);
		$criteria->compare('admin_name',$this->admin_name,true);
		$criteria->compare('admin_phone',$this->admin_phone,true);
		$criteria->compare('admin_group',$this->admin_group,true);
		$criteria->compare('admin_rights',$this->admin_rights,true);
		$criteria->compare('admin_avatar',$this->admin_avatar,true);
		$criteria->compare('admin_status',$this->admin_status,true);
		$criteria->compare('admin_created_date',$this->admin_created_date,true);
		$criteria->compare('admin_latest_login',$this->admin_latest_login,true);
		$criteria->compare('admin_login_times',$this->admin_login_times);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
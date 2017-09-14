<?php

/**
 * This is the model class for table "tbl_admin_log".
 *
 * The followings are the available columns in table 'tbl_admin_log':
 * @property string $admin_log_id
 * @property integer $admin_id
 * @property string $admin_log_time
 * @property integer $admin_log_ip
 * @property string $admin_log_controler
 */
class AdminLog extends CActiveRecord
{
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdminLog the static model class
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
		return 'tbl_admin_log_' . date('Y');
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('admin_id, admin_log_ip', 'numerical', 'integerOnly'=>true),
			array('admin_log_controler', 'length', 'max'=>64),
			array('admin_log_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('admin_log_id, admin_id, admin_log_time, admin_log_ip, admin_log_controler', 'safe', 'on'=>'search'),
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
			'admin_log_id' => 'Admin Log ID',
			'admin_id' => 'Admin ID',
			'admin_log_time' => 'Giờ đăng nhập',
			'admin_log_ip' => 'IP',
			'admin_log_controler' => 'Xử lý',
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

		$criteria->compare('admin_log_id',$this->admin_log_id,true);
		$criteria->compare('admin_id',$this->admin_id);
		$criteria->compare('admin_log_time',$this->admin_log_time,true);
		$criteria->compare('admin_log_ip',$this->admin_log_ip);
		$criteria->compare('admin_log_controler',$this->admin_log_controler,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "tbl_member_log".
 *
 * The followings are the available columns in table 'tbl_member_log':
 * @property string $member_log_id
 * @property string $member_id
 * @property string $loged_date
 * @property integer $ip
 */
class MemberLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MemberLog the static model class
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
		return 'tbl_member_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id, loged_date', 'required'),
			array('ip', 'numerical', 'integerOnly'=>true),
			array('member_id', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('member_log_id, member_id, loged_date, ip', 'safe', 'on'=>'search'),
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
			'member_log_id' => 'Thành viên Log ID',
			'member_id' => 'Thành viên ID',
			'loged_date' => 'Ngày',
			'ip' => 'Địa chỉ IP',
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

		$criteria->compare('member_log_id',$this->member_log_id,true);
		$criteria->compare('member_id',$this->member_id,true);
		$criteria->compare('loged_date',$this->loged_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
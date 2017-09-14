<?php

/**
 * This is the model class for table "tbl_wedding_step".
 *
 * The followings are the available columns in table 'tbl_wedding_step':
 * @property integer $step_id
 * @property string $step_title
 * @property integer $step_order
 * @property string $step_status
 */
class WeddingStep extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WeddingStep the static model class
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
		return 'tbl_wedding_step';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('step_order', 'numerical', 'integerOnly'=>true),
			array('step_title', 'length', 'max'=>125),
			array('step_status', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('step_id, step_title, step_order, step_status', 'safe', 'on'=>'search'),
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
			'step_id' => 'Step',
			'step_title' => 'Step Title',
			'step_order' => 'Step Order',
			'step_status' => 'Step Status',
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

		$criteria->compare('step_id',$this->step_id);
		$criteria->compare('step_title',$this->step_title,true);
		$criteria->compare('step_order',$this->step_order);
		$criteria->compare('step_status',$this->step_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
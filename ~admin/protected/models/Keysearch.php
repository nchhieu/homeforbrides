<?php

/**
 * This is the model class for table "tbl_keysearch".
 *
 * The followings are the available columns in table 'tbl_keysearch':
 * @property integer $keysearch_id
 * @property integer $post_id
 * @property string $keysearch
 */
class Keysearch extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Keysearch the static model class
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
		return 'tbl_keysearch';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('keysearch_id', 'required'),
			array('keysearch_id, post_id', 'numerical', 'integerOnly'=>true),
			array('keysearch', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('keysearch_id, post_id, keysearch', 'safe', 'on'=>'search'),
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
			'post'=>array(self::BELONGS_TO, 'Post', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'keysearch_id' => 'Keysearch',
			'post_id' => 'Post',
			'keysearch' => 'Keysearch',
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

		$criteria->compare('keysearch_id',$this->keysearch_id);
		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('keysearch',$this->keysearch,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
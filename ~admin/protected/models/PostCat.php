<?php

/**
 * This is the model class for table "tbl_post_cat".
 *
 * The followings are the available columns in table 'tbl_post_cat':
 * @property integer $cat_id
 * @property integer $topic_id
 * @property string $cat_name
 * @property string $cat_alias
 * @property string $cat_screen
 * @property string $cat_thumb
 * @property string $cat_intro
 * @property integer $cat_order
 * @property string $cat_status
 * @property string $cat_description
 * @property string $cat_keyword
 * @property string $cat_updated_time
 * @property integer $old_id
 */
class PostCat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PostCat the static model class
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
		return 'tbl_post_cat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('topic_id, cat_name', 'required'),
			array('cat_thumb', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png','maxSize' => (1024 * 200)),
			array('topic_id, cat_order, old_id', 'numerical', 'integerOnly'=>true),
			array('cat_name, cat_alias', 'length', 'max'=>125),
			array('cat_screen, cat_thumb, cat_description, cat_keyword', 'length', 'max'=>255),
			array('cat_status', 'length', 'max'=>4),
			array('cat_intro, cat_updated_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cat_id, topic_id, cat_name, cat_alias, cat_screen, cat_thumb, cat_intro, cat_order, cat_status, cat_description, cat_keyword, cat_updated_time, old_id', 'safe', 'on'=>'search'),
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
			'cat_id' => 'Cat',
			'topic_id' => 'Topic',
			'cat_name' => 'Category name',
			'cat_alias' => 'Alias',
			'cat_screen' => 'Photo',
			'cat_thumb' => 'Thumb',
			'cat_intro' => 'Content',
			'cat_order' => 'Order',
			'cat_status' => 'Status',
			'cat_description' => 'Meta Description',
			'cat_keyword' => 'Meta Keyword',
			'cat_updated_time' => 'Updated Time',
			'old_id' => 'Old',
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

		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('topic_id',$this->topic_id);
		$criteria->compare('cat_name',$this->cat_name,true);
		$criteria->compare('cat_alias',$this->cat_alias,true);
		$criteria->compare('cat_screen',$this->cat_screen,true);
		$criteria->compare('cat_thumb',$this->cat_thumb,true);
		$criteria->compare('cat_intro',$this->cat_intro,true);
		$criteria->compare('cat_order',$this->cat_order);
		$criteria->compare('cat_status',$this->cat_status,true);
		$criteria->compare('cat_description',$this->cat_description,true);
		$criteria->compare('cat_keyword',$this->cat_keyword,true);
		$criteria->compare('cat_updated_time',$this->cat_updated_time,true);
		$criteria->compare('old_id',$this->old_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
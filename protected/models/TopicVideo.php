<?php

/**
 * This is the model class for table "tbl_topic_video".
 *
 * The followings are the available columns in table 'tbl_topic_video':
 * @property integer $topic_id
 * @property integer $subcat_id
 * @property string $subcat_alias
 * @property string $topic_name
 * @property string $topic_alias
 * @property string $topic_intro
 * @property string $topic_thumb
 * @property string $topic_status
 * @property integer $topic_sort
 * @property string $topic_keyword
 * @property string $topic_description
 * @property string $topic_added_date
 *
 * The followings are the available model relations:
 * @property PostSubcat $subcat
 */
class TopicVideo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TopicVideo the static model class
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
		return 'tbl_topic_video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subcat_id, topic_sort', 'numerical', 'integerOnly'=>true),
			array('subcat_alias, topic_name, topic_alias, topic_thumb, topic_keyword, topic_description', 'length', 'max'=>255),
			array('topic_status', 'length', 'max'=>4),
			array('topic_intro, topic_added_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('topic_id, subcat_id, subcat_alias, topic_name, topic_alias, topic_intro, topic_thumb, topic_status, topic_sort, topic_keyword, topic_description, topic_added_date', 'safe', 'on'=>'search'),
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
			'subcat' => array(self::BELONGS_TO, 'PostSubcat', 'subcat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'topic_id' => 'Topic',
			'subcat_id' => 'Sub Category',
			'topic_name' => 'Topic Name',
			'topic_alias' => 'Topic Alias',
			'topic_intro' => 'Topic Intro',
			'topic_thumb' => 'Topic Thumbnail',
			'topic_status' => 'Topic Status',
			'topic_sort' => 'Topic Sort',
			'topic_keyword' => 'Keyword',
			'topic_description' => 'Description',
			'topic_added_date' => 'Added Date',
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

		$criteria->compare('topic_id',$this->topic_id);
		$criteria->compare('subcat_id',$this->subcat_id);
		$criteria->compare('subcat_alias',$this->subcat_alias,true);
		$criteria->compare('topic_name',$this->topic_name,true);
		$criteria->compare('topic_alias',$this->topic_alias,true);
		$criteria->compare('topic_intro',$this->topic_intro,true);
		$criteria->compare('topic_thumb',$this->topic_thumb,true);
		$criteria->compare('topic_status',$this->topic_status,true);
		$criteria->compare('topic_sort',$this->topic_sort);
		$criteria->compare('topic_keyword',$this->topic_keyword,true);
		$criteria->compare('topic_description',$this->topic_description,true);
		$criteria->compare('topic_added_date',$this->topic_added_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
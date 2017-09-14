<?php

/**
 * This is the model class for table "tbl_video".
 *
 * The followings are the available columns in table 'tbl_video':
 * @property string $video_id
 * @property string $post_id
 * @property string $video_name
 * @property string $youtube_code
 * @property string $video_link
 * @property integer $video_duration
 * @property integer $video_height
 */
class Video extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Video the static model class
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
		return 'tbl_video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_id', 'length', 'max'=>9),
			array('video_duration', 'length', 'max'=>8),
			
			array('video_name, video_link', 'length', 'max'=>255),
			array('youtube_code', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('video_id, post_id, video_name, youtube_code, video_link, video_duration', 'safe', 'on'=>'search'),
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
			'video_id' => 'Video',
			'post_id' => 'Post',
			'video_name' => 'Title',
			'youtube_code' => 'Youtube code',
			'video_link' => 'Link upload',
			'video_duration' => 'Duration',
			'video_status'=>'Status',
			
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
		$criteria->compare('video_name',$this->video_name,true);
		$criteria->compare('youtube_code',$this->youtube_code,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
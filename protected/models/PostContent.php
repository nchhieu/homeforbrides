<?php

/**
 * This is the model class for table "tbl_post_content".
 *
 * The followings are the available columns in table 'tbl_post_content':
 * @property string $post_content_id
 * @property string $post_id
 * @property string $post_header_photo
 * @property string $post_content
 * @property string $meta_keyword
 * @property string $meta_description
 */
class PostContent extends CActiveRecord
{
	/*
	public $year;
	public function __construct($year){
			$this->year = $year;                                
	}*/
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PostContent the static model class
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
		return 'tbl_post_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_header_photo', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png','maxSize' => (1024 * 2024)),
			array('post_id', 'length', 'max'=>9),
			array('meta_keyword, meta_description,post_header_photo', 'length', 'max'=>255),
			array('post_content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('post_content_id, post_id, post_header_photo, post_content, meta_keyword, meta_description', 'safe', 'on'=>'search'),
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
			'post_content_id' => 'Content ID',
			'post_id' => 'Post ID',
			'post_header_photo' => 'Photo',
			'post_content' => 'Content',
			'meta_keyword' => 'Meta Keyword',
			'meta_description' => 'Meta Description',
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

		$criteria->compare('post_content_id',$this->post_content_id,true);
		$criteria->compare('post_id',$this->post_id,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
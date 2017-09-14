<?php

/**
 * This is the model class for table "tbl_post_subcat".
 *
 * The followings are the available columns in table 'tbl_post_subcat':
 * @property integer $subcat_id
 * @property integer $cat_id
 * @property string $subcat_name
 * @property string $subcat_alias
 * @property string $subcat_thumb
 * @property integer $subcat_order
 * @property string $subcat_status
 * @property string $subcat_keyword
 * @property string $subcat_description
 * @property string $subcat_updated_time
 *
 * The followings are the available model relations:
 * @property Post[] $posts
 * @property PostCat $cat
 */
class PostSubcat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PostSubcat the static model class
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
		return 'tbl_post_subcat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//
			array('cat_id, subcat_name, topic_id', 'required'),
			array('cat_id,topic_id, subcat_order', 'numerical', 'integerOnly'=>true),
			array('subcat_name, subcat_alias,cat_name', 'length', 'max'=>125),
			array('subcat_status,subcat_as_post', 'length', 'max'=>4),
			array('subcat_keyword, subcat_description,subcat_url', 'length', 'max'=>255),
			array('subcat_updated_time,subcat_intro,subcat_intro2', 'safe'),
			array('subcat_thumb', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png','maxSize' => (1024 * 200)),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('subcat_id, cat_id, subcat_name,subcat_thumb,subcat_url, subcat_intro, subcat_intro2,subcat_alias,subcat_as_post, subcat_order, subcat_status, subcat_keyword, subcat_description, subcat_updated_time', 'safe', 'on'=>'search'),
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
			'posts' => array(self::HAS_MANY, 'Post', 'subcat_id'),
			'cat' => array(self::BELONGS_TO, 'PostCat', 'cat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'subcat_id' => 'ID',
			'topic_id' => 'Topic',
			'cat_name'=>'Category',
			'cat_id' => 'Category',
			'subcat_name' => 'Sub Category',
			'subcat_url'=>'Url về trang khác',
			'subcat_alias' => 'Alias',
			'subcat_as_post' => 'Show as Post',
			'subcat_thumb' => 'Thumb',
			'subcat_order' => 'Order',
			'subcat_status' => 'Status',
			'subcat_keyword' => 'Meta Keyword',
			'subcat_description' => 'Meta Description',
			'subcat_updated_time' => 'Created date',
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
		$criteria->compare('subcat_name',$this->subcat_name,true);
		$criteria->compare('subcat_status',$this->subcat_status,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
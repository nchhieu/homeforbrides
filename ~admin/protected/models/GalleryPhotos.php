<?php

/**
 * This is the model class for table "tbl_gallery_photos".
 *
 * The followings are the available columns in table 'tbl_gallery_photos':
 * @property string $gallery_photo_id
 * @property string $post_id
 * @property string $gallery_id
 * @property string $gallery_title
 * @property string $gallery_thumb
 * @property string $galley_photo
 * @property string $meta_keyword
 * @property string $meta_description
 * @property integer $gallery_order
 *
 * The followings are the available model relations:
 * @property Gallery $gallery
 */
class GalleryPhotos extends CActiveRecord
{
	/*
	public $year;
	public function __construct($year){
			$this->year = $year;                                
	}
	*/
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GalleryPhotos the static model class
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
		return 'tbl_gallery_photos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_id', 'required'),
			array('gallery_order', 'numerical', 'integerOnly'=>true),
			array('post_id', 'length', 'max'=>9),
			array(' gallery_thumb, galley_photo', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gallery_photo_id, post_id,   gallery_thumb, galley_photo, gallery_order', 'safe', 'on'=>'search'),
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
			'gallery' => array(self::BELONGS_TO, 'Gallery', 'gallery_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gallery_photo_id' => 'Photo ID',
			'post_id' => 'Post ID',
			'gallery_thumb' => 'Thumb',
			'galley_photo' => 'Photo',
			'gallery_order' => 'Order',
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

		$criteria->compare('gallery_photo_id',$this->gallery_photo_id,true);
		$criteria->compare('post_id',$this->post_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
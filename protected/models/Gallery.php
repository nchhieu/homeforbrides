<?php

/**
 * This is the model class for table "tbl_gallery".
 *
 * The followings are the available columns in table 'tbl_gallery':
 * @property string $gallery_id
 * @property string $post_id
 * @property string $gallery_name
 * @property integer $location_id
 * @property integer $city_id
 * @property string $gallery_taken_time
 * @property integer $photographer_id
 * @property string $photographer_name
 * @property string $meta_keyword
 * @property string $meta_description
 *
 * The followings are the available model relations:
 * @property City $city
 * @property GalleryPhotos2013[] $galleryPhotos2013s
 * @property GalleryPhotos2014[] $galleryPhotos2014s
 * @property GalleryPhotos2015[] $galleryPhotos2015s
 * @property GalleryPhotos2016[] $galleryPhotos2016s
 * @property GalleryPhotos2017[] $galleryPhotos2017s
 * @property GalleryPhotos2018[] $galleryPhotos2018s
 * @property GalleryPhotos2019[] $galleryPhotos2019s
 */
class Gallery extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Gallery the static model class
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
		return 'tbl_gallery';
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
			array('location_id,  photographer_id,gallery_photos', 'numerical', 'integerOnly'=>true),
			array('post_id', 'length', 'max'=>9),
			array('gallery_name', 'length', 'max'=>255),
			array('location_name', 'length', 'max'=>125),
			array('photographer_name', 'length', 'max'=>64),
			array('gallery_status', 'length', 'max'=>4),
			array('gallery_taken_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gallery_id, post_id, gallery_name,gallery_status, location_id, location_name, gallery_taken_time, photographer_id, photographer_name, meta_keyword, meta_description', 'safe', 'on'=>'search'),
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
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gallery_id' => 'Album ID',
			'post_id' => 'Post ID',
			'member_id'=>'Customer',
			'gallery_name' => 'Album name',
			'location_id' => 'Location',
			'gallery_photos'=>'Photos',
			'location_name' => 'Location',
			'gallery_status'=>'Status',
			'gallery_taken_time' => 'Taken time',
			'photographer_id' => 'Photographer',
			'photographer_name' => 'Photographer',
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

		$criteria->compare('gallery_id',$this->gallery_id,true);
		$criteria->compare('post_id',$this->post_id,true);
		$criteria->compare('gallery_name',$this->gallery_name,true);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('location_name',$this->location_name);
		$criteria->compare('gallery_taken_time',$this->gallery_taken_time,true);
		$criteria->compare('photographer_name',$this->photographer_name,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
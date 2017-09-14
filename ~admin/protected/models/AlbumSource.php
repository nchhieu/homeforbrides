<?php

/**
 * This is the model class for table "album".
 *
 * The followings are the available columns in table 'album':
 * @property string $id
 * @property string $name
 * @property string $location_id
 * @property string $taken_time
 * @property string $end_time
 * @property string $wide_thumbnail_url_id
 * @property string $wide_thumbnail_url
 * @property string $high_thumbnail_url_id
 * @property string $high_thumbnail_url
 * @property string $square_thumbnail_url_id
 * @property string $square_thumbnail_url
 * @property string $like_group_id
 * @property string $comment_group_id
 * @property string $tag_group_id
 * @property string $photographer
 * @property integer $is_focused
 * @property integer $is_featured
 * @property integer $is_deleted
 * @property string $add_time
 * @property integer $total_comment
 * @property integer $total_like
 * @property string $city_id
 * @property string $friendly_url
 * @property string $meta_id
 * @property string $visitor_statistic_id
 * @property integer $require_login
 * @property string $albumcol
 */
class AlbumSource extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AlbumSource the static model class
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
		return 'album';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, location_id, like_group_id, comment_group_id, add_time, city_id, friendly_url', 'required'),
			array('is_focused, is_featured, is_deleted, total_comment, total_like, require_login', 'numerical', 'integerOnly'=>true),
			array('name, photographer', 'length', 'max'=>100),
			array('location_id, wide_thumbnail_url_id, high_thumbnail_url_id, square_thumbnail_url_id, like_group_id, comment_group_id, tag_group_id, city_id, meta_id, visitor_statistic_id', 'length', 'max'=>20),
			array('wide_thumbnail_url, high_thumbnail_url, square_thumbnail_url, friendly_url', 'length', 'max'=>255),
			array('albumcol', 'length', 'max'=>45),
			array('taken_time, end_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, location_id, taken_time, end_time, wide_thumbnail_url_id, wide_thumbnail_url, high_thumbnail_url_id, high_thumbnail_url, square_thumbnail_url_id, square_thumbnail_url, like_group_id, comment_group_id, tag_group_id, photographer, is_focused, is_featured, is_deleted, add_time, total_comment, total_like, city_id, friendly_url, meta_id, visitor_statistic_id, require_login, albumcol', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => 'Name',
			'location_id' => 'Location',
			'taken_time' => 'Taken Time',
			'end_time' => 'End Time',
			'wide_thumbnail_url_id' => 'Wide Thumbnail Url',
			'wide_thumbnail_url' => 'Wide Thumbnail Url',
			'high_thumbnail_url_id' => 'High Thumbnail Url',
			'high_thumbnail_url' => 'High Thumbnail Url',
			'square_thumbnail_url_id' => 'Square Thumbnail Url',
			'square_thumbnail_url' => 'Square Thumbnail Url',
			'like_group_id' => 'Like Group',
			'comment_group_id' => 'Comment Group',
			'tag_group_id' => 'Tag Group',
			'photographer' => 'Photographer',
			'is_focused' => 'Is Focused',
			'is_featured' => 'Is Featured',
			'is_deleted' => 'Is Deleted',
			'add_time' => 'Add Time',
			'total_comment' => 'Total Comment',
			'total_like' => 'Total Like',
			'city_id' => 'City',
			'friendly_url' => 'Friendly Url',
			'meta_id' => 'Meta',
			'visitor_statistic_id' => 'Visitor Statistic',
			'require_login' => 'Require Login',
			'albumcol' => 'Albumcol',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('location_id',$this->location_id,true);
		$criteria->compare('taken_time',$this->taken_time,true);
		$criteria->compare('end_time',$this->end_time,true);
		$criteria->compare('wide_thumbnail_url_id',$this->wide_thumbnail_url_id,true);
		$criteria->compare('wide_thumbnail_url',$this->wide_thumbnail_url,true);
		$criteria->compare('high_thumbnail_url_id',$this->high_thumbnail_url_id,true);
		$criteria->compare('high_thumbnail_url',$this->high_thumbnail_url,true);
		$criteria->compare('square_thumbnail_url_id',$this->square_thumbnail_url_id,true);
		$criteria->compare('square_thumbnail_url',$this->square_thumbnail_url,true);
		$criteria->compare('like_group_id',$this->like_group_id,true);
		$criteria->compare('comment_group_id',$this->comment_group_id,true);
		$criteria->compare('tag_group_id',$this->tag_group_id,true);
		$criteria->compare('photographer',$this->photographer,true);
		$criteria->compare('is_focused',$this->is_focused);
		$criteria->compare('is_featured',$this->is_featured);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('total_comment',$this->total_comment);
		$criteria->compare('total_like',$this->total_like);
		$criteria->compare('city_id',$this->city_id,true);
		$criteria->compare('friendly_url',$this->friendly_url,true);
		$criteria->compare('meta_id',$this->meta_id,true);
		$criteria->compare('visitor_statistic_id',$this->visitor_statistic_id,true);
		$criteria->compare('require_login',$this->require_login);
		$criteria->compare('albumcol',$this->albumcol,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
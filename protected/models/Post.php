<?php

/**
 * This is the model class for table "tbl_post".
 *
 * The followings are the available columns in table 'tbl_post':
 * @property string $post_id
 * @property integer $post_type
 * @property integer $cat_id
 * @property integer $subcat_id
 * @property string $sub_cat_name
 * @property string $post_title
 * @property string $post_thumb
 * @property string $post_intro
 * @property string $post_alias
 * @property string $post_status
 * @property string $post_hot
 * @property string $post_updated_date
 * @property integer $admin_id
 *
 * The followings are the available model relations:
 * @property PostCat $cat
 * @property PostSubcat $subcat
 */
class Post extends CActiveRecord
{
	public $link = '';
	public $months = '';
	public $year = '';
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
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
		return 'tbl_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_thumb', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png','maxSize' => (1024 * 10024)),
			array('post_title,cat_id', 'required'),
			array('post_type, cat_id, subcat_id, admin_id,post_order', 'numerical', 'integerOnly'=>true),
			array('post_title,post_alias', 'length', 'max'=>255),
			array('post_thumb ', 'length', 'max'=>125),
			array('post_status', 'length', 'max'=>4),
			array('has_video', 'length', 'max'=>1),
			
			array('post_hot, post_login_require', 'length', 'max'=>5),
			
			array('post_updated_date,post_added_time,post_intro', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('post_id, post_type, cat_id,post_added_time, subcat_id, sub_cat_name, post_title, post_thumb, post_intro, post_alias, post_status, post_hot, post_updated_date, admin_id', 'safe', 'on'=>'search'),
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
			'cat' => array(self::BELONGS_TO, 'PostCat', 'cat_id'),
			'subcat' => array(self::BELONGS_TO, 'PostSubcat', 'subcat_id'),
			'posttags'=>array(self::HAS_MANY, 'PostTags', 'post_id'),
			'keysearch'=>array(self::HAS_MANY, 'Keysearch', 'post_id'),
			
		);
	}
	
	 public function getPostType(){
        switch ($this->post_type) {
            case 0:
                $css='';
                break;
            case 1:
                $css='table-flag-blue';
                break;
            case 2:
                $css='table-flag-orange';
                break;
            case 3:
                $css='table-flag-red';
                break; 
			case 4:
                $css='table-flag-green';
                break; 
			case 5:
                $css='table-flag-yellow';
                break;       
        }
        return $css;
    }
	
	
	

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'post_id' => 'Post ID',
			'post_type' => 'Post type',
			'cat_id' => 'Category',
			'subcat_id' => 'Sub Category',
			'post_title' => 'Title',
			'post_thumb' => 'Thumb',
			'post_intro' => 'Intro',
			'post_alias' => 'Alias',
			'post_status' => 'Status',
			'post_views' => 'Views',
			'post_hot' => ' HOT',
			'post_login_require' => 'Login required',
			'post_order'=>'Order',
			'post_added_time'=>'Date',
			'post_updated_date' => 'Updated date',
			'admin_id' => 'Editor',
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

		$criteria->compare('post_id',$this->post_id,true);
		$criteria->compare('post_type',$this->post_type);
		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('subcat_id',$this->subcat_id);
		$criteria->compare('post_title',$this->post_title,true);
		$criteria->compare('post_status',$this->post_status,true);
		$criteria->compare('post_hot',$this->post_hot,true);
		$criteria->compare('post_updated_date',$this->post_updated_date,true);
		$criteria->compare('admin_id',$this->admin_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
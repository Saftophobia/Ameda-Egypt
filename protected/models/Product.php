<?php

/**
 * This is the model class for table "tbl_product".
 *
 * The followings are the available columns in table 'tbl_product':
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $picture_path
 * @property integer $price
 * @property integer $available
 * @property string $created_at
 * @property string $updated_at
 *
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Product extends CActiveRecord
{
	const TYPE_available_at_stores = 1;
	const TYPE_out_of_stock = 0;


	public $productImage;


	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
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
		return 'tbl_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, name, price', 'required'),
			array('user_id, price, available', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>200),
			array('picture_path, created_at, updated_at', 'safe'),
			array('productImage', 'file', 'types' => 'png, gif, jpg', 'allowEmpty' => true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, name, picture_path, price, available', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'name' => 'Name',
			'picture_path' => 'Picture Path',
			'video_path' => 'Video Path',
			'price' => 'Price',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'available' => 'Available',
		);
	}


	public function behaviors() {
		return array(
			'productImageBehavior' => array(
				'class' => 'ImageARBehavior',
				'attribute' => 'productImage', // this must exist
				'extension' => 'png, gif, jpg', // possible extensions, comma separated
				'prefix' => 'img_',
				'relativeWebRootFolder' => 'images/slider/all/', // this folder must exist
				
				# 'forceExt' => png, // this is the default, every saved image will be a png one.
				# Set to null if you want to keep the original format
				
				#'useImageMagick' => '/usr/bin', # I want to use imagemagick instead of GD, and
				# it is located in /usr/bin on my computer.
				
				// this will define formats for the image.
				// The format 'normal' always exist. This is the default format, by default no
				// suffix or no processing is enabled.
				'formats' => array(
					// create a thumbnail grayscale format
					'thumb' => array(
						'suffix' => '_thumb',
						'process' => array('resize' => array(60, 60), 'grayscale' => true),
					),
					// create a large one (in fact, no resize is applied)
					'large' => array(
						'suffix' => '_large',
					),
					// and override the default :
					'normal' => array(
						'process' => array('resize' => array(200, 200)),
					),
				),
				
				'defaultName' => 'default', // when no file is associated, this one is used by getFileUrl
				// defaultName need to exist in the relativeWebRootFolder path, and prefixed by prefix,
				// and with one of the possible extensions. if multiple formats are used, a default file must exist
				// for each format. Name is constructed like this :
				//     {prefix}{name of the default file}{suffix}{one of the extension}
			)
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

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('picture_path',$this->picture_path,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('available',$this->available);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function getAvailableOptions()
	{
		return array(
		self::TYPE_available_at_stores=>'Available at stores',
		self::TYPE_out_of_stock=>'Out of stock',
		);
	}
}
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
			'price' => 'Price',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'available' => 'Available',
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
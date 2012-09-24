<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are public $password_repeat;
 * the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $info
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property integer $confirmed_email
 * @property string $username
 * @property string $password
 * @property string $dob
 * @property string $date_joined
 * @property string $picture_path
 * @property string $locked
 *
 * The followings are the available model relations:
 * @property Category[] $categories
 * @property Comment[] $comments
 * @property Product[] $products
 * @property Thread[] $threads
 */
class User extends CActiveRecord
{

	public $password_repeat;
	public $userImage;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	

	/**
	* Prepares create_time, create_user_id, update_time and update_user_id attributes before performing validation.
	*/
	protected function beforeValidate()
	{
	if($this->isNewRecord)
	{
	// set the create date
	$this->date_joined=new CDbExpression('NOW()');
	}
	return parent::beforeValidate();
	}




	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, email, username, password', 'required'),
			array('username, email', 'unique',),
			array('confirmed_email', 'numerical', 'integerOnly'=>true),
			array('password', 'compare'),
			array('first_name, last_name', 'length', 'max'=>50),
			array('email', 'length', 'max'=>200),
			array('username, password', 'length', 'max'=>100),
			array('info, dob, password_repeat', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, email, username, dob, date_joined', 'safe', 'on'=>'search'),
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
			'categories' => array(self::HAS_MANY, 'Category', 'user_id'),
			'comments' => array(self::HAS_MANY, 'Comment', 'user_id'),
			'products' => array(self::HAS_MANY, 'Product', 'user_id'),
			'threads' => array(self::HAS_MANY, 'Thread', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'info' => 'Info',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'confirmed_email' => 'Confirmed Email',
			'username' => 'Username',
			'password' => 'Password',
			'dob' => 'Dob',
			'date_joined' => 'Date Joined',
			'userImage' => 'Picture Path',
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
		$criteria->compare('info',$this->info,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('confirmed_email',$this->confirmed_email);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('date_joined',$this->date_joined,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	* perform one-way encryption on the password before we store it in the database
	*/
	protected function afterValidate()
	{
	parent::afterValidate();
	$this->password = $this->encrypt($this->password);
	}
	public function encrypt($value)
	{
	return md5($value);
	}

}
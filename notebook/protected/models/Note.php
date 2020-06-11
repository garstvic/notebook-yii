<?php

/**
 * This is the model class for table "note".
 *
 * The followings are the available columns in table 'note':
 * @property integer $id
 * @property string $phone
 * @property string $name
 * @property string $email
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property UserNote[] $userNotes
 */
class Note extends CActiveRecord
{
	const PAGE_SIZE=15;
	
	public $user_search;
	
	public function __construct()
	{
		$this->user_search=Yii::app()->user;

		parent::__construct();
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'note';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('phone, name, email', 'required'),
			array('phone', 'length', 'max'=>50),
			array('name, email', 'length', 'max'=>256),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, phone, name, email, created_at,user_search', 'safe', 'on'=>'search'),
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
			'userNotes' => array(self::HAS_MANY, 'UserNote', 'note_id'),
			'user_note'=>array(self::HAS_ONE,'UserNote','note_id'),
			'user'=>array(self::HAS_ONE,'User',array('user_id'=>'id'),'through'=>'user_note')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'phone' => 'Телефон',
			'name' => 'ФИО',
			'email' => 'Email',
			'created_at' => 'Created At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with=array('user');

		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('user.id',$this->user_search->id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'name',
					'phone'
				)
			),
			'pagination'=>array(
				'pageSize'=>self::PAGE_SIZE,
			),			
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Note the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

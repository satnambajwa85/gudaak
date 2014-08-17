<?php

/**
 * This is the model class for table "chat_messages".
 *
 * The followings are the available columns in table 'chat_messages':
 * @property integer $id
 * @property integer $client_projects_id
 * @property integer $suppliers_id
 * @property string $message
 * @property string $add_date
 * @property string $ip_address
 * @property integer $is_sent_from_supplier
 *
 * The followings are the available model relations:
 * @property ClientProjects $clientProjects
 * @property Suppliers $suppliers
 */
class ChatMessages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'chat_messages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_projects_id, suppliers_id', 'required'),
			array('client_projects_id, suppliers_id, is_sent_from_supplier', 'numerical', 'integerOnly'=>true),
			array('ip_address', 'length', 'max'=>45),
			array('message, add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, client_projects_id, suppliers_id, message, add_date, ip_address, is_sent_from_supplier', 'safe', 'on'=>'search'),
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
			'clientProjects' => array(self::BELONGS_TO, 'ClientProjects', 'client_projects_id'),
			'suppliers' => array(self::BELONGS_TO, 'Suppliers', 'suppliers_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'client_projects_id' => 'Client Projects',
			'suppliers_id' => 'Suppliers',
			'message' => 'Message',
			'add_date' => 'Add Date',
			'ip_address' => 'Ip Address',
			'is_sent_from_supplier' => 'Is Sent From Supplier',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('client_projects_id',$this->client_projects_id);
		$criteria->compare('suppliers_id',$this->suppliers_id);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('is_sent_from_supplier',$this->is_sent_from_supplier);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ChatMessages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

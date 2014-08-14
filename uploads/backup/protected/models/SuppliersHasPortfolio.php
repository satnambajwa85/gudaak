<?php

/**
 * This is the model class for table "suppliers_has_portfolio".
 *
 * The followings are the available columns in table 'suppliers_has_portfolio':
 * @property integer $id
 * @property integer $suppliers_id
 * @property string $project_name
 * @property string $project_link
 * @property string $description
 * @property integer $industry_id
 * @property string $client_name
 * @property string $year_done
 * @property integer $service_id
 * @property string $estimate_price
 * @property string $estimate_timelines
 * @property string $languages_used
 * @property string $add_date
 * @property integer $status
 * @property string $cover
 *
 * The followings are the available model relations:
 * @property Industries $industry
 * @property Suppliers $suppliers
 * @property SuppliersPortfolioHasSkills[] $suppliersPortfolioHasSkills
 */
class SuppliersHasPortfolio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suppliers_has_portfolio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	 public $supName='';
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('suppliers_id, service_id, cover', 'required'),
			array('suppliers_id, industry_id, service_id, status', 'numerical', 'integerOnly'=>true),
			array('project_name, client_name, year_done, languages_used, cover', 'length', 'max'=>250),
			array('project_link', 'length', 'max'=>500),
			array('estimate_price, estimate_timelines', 'length', 'max'=>100),
			array('description, add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, suppliers_id, project_name, project_link, description, industry_id, client_name, year_done, service_id, estimate_price, estimate_timelines, supName, languages_used, add_date, status, cover', 'safe', 'on'=>'search'),
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
			'industry' => array(self::BELONGS_TO, 'Industries', 'industry_id'),
			'service' => array(self::BELONGS_TO, 'Services', 'service_id'),
			'suppliers' => array(self::BELONGS_TO, 'Suppliers', 'suppliers_id'),
			'suppliersPortfolioHasSkills' => array(self::HAS_MANY, 'SuppliersPortfolioHasSkills', 'portfolio_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'suppliers_id' => 'Suppliers',
			'project_name' => 'Project Name',
			'project_link' => 'Project Link',
			'description' => 'Description',
			'industry_id' => 'Industry',
			'client_name' => 'Client Name',
			'year_done' => 'Year Done',
			'service_id' => 'Service',
			'estimate_price' => 'Estimate Price',
			'estimate_timelines' => 'Estimate Timelines',
			'languages_used' => 'Languages Used',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'cover' => 'Cover',
			'supName' => 'Supplier Name',
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
			$page_size = 50;
			if(isset($_REQUEST['pagesize']))
			{
				$page_size = $_REQUEST['pagesize'];   
			}
	
			/*if(isset($this->suppliers_id) && ($this->suppliers_id != ""))
			{
				$result = Suppliers::model()->findAll('name LIKE "%'.$this->suppliers_id.'%"');
				$supSearch=array();
				foreach($result as $supRes)
					$supSearch[]=$supRes->id;
				if(count($supSearch)>0)
					$criteria->compare('suppliers_id',$supSearch,true);
				else
					$criteria->compare('suppliers_id',$this->suppliers_id,true);
			}
			else
			{	
				$criteria->compare('suppliers_id',$this->suppliers_id,true);
			}
				*/
			if(isset($_REQUEST['SuppliersHasPortfolio']['supName']) && ($_REQUEST['SuppliersHasPortfolio']['supName'] != ""))
			{
				$result = Suppliers::model()->findAll('name LIKE "%'.$_REQUEST['SuppliersHasPortfolio']['supName'].'%"');
				$supSearch=array();
				foreach($result as $supRes)
					$supSearch[]=$supRes->id;
				if(count($supSearch)>0)
					$criteria->compare('suppliers_id',$supSearch,true);
				else
					$criteria->compare('suppliers_id',$this->suppliers_id,true);
			}
			else
			{	
				$criteria->compare('suppliers_id',$this->suppliers_id,true);
			}
			
			if(isset($this->industry_id) && ($this->industry_id != ""))
			{
				$result = Industries::model()->findAll('name LIKE "%'.$this->industry_id.'%"');
				$indSearch=array();
				foreach($result as $indRes)
					$indSearch[]=$indRes->id;
				if(count($indSearch)>0)
					$criteria->compare('industry_id',$indSearch,true);
				else
					$criteria->compare('industry_id',$this->industry_id,true);
			}
			else
			{
				$criteria->compare('industry_id',$this->industry_id,true);
			}

		$criteria->compare('id',$this->id);
		//$criteria->compare('suppliers_id',$this->suppliers_id);
		$criteria->compare('project_name',$this->project_name,true);
		$criteria->compare('project_link',$this->project_link,true);
		$criteria->compare('description',$this->description,true);
		//$criteria->compare('industry_id',$this->industry_id);
		$criteria->compare('client_name',$this->client_name,true);
		$criteria->compare('year_done',$this->year_done,true);
		$criteria->compare('service_id',$this->service_id);
		$criteria->compare('estimate_price',$this->estimate_price,true);
		$criteria->compare('estimate_timelines',$this->estimate_timelines,true);
		$criteria->compare('languages_used',$this->languages_used,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('cover',$this->cover,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'id DESC',

			),
			'pagination' => array('pageSize' => $page_size),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuppliersHasPortfolio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php
class WidgetDashboardMenu extends CWidget
{
	public $visible=true;
 	public $projectStatus = array(
							'0'=>array(
								'client'=>'',
									'supplier'=>'awarded to Supplier'),
                            '1'=>array(
								'client'=>'',
									'supplier'=>'Seek clarification'),
							'2'=>array(
								'client'=>'',
								'supplier'=>'Supplier has pitched'),
							'3'=>array(
								'client'=>'',
								'supplier'=>'Accepted pitch by client'),
							'4'=>array(
								'client'=>'',
								'supplier'=>'Project has started'),
							'5'=>array(
								'client'=>'',
								'supplier'=>'Project Completed'),
							'6'=>array(
								'client'=>'',
								'supplier'=>'Project Rejected/Archived')
							
							);
	public function init()
	{
		if($this->visible)
		{

		}
	}

	public function run()
	{
		if($this->visible)
		{
			$this->renderContent();
		}
	}
	protected function renderContent()
	{
		if(Yii::app()->user->role=='client'){
			$projects	=	ClientProjects::model()->findAllByAttributes(array('client_profiles_id'=>Yii::app()->user->profileId,'state'=>array(1,2,3,4,5)),array('order'=>'id DESC'));
			$refe		=	SuppliersHasReferences::model()->findAllByAttributes(array('client_id'=>Yii::app()->user->profileId));
			$this->render('widgetDashboardMenu',array('projects'=>$projects,'references'=>$refe));
		}
		if(Yii::app()->user->role=='supplier'){
			$projects	=	SuppliersProjectsProposals::model()->findAllByAttributes(array('suppliers_id'=>Yii::app()->user->profileId));
			$profile = Suppliers::model()->findByPk(yii::app()->user->profileId);
            //CVarDumper::dump($profile,10,1);;die;
			$this->render('widgetDashboardSupplierMenu',array(
				'projects'=>$projects,
				'profile'=>$profile));
		}
	}
}

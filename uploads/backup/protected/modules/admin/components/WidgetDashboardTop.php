<?php
class WidgetDashboardTop extends CWidget
{
	public $visible=true;
 
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
		$tokenGen = new ServicesFirebaseTokenGenerator(APP_SECRET);

		$notifications		=	array();
		$messages			=	array();
		$profile			=	ClientProfiles::model()->findByPk(Yii::app()->user->profileId);
		$token = $tokenGen->createToken(array("id"=>yii::app()->user->id,"pic"=>$profile->image,"name"=>$profile->first_name." ".$profile->last_name));
			
		$notifications		=	Log::model()->findallbyattributes(array('for_user'=>Yii::app()->user->id,'notification'=>1),array('order'=>'add_date DESC'));
		$countNotifications	=	Log::model()->countbyattributes(array('for_user'=>Yii::app()->user->id,'notification'=>1,'is_read'=>0));
		$projects			=	ClientProjects::model()->findAllByAttributes(array('client_profiles_id'=>Yii::app()->user->profileId));
		$list				=	array();
		foreach($projects as $project)
			$list[]	=	$project->id;
			
		$messages		=	ChatMessages::model()->findAllByAttributes(array('client_projects_id'=>$list));
		
		$this->render('widgetDashboardTop',array('profile'=>$profile,'notifications'=>$notifications,'note'=>$countNotifications,'messages'=>$messages,'token'=>$token));
	}
}

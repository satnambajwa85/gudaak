<?php
class WidgetDashboardMenu extends CWidget
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
	 	$userProfile	=	UserProfiles::model()->findByPK(Yii::app()->user->profileId);
		$tests			=	OrientItems::model()->findAllByAttributes(array('published'=>1,'status'=>1),array('order'=>'title ASC '));
		$this->render('widgetDashboardMenu',array('userinfo'=>$userProfile,'tests'=>$tests));
	}  

}
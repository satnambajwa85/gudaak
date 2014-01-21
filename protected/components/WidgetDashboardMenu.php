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
		$this->render('widgetDashboardMenu',array('userinfo'=>$userProfile));
	}  

}
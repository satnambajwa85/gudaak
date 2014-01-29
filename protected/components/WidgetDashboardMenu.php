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
		$record_exists = UserProfiles::model()->exists('id = :id', array(':id'=>Yii::app()->user->profileId)); 
		if($record_exists==1){
			$completeProfile	=	'10%';
		}	
		$this->render('widgetDashboardMenu',array('userinfo'=>$userProfile,'tests'=>$tests,'completeProfile'=>$completeProfile));
	}  

}
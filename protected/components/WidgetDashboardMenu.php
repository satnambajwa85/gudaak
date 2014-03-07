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
		$completeProfile	=	'';
	 	$userProfile		=	UserProfiles::model()->findByPK(Yii::app()->user->profileId);
		$userProfileProcess	=	UserProfilesHasUserSubjects::model()->countByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId)); 
		$userProfileProcess2=	UserProfilesHasInterests::model()->countByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId)); 
		$tests				=	OrientItems::model()->findAllByAttributes(array('published'=>1,'status'=>1),array('order'=>'title ASC '));
		$userTest		 	=  UserReports::model()->countByAttributes(array('user_profiles_id'=>Yii::app()->user->profileId)); 
		 
		if($userTest==1){
			$completeProfile	=	'50%'; 
		}
		if($userTest==2){
			$completeProfile	=	'100%'; 
		}
		if($userProfileProcess>=1 && $userTest==0){
			$completeProfile	=	'10%'; 
		}
		if($userProfileProcess2>=1 && $userTest==0){
			$completeProfile	=	'20%'; 
		}
		if(empty($userProfileProcess)){
			$completeProfile	=	'0%'; 
		}
		
		
		
		$this->render('widgetDashboardMenu',array('userinfo'=>$userProfile,'tests'=>$tests,'completeProfile'=>$completeProfile));
	}  

}
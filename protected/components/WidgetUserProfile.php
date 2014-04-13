
<?php
class WidgetUserProfile extends CWidget
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
		$model			=	UserProfiles::model()->findByPk(Yii::app()->user->profileId);
		$Interests		=	Interests::model()->findAll();
		$selInter		=	array();
		foreach($model->userProfilesHasInterests as $ind)
			$selInter[]	=	$ind->interests_id;
		
		
		$this->render('widgetUserProfile',array('model'=>$model,'Interests'=>$Interests,'selInter'=>$selInter));
		
	}  

}
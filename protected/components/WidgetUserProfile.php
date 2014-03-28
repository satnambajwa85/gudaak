
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
		$model			=	 UserProfiles::model()->findByPk(Yii::app()->user->profileId);
		$this->render('widgetUserProfile',array('model'=>$model));
		
	}  

}
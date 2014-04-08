<?php
class WidgetSchoolMenu extends CWidget
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
		$schoolInfo		=	  Schools::model()->findByPk(Yii::app()->user->profileId);
		$this->render('widgetSchoolMenu',array('schoolInfo'=>$schoolInfo));
	}  

}
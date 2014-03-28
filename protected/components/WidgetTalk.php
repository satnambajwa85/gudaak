
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
		$list			=	 Tickets::model()->findAllByAttributes(array('sender_id'=>Yii::app()->user->profileId));
		$this->render('widgetTalk',array('list'=>$list));
		
	}  

}
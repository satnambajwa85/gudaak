<?php
class WidgetSlider extends CWidget
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
		$slider	=	Slider::model()->findAllByAttributes(array('published'=>1,'status'=>1));
		
		$this->render('widgetSlider',array('slider'=>$slider));
		
	}  

}
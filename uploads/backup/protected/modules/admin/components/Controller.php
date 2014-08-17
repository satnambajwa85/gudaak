<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();


	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	 
	public function mailLog($subject,$to,$templete,$body)
	{	
		$mailLog	=	 new EmailLogs;
		$mailLog->esubject	=	$subject;
		$mailLog->reciver		=	$to;
		$mailLog->user_id	=	isset(Yii::app()->user->id)?Yii::app()->user->id:'00';
		$mailLog->templete	=	$templete;
		$mailLog->body		=	$body;
		$mailLog->time		=	date('Y-m-d H:i:s');
		if($mailLog->save())
		  return 1;
		else
		  return 0;
	}
    	/* admin Update Logs*/
    public function updateLog($userid,$username,$description,$controller,$action)
	{	
	 
		$updateLog	           =	 new UpdateLogs;
		$updateLog->user_id	   =	$userid;
		$updateLog->username   =	$username;
		$updateLog->controller =	$controller;
		$updateLog->action	   =	$action;
		$updateLog->description=	$description;
		$updateLog->user_ip	   =	$_SERVER['REMOTE_ADDR'];
        $updateLog->save();
		 
	}	


}

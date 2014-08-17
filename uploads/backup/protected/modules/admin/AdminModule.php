<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the 

 

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
	}
    public $logMessage = "defaults";
	public $writeLog = true;
 
	public function beforeControllerAction($controller, $action)
	{
		
					 
			if(parent::beforeControllerAction($controller,$action))
				{ 
						$details	=	 Yii::app()->request->getUrl(); 
						$detailsArr	= 	 explode('&',$details);
						$detailsPage = (isset($detailsArr[1]))?explode('=',$detailsArr[1]):'';
						
					 if(count($detailsArr)>1   && $action->id!='view' && $detailsPage[0]!='pagesize')
					 {		
					 
						$adminLog	=	 new AdminLogs;
						$adminLog->user_id		= 	 Yii::app()->user->id;
						$adminLog->username		= 	 Yii::app()->user->name;
						$adminLog->ipaddress	= 	 isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'';
						$adminLog->logtime		= 	 date("Y-m-d H:i:s");
						$adminLog->controller	= 	 $controller->id;
						$adminLog->action		= 	 $action->id;
						$adminLog->details		= 	 $details;
						$adminLog->browser		= 	 isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'Unknown';
						$adminLog->action_param	= 	 $detailsArr[1];
						$adminLog->request_url	= 	 $_SERVER['REQUEST_URI'];
						$adminLog->query_string	= 	 isset($_SERVER['QUERY_STRING'])?$_SERVER['QUERY_STRING']:'';
						$adminLog->refer_url	= 	 isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'Direct from Broswer';
						
						if($adminLog->save())
						{
								return true;
						}
					 }
		 	 			else
						return true;
		 	}
			 else
			 return true;
	}

}

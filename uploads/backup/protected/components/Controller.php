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
		$mailLog->reciver	=	$to;
		$mailLog->user_id	=	isset(Yii::app()->user->id)?Yii::app()->user->id:'00';
		$mailLog->templete	=	$templete;
		$mailLog->body		=	$body;
		$mailLog->time		=	date('Y-m-d H:i:s');
		if($mailLog->save())
		  return 1;
		else
		  return 0;
	}


	/* Code API - Tarun Gupta
	* Date - 30-07-2014
	* $ip parameter should be a valid IP address else it will take the current ip addr from $SERVER
	* call in any controller like parent::getLocationByIp("115.249.130.53") or parent::getLocationByIp()
	*
	**/
	public function getLocationByIp($ip=null)
	{
		// finding Location (Country, City) on the basis of user ip

		//set current location if $ip is null
		if(empty($ip))
			$ip = $this->getUserIp();

		// create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "ipinfo.io/".$ip);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

		$output = json_decode($output);
		//CVarDumper::dump($output,10,1);
		//echo $output->city;die;
		if(!empty($output->city)){
			$city = Cities::model()->findByAttributes(array("name"=>$output->city));
		}else{
			//return default cities id 'New York'
			$city = Cities::model()->findByAttributes(array("id"=>134717));
		}
		CVarDumper::dump($city,10,1);
		return $city;
	}

	private function getUserIp()
	{

		//return CHttpRequest::getUserHostAddress();
		return $_SERVER['REMOTE_ADDR'];
	}
    
    
     function milestoneStatusarray()
     {
        $milestoneStatus = array(
							'0'=>array(
								'client'=>'No funding request recieved',
								'supplier'=>'Funding request not sent'),
                            '1'=>array(
								'client'=>'Funding requested',
								'supplier'=>'Funding request sent'),
							'2'=>array(
								'client'=>'Milestone funded',
								'supplier'=>'Milestone funded'),
							'3'=>array(
								'client'=>'Release requested',
								'supplier'=>'Release requested'),
							'4'=>array(
								'client'=>'Payment made',
								'supplier'=>'Payment recieved'),
                            '5'=>array(
								'client'=>'Request cancelled',
								'supplier'=>'Funding Rescinded'),
                            '6'=>array(
								'client'=>'Payment cancelled',
								'supplier'=>'Payment denied')							
							);     
        return $milestoneStatus;                           
     }
     
     
     
    public function actionMilestonesstatus($milestone_id,$old,$new,$note)
    {
        $status_model = new MilestoneHasOrderStatus;
        $status_model->supplier_milestones_id = $milestone_id; 
        $status_model->old_status = $old;
        $status_model->new_status = $new;
        $status_model->date = date("Y-m-d H:m:s");
        $status_model->note = $note;
        if($status_model->save())
        {
            echo "1";    
        } 
    }
    
    function fetch_data_for_email($id)
    {
        $supplier_project_proposal = SuppliersProjectsProposals::model()->findAllByAttributes(array('id'=>$id));
        
        $client_name    = $supplier_project_proposal[0]->clientProjects->clientProfiles->users->display_name;
        $client_email   = $supplier_project_proposal[0]->clientProjects->clientProfiles->users->username;
        $supplier_name  = $supplier_project_proposal[0]->suppliers->first_name." ".$supplier_project_proposal[0]->suppliers->last_name;
        $supplier_email = $supplier_project_proposal[0]->suppliers->email;
        
        
        $array = array("supplier_name"=>$supplier_name,"supplier_email"=>$supplier_email,"client_name"=>$client_name,"client_email"=>$client_email);
      
        return $array;
    }
    
    
    
     

		
}

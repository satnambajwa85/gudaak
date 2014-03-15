<?php
class UserIdentity extends CUserIdentity
{
	public function authenticate()
	{
		$record = UserLogin::model()->findByAttributes(array('username'=>$this->username,'activation'=>1,'status'=>1));
		
		if($record===null)//validate username exsist or no||t 
			$this->errorCode = self::ERROR_USERNAME_INVALID;
			
		else if(md5($this->password)!=$record->password ) { 
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		}
		
		else{
		
			if($record->status==1)//Authenticates only those users whose status =1
				$this->setState('userId',$record->id);
			if($record->userRole->title == 'school'){
				$userInfo	=	SchoolsHasUserLogin::model()->findByAttributes(array('user_login_id'=>$record->id));
				if(empty($userInfo))
					return 2;
				$this->setState('profileId',$userInfo->schools_id);
				$this->setState('schoolsId',$userInfo->schools_id);
			}else{
				$userInfo	=	UserProfiles::model()->findByAttributes(array('user_login_id'=>$record->id));
				$this->setState('profileId',$userInfo->id);
				$this->setState('schoolsId',$userInfo->generateGudaakIds->schools_id);
			}
			$this->setState('userId',$record->id);
			$this->setState('userType',$record->userRole->title);
			$this->setState('lastLogin',$record->last_login);
			$record->login_status	=	1;
			$record->last_login		=	date('Y-m-d H:i:s');
			$record->save();
			
			
		} 
		$this->errorCode = self::ERROR_NONE;
		return !$this->errorCode;
	}
}
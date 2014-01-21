<?php
class UserIdentity extends CUserIdentity
{
	private $_id;
 
	public function authenticate()
	{
		$record = UserLogin::model()->findByAttributes(array('username'=>$this->username,'activation'=>1));
		if($record===null)//validate username exsist or not 
			$this->errorCode = self::ERROR_USERNAME_INVALID;
			
		else if(md5($this->password)!=$record->password || $record->status!=1) { 
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		}
		else{
			if($record->status==1)//Authenticates only those users whose status =1
				$this->_id = $record->id;
				
				
			$userInfo	=	UserProfiles::model()->findByAttributes(array('user_login_id'=>$record->id));
			$this->setState('userId',$record->id);
			$this->setState('profileId',$userInfo->id);
			$this->setState('userName',$userInfo->first_name.' '.$userInfo->last_name);
			$this->setState('gender',$userInfo->gender);
			$this->setState('userImg',$userInfo->image);
			$this->setState('userType',$record->userRole->title);
			$this->setState('lastLogin',$record->last_login);
			$this->setState('activation',$record->activation);
			$userLogin	=	UserLogin::model()->findByPk($record->id);
			$userLogin->login_status	=	1;
			$userLogin->last_login	=	date('Y-m-d H:i:s');
			$userLogin->save();
			
			$this->errorCode = self::ERROR_NONE;
		} 
		return !$this->errorCode;
	}
}
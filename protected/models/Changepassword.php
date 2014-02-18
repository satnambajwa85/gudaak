<?php
class Changepassword extends CFormModel
{
    
    public $oldpassword;  
    public $newpassword;
    public $confirmpass;  
   
    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            array('oldpassword', 'required','message' => 'Please enter old password.'), 
            array('newpassword', 'required','message' => 'Please enter new password.'), 
            array('confirmpass', 'required','message' => 'Please confirm new password.'), 
            array('newpassword', 'compare', 'compareAttribute'=>'confirmpass'), 
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'oldpassword'=>'Old Password',
            'newpassword'=>'New Password', 
            'confirmpass'=>'Confirm Password', 
           );
    }
    
}//ends class


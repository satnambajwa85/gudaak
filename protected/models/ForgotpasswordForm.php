<?php
class ForgotpasswordForm extends CFormModel
{
   
    public $email;
    public $verifyCode;
    public $hint_question_id;
    public $hint_answer;
    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
          // email is required
            array('email','required'),
            array('verifyCode','required'),
            // email has to be a valid email address
            array('email', 'email'),           
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
            'email'=>'Email',
            'verifyCode'=>'Verification Code',
           );
    }
    
}//ends class


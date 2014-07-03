<style>	
.mail_set{
	padding:30px 30px 50px 30px;
	width:635px;
	background:#f1f1f1;
	border:1px solid #ebebeb;
	font-size:24px;
	font-weight:normal;
	color:#000;
	font-family: 'MyriadProRegular';
	margin-top:45px;
}
.mail_logo img{
	width:100px;
	height:42px;
}
.mail_set span{
	color:#656565;
	font-style:italic;
}
</style>
<table cellpadding="0" cellspacing="0" border="0" class="mail_set">
	<tr>
		<td>
			<a href="#" class="mail_logo">
			<img src="<?php echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/images/logo.png"/>
			</a>
		</td>	
	</tr>
	<tr>
		<td>
			Dear <?php echo $name; ?>,<br /><br />
		</td>	
	</tr>
	<tr>
		<td>
			Thank you for setting up an account with Gudaak.com<br />
		</td>	
	</tr>
	<tr>
		<td>
			 We are sending you this e-mail because you indicated that you forgot your password.<br /><br />
            
            
            Please click the link below to reset your password:<br /><br /><br />
            
            <a href="<?php echo Yii::app()->createAbsoluteUrl('site/resetPassword', array('link' => $password));?>" style="background: none repeat scroll 0 0 #48a53d;color: #FFFFFF;font-size: 18px; padding: 10px 15px;text-decoration: none;transition: all 600ms ease-in-out 0s; font-weight:bold; font-family:Arial, Helvetica, sans-serif; -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin-left:200px;">Reset Password</a>
            
		</td>	
	</tr>
	<tr>
		<td>
			Regards
			Gudaak
		</td>	
	</tr>
</table>
                             
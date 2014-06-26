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
		Your Credentials are as follows:
		</td>	
	</tr>
	<tr>
		<td>
			Username: <span><?php echo $email; ?></span><br />
			Password: <span><?php echo $password; ?></span><br /><br />
		</td>	
	</tr>
	<tr>
		<td>
			Regards
			Gudaak
		</td>	
	</tr>
</table>
                             
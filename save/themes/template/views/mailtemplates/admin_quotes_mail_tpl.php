<style>
	@font-face {
    font-family: 'MyriadProRegular';
    src: url('<?php echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/fonts/myriadp0-webfont.eot');
    src: url('<?php echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/fonts/myriadp0-webfont.eot?#iefix') format('embedded-opentype'),
         url('<?php echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/fonts/myriadp0-webfont.woff') format('woff'),
         url('<?php echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/fonts/myriadp0-webfont.ttf') format('truetype'),
         url('<?php echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/fonts/myriadp0-webfont.svg#MyriadProRegular') format('svg');
    font-weight: normal;
    font-style: normal;

}
.mail_set{
	padding:30px 30px 50px 30px;
	width:635px;
	background:#f1f1f1;
	border:1px solid #ebebeb;
	font-size:24px;
	font-weight:normal;
	color:#000;
	font-family: 'MyriadProRegular';	
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
			<img src="<?php echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/images/mail_logo.png"/>
			</a>
		</td>	
	</tr>
	<tr>
		<td height="20px;">
			Dear Admin,<br /><br /><br />
		
			<strong>Sender Details</strong> <br /><br />
			Name : <?php echo $name;?><br />		
			Contact No : <?php echo $contact_no;?><br />
			Country : <?php echo $country;?><br />
			Current Website : <?php echo $current_website;?><br />
			Budget : <?php echo $budget ;?><br />
			Description  : <?php echo $description;?>
		</td>	
	</tr>		
	<tr>
		<td>
			Regards <br />
			<img src="<?php echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/images/mail_logo.png"/>
			
		</td>	
	</tr>
</table>
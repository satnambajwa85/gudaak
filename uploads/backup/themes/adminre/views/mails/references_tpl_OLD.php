<style>
.grey{
	background-color:#999;
}
.mail_set{
	padding:30px 30px 50px 30px;
	width:635px;
	background:#ccc;
	border:1px solid #ebebeb;
	font-size:24px;
	font-weight:normal;
	color:#000;
	font-family: 'MyriadProRegular';
	margin-top:45px;
}
.mail_logo{
	background:#ccc;
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
<div class="grey">
    <table cellpadding="0" cellspacing="0" border="0" class="mail_set" style="background:#fff; color:#333;">
	<!--<tr>
        <td >
			<a href="#" class="mail_logo" style="margin-bottom:10px;">
			<img src="<?php //echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/image/vp-logo.png"/>
			</a>
		</td>
	</tr>-->
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			Hi <?php echo $name; ?>,<br />
		</td>
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
            One of your colleagues recommended you to VenturePact - a marketplace where the best engineering talent can find full time opportunities at the top startups in the world, no matter the location.<br/><br/>

            We are a closed community and would like to invite you to join. Kindly login, fill out your profile and apply to our startups at <a href="http://www.VenturePact.com">www.VenturePact.com</a>. <br/><br/>

			Meanwhile, if you have any queries, please don't hesitate to reply to this email.<br><br/>

			Looking forward to reading more about you!<br>

		</td>
	</tr>

	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			All The Best,<br />
			Sam Shuk<br />
			Client Success Team, VenturePact<br />
		</td>
	</tr>
</table>
</div>
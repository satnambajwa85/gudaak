
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
.mail_logo i
\mg{
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
			Hi <?php echo $data["name"]; ?>,<br />
		</td>
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px">

		Your proposal for <?php echo $data["project"]; ?> has been submitted. The client may have questions regarding the proposal, so please do check your messages over the next few days.
		<br/>
		
		</td>
	</tr>

	<tr style="background-color:#fff;">
		<td  style="padding:10px">
        	All The Best,<br />
			Bhavya<br />
			Developer Relations Team, VenturePact<br />

        </td>
	</tr>
</table>
</div>
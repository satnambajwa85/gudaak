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
		<td colspan="2">
			Dear User,<br /><br />
		</td>	
	</tr>
	<tr>
		<td> Name :</td>
        <td>
			<?php echo $name; ?><br /><br />
		
		</td>	
	</tr>
    <tr>
    	<td> Email :</td>
		<td>
			<?php echo $email; ?><br /><br />
		
		</td>	
	</tr>
     <tr>
    	<td> Phone :</td>
		<td>
			<?php echo $phone; ?><br /><br />
		
		</td>	
	</tr>
    <tr>
    	<td> Institution Name :</td>
		<td>
			<?php echo $institution; ?><br /><br />
		
		</td>	
	</tr>
    <tr>
    	<td> Designation :</td>
		<td>
			<?php echo $designation; ?><br /><br />
		
		</td>	
	</tr>
	<tr>
		<td>
			Regards
			Gudaak
		</td>	
	</tr>
</table>
                             
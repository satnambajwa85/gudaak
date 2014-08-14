<style>
.tick_class
{
    display: none;
}
.display_none_class
{
    display: none;  
    font-size: 12px;
    color:#EC465A; 
    float:left;
}
.reminder_class
{
    display: none;
}
.datepicker_class
{
    cursor: default!important;
    background-color: #fff!important;
}
</style>

<script>
    //$(document).ready(function(){$(".datepicker_class").datepicker();})
    
    function enabled_enddate(id)
    {
        id = id.split("_");
        $("#end_date_" + id[2]).removeAttr("disabled");
    }
    
    function chk_correct_date(id)
    {
        id = id.split("_");
        var start_date = $("#start_date_" + id[2]).val();
        var end_date   = $("#end_date_" + id[2]).val();   
        if(!isFromBiggerThanTo(start_date,end_date))
        {
            $("#error_end_date_" + id[2]).show().html("Invalid Date");
        }else{
            $("#error_end_date_" + id[2]).hide();
        }
        
        
    }
    
    $(window).load(function(){
       load_datepicker($) 
    });
 
    function load_datepicker($)
    {
        $(".datepicker_class").datepicker(); 
    }
    
</script>

<script>

    function paymentaddNew()
    {
        var id = $("#hidden_val").val();       
        var is_last_row_added = save_milestone(id,1);       

        if(is_last_row_added)
        {
          id = parseInt(id) + 1;    
        }
        $("#hidden_val").val(id);
        var html = '<tr id="tr_id_' + id +'"  class="text-center tr_class"><td><input type="text" name="module_' + id +'" id="module_' + id +'"   class="form-control" placeholder="Module" /><div class="display_none_class" id="error_module_' + id +'">This is required..</div></td><td><input type="text" value=""  readonly name="start_date_' + id +'" id="start_date_' + id +'" onchange="enabled_enddate(this.id)" class="form-control datepicker_class" placeholder="Start Date" /><div class="display_none_class" id="error_start_date_' + id +'">This is required..</div><td><input disabled type="text" readonly name="end_date_' + id +'" id="end_date_' + id +'" onchange="chk_correct_date(this.id)"  class="form-control datepicker_class" placeholder="End Date"  /><div class="display_none_class" id="error_end_date_' + id +'">This is required..</div></td><td><div class="col-md-2 input-group"><span class="input-group-addon">$</span><input type="text" id="amount_' + id +'" name="amount_' + id +'"  class="form-control" placeholder="xxxx"  maxlength="15" /><input type="hidden" name="hidden_milestone_id_' + id +'" id="hidden_milestone_id_' + id +'" value="0" /></div><div class="display_none_class" id="error_amount_' + id +'">This is required..</div></td><td><button class="btn btn-xs btn-default"  type="button"  onclick="save_milestone(' + id + ',0)" title="Save"><i class="ico-save"></i></button>&nbsp;<button class="btn btn-xs btn-danger" type="button" title="Delete" onclick="remove_row('+ id +')"><i class="ico-remove3"></i></button>&nbsp;<span class="glyphicon glyphicon-ok tick_class" id="tick_' + id +'"></span></td></tr>';
        if(is_last_row_added)
        {
            
            $('#payment_info').append(html);
             load_datepicker($);
            
        }
        
        
    }
    
    function remove_row(that)
    {
        var id = $("#hidden_milestone_id_" + that).val();
        $.post("<?php echo CController::createUrl('/supplier/deletemilestone');?>",{id:id},function(response){
            if(response=="1")
            {
                $("#tr_id_" + that).remove();     
                $("#milestones_" + id).remove();   
            }else{
                 if(id > 0)
                 {
                    alert("Something's not right. ");   
                 }
                 $("#tr_id_" + that).remove();   
            }
        }) ;
        
        //that.parent().parent().remove();
    }
    
    
    function isFromBiggerThanTo(dtmfrom, dtmto)
    {
        
        var from = new Date(dtmfrom);
        var to = new Date(dtmto);
        return to >= from ;
    }
    
    function save_milestone(id,$numb)
    {
      
        var msg = "";
        var module     = $("#module_" + id).val();
        var start_date = $("#start_date_" + id).val();
        var end_date   = $("#end_date_" + id).val();
        var amount     = $("#amount_" + id).val();
        var hidden_milestone_id = $("#hidden_milestone_id_" + id).val();
        
        if(module=="")
        {
            msg += "Please enter module\n";
            $("#error_module_" + id).show();
        }else{
            $("#error_module_" + id).hide();
        }
        if(start_date=="")
        {
            msg += "Please enter start date\n";
            $("#error_start_date_" + id).show();
        }else{
            $("#error_start_date_" + id).hide();
        }
        if(end_date=="")
        {
            msg += "Please enter end date\n";
            $("#error_end_date_" + id).show();
        }else{
            $("#error_end_date_" + id).hide();
        }
        
        if(start_date!="" && end_date!="")
        {   
            if(!isFromBiggerThanTo(start_date,end_date))
            {
                msg += "Please choose valid date\n";
                $("#error_end_date_" + id).show().html("Invalid Date");
            }
        }
        
        if(amount=="")
        {
            msg += "Please enter amount\n";
            $("#error_amount_" + id).show();
        }else{
            
            if(isNaN(amount))
            {
                $("#error_amount_" + id).show();
                $("#error_amount_" + id).html("Invalid amount");    
                return false;
            }else{
                $("#error_amount_" + id).hide();    
            }
            
            
        }
        if(msg=="")
        {
          
            $.post('<?php echo CController::createUrl('/supplier/payments');?>',
                 {
                     module:module,
                     start_date:start_date,
                     end_date:end_date, 
                     amount:amount,
                     hidden_milestone_id:hidden_milestone_id
                 },
                 function(response)
                 {
                    
                    if(response=="0")
                    {
                       // alert("Something's not right. ");
                    }else{
                        
                        $("#hidden_milestone_id_" + id).val(response);
                        $("#tick_" + id).show();
                        var milestones = '<tr id="milestones_'+ response +'" class="text-center milestones_class"><td>'+ module +'</td><td>'+ start_date +'</td><td>'+ end_date +'</td><td>$'+ amount +'</td><td><span class="label label-primary" id="status_of_'+ response +'" >Funding request not sent</span></td><td><button type="button" id="send_invoice_'+ response +'" onclick="change_status_to_1('+ response +')"   class="btn btn-sm btn-default"><i class="ico-mail-send mr5"></i>Send Invoice</button><button onclick="send_reminder('+ response +')" type="button" class="btn btn-sm btn-default reminder_class" id="reminder_'+ response +'" ><i class="ico-mail-send mr5"></i>Send Reminder</button></td></tr>';
                        $("#milestones_" + response).remove();
                        $("#milestones_id").append(milestones);
                        if(hidden_milestone_id==0 && $numb == 0)
                        {
                            paymentaddNew();    
                        }
                        $("#error_module_" + id).hide();
                        $("#error_start_date_" + id).hide();
                        $("#error_end_date_" + id).hide();
                        $("#error_amount_" + id).hide();
                        
                        $("#tr_id_" + id).addClass("tr_tr_" + response );
                        
                        show_hide_buttons("send_invoice_",response);
                       
                    }
                 }
            );  
            return true;
        }else{
            return false;
            
        }
        
    }
    
    
    function change_status_to_1(id)
    {
        bootbox.confirm("<h4> Are you sure you want to send the invoice?</h4>", function(result){
            if(result)
            {
                  $.post('<?php echo CController::createUrl('/supplier/fundingrequestsendstatus');?>',{id:id},function(response){
                   if(response=="1")
                   {
                        show_hide_buttons("reminder_",id);
                        $("#status_of_" + id).html("Funding Request Sent");
                        $(".tr_tr_" + id).hide();          
                   } 
                });        
            }
        });
           
        
        
    }
    
    function show_hide_buttons(show_id,id)
    {
       
        $("#reminder_" + id).hide();
        $("#send_invoice_" + id).hide();
        $("#" + show_id + id ).show();
    }
    
    function send_reminder(id)
    {
       bootbox.confirm("<h4> Are you sure you want to send reminder?</h4>", function(result){
            if(result)
            {
                $.post('<?php echo CController::createUrl('/supplier/reminder');?>',{id:id},function(response){
                    $("#reminder_" + id).html("Reminder Sent");
                });
            }
        });
    }
    
    function function_release(id)
    {
         bootbox.confirm("<h4> Are you sure you want to release?</h4>", function(result){
            if(result)
            {
                 $.post('<?php echo CController::createUrl('/supplier/release');?>',{id:id},function(response){
                    $("#release_" + id).html("Request Sent").attr('disabled','disabled');
                });
            }
        });
    }
    
    function get_popup(popup_text)
    {
        $("#pop_up_title").html(popup_text);
        $("#bs_new").modal("toggle");
        $("#popup_button_class").click(function(){
            var id = this.id;
            if(id=="yes")
            {
                return 1;
            }else{
                return 0;
            }
        });
    }
    
</script>
<section class="container-fluid">
	<!-- Page Header -->
	<div class="page-header page-header-block">
		<div class="page-header-section">
			<h4 class="title semibold">Table default</h4>
		</div>
	</div>
	<!--/ Page Header -->
  
	<!-- START row -->
	<div class="row">
		<div class="col-md-12">
			<!-- START panel -->
			<div class="panel panel-teal">
				<!-- panel heading/header -->
				<div class="panel-heading">
					<h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span>VenturePact Payments</h3>
					<!-- panel toolbar -->
					<div class="panel-toolbar text-right">
						<!-- option -->
						<div class="option">
							<button class="btn btn-sm mt5" type="button" data-target="#payments" data-toggle="modal" title="">
								<i class="ico-plus"></i>
							</button>
						</div>
						<!--/ option -->
					</div>
					<!--/ panel toolbar -->
				</div>
				<!-- panel body with collapse capabale -->
				<div class="table-responsive panel-collapse pull out">
					<table id="table1" class="table table-bordered">
						<thead>
							<tr>
							
								<th width="25%" class="text-center">Modules</th>
								<th width="10%" class="text-center">Start date</th>
								<th width="10%" class="text-center">End date</th>
								<th width="10%" class="text-center">Amount</th>
								<th width="10%" class="text-center">Status</th>
								<th width="35%" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody id="milestones_id">
                        <?php
                        if(count($milestones) > 0)
                        {
                            for($i=0;$i < count($milestones);$i++)
                            {
                                
                            ?>
                            <tr class="text-center" id="milestones_<?php echo $milestones[$i]->id; ?>" class="milestones_class">
							
								<td><?php echo $milestones[$i]->module; ?></td>
								<td><?php echo $milestones[$i]->start_date; ?></td>
								<td><?php echo $milestones[$i]->end_date; ?></td>
								<td>$<?php echo $milestones[$i]->amount; ?></td>
								<td><span class="label label-primary" id="status_of_<?php echo $milestones[$i]->id; ?>"><?php echo $milestonesStatus[$milestones[$i]->status]['supplier'] ?></span></td>
								<td>
                                    <?php 
                                        if($milestones[$i]->status=="0")
                                        {
                                            ?>
                                            <button type="button" id="send_invoice_<?php echo $milestones[$i]->id; ?>" onclick="change_status_to_1(<?php echo $milestones[$i]->id; ?>)"  class="btn btn-sm btn-default" ><i class="ico-mail-send mr5"></i>Send Invoice</button>
                                            <button type="button" onclick="send_reminder(<?php echo $milestones[$i]->id; ?>)" class="btn btn-sm btn-default reminder_class" id="reminder_<?php echo $milestones[$i]->id; ?>" ><i class="ico-mail-send mr5"></i>Send Reminder</button>
                                            <?php
                                        }elseif($milestones[$i]->status=="1")
                                        {
                                            ?>
                                            <button type="button" class="btn btn-sm btn-default" onclick="send_reminder(<?php echo $milestones[$i]->id; ?>)" id="reminder_<?php echo $milestones[$i]->id; ?>" ><i class="ico-mail-send mr5"></i>Send Reminder</button>
                                            <?php
                                            
                                        }elseif($milestones[$i]->status=="2")
                                        {
                                            ?>
                                            <button type="button" class="btn btn-sm btn-default" onclick="function_release(<?php echo $milestones[$i]->id; ?>)" id="release_<?php echo $milestones[$i]->id; ?>" ><i class="ico-mail-send mr5"></i>Release</button>
                                            <?php
                                        }
                                        else{
                                            echo "N/A";
                                        } 
                                    ?>
								</td>
							</tr>
                            <?php
                            }
                            
                        }
                         ?>
						</tbody>
					</table>
				</div>
				<!--/ panel body with collapse capabale -->
			</div>
		</div>
	</div>
	<!--/ END row -->

     
		<div id="payments" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bgcolor-teal border-radius">
						<button data-dismiss="modal" class="close" type="button"><i class="ico-close2 f_s13"></i></button>
						<!--<div style="font-size:16px;" class="pull-left ico-unlock-alt mr10 mt5"></div>-->
						<h4 class="semibold modal-title">Payment Details</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive panel-collapse pull out">
									<table class="table table-bordered" id="table1">
										<thead>
											<tr>
												<th width="30%" class="text-center">Modules</th>
												<th width="15%" class="text-center">Start date</th>
												<th width="15%" class="text-center">End date</th>
												<th width="20%" class="text-center">Amount</th>
												<th width="20%" class="text-center">Action</th>
											</tr>
										</thead>
										<tbody id="payment_info">
                                                
                                                 <?php
                                               
                                                    for($i=0;$i <= count($milestones);$i++)
                                                    {
                                                    ?>
                                                
            											<tr class="text-center" lang="<?php echo $i; ?>" id="tr_id_<?php echo $i; ?>" <?php if(isset($milestones[$i]->status)){ echo ($milestones[$i]->status!=0)?"style='display:none'":""; } ?>>
            												<td>
                                                               <input type="text" name="module_<?php echo $i; ?>" id="module_<?php echo $i; ?>" class="form-control" placeholder="Module" value="<?php if(isset($milestones[$i]->module)){ echo $milestones[$i]->module; } ?>" />
                                                               <div class="display_none_class" id="error_module_<?php echo $i; ?>">This is required..</div>                                                       
                                                            </td>
            												<td>
                                                               <input  onchange="enabled_enddate(this.id)" type="text" readonly name="start_date_<?php echo $i; ?>" id="start_date_<?php echo $i; ?>" class="form-control datepicker_class" placeholder="Start Date"  value="<?php if(isset($milestones[$i]->start_date)){ echo date("d/m/Y",strtotime($milestones[$i]->start_date)); } ?>" />
                                                               <div class="display_none_class" id="error_start_date_<?php echo $i; ?>">This is required..</div>
            												<td>
                                                                <input disabled  type="text" readonly name="end_date_<?php echo $i; ?>" onchange="chk_correct_date(this.id)" id="end_date_<?php echo $i; ?>" class="form-control datepicker_class" placeholder="End Date"  value="<?php if(isset($milestones[$i]->end_date)){ echo date("d/m/Y",strtotime($milestones[$i]->end_date)); } ?>" />
                                                                <div class="display_none_class" id="error_end_date_<?php echo $i; ?>">This is required..</div>
                                                            </td>
            												<td>
            													<div class="col-md-2 input-group">
            														<span class="input-group-addon">$</span>
                                                                    <input type="text" name="amount_<?php echo $i; ?>" id="amount_<?php echo $i; ?>" class="form-control" placeholder="xxxx"  maxlength="15" value="<?php if(isset($milestones[$i]->amount)){ echo $milestones[$i]->amount; } ?>" />
                                                                    
                                                                    <input type="hidden" name="hidden_milestone_id_<?php echo $i; ?>" id="hidden_milestone_id_<?php echo $i; ?>" value="<?php if(isset($milestones[$i]->id)){ echo $milestones[$i]->id; }else{ echo "0"; } ?>" />
            											        </div>
                                                                <div class="display_none_class" id="error_amount_<?php echo $i; ?>">This is required..</div>
            												</td>
            												<td>
                                                                
            													<button style="display: none;" class="btn btn-xs btn-default" type="button" title="Upload"><i class="ico-upload22"></i></button>
            													<button class="btn btn-xs btn-default" onclick="save_milestone(<?php echo $i; ?>,0)" type="button" id="<?php echo $i; ?>"  title="Save"><i class="ico-save"></i></button>
            													<button class="btn btn-xs btn-danger" type="button" title="Delete" onclick="remove_row(<?php echo $i; ?>)"><i class="ico-remove3"></i></button>
                                                                <span class="glyphicon glyphicon-ok tick_class" id="tick_<?php echo $i; ?>"></span>
                                                                
            												</td>
            											</tr>
                                               <?php
                                                    }
                                              
                                                ?>
										</tbody>
                                        
									</table>
                                   
        
								</div>
								<div class="col-sm-12 mt15">                                
                                    <button id="addother2" type="button" data-dismiss="modal" class="btn btn-teal" style="float: right;margin-left: 0.2%;" >Done</button>
									<button id="addother2" type="button" class="btn btn-teal pull-right add_link" onclick="paymentaddNew()">Add</button>                                    
                                    <input type="hidden" id="hidden_val" value="<?php echo count($milestones); ?>" />
								</div>
                             
							</div>   
						</div>            
					</div>
					<!--<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-teal">Save changes</button>
					</div>-->
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
     
		<!--/ END modal -->
        

</section>


<?php

if(false)
{
 ?>
    <script>
        function submitpayment()
        {
           $.ajax({
        		type: 'POST',
        		url:"<?php echo CController::createUrl('/supplier/payments');?>",
                data:$('#supplier-has-milestones-form').serialize(),
        		success :function(data){
        			$('#payment_info').append(data);
        		}
        	});
        }

    </script>
<?php
}
 ?>

         <?php
             if(false)
             {
              ?>
 				<div class="table-responsive panel-collapse pull out">
					<table id="table1" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="10%" class="text-center">Sr. No</th>
								<th width="25%" class="text-center">Payment Details</th>
								<th width="10%" class="text-center">Start Date</th>
								<th width="10%" class="text-center">End date</th>
								<th width="10%" class="text-center">Amount</th>
								<th width="25%" class="text-center">Status</th>
								<th width="10%" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<tr class="text-center">
								<td>1.</td>
								<td>Module 1</td>
								<td>dd-mm-yyyy</td>
								<td>dd-mm-yyyy</td>
								<td>$xxxxxx</td>
								<td><span class="label label-primary">Development Not Started</span></td>
								<td>
									<button title="Send Invoice" type="button" class="btn btn-xs btn-default"><i class="ico-mail-send"></i></button>
								</td>
							</tr>
							<tr class="text-center">
								<td>2.</td>
								<td>Module 1</td>
								<td>dd-mm-yyyy</td>
								<td>dd-mm-yyyy</td>
								<td>$xxxxxx</td>
								<td><span class="label label-teal">Funding request sent</span></td>
								<td>
									<button title="Send Reminder" type="button" class="btn btn-xs btn-default"><i class="ico-clock"></i></button>
								</td>
							</tr>
							<tr class="text-center">
								<td>3.</td>
								<td>Module 1</td>
								<td>dd-mm-yyyy</td>
								<td>dd-mm-yyyy</td>
								<td>$xxxxxx</td>
								<td><span class="label label-info">Milestone funded</span></td>
								<td>
									<button title="Request Release" type="button" class="btn btn-xs btn-default"><i class="ico-pencil6"></i></button>
									<button title="Cancel Payment" type="button" class="btn btn-xs btn-default"><i class="ico-close2"></i></button>
								</td>
							</tr>
							<tr class="text-center">
								<td>4.</td>
								<td>Module 1</td>
								<td>dd-mm-yyyy</td>
								<td>dd-mm-yyyy</td>
								<td>$xxxxxx</td>
								<td><span class="label label-warning">Release Requested</span></td>
								<td>
									<button title="Send Reminder" type="button" class="btn btn-xs btn-default"><i class="ico-clock"></i></button>
									<button title="Cancel Payment" type="button" class="btn btn-xs btn-default"><i class="ico-close2"></i></button>
								</td>
							</tr>
							<tr class="text-center">
								<td>5.</td>
								<td>Module 1</td>
								<td>dd-mm-yyyy</td>
								<td>dd-mm-yyyy</td>
								<td>$xxxxxx</td>
								<td><span class="label label-success">Payment Recieved</span></td>
								<td>
									<button title="Finished" type="button" class="btn btn-xs btn-default"><i class="ico-check"></i></button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
             <?php
             }
              ?>   
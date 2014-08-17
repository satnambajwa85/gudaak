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

</style>
<script>
    function send_fund(id)
    {
        
        bootbox.confirm("<h4> Are you sure you want to send fund?</h4>", function(result){
            if(result)
            {
                $.post('<?php echo CController::createUrl('/client/fund');?>',{id:id},function(response){
                    if(response=="1")
                    {
                        $("#fund_" + id).html("Funded").attr("disabled","disabled");
                        $("#cancel_fund_" + id).hide();
                    }
                });
            }
        });
        
    }
    
    function cancel_fund(id)
    {
        
         bootbox.confirm("<h4> Are you sure you want to cancel?</h4>", function(result){
            if(result)
            {
               $.post('<?php echo CController::createUrl('/client/cancelfund');?>',{id:id},function(response){
                    if(response=="1")
                    {
                        $("#cancel_fund_" + id).html("Request cancelled").attr("disabled","disabled");
                        $("#fund_" + id).hide();
                        $("#status_of_" + id).html("Request Cancelled");
                    }
                });
            }
        });
    }
    
    
    function send_release(id)
    {
       bootbox.confirm("<h4> Are you sure you want to release?</h4>", function(result){
            if(result)
            {
               $.post('<?php echo CController::createUrl('/client/release');?>',{id:id},function(response){
                    if(response=="1")
                    {
                        $("#release_" + id).html("Released").attr("disabled","disabled");
                        $("#cancel_release_" + id).hide();
                    }
                });
            }
        });
    }
    
    function cancel_release(id)
    {
        
        bootbox.confirm("<h4> Are you sure you want to cancel?</h4>", function(result){
            if(result)
            {
                $.post('<?php echo CController::createUrl('/client/cancelrelease');?>',{id:id},function(response){
                    if(response=="1")
                    {
                        $("#cancel_release_" + id).html("Payment Cancelled").attr("disabled","disabled");
                        $("#release_" + id).hide();
                        $("#status_of_" + id).html("Payment cancelled");
                    }
                });
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
								<td><span class="label label-primary" id="status_of_<?php echo $milestones[$i]->id; ?>"><?php echo $milestonesStatus[$milestones[$i]->status]['client'] ?></span></td>
								<td>
                                    <?php 
                                        if($milestones[$i]->status=="1")
                                        {
                                            ?>
                                            <button type="button" class="btn btn-sm btn-default" onclick="send_fund(<?php echo $milestones[$i]->id; ?>)" id="fund_<?php echo $milestones[$i]->id; ?>" ><i class="ico-mail-send mr5"></i>Fund</button>
                                            <button type="button" class="btn btn-sm btn-default" onclick="cancel_fund(<?php echo $milestones[$i]->id; ?>)" id="cancel_fund_<?php echo $milestones[$i]->id; ?>" ><i class="ico-mail-send mr5"></i>Cancel Request</button>
                                            <?php
                                            
                                        }elseif($milestones[$i]->status=="3")
                                        {
                                            ?>
                                            <button type="button" class="btn btn-sm btn-default" onclick="send_release(<?php echo $milestones[$i]->id; ?>)" id="release_<?php echo $milestones[$i]->id; ?>" ><i class="ico-mail-send mr5"></i>Release</button>
                                            <button type="button" class="btn btn-sm btn-default" onclick="cancel_release(<?php echo $milestones[$i]->id; ?>)" id="cancel_release_<?php echo $milestones[$i]->id; ?>" ><i class="ico-mail-send mr5"></i>Cancel Payment</button>
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

        

</section>


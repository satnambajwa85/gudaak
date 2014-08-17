<!-- START Template Container -->
<section class="container-fluid" >

	 <!-- Page header -->
		 <div class="page-header page-header-block pb0 pt15">
			<div class="page-header-section pt5 ">
				<ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
					<li><?php echo CHtml::link('Dashboard', array('/supplier/index'));?></li>
					<li class="text-info">Profile</li>
					<li class="active">Portfolio</li>
				</ol>
			</div>
		</div>
	<!--/ Page header -->
	<!--/ Page header -->
	 <?php if(Yii::app()->user->hasFlash('success')):?>
        <div class="alert alert-dismissable alert-success">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?php echo Yii::app()->user->getFlash('success'); ?>
			<script type="text/javascript">
			$(document).ready(function(){
				setTimeout(function(){$(".alert").hide()},1000);
			});
			</script>
        </div>
        <?php endif; ?>

	<!-- START row -->
    <div class="alert alert-dismissable alert-info">
                    <strong>Why should I upload my firm's portfolio??</strong>
                    <br>Once we match you with a client and you pitch for the project, the client will be able to see this portfolio. Your portfolio can go a long way in convincing the client of your competency & experience. Also, once you upload the portfolio here, you won't have to send it individually to each of your clients. 
                </div>

	<div class="col-md-12" >
		<div class="alert alert-dismissable alert-danger signup_error_container hide">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="false">×</button>
			<div id="signup_errors"></div>
		</div>
	</div>
    <div class="col-md-12 pl0 pr0">
		<div class="panel panel-default mb50">
            <div class="panel-heading">
                <h3 class="panel-title" >Portfolio</h3>			
			</div>
            <div class="panel-body">
				<div class="row" id="mixitup-grid">
                    <!-- Add new thumnail -->
                    <div class="col-md-4 mix filter_creative filter_nature " data-cat="background1.jpg">
                        <!-- thumbnail -->
                        <div class="widget panel mb10">
                            <!-- panel body -->
                            <div class="panel-body height_set">
                                <ul class="list-unstyled mt15 mb15">
                                    <li class="text-center">
                                        <a onclick="addNewPortfolio()" href="javascript:void(0)"><i class="ico-plus" style="font-size:46px;"></i></a>
                                    </li>
                                    <li class="text-center">
                                        <h5 class="semibold mb0 text-grey9"><a href="">Add a new project</a></h5>
                                    </li>
                                </ul>
                            </div>
                            <!--/ panel body -->
                        </div>
                    <!--/<div class="thumbnail thumbnail-album ">
                        
                        <div class="media " style="height:400;width:250">
                            
                            <div class="overlay ">
                                <div class="toolbar ">
        
                                    <a title="add images" class="btn btn-success" href="javascript:void(0);"  onclick="addNewPortfolio()">
                                        <i class="ico-plus"></i>
                                    </a> 
                                    
                                </div>
                            </div>
                            <img width="100%" alt="Cover" src="<?php //echo Yii::app()->theme->baseUrl; ?>/image/background/400x250/background3dasdas.jpg" data-toggle="unveil" class="unveiled">
                        </div>
                        
                    </div>-->
                    <!--/ thumbnail -->
                    </div>
                
                    <!--/ Add new thumnail -->
            
                    <!-- START Displaying all portfolio user has already added  -->
                    <?php if(!empty($portfolio)){ ?>
                    <div>
                        <?php foreach($portfolio as $item){ ?>
                        <?php //echo json_encode($item->attributes); ?>
                        <div class="col-md-4 mix filter_creative filter_nature " data-cat="background1.jpg" id="portfolio_<?php echo $item->id; ?>">
                            <!-- thumbnail -->
                            <div class="thumbnail thumbnail-album">
                                <!-- media -->
                                <div class="media ">
                                    <!-- indicator -->
                                    <div class="indicator">
                                        <span class="spinner"></span>
                                    </div>
                                    <!--/ indicator -->
                                    <!-- toolbar overlay -->
                                    <div class="overlay ">
                                        <div class="toolbar ">
            
                                            <?php // Finding skills to send as parameter to Jquery object 
                                                 $selectedSkills=array(); foreach($item->suppliersPortfolioHasSkills as $r) { $selectedSkills[$r->skills->id]=$r->skills->name; } ?>
											<?php $portfoliodata = array("id"=>$item->id); ?>
                                            <a title="Edit" class="btn btn-success" href="#" data-toggle="modal" id="editportfolio" onclick='editportfolio(<?php echo json_encode($portfoliodata);?>,this,"xyz")'>

                                                <i class="ico-edit" ></i>

                                            </a>
                                            <a title="Remove" class="btn btn-success" href="#" data-toggle="modal" onclick='removeportfoilo("<?php echo $item->id; ?>")'>
                                                <i class="ico-minus" ></i>
                                            </a>
                                            
                                        </div>
                                    </div>
                                    <!--/ toolbar overlay -->
                                    <img width="100%" alt="Cover" src="<?php echo $item->cover ?>/convert?w=400&h=250&fit=crop" data-toggle="unveil" class="unveiled">
                                </div>
                                <!--/ media -->
                                <div class="caption">
                                    <div class="" style="display:inline-block; width:100%;">
                                        <h5 class="semibold col-lg-6 pl0 pr0 mt0 mb5 text-muted ellipsis">
                                            <a href="//<?php echo $item->project_link ; ?>" target="_blank"><?php echo $item->project_name; ?></a> <span class="text-muted" style="font-size: 13px;">  <?php //echo "-(".$item->year_done.")" ; ?></span>
                                        </h5>
                                        <div class="text-muted mb5 ellipsis col-lg-6 pl0 pr0 mb5 mt0 calendar_height">

                                                <?php echo (empty($item->estimate_timelines)?"  ":'<i class="ico-calendar6"></i> <span style="font-size:12px;"> '.$item->estimate_timelines."  Days</span>   ")  ; ?>


                                            <?php echo (empty($item->estimate_price)?"  ":"| <i class='ico-money'></i> <span > $".$item->estimate_price."</span>"); ?>
                                        </div>
                                        
                                    </div>
                                    <p class="text-muted mb5 ">Client: <?php echo $item->client_name ; ?></p>



											<span  data-original-title="<?php echo htmlspecialchars($item->description,ENT_QUOTES); ?>" data-toggle="tooltip" data-placement="top"><p class="tag ellipsis text-muted mb5"><?php echo $item->description; ?></p></span>


										<?php $tooltipdata=array();$skillsdata=""; ?>
										<?php foreach($item->suppliersPortfolioHasSkills as $tag){

												$skillsdata.='<a href="javascript:void(0)">#'.$tag->skills->name.'</a>, &nbsp';
                                                $tooltipdata[]= " ".$tag->skills->name;
											 }
											if(!empty($item->service)){
                                                if($item->service->name !=  "Others"){
												    $skillsdata.='<a href="javascript:void(0)">#'.$item->service->name.'</a>, &nbsp';
                                                    $tooltipdata[]=" ".$item->service->name." ";
                                                }
											}
											if(!empty($item->industry)){
                                                if($item->industry->name !=  "Others"){
												    $tooltipdata[]=" ".$item->industry->name." ";
												    $skillsdata.='<a href="javascript:void(0)">#'.$item->industry->name.'</a>, &nbsp';
                                                }
											}
										?>

									<span data-original-title="<?php echo implode(',',$tooltipdata); ?>" data-toggle="tooltip" data-placement="top">
								<p class="tag ellipsis text-muted mb5"><?php echo $skillsdata ?></p>
									</span>


            


                                </div>
                                
                                <!-- Hidden as per new design  -->
                                <!--  
                                <hr class="mt5 mb5">
                                <ul class="meta">
                                    <li>
                                        <div class="img-group img-group-stack">
                                            <img alt="" class="img-circle" src="image/avatar/avatar7.jpg">
                                            <img alt="" class="img-circle" src="image/avatar/avatar2.jpg">
                                            <span class="more img-circle">2+</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="nm">
                                            <a class="semibold" href="#">4 people</a>love this</p>
                                    </li>
                                </ul> -->
                            </div>
                            <!--/ thumbnail -->
                        </div>
            
            
                        <?php } ?>
                    </div>
                    <?php }?>
                    <!-- End Displaying all portfolio user has already added  -->
            	</div>
    		</div>
        	<div class="panel-footer">
                <div class="form-group no-border pt0 pb0">
                    <label class="col-sm-4 control-label"></label>
                    <div class="col-sm-8 pl0 pr0">
                        <button type="submit" class="btn btn-teal btn-lg pull-right f_s13" id="btnPortfolioNext">Next</button>
                    </div>
                </div>
            </div>
    	</div>
    </div>

<!--
                                <div class="pull-right">
                                    <button type="button" id="basicSave" class="btn btn-teal mr15">Save &amp; Next</button>                                    
                                </div>
-->

            <!--/ END row -->
	<div id="bs-modal" class="modal fade">
		<div class="modal-dialog modal-lg w1024">
			<div class="modal-content">
				<div id="portcontent"></div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>





</section>
<!--/ END Template Container -->

<!-- START To Top Scroller -->
<a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%">
	<i class="ico-angle-up"></i>
</a>
<!--/ END To Top Scroller -->
<script type="text/javascript">
	$(document).ready(function(){
        $("span[data-toggle='tooltip'],p[data-toggle='tooltip']").tooltip();
        //hideNotification();
        $("#btnPortfolioNext").on("click",function(){
            var id = $("#components li:nth(2) a").attr("id");
			console.log("finsishes all tasks" +id);
			$("#"+id).trigger("click");

        });


		//SuppliersHasPortfolio_year_done
		$("#SuppliersHasPortfolio_year_done").datepicker({
                changeMonth: true,
                changeYear: true
        });
		$('.signup_error_container').hide();
		$('#openBrow').click(function(){
			console.log("clicked");
			filepicker.setKey("<?php echo $this->filpickerKey; ?>");
			filepicker.pick({
    			mimetypes: ['image/*']
				},
				function(InkBlob){
					$("#SuppliersHasPortfolio_cover,#faketxtbox").val(InkBlob.url);
			  		console.log(InkBlob.url);
				},
				function(FPError){
    				console.log(FPError.toString());
  				}
			);
		});
			
	});
	function fireTrigger(what){
		if(what){
			var id = $("#components li:nth(1) a").attr("id");
			console.log("finsishes all tasks" +id);
			$("#"+id).trigger("click");
		}
	}
	function removeportfoilo(portfolioId)
	{
		console.log("remove - " +portfolioId);
		var el = $("#portfolio_"+portfolioId);
		var boottext = "Are you sure you want to delete this project?";
        bootbox.confirm(boottext, function (result)
        {
	        if(result)
	        {
                $.ajax({
                    type: "POST",
                    data:"portfolioId="+ portfolioId+"&action=remove",
                    url: "<?php echo CController::createUrl('/supplier/ajaxPortfolio'); ?>",
                    success: function(data){
                        var data= JSON.parse(data);
                        console.log(JSON.stringify(data));
                        $('.signup_error_container').removeClass('alert-danger').addClass('alert-success');
                        var messageData = data.Success ;
                        var htm="";
                        if(data.iserror){
                            //rendering error
                            console.log("error found ");
                                messageData = data.errors[0].msg;
                                $('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
                        }else
                        {
                            el.hide(300);
                            messageData = data.success[0].msg;
							$(".portfoliocount").html(parseInt($(".portfoliocount").text())-1);

                        }

                        //Genrating message
                        console.log("message data : " + JSON.stringify(messageData) );
                        htm+=messageData + "<br />";
                        $("#signup_errors").html(htm);
                        $('.signup_error_container').show('blind', {}, 500)
                        console.log("finsishes all tasks");
                        hideNotification(false);
                        //var data
                        //if(data.iserror )
                    },
                    error: function(a,b,c)
                    {
                        console.log("Error occured : " + a +" | "+ b + " | "+ c);
                    }
			
			});
            }
        }).find("div.modal-body").addClass("bgcolor-teal");

		return false;
	}
	function editportfolio(jsonData,el,selData){
		console.log("edit called " +jsonData.id  );
		console.log("edit : " +  JSON.stringify(jsonData));
		console.log("edit : " +  JSON.stringify(selData));
		$.ajax({
			type:'POST',
			data:'portofolioId=' + jsonData.id ,
			url:"<?php echo CController::createUrl('/supplier/ajaxGetPortfolio');?>",
			success:function(data)
			{
				$("#portcontent").html(data);
				var options = {
					"backdrop" : "static"
				}
				$("#bs-modal").find('.modal-title').text("Edit Portfolio");
				$("#bs-modal").modal(options);
				console.log("finsishes all tasks");
				
			},
			error: function(a,b,c){
				console.log("Errors found : " +JSON.stringify(a) +" | " +b + " | " + c);
			}
		});
			
			
			
		
	}
	function addNewPortfolio()
	{
        console.log("getting form");
        $.ajax({
			type:'POST',
			data:'portofolioId=0',
			url:"<?php echo CController::createUrl('/supplier/ajaxGetPortfolio');?>",
			success:function(data)
			{
                console.log(data);
				$("#portcontent").html(data);
				var options = {
					"backdrop" : "static"
				}
				$("#bs-modal").find('.modal-title').text("Edit Portfolio");
				$("#bs-modal").modal(options);
				console.log("finsishes all tasks");

			},
			error: function(a,b,c){
				console.log("Errors found : " +JSON.stringify(a) +" | " +b + " | " + c);
			}
		});
		
	}
	function hideNotification(triggerneeded)
	{
		triggerneeded = typeof triggerneeded !== 'undefined'? triggerneeded: true;
		//Hide the notification div after 2 second 
		//fireTrigger(true);
		setTimeout(function() {
			fireTrigger(triggerneeded);
			$(".signup_error_container,.alert-success").hide('blind', {}, 500);
		}, 2000);
			//

	}
</script>
<style>
/*sahil changes in portfolio page */
.calendar_height{height:18px;}

/*sahil changes in portfolio page */
</style>
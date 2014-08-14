<!-- START Template Container -->
<section class="container-fluid">
	 <!-- Page Header -->
    <div class="page-header page-header-block pb0 pt0 mt0">
        <div class="page-header-section pt5 ">
            <ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
                <li><?php echo CHtml::link('Dashboard', array('/client/index'));?></li>
				<li class="text-info">Proposal</li>
                <li class="active">Portfolio</li>
               
            </ol>
           
        </div>
    </div>
    <!--/ Page Header -->
   	<!-- START row -->
	<div class="row mb30" id="mixitup-grid">
    	<?php if(count($portfolio)>0){ ?>
        <div>
            <?php foreach($portfolio as $item){ ?>
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

                                <?php $selectedSkills=array(); foreach($item->suppliersPortfolioHasSkills as $r) { $selectedSkills[$r->skills->id]=$r->skills->name; } ?>
                                <?php $portfoliodata = array("id"=>$item->id); ?>
                            </div>
                        </div>
                        <!--/ toolbar overlay -->
                        <img width="100%" alt="Cover" src="<?php echo $item->cover ?>/convert?w=400&h=250&fit=crop" data-toggle="unveil" class="unveiled">
                    </div>
                    <!--/ media -->
                    <div class="caption">
                        <div class="" style="display:inline-block; width:100%;">
                            <h5 class="semibold col-lg-6 pl0 pr0 mt0 mb5 text-muted ellipsis">
                                <a href="//<?php echo $item->project_link ; ?>" target="_blank"><?php echo $item->project_name; ?></a> <span class="text-muted" style="font-size: 13px;"></span>
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
                  
                </div>
                <!--/ thumbnail -->
            </div>


            <?php } ?>
        </div>
        <?php }else{?>
            <div class="col-xs-12 col-md-12 col-lg-12">
		        <div class="alert alert-dismissable alert-info">
                   	<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                   	<strong></strong> No portfolio items added.
               	</div>
			</div>
        <?php }?>
		
	</div>
	<!--/ END row -->
	
</section>
<script type="text/javascript">

$(document).ready(function(){
	$("span[data-toggle='tooltip']").tooltip();
	//$('.popover_class').popover('toggle')
	$('.popover_class').tooltip()


	
});
</script>
<!--/ END Template Container -->


<script type="text/javascript"  src="<?php echo Yii::app()->theme->baseUrl;?>/js/dashboard-custom.js"></script>		
<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.flot.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.knob.js"></script>

<div id="scrollBar" style="max-height:400px">
<div class="pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<h1>Detailed Report </h1>
				<p>It is long established fact a reader will be It is long established fact a reader will be
					It is long established fact a reader will be It is long established fact a reader will beIt is long established fact a reader will be
				</p>

			</div>
			<?php if(isset($reports)){?>
					<?php echo CHtml::link('Download PDF',array('user/DetailedReport&download=1'),array('target'=>'_blank','class'=>'btn btn-info2 center-bt fr'))?>
			<?php }else{
			
			} ?>
			
		</div>
		<div class="col-md-12 pull-left inner-padding">
			<div class="col-md-12  pull-left  pd0">
					<div class="col-md-12 fl details-report">
						<h1>Profile Summary</h1>
					</div>
					<div class="col-md-12  pull-left report-border pd0">
						<div class="col-md-6  pull-left left-section pd0">
							<ul>
								<li>Name</li>
								<li>Gender</li>
								<li>Date of birth</li>
								<li>Class</li>
								<li>School</li>
								<li class="lastRow">Email</li>
							</ul>
						</div>	
						<div class="col-md-6  pull-left right-section pd0">
							<ul>
								<li><?php echo $profile->first_name.' '.$profile->last_name;?></li>
								<li><?php echo $profile->gender;?></li>
								<li><?php echo $profile->date_of_birth;?></li>
								<li><?php echo $profile->class;?><i class="user-edu">th</i></li>
								<li class="capitalize"><?php echo $profile->generateGudaakIds->schools->name;?></li>
								<li class="lastRow"><?php echo $profile->email;?></li>
							</ul>
						</div>
						<div class="col-md-6  pull-left">
						</div>
					</div>
					<div class="col-md-12">
                       <div class="clear"></div>
                       <br /><br />
                        <?php foreach($reports as $report){?>
                        <div class="row">
							<ul id="report-bottom-area">
									<li>
										<h1><?php echo $report['name'];?></h1>
										<p><?php echo $report['description'];?></p>
									</li>
									
									
							</ul>
                           
						</div>
                        <div class="clear"></div>
                        <?php if($report['id']==3){?>
<div class="sec1">
	<?php foreach($report['results1'] as $result){?>
    <div>
		<div class="w20 fl"><?php echo $result['title'];?></div>
		<div class="w80 progress<?php echo $result['id'];?>"><span style="width:<?php echo ($result['score']/0.4);?>%"></span></div>
	</div>
    <?php  }?>
</div>
        <?php } 
                        
 foreach($report['results'] as $result){?>
	<div class="">
		<div class="clear"></div>
		<?php echo ($report['id']==3)?'<h4>'.$result['title'].'</h4>':'<h4>'.$result['title2'].'</h4>';?>
		<p  class="description-content"><?php echo $result['description'];?></p>
    	<div class="border_b"></div>
	</div>
    <?php }?>
    <div>
    <?php 
$listArr	=	array();	
foreach($report['results'] as $result){	
    if($report['id']==3){?>
	
	<?php
		$listCar	=	Career::model()->findAllByAttributes(array('career_categories_id'=>$result['id']));
		$streams	=	array();
		foreach($listCar as $subCat){
			$subCa		=	StreamHasCareer::model()->findAllByAttributes(array('career_id'=>$subCat->id));
			foreach($subCa as $subjects){
					$streams[]=$subjects->stream_id;	
				
			}
		}
		
		$streamList		=	Stream::model()->findAllByAttributes(array('id'=>$streams));
		
		foreach($streamList as $streamRec){
			if(!in_array($streamRec->id,$listArr))
						{
				$listArr[]=$streamRec->id;
			
			
			?>
	<div class="col-md-4 pd0  fl">				
	<div class="col-md-12 pdleft fl career-lib">
	<?php 
			$filename = ''.$streamRec->image.'';
			$path=Yii::getPathOfAlias('webroot.uploads.stream.small') . '/';
			$file=$path.$filename;
			if (file_exists($file)){ ?>
			<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/stream/small/'.$streamRec->image.'"/>',array('user/stream','id'=>''.$streamRec->id.''),array('class'=>'fl'));?>
	<?php 	}else{ ?>
			<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/stream/small/noimage.jpg"/>',array('user/stream','id'=>''.$streamRec->id.''),array('class'=>'fl'));?>
		
	<?php } ?>
	<div class="clear"></div>
	<?php echo CHtml::link('<h1>'.substr($streamRec->name,0,20).'..</h1>',array('user/stream','id'=>''.$streamRec->id.''),array('title'=>$streamRec->name));?>
	<p><?php echo substr($streamRec->description,0,70);?></p>
	<div class="col-md-12 career-hot-links">
	<?php echo CHtml::link('Read more..',array('user/readFull','id'=>''.$streamRec->id.''),array('class'=>'pull-left','title'=>'Read Full.'));?>
		<span class="pull-right"><i class="icon-eye-open"></i></span>
	</div>
</div>
</div>
<?php }
					
					
				}
				
				
				
		
		
		?>
    
    
    <?php 
		}
}
?>
</div>
<div class="clear"></div>
 
<?php 
 } ?>
   
					</div>
					
				
			</div>
			
			
			</div>
		
		</div>
 </div>       

		


	 	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			
<script type="text/javascript"  src="<?php echo Yii::app()->theme->baseUrl;?>/js/dashboard-custom.js"></script>		
<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.flot.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.knob.js"></script>
<div id="scrollBar" style="max-height:400px">
<div class="pull-left">
	<div class="col-md-12 pull-left inner-padding">
		<div class="col-md-12  pull-left  pd0">
			<div class="col-md-12">
				<div class="clear"></div>
					<?php foreach($reports as $report){
						if($report['id']==3 && 0){?>
                        <div class="row">
                        	<div class="col-md-12 fl details-report">
                                <h1>Summary Report for <?php echo $report['name'];?></h1>
                            </div>
                            <p>Based on your obtained scores on the test, your results indicate the following about your <?php echo $report['name'];?>
							<?php // echo $report['description'];?></p>
                        	<br /><br />
							
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
	<div class="col-md-12 career-hot-links1">
	<?php echo CHtml::link('Read more..',array('user/readFull','id'=>''.$streamRec->id.''),array('class'=>'pull-left','title'=>'Read Full.'));?>
		<span class="pull-right"><i class="icon-eye-open"></i></span>
	</div>
</div>
</div>
<?php }			
			}
		}
}
?>
</div>
<div class="clear"></div>
 
<?php
						}
						else{?>
						<div class="row">
							<div class="col-md-12 fl details-report">
								<h1>Summary Report for <?php echo $report['name'];?></h1>
							</div>
							<p>Based on your obtained scores on the test, your results indicate the following about your <?php echo $report['name'];?>
							<?php // echo $report['description'];?></p>
                            <br /><br />
						</div>
                        <div class="clear"></div>
						<?php foreach($report['results'] as $result){?>
						<div class="">
							<div class="clear"></div>
                            <table><tr><td>
                            <img src="<?php echo Yii::app()->theme->baseUrl.'/images/'.$result['id'].'.png';?>" />
							</td><td>
							<?php echo ($report['id']==3)?'<h4>'.$result['title'].'</h4>':'<h4>'.$result['title2'].'</h4>';?>
							<p  class="description-content"><?php echo $result['description'];?></p>
    						</td>
                            </tr>
                            </table>
                            <div class="border_b"></div>
						</div>
    					<?php }
						
						}
					} ?>
                    <div style="height:20px;width:100%;"></div>
					
				Career Recommendations	<br/><br/>
					
                    <?php 
$listArr	=	array();	
foreach($report['results'] as $result){	
    if($report['id']==3){
		$listCar	=	Career::model()->findAllByAttributes(array('career_categories_id'=>$result['id']));
		foreach($listCar as $data){		?>
		
<div class="col-md-4 pd0 fl">        
<div class="col-md-12 pdleft career-lib">
	<?php 
			$filename = ''.$data->image.'';
			 $path=Yii::getPathOfAlias('webroot.uploads.career.small') . '/';
			$file=$path.$filename;
			if (file_exists($file)){ ?>
			<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/career/small/'.$data->image.'"/>',array('user/careerList','id'=>''.$data->id.''),array('class'=>'fl'));?>
	<?php 	}else{ ?>
			<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/career/small/noimage.jpg"/>',array('user/careerList','id'=>''.$data->id.''),array('class'=>'fl'));?>
		
	<?php } ?>
	<div class="clear"></div>
	<?php echo CHtml::link('<h1>'.substr($data->title,0,20).'..</h1>',array('user/careerList','id'=>''.$data->id.''),array('title'=>$data->title));?>
	<p><?php echo substr(strip_tags($data->description),0,70);?></p>
	<div class="col-md-12 career-hot-links">
	<?php echo CHtml::link('<h1>'.substr($data->title,0,20).'..</h1>',array('user/careerList','id'=>''.$data->id.''),array('class'=>'pull-left','title'=>'Read Full.'));?>
		
	</div>
</div>
    </div>

	<?php	}
	}
}
?>

				</div>
			</div>
		</div>
	</div>
</div>       

		

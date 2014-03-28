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
                            <p><?php echo $report['description'];?></p>
                        
							
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
							<p><?php echo $report['description'];?></p>
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
					/*	if($report['id']==3){?>
                        <div>
							<hr />
                            <h4 style="padding-left:100px">Reference Table for Summary Report</h4>
                            <hr />
                            <div style="background-color:#F96;color:#FFF;padding:7px;">
                        	<h5 style="font-size:14px">Realistic- High</h5>
                            <p style="font-size:12px">You are fond of practical, scientific, methodological and outdoor work </p>
                            <h5 style="font-size:14px">Realistic- Moderate</h5>
                            <p style="font-size:12px">You have an average liking for outdoor and physical work </p>
                            <h5  style="font-size:14px">Realistic- Low</h5>
                            <p style="font-size:12px">You are not at all an outdoor and physical person and strongly dislike any manual work dealing with tools and machines</p>
                            
                            </div>
                            <div style="background-color:#6FF;color:#FFF;padding:7px;">
                        	<h5 style="font-size:14px">Artistic- High</h5>
                            <p style="font-size:12px">You simply love working creatively and intuitively with innovative ideas for self-expression</p>
                            <h5 style="font-size:14px">Artistic- Moderate</h5>
                            <p style="font-size:12px">You like engaging in creative work involving self-expression to a moderate extent</p>
                            <h5 style="font-size:14px">Artistic- Low</h5>
                            <p style="font-size:12px">You are absolutely clueless about the creative works requiring originality and innovation</p>
                            </div>
                            
                            <div style="background-color:#09C;color:#FFF;padding:7px;">
                        	<h5 style="font-size:14px">Enterprising- High</h5>
                            <p style="font-size:12px">You find it exhilarating to engage in influential, persuasive and performance-oriented work</p>
                            <h5 style="font-size:14px">Enterprising- Moderate</h5>
                            <p style="font-size:12px">You somewhat moderately enjoy talking and engaging people to influence and convince them for some idea</p>
                            <h5 style="font-size:14px">Enterprising- Low</h5>
                            <p style="font-size:12px">You are disinterested in activities like selling or convincing others</p>
                            </div>
                            
                            <div style="background-color:#99F;color:#FFF;padding:7px;">
                        	<h5 style="font-size:14px">Investigative- High</h5>
                            <p style="font-size:12px">You have a passion for observing, exploring, analyzing and learning new things by studying and evaluating complex problems</p>
                            <h5 style="font-size:14px">Investigative- Moderate</h5>
                            <p style="font-size:12px">You find observing and analyzing phenomena somewhat moderately interesting</p>
                            <h5 style="font-size:14px">Investigative- Low</h5>
                            <p style="font-size:12px">You detest doing intellectual work that involves carrying out research, abstract thinking and logical reasoning</p>
                            </div>
                            
                            <div style="background-color:#CC9;color:#FFF;padding:7px;">
                        	<h5 style="font-size:14px">Conventional- High</h5>
                            <p style="font-size:12px">You like doing data driven and detail oriented work by recording, storing and analyzing numbers & other data</p>
                            <h5 style="font-size:14px">Conventional- Moderate</h5>
                            <p style="font-size:12px">You find it OK to do data recording and analysis work and find it moderately interesting</p>
                            <h5 style="font-size:14px">Conventional- Low</h5>
                            <p style="font-size:12px">You find it extremely boring to do data related work dealing with numbers, recording, analyzing and storing data in order</p> 
							</div>
                            
                            <div style="background-color:#F96;color:#FFF;padding:7px;">
                        	<h5 style="font-size:14px">Social- High</h5>
                            <p style="font-size:12px">You find it extremely rewarding to help and work with people to enlighten, inform, counsel and train them</p>
                            <h5 style="font-size:14px">Social- Moderate</h5>
                            <p style="font-size:12px">You find helping, healing, educating and caring for people somewhat moderately appealing</p>
                            <h5 style="font-size:14px">Social- Low</h5>
                            <p style="font-size:12px">You find it hard to keep yourself engaged in a work that involves dealing with people for healing, caring and teaching them</p>           
                            </div>
                            
                            
                        </div>
						<?php }else{?>
						 <div>
                         	<hr />
							<h4 style="padding-left:100px">Reference Table for Summary Report</h4>
                            <hr />
                            <div style="background-color:#F96;color:#FFF;padding:7px;">
                        	<h5 style="font-size:14px">Open to Experience- High</h5>
                            <p style="font-size:12px">You are more creative, imaginative and open to new experiences than the average person</p>
                            <h5 style="font-size:14px">Open to Experience- Moderate</h5>
                            <p style="font-size:12px">You are experimental and imaginative as an average person</p>
                            <h5  style="font-size:14px">Open to Experience- Low</h5>
                            <p style="font-size:12px">You prefer much more practical, traditional and familiar experiences than the average person</p>
                            
                            </div>
                            <div style="background-color:#6FF;color:#FFF;padding:7px;">
                        	<h5 style="font-size:14px">Conscientiousness- High</h5>
                            <p style="font-size:12px">You have much more work ethic and self control than the average person</p>
                            <h5 style="font-size:14px">Conscientiousness- Moderate</h5>
                            <p style="font-size:12px">You are organized, self-directed and ethical as an average person</p>
                            <h5 style="font-size:14px">Conscientiousness- Low</h5>
                            <p style="font-size:12px">You tend to do things somewhat haphazardly and are less dependable than the average person for responsible roles</p>
                            </div>
                            
                            <div style="background-color:#09C;color:#FFF;padding:7px;">
                        	<h5 style="font-size:14px">Extravert- High</h5>
                            <p style="font-size:12px">You are much more extravert and outgoing than the average person</p>
                            <h5 style="font-size:14px">Extravert- Moderate</h5>
                            <p style="font-size:12px">You are active and seek social rewards & interactions as an average person</p>
                            <h5 style="font-size:14px">Extravert- Low</h5>
                            <p style="font-size:12px">You probably enjoy spending a lot of quiet time alone in solitude</p>
                            </div>
                            
                            <div style="background-color:#99F;color:#FFF;padding:7px;">
                        	<h5 style="font-size:14px">Agreeableness- High</h5>
                            <p style="font-size:12px">You are trusting, empathetic and compliant with immense patience!</p>
                            <h5 style="font-size:14px">Agreeableness- Moderate</h5>
                            <p style="font-size:12px">You are friendly, good natured and pleasing as the average person</p>
                            <h5 style="font-size:14px">Agreeableness- Low</h5>
                            <p style="font-size:12px">You are suspicious, uncooperative and more hostile towards others than the average person</p>
                            </div>
                            
                            <div style="background-color:#CC9;color:#FFF;padding:7px;">
                        	<h5 style="font-size:14px">Neuroticism- High</h5>
                            <p style="font-size:12px">You are much more prone to stress, worry and negative emotions than the average person</p>
                            <h5 style="font-size:14px">Neuroticism- Moderate</h5>
                            <p style="font-size:12px">You are relaxed, calm and emotionally stable but sometimes may unnecessarily worry too much as the average person</p>
                            <h5 style="font-size:14px">Neuroticism- Low</h5>
                            <p style="font-size:12px">You are generally relaxed, calm, secure and imperturbable</p> 
							</div>
                        
                        </div>
						<?php }*/
						}
					} ?>
                    <div style="height:20px;width:100%;"></div>
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
	<div class="col-md-4 pd0 fl">				
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
		}
}
?>

				</div>
			</div>
		</div>
	</div>
</div>       

		

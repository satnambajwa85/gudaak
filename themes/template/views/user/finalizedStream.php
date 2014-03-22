<?php $this->pageTitle=Yii::app()->name . ' - Finalized Stream';
$this->breadcrumbs=array('Finalized Stream'=>array('/user/finalizedStream'));
?>
	<div class="career-bot pull-left">
						<?php if(Yii::app()->user->hasFlash('sccess')): ?>
						<div class="alert alert-success">
						  <button data-dismiss="alert" class="close" type="button">×</button>
						  <strong><?php echo Yii::app()->user->getFlash('sccess'); ?></strong>
						</div>
							 
					<?php endif; ?>	
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<h1>Finalized Stream</h1>
				<p>Are you satisfied with your finalized stream choices or Having doubts or a change in your plans? Feel like re-analyzing and reviewing your choice for the finalized stream? You can always edit your list and add a new option!
				</p>

			</div>
			
		</div>
		<div class="col-md-12 fl pd0">
			<?php if(!empty($data)) {?>
            <div class="mr0 col-md-12 fl ">
			<div id="scrollBar">
				<div class="col-md-12 fl">
				  	<?php foreach($data as $list){ ?>
					
						<div class="stream-cat pull-left fl  pd-b10">
						<div class="col-md-12 fl pd0 ">
							<div class="col-md-6 pull-left pd0 prefered-stream-img">
							<?php 
						$filename = ''.$list['image'].'';
						 $path=Yii::getPathOfAlias('webroot.uploads.stream.small') . '/';
						$file=$path.$filename;
						if (file_exists($file)){ ?>
						<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/stream/small/'.$list['image'].'"/>',array('user/stream','id'=>''.$list['id'].''),array('class'=>'fl'));?>
						<?php 	}else{ ?>
				<?php echo CHtml::link('<img  src="'.Yii::app()->baseUrl.'/uploads/stream/small/noimage.jpg"/>',array('user/stream','id'=>$list['id']));?>
								
				<?php } ?>
							</div>
							<div class="col-md-6 pull-right  stream-description">
                            	<?php echo CHtml::ajaxLink('<img alt="Delete" title="Remove from list" src="'.Yii::app()->theme->baseUrl.'/images/delete.png">',array('user/removeFinalStream','id'=>$list['id']),
												array(	'type'=>'POST',
														'success'=>'function(data){
																		var $dataR	=	jQuery.parseJSON(data)
																		if($dataR.status==1)
																			$("#remove-'.$list['id'].'").hide();
																			$("#remove-'.$list['id'].'").parent().parent().parent().hide();
																	}'),
												array('confirm'=>'Are you sure you want to remove this career?',
														'style'=>'display: block;float: right;margin-top: 0;width: 15px;',
														'id'=>'remove-'.$list['id']));  ?>
								<h1><?php echo substr($list['name'],0,30);?></h1>
								<p><?php echo substr($list['description'],0,50);?>..</p>
								   	 <ul class="star-rating" style="margin:0px;">
										<div id="user-rating<?php echo $list['id'];?>"  ></div>
									</ul>
									<div id="update-final-list">
										<span>Finalized</span>
									</div>
									 
										<script type="text/javascript">
										$(document).ready(function(){
											$('#user-rating<?php echo $list['id'];?>').raty({readOnly:true, score:'<?php echo $list['rating'];?>'});
												
										});
									</script>
								<div class="clear"></div>
								<span></span>
						   </div>
						</div>
					</div>
		        <?php } ?>
			 
				
				
			</div>
			</div>
         </div>
		 <div class="col-md-6 fl">
		 <!-- <div class="col-md-12 pull-left below-info">
					<p>if ypou have any different idea to choose a stream then just change your idea bu having a conversation with counselor. </p>
					<?php //echo CHtml::link('Still confused',array('user/'),array('class'=>'white-text btn btn-warning'));?>
			</div>-->
				
				<div class="col-md-12 pull-left user-feedback">
					<h1>Feedback</h1>
					<p>Your valuable idea about this stream Explore. </p>
					<span class="fl">1.Weather counselling with counselor satisfactory?</span>
					<div class="clear"></div>
					<?php $form=$this->beginWidget('CActiveForm', array(
																		'id'=>'comment-info-form',
																		    'enableClientValidation'=>true,
																			'clientOptions'=>array(
																					'validateOnSubmit'=>true,
																					
																				)
																	)); ?>		
					       <div class="form-controles fl">
						   <?php echo $form->radioButtonList($model,'user_responce',array('Satisfied'=>'Satisfied','Average'=>'Average','Note_at_all'=>'Note at all'),array('separator'=>'')); ?>
						   <?php echo $form->error($model,'user_responce');?>
						   </div>
							<div class="clear"></div>
							<select id="UserComments_stream_id" class="form-control" name="UserStreamComments[stream_id]">
								<?php foreach($data as $list){?>
								<option value="<?php echo $list['id'];?>"><?php echo $list['name'];?></option>
								<?php } ?>
							</select>
							<div class="form-controles">
							<?php echo $form->textArea($model,'comments',array('class'=>'form-control','placeholder'=>'Enter comment here..'));?>
							  <?php echo $form->error($model,'comments');?>	
							</div>
							<?php echo CHtml::submitButton('submit',array('class'=>'btn btn-warning fr','id'=>'comment-info-form-btn'));?>
					<?php $this->endWidget();?>
				</div>
			</div>	
		  <?php } else{ ?>
			<div class="mr0 col-md-6 fl ">
				
					<div class="mr0  pull-left middle-format-left">
						<h1>Not Finalized Stream Record Here.</h1>
						 

					</div>
			</div>
			<?php } ?>
		
</div>
</div>

	
	<div class="news pd0 fr">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			
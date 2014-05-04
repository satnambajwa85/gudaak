<?php
$this->pageTitle=Yii::app()->name . ' -  Student Details';
$this->breadcrumbs=array('studentDetails',);
?>
<div class="container">



<div class="col-md-10 pop-up-border fl col-lg-offset-1 ">
	<div class="row test-bot">Talk to Admin</div>
	
                <div>
                    <?php 
                    echo CHtml::link('Add New','#',array('onclick'=>'$("#create-form").show();','class'=>'back-btn margin_t')); ?>
                    <div style="width:100%; float:left;">
                   <div style=" float: left; margin-bottom: 38px; margin-left: 18%; width: 75%;"> 
                    <div id="create-form" <?php echo (isset($_POST['Tickets']))?'':'style="display:none"';?>>
                        <?php $this->renderPartial('_talk',array('model'=>$model,)); ?>
                    </div>
                  </div>
                  </div>
                </div>
				<div class="clear"></div>
<div class="col-md-12 fl pd0">
   
   


			<div class="col-md-7 pull-left summery-left pd0">
				<table class="table">
     <thead>
       <tr>
         <th>Topics</th>
         <th>Status</th>
         <th>Date</th>
         <th>Remarks</th>
       </tr>
     </thead>
     <tbody>
       <?php 
						 $count=1;
					foreach($lists as $list){ 
						
						if($count%2 == 0)
							$class='light-gray';
						else 
							$class='0';			 
							$count= $count+1;
					
					?>
       <tr class="<?php echo $class;?>">
         <td><?php echo substr($list->problem,0,50);?>...</td>
         <td><?php echo ($list->status==1)?'Pending':'Answered';?></td>
         <td><?php echo date('M d, Y',strtotime($list->add_date));?></td>
         <td><?php echo CHtml::ajaxLink('Summery',array('/user/talkData','id'=>$list->id),
												array(	'type'=>'POST',
														'success'=>'function(data){
																		$("#resultSummery").html(data);
																	}'),
												array('class'=>'summery-left-btn')					
												);  ?></td>
       </tr>
       <?php } ?>
     </tbody>
   </table>

                
                
                
			</div>
            <div class="col-md-5 pull-left summaryDetails pd0">
            	<div id="resultSummery"></div>				
			</div>
</div>                
			</div>
		</div>
	</div>
    
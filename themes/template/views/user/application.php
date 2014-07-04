<?php $this->pageTitle=Yii::app()->name . ' - Application';
$this->breadcrumbs=array('Application'=>array('/user/application'));?>
	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<h1>Entrance Exams</h1>
				<p>Read about the latest information related to different entrance exams relevant to your shortlisted career preferences and colleges.
				</p>

			</div>
			<div class="mr0  pull-left col-md-12">
             <div id="scrollBar" style="max-height:500px;width:97%;">
            
            <div class="pull-left college-info pd-b6">
            <h1 style="font-size:15px;width:100%;">Shortlisted Entrance Exams</h1>
            
            <table class="table">
     <thead>
       <tr>
          <th width="30%">Name</th>
         <th width="20%">Level</th>
         <th width="20%">Last Date to Apply</th>
         <th width="15%">Test Date</th>
         <th width="15%">&nbsp;</th>
       </tr>
     </thead>
     <tbody>
     
            
            <?php 
			$selc	=	array();
			$count=1;
			foreach($selmodel as $list){
				$selc[]	=	$list->test->id;
				if($count%2 == 0)
							$class='light-gray';
						else 
							$class='0';			 
							$count= $count+1;
				?>
		<tr class="<?php echo $class;?>" id='list-<?php echo $list->test->id;?>'>
         <td>
		 <?php echo CHtml::Ajaxlink( $list->test->name,array('user/testDetails','id'=>$list->test->id),array('update'=>'#summeryRecodes'),array('class'=>'Summary-details'));
		 
		 //echo $list->name;?>
		 <?php // echo $list->test->name;?></td>
         <td><?php echo $list->test->level;?></td>
         <td><?php echo ($list->test->end_date != '1970-01-01')?date('M d, Y',strtotime($list->test->end_date)):'';?></td>
         <td><?php echo ($list->test->test_date != '1970-01-01')?date('M d, Y',strtotime($list->test->test_date)):'';?></td>
         <td><?php echo CHtml::ajaxLink('Remove',array('/user/userShortlistTestRemove','id'=>$list->id),array('type'=>'POST','success'=>'function(data){alert(data);$("#list-'.$list->test->id.'").html("");location.reload();}'),array('class'=>'summery-left-btn'));  ?>
         </td>
        </tr>
			<?php }?>
    </tbody>
   </table>
            
            </div>
			<div class="pull-left college-info pd-b6 mt20">
            <h1 style="font-size:15px;width:100%;">Entrance Exams</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entrance-exams-form',
	'action'=>Yii::app()->createUrl('/user/application'),
	'enableAjaxValidation'=>false,
)); ?>
<table class="mb10 mt10">
	<tr>
		<td width="30%"></td>
		<td width="30%">
			<?php echo CHtml::dropDownlist('level','',array('University / Institute'=>'University / Institute','State'=>'State','National'=>'National'),array('empty'=>'Select Level','class'=>'form-control'));?>
		</td>
		<td width="30%">
			<select name="category" class='form-control'>
				<option value="">Select Category</option>
				<?php $lists	=	EntranceCategory::model()->findAll();
				foreach($lists as $lis){?>
				<option value="<?php echo $lis->id;?>"><?php echo $lis->title;?></option>
				<?php }?>
			</select>
		</td>
		<td width="10%"><input type="submit" value="search" class="summery-left-btn btn pull-right" /></td>
	</tr>
</table>
<?php $this->endWidget(); ?>
    <table class="table">
     <thead>
       <tr>
          <th width="30%">Name</th>
         <th width="20%">Level</th>
         <th width="20%">Last Date to Apply</th>
         <th width="15%">Test Date</th>
         <th width="15%">&nbsp;</th>
       </tr>
     </thead>
     <tbody>
         <?php 
			$count=1;
			foreach($model as $list){
				if($count%2 == 0)
							$class='light-gray';
						else 
							$class='0';			 
							$count= $count+1;
				?>
				<tr class="<?php echo $class;?>">
         <td>
		 <?php echo CHtml::Ajaxlink( $list->name,array('user/testDetails','id'=>$list->id),array('update'=>'#summeryRecodes'),array('class'=>'Summary-details'));
		 
		 //echo $list->name;?></td>
         <td><?php echo $list->level;?></td>
         <td><?php echo ($list->end_date != '1970-01-01')?date('M d, Y',strtotime($list->end_date)):'';?></td>
         <td><?php echo ($list->test_date != '1970-01-01')?date('M d, Y',strtotime($list->test_date)):'';?></td>
         <td><?php echo (in_array($list->id,$selc))?'<div class="green_div">Shortlisted</div>':CHtml::ajaxLink('Shortlist Test',array('/user/userShortlistTest','id'=>$list->id),array('type'=>'POST','success'=>'function(data){alert(data);location.reload();}'),array('class'=>'summery-left-btn'));  ?>
         </td>
        </tr>
			<?php }?>
    </tbody>
   </table>
   			
            </div>
   
            </div>
            					</div>
		</div>
</div>
		<div class="news pd0 fl">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
<div id="Summary-details" class="modal fade">
    	<div class="mt50 col-sm-offset-1 col-md-9">
        	<div class="modal-content">
            <!-- dialog body -->
            	<div class="modal-body">
                		<div class="site-logo"></div>
						<div class="row white ">
                        	<div class="col-md-12 pd13 ">
							<a data-dismiss="modal" class="btn btmar btn-info pull-right ">close</a>
								
                            	 <div  class="col-md-12 pd0 login-box pull-left">
									<div id="summeryRecodes">
									
									</div>
									 
                                 </div>
                               
							</div>
						</div>
	   			</div>
		<!-- dialog buttons -->
		 
		</div>
	</div>
    </div>
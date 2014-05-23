<?php $this->pageTitle=Yii::app()->name . ' - Application';
$this->breadcrumbs=array('Application'=>array('/user/application'));?>
	<div class="career-bot pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<h1>Applications </h1>
				<p>Read about the latest information related to different entrance exams relevant to your shortlisted career preferences and colleges.
				</p>

			</div>
			<div class="mr0  pull-left stream-pref">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
													'id'=>'career-options-grid',
													'dataProvider'=>$model->search(),
													'template'=>"{pager}{items}",
														'pager' => array(
														'cssFile' =>'',
														'htmlOptions'=>array('class'=>'pagination'),
														'prevPageLabel'=>'<i class="skyblue icon-caret-left"></i>',
														'nextPageLabel'=>'<i class="skyblue icon-caret-right"></i>',
														'lastPageLabel'=>false,
													
														),
													'filter'=>$model,
													'columns'=>array(
														'name',
														'level',
														'start_date',
														'end_date',
														'test_date',
														'result_date',
														array(
																'class'=>'CButtonColumn',
																'template'=>'{Shortlist}',
																'header'=>'Short List',
																'htmlOptions'=>array('class'=>'btn-td',),
																'buttons'=>array(
																	'Shortlist' => array(
																		'url'=>'Yii::app()->createUrl("user/userShortlistTest",array("id"=>($data->id)))',
																		
																	),
																
																),
														   ),
												),)); ?>
            
            
            					</div>
		</div>
</div>
		<div class="news pd0 fl">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
				
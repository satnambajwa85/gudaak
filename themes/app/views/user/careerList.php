<div class="col-md-9 pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left middle-format-left">
				<h1><?php echo $dataBYId->title;?></h1>
				<?php echo substr($dataBYId->description,0,500);?>
				<?php echo CHtml::ajaxLink('Konw more about Career Library',array(''));?>
			</div>
			
		</div>
		<div class="clear"></div>
		<div class="row educationbot">
		
			<?php foreach($career as $data){?>
				<div class="col-md-3 career-lib career-lib2">
					<?php echo CHtml::link('<img src="'.Yii::app()->baseUrl.'/uploads/career/small/'.$data->image.'"/>',array('user/careerList','id'=>''.$data->id.''),array('class'=>'fl'));?>
					<div class="clear"></div>
					<?php echo CHtml::link('<h1>'.$data->title.'</h1>',array('user/careerList','id'=>''.$data->id.''));?>
					<?php echo substr($data->description,0,78);?>
					<div class="fl options-explore">
						<ul>
							<?php $options		=	Careeroptions::model()->FindAllByAttributes(array('career_id'=>$data->id,'published'=>1,'status'=>1));?>
							<?php foreach ($options as $list){ ?>
							<li><?php echo CHtml::link('<i class="icon-play"></i>'.$list->title.'',array('user/careerDetails','id'=>$list->id))?></li>
							<?php }?>
						</ul>
					</div>
					<div class="col-md-12 career-hot-links">
					<?php echo CHtml::link('View Details..',array('user/readFull','id'=>''.$data->id.''),array('class'=>'pull-left'));?>
						<ul class="star-rating pull-right">
							<li><i class="yellow icon-star"></i></li>
							<li><i class="yellow icon-star"></i></li>
							<li><i class="yellow icon-star"></i></li>
							<li><i class="yellow icon-star"></i></li>
							<li><i class="yellow icon-star"></i></li>
						</ul>

					</div>
				</div>

		
			<?php } ?>
			
	</div>
</div>
	
	<div class="col-md-3 pd0 pull-left">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			
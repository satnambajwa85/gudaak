
		
			<div class="col-md-4">
				<img src="<?php echo Yii::app()->baseUrl;?>/uploads/career_categories/small/<?php echo $data->image;?>"/>
				<div class="description pull-right col-md-6">
					<?php echo CHtml::link('<h3>'.$data->title.'</h3>',array('user/careerList','id'=>''.$data->id.''));?>
					<p><?php echo substr($data->description,0,70);?></p>
					<div class="">
					<ul class="fl">
						<li><i class="yellow icon-star"></i></li>
						<li><i class="yellow icon-star"></i></li>
						<li><i class="yellow icon-star"></i></li>
						<li><i class="yellow icon-star"></i></li>
						<li><i class="yellow icon-star"></i></li>
					</ul>
						<div class="links">
						<a href="#categories<?php echo $data->id;?>" class="pull-right">Categories<i class="icon-double-angle-down"></i></a>
						</div>
					</div>
					<div id="categories<?php echo $data->id;?>" class="categories-tab">
						<ul>
							<li>
								<?php echo(CHtml::checkBox('hindi'));echo(CHtml::label('hindi', 'name')); ?>
							</li>
							<li>
								<?php echo(CHtml::checkBox('hindi'));echo(CHtml::label('hindi', 'name')); ?>
							</li>
							<li>
								<?php echo(CHtml::checkBox('hindi'));echo(CHtml::label('hindi', 'name')); ?>
							</li>
							<li>
								<?php echo(CHtml::checkBox('hindi'));echo(CHtml::label('hindi', 'name')); ?>
							</li>
							<li>
								<?php echo(CHtml::checkBox('hindi'));echo(CHtml::label('hindi', 'name')); ?>
							</li>
							<li>
								<?php echo(CHtml::checkBox('hindi'));echo(CHtml::label('hindi', 'name')); ?>
							</li>
						</ul>
					
					</div>
				</div>
			</div>
			
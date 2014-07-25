<div class="col-md-12 inner-min-height pull-left  ">
			<div  class="col-md-6 pull-left gudak-features pdb14">
					<h1>&nbsp;</h1> 
					<!--<h3 class="orange">For School</h3> 
					<p>With thousands of students and a teacher-taught ratio of 1:40 in a typical school in India and less of expertise available in career counselling, we aim to provide a one stop solution to you in terms of guidance, exploration and management with the following features:
						
					</p>
					<ul>
						<li><i class=" icon-play"></i><p>Application designed for school to supervise the program effectively. </p></li>
						<li><i class=" icon-play"></i><p>Face to face counselling workshops and seminars held in school premises</p></li>
						<li><i class=" icon-play"></i><p>Whole program is carried out with the association of school.</p></li>
						<li><i class=" icon-play"></i><p>School gets updates of the status and necessary actions to be taken.</p></li>
						<li><i class=" icon-play"></i><p>Any time support right from the school's desktop.</p></li>
					
					
					</ul>-->
				<iframe src="//www.slideshare.net/slideshow/embed_code/37312041?rel=0" width="512" height="421" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;" allowfullscreen> </iframe> <div style="margin-bottom:5px"> <strong> <a href="https://www.slideshare.net/gudaak/online-career-planning-tool-for-schools-colleges" title="Online Career Planning Tool for Schools &amp; Colleges" target="_blank">Online Career Planning Tool for Schools &amp; Colleges</a> </strong> from <strong><a href="http://www.slideshare.net/gudaak" target="_blank">Gudaak</a></strong> </div> 
										
			</div>
			<div class="col-md-5 pull-right right-tab-content mt84">
            	<div class="col-md-12  pull-right">	
				<?php 
				 $form=$this->beginWidget('CActiveForm', array(
														'id'=>'contact-us',
													    'enableClientValidation'=>true,
														'clientOptions'=>array(
																'validateOnSubmit'=>true,
																
															)
														));?>
			  	<h2 class="mb50 mt50 ">ASK FOR FREE TRIAL</h2> 
				<?php echo $form->textField($model,'name',array('class'=>'form-control','placeholder'=>'Name','autofocus'=>true));
				echo $form->error($model,'name');?>
				
				<div class="pd4"></div>
				<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Email','autofocus'=>true));
				echo $form->error($model,'email');?>
				<div class="pd4"></div>
		  
				<?php echo $form->textField($model,'designation',array('class'=>'form-control','placeholder'=>'Designation','autofocus'=>true));
				echo $form->error($model,'designation');?>
				<div class="pd4"></div>
				<?php echo $form->textField($model,'institution',array('class'=>'form-control','placeholder'=>'Institution Name','autofocus'=>true));
				echo $form->error($model,'institution');?>
                
                <div class="pd4"></div>
				<?php echo $form->textField($model,'phone',array('class'=>'form-control','placeholder'=>'Phone','autofocus'=>true));
				echo $form->error($model,'phone');?>
                <div class="pd4"></div>
                <div align="center">
                <?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-warning mt'));?>
                <?php echo CHtml::link('Explore more',array('/site'),array('class'=>'btn btn-warning mt'));?>
				</div>
			  <?php $this->endWidget();?>
			</div>	
            
				<!--<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/mac.png"/>-->
			</div>
</div>
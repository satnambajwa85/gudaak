<?php $this->pageTitle=Yii::app()->name . ' - Detailed Report';
$this->breadcrumbs=array('Detailed Report'=>array('/user/detailedReport'));?>
<div class="career-bot pull-left">
		<div class="mr0 col-md-12 fl">
			<div class="mr0  pull-left stream-pref">
				<h1>Gudaak IPC Report </h1>
				<p>Welcome to the world of Designing Career Path with Gudaak! The test you have taken just now is one of the numerous “Interest-Personality “Tests available online and offline but our uniqueness lies in the interpretation. We at Gudaak believe in the holistic approach towards life and careers. This report has been prepared with utmost care, keeping in mind the various factors that come into play when you are making a decision for life.<br/>
Any suitable career can only be predicted with a combination of client’s academic assessments, interests, personality, values and attitudes when assessed in congenial environment. So, to succeed in life- Keep reading the literature on career and explore the possibilities that can help you reach your dreams and goals.<br/>
The career recommendations made here are based on how genuinely you have answered the test. We hope that this report will lead to a greater understanding of yourself and at every step we are there to guide you.
Remember! “There are no such things as limits to growth, because there are no limits on the human capacity for intelligence, imagination and wonder."

Wishing you all the best in all your future endeavours!

				</p>

			</div>
			<?php if(isset($reports)){?>
					<?php echo CHtml::link('Download PDF',array('user/DetailedReport&download=1'),array('target'=>'_blank','class'=>'btn btn-info2 center-bt fr'))?>
			<?php }else{
			
			} ?>
			
		</div>
		<div class="col-md-12 pull-left br-all inner-padding">
			<div class="col-md-10 col-sm-offset-1 pull-left  pd0">
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
								<li><?php echo $profile->userClass->title;?></li>
								<li><?php echo $profile->generateGudaakIds->schools->name;?></li>
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
		<p class="description-content"><?php echo $result['description'];?></p>
    	<div class="border_b"></div>
	</div>
    <?php }
foreach($report['results'] as $result){	
	if($report['id']==3){?>
	<div class="col-md-12 pd0  fl">
	<?php
		$listCar	=	Career::model()->findAllByAttributes(array('career_categories_id'=>$result['id']));
		foreach($listCar as $data){		?>
		
        
<div class="col-md-4 pdleft career-lib">
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
	<p><?php echo substr($data->description,0,70);?></p>
	<div class="col-md-12 career-hot-links">
	<?php echo CHtml::link('Read more..',array('user/readFull','id'=>''.$data->id.''),array('class'=>'pull-left','title'=>'Read Full.'));?>
		<span class="pull-right"><i class="icon-eye-open"></i></span>
	</div>
</div>


	<?php	}?>
    
    </div>
    <?php 
		}
	}
} ?>
                       
  <!--Table-->                     
<!--<div class="table_w">
  <div class="table_row table_head t_border_bt">
     <div class="table_col">sasa</div>
     <div class="table_col">sasa</div>
     <div class="table_col_last">sasa</div>
  </div>
 <div class="table_row t_border_bt ">
     <div class="table_col">sasa</div>
     <div class="table_col">sasa</div>
     <div class="table_col_last">sasa</div>
  </div>
   <div class="table_row t_border_bt ">
     <div class="table_col">sasa</div>
     <div class="table_col">sasa</div>
     <div class="table_col_last">sasa</div>
  </div>
   <div class="table_row ">
     <div class="table_col">sasa</div>
     <div class="table_col">sasa</div>
     <div class="table_col_last">sasa</div>
  </div>

</div>  --> 
 <!--Table end-->                     
                       


                       
                       
					</div>
					
				
			</div>
			
			
			</div>
		
		</div>
        
		
		


	
	<div class="news pd0 pull-right">
		<?php  $this->Widget('WidgetNews'); ?>
	</div>
			
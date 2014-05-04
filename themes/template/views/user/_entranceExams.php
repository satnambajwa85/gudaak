<div class="col-md-12 pull-left">
	<div class="col-md-12 fl pd0">
    <div style="max-height:500px;width:97%;overflow: scroll;">
    
			<div class="col-md-12 pull-left summery-left pd0">
				<ul>
					<div class="col-md-12 border pull-left pd0">
						<div class="col-md-4 pull-left pd0">
							<h1>Name</h1>
						</div>
                        <div class="col-md-8 pull-left pd5 text-center"  style="font-weight:normal;"><?php echo $test->name;?></div>
						
					</div>
					<div class="col-md-12 border pull-left pd0">
						<div class="col-md-4 pull-left pd0">
							<h1>Level</h1>
						</div>
                        <div class="col-md-8 pull-left pd5 text-center"  style="font-weight:normal;"><?php echo $test->level;?></div>
						
					</div>
                    
					<div class="col-md-12 border pull-left pd0">
						<div class="col-md-4 pull-left pd0">
							<h1>Career Category</h1>
						</div>
                        <div class="col-md-8 pull-left pd5 text-center"  style="font-weight:normal;"><?php 
						$list	=	explode(',',$test->career_category);
						$categ	=	EntranceCategory::model()->findAllByAttributes(array('id'=>$list));
						foreach($categ as $itm)
							echo $itm->title.'<br>';
						
						?></div>
						
					</div>
					<div class="col-md-12 border pull-left pd0">
						<div class="col-md-4 pull-left pd0">
							<h1>Details</h1>
						</div>
                        <div class="col-md-8 pull-left pd5 text-center"  style="font-weight:normal;"><?php echo $test->details;?></div>
						
					</div>
					<div class="col-md-12 border pull-left pd0">
						<div class="col-md-4 pull-left pd0">
							<h1>Application start date</h1>
						</div>
                        <div class="col-md-8 pull-left pd5 text-center"  style="font-weight:normal;"><?php echo ($test->start_date != '1970-01-01')?date('M d, Y',strtotime($test->start_date)):'NA';?>
						</div>
						
					</div>
					<div class="col-md-12 border pull-left pd0">
						<div class="col-md-4 pull-left pd0">
							<h1>Last date for application</h1>
						</div>
                       <div class="col-md-8 pull-left pd5 text-center"  style="font-weight:normal;"><?php echo ($test->end_date != '1970-01-01')?date('M d, Y',strtotime($test->end_date)):'NA';?></div>
						
					</div>
					<div class="col-md-12 border pull-left pd0">
						<div class="col-md-4 pull-left pd0">
							<h1>Test date</h1>
						</div>
                        <div class="col-md-8 pull-left pd5 text-center"  style="font-weight:normal;">
						<?php echo ($test->test_date != '1970-01-01')?date('M d, Y',strtotime($test->test_date)):'NA';?>
						</div>
						
					</div>
					<div class="col-md-12 border pull-left pd0">
						<div class="col-md-4 pull-left pd0">
							<h1>Result date</h1>
						</div>
                        <div class="col-md-8 pull-left pd5 text-center"  style="font-weight:normal;"><?php echo ($test->result_date != '1970-01-01')?date('M d, Y',strtotime($test->result_date)):'NA';?></div>
						
					</div>
						
					
				</ul>
			</div>
            
    </div>        
	</div>
</div>

			
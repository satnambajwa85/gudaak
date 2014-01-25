<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
		  <?php echo CHtml::link('VIDYARTHA',array('/admin/admin'),array('class'=>'brand'));?>
		<?php 	
		
		?>
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'span3 dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                       
						 array('label'=>'Users Management', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),
						 
						  'items'=>array(
							array('label'=>'<span class="badge '.$roleResult.' pull-right">'.$userRole.'</span>User Role', 'url'=>array('/admin/userRole/admin/')),
							array('label'=>'<span class="badge '.$loginResult.' pull-right">'.$userlogin.'</span>User login', 'url'=>array('/admin/userlogin/admin/')),
							array('label'=>'<span class="badge '.$uProResult.' pull-right">'.$userProfiles.'</span>User Profiles', 'url'=>array('/admin/userProfiles/admin/')),)), 
							
						array('label'=>'Network Locations', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),
						  'items'=>array(
								 array('label'=>'<span class="badge '.$result.' pull-right">'.$countries.'</span>Countries', 'url'=>array('/admin/countries/admin/')),
								array('label'=>'<span class="badge '.$Sresult.' pull-right">'.$states.'</span>States', 'url'=>array('/admin/states/admin/')),
								array('label'=>'<span class="badge '.$Ciresult.' pull-right">'.$cities.'</span>Cities', 'url'=>array('/admin/cities/admin/')),
								),), 
						array('label'=>'Manage Career', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),
						  'items'=>array(
								array('label'=>'Career Cluster', 'url'=>array('/admin/careerCategories/admin/')),
								array('label'=>'Career', 'url'=>array('/admin/career/admin/')),
								array('label'=>'Career Options', 'url'=>array('/admin/careerOptions/admin/')),
								array('label'=>'Career Details', 'url'=>array('/admin/CareerDetails/admin/')),
							
								),), 
                        array('label'=>'Test Management <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<span class="badge '.$resultCour.' pull-right">'.$courses.'</span>Courses', 'url'=>array('/admin/courses/admin/')),
							array('label'=>'<span class="badge '.$affResult.' pull-right">'.$affiliations.'</span>Affiliations', 'url'=>array('/admin/affiliations/admin/')),
							array('label'=>'<span class="badge '.$interResult.' pull-right">'.$interests.'</span>Interests', 'url'=>array('/admin/interests/admin/')),
							array('label'=>'<span class="badge '.$orResult.' pull-right">'.$orient_categories.'</span>Orient Categories', 'url'=>array('/admin/orientCategories/admin/')),
							array('label'=>'<span class="badge '.$orIResult.' pull-right">'.$orientItems.'</span>Orient Items', 'url'=>array('/admin/orientItems/admin/')),
							array('label'=>'<span class="badge '.$queResult.' pull-right">'.$questions.'</span>Questions', 'url'=>array('/admin/questions/admin/')),
							array('label'=>'<span class="badge '.$queOResult.' pull-right">'.$questionOptions.'</span>Question Options', 'url'=>array('/admin/questionOptions/admin/')),
							array('label'=>'<span class="badge '.$streResult.' pull-right">'.$stream.'</span>Stream', 'url'=>array('/admin/stream/admin/')),
							
							
                        )),
                        array('label'=>'<span class="badge '.$uProResult.' pull-right">'.$slider.'</span>Site Slider', 'url'=>array('/admin/Slider/admin/')),
						array('label'=>'Site Setting', 'url'=>array('/admin/siteSetting/admin')),
                        /*array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
                        array('label'=>'My Account <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Account Setting','url'=>array('AccountUpdate')),
							
                        )),
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>

<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
    	<div class="container">
        
        	<div class="style-switcher pull-left">
                <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
          	</div>
           <form class="navbar-search pull-right" action="">
           	 
           <input type="text" class="search-query span2" placeholder="Search">
           
           </form>
    	</div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->
<style>
.clear{clear:both;padding:36.9px;}
</style>
<div class="clear"></div>
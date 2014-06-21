<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
		  <?php echo CHtml::link('Gudaak',array('/admin/admin'),array('class'=>'brand'));?>
		<?php 	
		
		?>
          <div class="nav-collapse">
			<?php  $action=$this->id;$this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'span3 dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                       
						 array('label'=>'Users', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),
						 
						  'items'=>array(
							//array('label'=>'User Role', 'url'=>array('/admin/userRole/admin/')),
							array('label'=>'Login Detials', 'url'=>array('/admin/userlogin/admin/')),
							array('label'=>'Students', 'url'=>array('/admin/userProfiles/admin/')),
							)),
							array('label'=>'Manage Students','url'=>array('/admin/userProfiles/admin/'),'active'=>(($action=='userProfiles/admin')||($action=='userProfiles/create')||($action=='userProfiles/update')||($action=='userProfiles/view'))),
							 array('label'=>'Manage Counselor<span class="caret"></span>', 'url'=>array('/admin/counselor/admin/'),'active'=>(($action=='counselor/admin')||($action=='counselor/create')||($action=='counselor/update')||($action=='counselor/view'))
							 
							 /*,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'Counselor', 'url'=>array('/admin/counselor/admin/')),
							array('label'=>'Counselor Schools', 'url'=>array('/admin/counselorHasSchools/admin/')),
							//array('label'=>'Counselor Details', 'url'=>array('/admin/counselorDetails/admin/')),
							array('label'=>'Session', 'url'=>array('/admin/session/admin/')),
                        )
						*/),
/*array('label'=>'Locations', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),
'items'=>array(
array('label'=>'<span class="badge '.$result.' pull-right">'.$countries.'</span>Countries', 'url'=>array('/admin/countries/admin/')),
array('label'=>'<span class="badge '.$Sresult.' pull-right">'.$states.'</span>States', 'url'=>array('/admin/states/admin/')),
array('label'=>'<span class="badge '.$Ciresult.' pull-right">'.$cities.'</span>Cities', 'url'=>array('/admin/cities/admin/')),
),), */
						array('label'=>'Manage Schools', 'url'=>array('/admin/states/admin/'),'active'=>(($action=='states/admin')||($action=='generateGudaakIds/create')||($action=='generateGudaakIds/update')||($action=='generateGudaakIds/view'))),
						 array('label'=>'Manage Career', 'url'=>array('/admin/careerCategories/admin/') ,
						 'active'=>(($action=='generateGudaakIds/admin')||($action=='generateGudaakIds/create')||($action=='generateGudaakIds/update')||($action=='generateGudaakIds/view'))),
/*array('label'=>'Manage Career', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),
'items'=>array(
array('label'=>'Career Cluster', 'url'=>array('/admin/careerCategories/admin/')),
array('label'=>'Career', 'url'=>array('/admin/career/admin/')),
array('label'=>'Career Options', 'url'=>array('/admin/careerOptions/admin/')),
array('label'=>'Career Details', 'url'=>array('/admin/CareerDetails/admin/')),

),),*/ 
/*array('label'=>'Careers', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),
'items'=>array(
array('label'=>'Career Cluster', 'url'=>array('/admin/careerCategories/admin/')),
array('label'=>'Career', 'url'=>array('/admin/career/admin/')),
array('label'=>'Career Options', 'url'=>array('/admin/careerOptions/admin/')),
array('label'=>'Career Details', 'url'=>array('/admin/CareerDetails/admin/')),

),),*/ 
                        array('label'=>'Stream And Subject<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
								array('label'=>'Stream', 'url'=>array('/admin/stream/admin/')),
								array('label'=>'Stream With Career', 'url'=>array('/admin/CareerOptionsHasStream/admin/')),
								array('label'=>'Subjects', 'url'=>array('/admin/subjects/admin/')),
								array('label'=>'Subjects with Career', 'url'=>array('/admin/CareerOptionsHasSubjects/admin/')),
					    )),
						array('label'=>'Course Stream<span class="caret"></span>', 'url'=>array('/admin/courseStream/admin'),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
								array('label'=>'<span class="badge pull-right"></span>Courses', 'url'=>array('/admin/courses/admin/')),
								array('label'=>'<span class="badge pull-right"></span>Category Specialization', 'url'=>array('/admin/categorySpecialization/admin/')),
								array('label'=>'<span class="badge pull-right"></span>Specializations', 'url'=>array('/admin/specialization/admin/')),
                        )),
                       array('label'=>'Others<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'Courses', 'url'=>array('/admin/courses/admin/')),
							array('label'=>'Affiliations', 'url'=>array('/admin/affiliations/admin/')),
							array('label'=>'Interests', 'url'=>array('/admin/interests/admin/')),
							array('label'=>'Orient Categories', 'url'=>array('/admin/orientCategories/admin/')),
							array('label'=>'Orient Items', 'url'=>array('/admin/orientItems/admin/')),
							array('label'=>'Questions', 'url'=>array('/admin/questions/admin/')),
							array('label'=>'Question Options', 'url'=>array('/admin/questionOptions/admin/')),
							//array('label'=>'SessionQuestions', 'url'=>array('/admin/sessionQuestions/admin/')),
						)),
						
					   /* array('label'=>'<span class="badge '.$uProResult.' pull-right">'.$slider.'</span>Site Slider', 'url'=>array('/admin/Slider/admin/')),*/
						//array('label'=>'Course Stream', 'url'=>array('/admin/courseStream/admin')),
						/*array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
                       /* array('label'=>'My Account <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Account Setting','url'=>array('AccountUpdate')),
							
                        )),*/
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
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
 <!--               <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>-->
          	</div>
           <!--<form class="navbar-search pull-right" action="">
           	 
           <input type="text" class="search-query span2" placeholder="Search">
           
           </form>-->
    	</div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->
<style>
.clear{clear:both;padding:36.9px;}
</style>
<div class="clear"></div>
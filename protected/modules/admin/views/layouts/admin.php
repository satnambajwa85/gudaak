<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle);?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<?php
	  $baseUrl = Yii::app()->theme->baseUrl.'/adminCss';
	  $cs = Yii::app()->getClientScript();
	  Yii::app()->clientScript->registerCoreScript('jquery');
	?>
    <!-- Fav and Touch and touch icons -->
    <link rel="shortcut icon" href="<?php echo $baseUrl;?>/img/icons/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $baseUrl;?>/img/icons/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $baseUrl;?>/img/icons/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $baseUrl;?>/img/icons/apple-touch-icon-57-precomposed.png">
	<?php  
	  $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
	  $cs->registerCssFile($baseUrl.'/css/bootstrap-responsive.min.css');
	  $cs->registerCssFile($baseUrl.'/css/abound.css');
	  $cs->registerCssFile($baseUrl.'/css/style-blue.css');
	  $cs->registerScriptFile($baseUrl.'/js/bootstrap.min.js');
	  $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.sparkline.js');
	  $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.flot.min.js');
	  $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.flot.pie.min.js');
	  $cs->registerScriptFile($baseUrl.'/js/charts.js');
	  $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.knob.js');
	  $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.masonry.min.js');
	  $cs->registerScriptFile($baseUrl.'/js/styleswitcher.js');
	?>
  </head>
<?php $action	=	Yii::app()->controller->action->id; ?>
<body>

<section id="navigation-main">   
<!-- Require the navigation -->
<?php $this->Widget('WidgetMenu')?>
</section><!-- /#navigation-main -->
    
<section class="main-body">
	 
    <div class="col-md-12">
		<div class="left-menu">
				<?php $action=$this->id.'/'.$this->action->id;
					$this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav nav-pills nav-stacked admin-menu'),
                    'submenuHtmlOptions'=>array('class'=>'span3 dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                       	array('label'=>'Home', 'url'=>array('/admin/admin/index')),
                       	array('label'=>'Generate Gudaak IDs', 'url'=>array('/admin/generateGudaakIds/admin'),
						'active'=>(($action=='generateGudaakIds/admin')||($action=='generateGudaakIds/create')||($action=='generateGudaakIds/update')||($action=='generateGudaakIds/view'))),
                       	array('label'=>'Site Setting', 'url'=>array('/admin/siteSetting/admin')),
                       	array('label'=>'Articles', 'url'=>array('/admin/articles/admin'),'active'=>(($action=='articles/admin')||($action=='articles/create')||($action=='articles/update'))),
						array('label'=>'Sessions', 'url'=>array('/admin/session/admin'),'active'=>(($action=='session/admin')||($action=='session/create')||($action=='session/update'))),
						array('label'=>'Entrance Exams', 'url'=>array('/admin/entranceExams/admin'),'active'=>(($action=='entranceExams/admin')||($action=='entranceExams/create')||($action=='entranceExams/update'))),
						array('label'=>'Images', 'url'=>array('/admin/images/admin')),
                       	array('label'=>'News', 'url'=>array('/admin/news/admin')),
                       	array('label'=>'Events', 'url'=>array('/admin/events/admin')),
    
                    ),
                )); ?>
            
        </div>
		<div class="right-menu pull-left">
				<!-- Include content pages -->
				
				<?php echo $content; ?>
		</div>
    </div>
	 
</section>
<div class="clear"></div>
<div class="marb-50"></div>

<!-- Require the footer -->
<?php require_once('tpl_footer.php')?>
<style>
input[type="radio"],input[type="checkbox"] {
    cursor: pointer;
    float: left;
    line-height: normal;
    margin: 3px;
}

</style>
  </body>
</html>
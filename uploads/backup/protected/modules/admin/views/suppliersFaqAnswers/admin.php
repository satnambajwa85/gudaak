<?php
/* @var $this SuppliersFaqAnswersController */
/* @var $model SuppliersFaqAnswers */

$this->breadcrumbs=array(
	'Suppliers Faq Answers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SuppliersFaqAnswers', 'url'=>array('index')),
	array('label'=>'Create SuppliersFaqAnswers', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suppliers-faq-answers-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Suppliers Faq Answers</h1>

<?php  $this->Widget('WidgetPageSize'); ?>



<?php 



$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'suppliers-faq-answers-grid',
	'dataProvider'=>$model->customSearch(),
	'filter'=>$model,
	'columns'=>array(
	//	'id',
    
        array(
            'type'=>'raw',
			'name'=>'suppliers_id',
			'value'=>'CHtml::link($data->suppliers->name,array("/admin/suppliers/view","id"=>$data->suppliers_id))',
		    'header'=>'Supplier Company',
            //'value'=>$test, 
        ),
        array(
			'name'=>'faq_id',
		    'header'=>'Faq', 
            'filter'=>CHtml::activeDropDownList($model, 'faq_id',
                      Chtml::listData(Faq::model()->findAll(), 'id', 'question'),
                        array('empty'=>'Select Question',"")), 
            'value'=>'$data->faq->question', 
                
            
        ),
		//'faq_id',
		'answers',
	//	'status',
		//'publish',
		array(
			'class'=>'CButtonColumn',
            'buttons'=>array
            (

                    'view' => array
                    (
                            'url'=>'"index.php?r=admin/SuppliersFaqAnswers/view&id=$data->suppliers_id"',
                    ),
            ),
		),
	),
)); ?>

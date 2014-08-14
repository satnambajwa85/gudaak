<?php
/* @var $this SuppliersFaqAnswersController */

/* @var $model SuppliersFaqAnswers */


if(false)
{
    $this->breadcrumbs=array(
	'Suppliers Faq Answers'=>array('index'),
	$model->id,
    );
}


$this->menu=array(
	array('label'=>'List SuppliersFaqAnswers', 'url'=>array('index')),
	array('label'=>'Create SuppliersFaqAnswers', 'url'=>array('create')),
	//array('label'=>'Update SuppliersFaqAnswers', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete SuppliersFaqAnswers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersFaqAnswers', 'url'=>array('admin')),
);
?>

<?php
//CVarDumper::Dump($model,10,1)."<br>";

if(count($model) > 0)
{
 ?>
    <h1>View SuppliersFaqAnswers #<?php //echo $model->id; ?><?php echo $model[0]->suppliers->first_name; ?> <?php echo $model[0]->suppliers->last_name; ?></h1>
        <table id="yw0" class="detail-view" style="width: 100%;">
            <tbody>
                <?php

                     for($i = 0;$i < count($model);$i++)
                     {
                        ?>
                        <tr class="odd">
                            <td>
                                <b><?php echo ($i + 1).") ",$model[$i]->faq->question; ?></b><br />
                                <b>Answer : </b>  <?php echo ($model[$i]->answers!="")?$model[$i]->answers:"N/A"; ?>
                            </td>

                        </tr>
                        <?php
                     }
                 ?>
            </tbody>
        </table>


<?php
}else{
 echo "No record found!";
}
 ?>










<?php
if(false)
{
     ?>
    <?php $this->widget('zii.widgets.CDetailView', array(
    	'data'=>$model,
    	'attributes'=>array(
    		'id',
    		//'suppliers_id',
            array(
    			'name'=>'suppliers_id',
    			'value'=>$model->suppliers->name,
    			'header'=>'Supplier'
    		),
            array(
    			'name'=>'faq_id',
    			'value'=>$model->faq->question,
    			'header'=>'Faq'
    		),
    		//'faq_id',
    		'answers',
    		//'status',
    		//'publish',
    	),
    ));
}
?>

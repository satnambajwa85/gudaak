<?php $this->pageTitle=Yii::app()->name . ' - Articles';
$this->breadcrumbs=array('Articles'=>array('/site/articles'),''.$articles->title.'');?>
	<div class="col-md-12 pull-left">
		<div class="mr0 col-md-12 pd0 fl">
        <?php $this->widget('zii.widgets.CBreadcrumbs', array('homeLink'=>'','links'=>$this->breadcrumbs,));?>
			<div class="mr0 col-md-12  fl newsupdates art_c" >		 
			<div class="mr0 mt10 col-md-12 pd0 fl artical">
				 <h1 style="font-size:20px;"><?php echo $articles->title;?></h1>
				 <div class="clear"></div>
                 <?php if(isset($articles->add_date)){?>
                 <div class="col-md-12 fl pd0">
                    <datetime class="date-time fl">
                        Posted on <?php echo date('M d, Y',strtotime($articles->add_date));?>
                    </datetime>
                </div>
				<div class="clear"></div>
                <?php }?>
				<p>
				<?php echo $articles->description;?>	
				</p>
                
<div class="col-md-6">

<?php $form=$this->beginWidget('CActiveForm', array('id'=>'articles-comments-form','enableAjaxValidation'=>false,)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'name',array('style'=>'font-family: Arial;margin-bottom:10px')); ?>
		<?php echo $form->textField($model,'name',array('class'=>'form-control mar-b16')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email',array('style'=>'font-family: Arial;margin-bottom:10px;margin-top:10px')); ?>
		<?php echo $form->textField($model,'email',array('class'=>'form-control mar-b16')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment',array('style'=>'font-family: Arial;margin-bottom:10px;margin-top:10px')); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50,'class'=>'form-control mar-b16')); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>
	<div class="row buttons">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=846828762012851&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-share-button" data-href="<?php echo Yii::app()->createUrl('/site/article',array('id'=>$id));?>"></div>

		<?php echo CHtml::submitButton('Save',array('class'=>'btn mtb15 fr btn-warning  ')); ?>
	</div>

<?php $this->endWidget(); ?>


<div class="col-md-12">
<?php foreach($comments	as $comment){?>
<div class="outer_b">
	<div class="head">Posted by : <?php echo $comment->name;?></div>
    <div class="time">Posted on : <span class="post-meta"><?php echo date('M d, Y',strtotime($comment->add_date));?></span></div>
    <span class="border_bb"></span>

<div class="content " >
	Comment : <?php echo $comment->comment;?>
</div>
</div>
<?php } ?>

</div>

</div>

			</div>
            </div>
		</div>
</div>
			
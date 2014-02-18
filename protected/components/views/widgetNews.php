<div class="widget-body">
	<div class="widget-heading blue">
		 News & Updates
	</div>
	<div class="list-group">
		<?php foreach($news as $list){ ?>
		<?php echo CHtml::link('<h4 class="list-group-item-heading">'.$list->title.'</h4><p class="list-group-item-text">'.substr($list->description,0,55).'..</p>',array('site/news','id'=>$list->id),array('class'=>'list-group-item active','title'=>''.$list->title.''));?>
		<?php } ?>
		 <div class="col-md-12 pull-left news-pager">
			<?php $this->widget('CLinkPager', array('pages' => $pages)) ?>
		</div>
		<button type="button" class="btn btn-default btn-lg btn-block lodad-more">Load more news</button>
	  </div>
</div>
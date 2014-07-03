<div class="widget-body">
	<?php echo CHtml::link('<div class="widget-heading blue">News</div>',array('user/newsList'));?>
    
	<div class="list-group">
		<?php foreach($news as $list){
			echo CHtml::link('<h4 class="list-group-item-heading">'.$list->title.'</h4><p class="list-group-item-text">'.substr(strip_tags($list->description),0,55).'..</p>',array('user/news','id'=>$list->id),array('class'=>'list-group-item active','title'=>''.$list->title.''));
		}?>
        <div class="col-md-12 pull-left news-pager">
			<?php //$this->widget('CLinkPager', array('pages' => $pages)) ?>
		</div>		
	  </div>
</div>
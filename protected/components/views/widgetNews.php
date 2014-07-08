<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.easing.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var dd = $('.vticker').easyTicker({
		direction: 'up',
		easing: 'easeInOutBack',
		speed: 'slow',
		interval: 2000,
		height: 'auto',
		visible:7,
		mousePause: 0,
		controls: {
			up: '.up',
			down: '.down',
			toggle: '.toggle',
		}
	}).data('easyTicker');
});
</script>
<div class="widget-body">
	<?php echo CHtml::link('<div class="widget-heading blue">News</div>',array('user/newsList'));?>
    
	<div class="list-group vticker">
    <ul>
		<?php foreach($news as $list){?>
			<li>
			<?php echo CHtml::link('<h4 class="list-group-item-heading">'.$list->title.'</h4><p class="list-group-item-text">'.substr(strip_tags($list->description),0,55).'..</p>',array('user/news','id'=>$list->id),array('class'=>'list-group-item active','title'=>''.$list->title.''));?>
            </li>
        <?php    
		}?>
        </ul>
	  </div>
</div>

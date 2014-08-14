<script>
    $(document).ready(function(){
        $("#paginationSelect").change(function(){
         
            var currUrl = $("#currUrl").val();
            var page_count = $("#paginationSelect").val();
            
            if(currUrl.indexOf("pagesize") != -1){
                
                currUrl = currUrl.split("&");
                window.location.href =   currUrl[0] + "&pagesize=" + page_count;
            }else{
                window.location.href =   currUrl + "&pagesize=" + page_count;
            }
        });
    });
</script>

<input type="hidden" name="currUrl" id="currUrl" value="<?php echo Yii::app()->request->hostInfo . Yii::app()->request->url ?>" />
<div style="float:right;margin-top: -20px;margin-right: 10px;"> <b>Record Per Page :</b>
<?php
$selectedVal = 0;
if(isset($_REQUEST['pagesize']))
{
    $selectedVal = $_REQUEST['pagesize'];
}


echo CHtml::dropDownList("paginationSelect",'paginationSelect',array('20'=>'20','50'=>'50','100'=>'100','150'=>'150'),array('empty'=>'Select','options' => array($selectedVal=>array('selected'=>true))));
 ?>
</div>

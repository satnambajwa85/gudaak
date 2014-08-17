<div class="col-sm-6 " style="padding-top:100px"  >
    <select id="testing" placeholder="Select" >
        <option value=""></option>
        <option value="1">Cars</option>
        <option value="2">Cars1</option>
        <option value="3">Cars2</option>
        <option value="4">Cars3</option>
        <option value="5">Cars4</option>
    </select>

</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#testing').selectize({
            selectOnTab:true
        });
    });
</script>

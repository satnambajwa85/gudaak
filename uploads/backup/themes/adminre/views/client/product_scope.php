<section class="container-fluid">
    <!-- Page Header -->
    <div class="page-header page-header-block">
        <div class="page-header-section">
            <h4 class="title semibold">Scope Product scope</h4>
        </div>
    </div>
    <!--/ Page Header -->
    <!-- START row -->
    <div class="row">
        <div class="col-md-12">
          <form novalidate="" class="panel panel-default input-append" action="" data-parsley-validate="">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="ico-tshirt mr5"></i>Basic</h3>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <label class="control-label">Q. Think about the main functionalities/use cases from the customer's &amp; admin's perspective? Can you walk us through the app.<span class="text-danger">*</span></label>
                    <!--<div class="col-sm-11" id="add_new_outr">
                        <input id="add_new" type="text" style="margin-bottom:15px;" required class="form-control" name="name" data-trigger="focus" data-toggle="popover" data-placement="top"  data-content="Try to keep this short. We will get into the details later.">
                    </div>-->
                    <div id="add_new_outr" class="col-sm-11">
                        <div style="margin-bottom:15px;" id="add_new" class="col-sm-11">
                            <label style="padding-top:8px;" class="col-sm-1 control-label add_new">Step1:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" data-parsley-id="4786"><ul class="parsley-errors-list" id="parsley-id-4786"></ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-11">
                        <button id="addother" type="button" class="addother btn btn-teal">Add Another</button>
                    </div>
                    <ul id="parsley-id-0264" class="parsley-errors-list">
                    </ul>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <label class="control-label">Q. Name a few apps, websites, or services that come the closest to what you have in mind. <span class="text-danger">*</span></label>
                    <!--<div class="col-sm-11" id="add_new_outr2">
                        <input type="text" id="add_new2" style="margin-bottom:15px;" required class="form-control" name="name" data-trigger="focus" data-toggle="popover" data-placement="top"  data-content="Try to keep this short. We will get into the details later.">
                    </div>-->
                    <div id="add_new_outr2" class="outerwrapper col-sm-11">
                        <div style="margin-bottom:15px;" id="add_new2" class="col-sm-11">
                            <label style="padding-top:8px;" class="col-sm-1 control-label add_new">Step1:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" data-parsley-id="3390"><ul class="parsley-errors-list" id="parsley-id-3390"></ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-11">
                        <button id="addother2" type="button" class="addother btn btn-teal">Add Another</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <label class="control-label">Q. Talk about how your product is different? What are the different functionalities that you are trying to build.<span class="text-danger">*</span></label>
                    <div id="add_new_outr" class="col-sm-11">
                        <textarea data-content="" data-placement="top" data-toggle="popover" data-trigger="focus" required="" placeholder="Max: 100 words" rows="3" class="form-control" data-parsley-id="3693" data-original-title="" title=""></textarea><ul class="parsley-errors-list" id="parsley-id-3693"></ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
            <!-- START panel -->
            <div class="panel panel-default">
                <!-- panel heading/header -->
                <div class="panel-heading">
                    <h3 class="panel-title">Range slider</h3>
                    <!-- panel toolbar -->
                    <div class="panel-toolbar text-right">
                        <!-- option -->
                        <div class="option">
                            <button data-toggle="panelrefresh" class="btn demo"><i class="reload"></i></button>
                            <button data-toggle="panelcollapse" class="btn up"><i class="arrow"></i></button>
                            <button data-toggle="panelremove" class="btn"><i class="remove"></i></button>
                        </div>
                        <!--/ option -->
                    </div>
                    <!--/ panel toolbar -->
                </div>
                <!--/ panel heading/header -->

                <!-- panel body with collapse capable -->
                <div class="panel-collapse pull out">
                    <!-- Loading indicator -->
                    <div class="indicator"><span class="spinner"></span></div>
                    <!--/ Loading indicator -->
                    <div class="panel-body">
                        The space between the handles is filled with a different background color to indicate those values are selected.
                    </div>
                    <hr class="nm"><!-- horizontal line -->
                    <div class="panel-body">
                        <ul class="list-unstyled mb0" id="range-slider">
                            <li data-max="40" data-min="10" class="slider-primary mb15"></li>
                            <li data-max="50" data-min="20" class="slider-info mb15"></li>
                            <li data-max="60" data-min="30" class="slider-success mb15"></li>
                            <li data-max="70" data-min="40" class="slider-warning mb15"></li>
                            <li data-max="80" data-min="50" class="slider-danger"></li>
                        </ul>
                    </div>
                </div>
                <!--/ panel body with collapse capabale -->
            </div>
            <!--/ END panel -->
        </div>
            <div class="panel-footer">
              <button type="submit" class="btn btn-primary">Next</button>
            </div>
          </form>
        </div>
    </div>
    <!--/ END row -->
    
</section>
<script type="text/javascript">
(function($){
	$("html").Core({ "console": false });
})(jQuery);

/*sahil js for new field add*/
$(document).ready(function(){
	$('.addother').click(function(){
		$(this).parent().find('.outerwrapper').clon();
		
		
		$("#add_new").clone().appendTo("#add_new_outr");
	});
	$("#addother").click(function(){
		$("#add_new").clone().appendTo("#add_new_outr");
	});
	$("#addother2").click(function(){
		$("#add_new2").clone().appendTo("#add_new_outr2");
	});
});
/*sahil js for new field add*/
</script>
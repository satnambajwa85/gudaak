

    <div id="chat-box" class="table-layout" <?php echo (empty($project->chat_room_id)?'style="display:block"':"data-room=$project->chat_room_id"); ?>>
        <div class="col-lg-12 valign-top panel panel-default mb50">
            <!-- panel heading -->
            <div class="panel-heading">
                <h5 class="panel-title">
                    <i class="ico-circle text-default mr5"></i>
                    <span class="name">
                        <?php
							$imag	=	(Yii::app()->user->role=='client')?((!empty($profile->image))?$profile->image:''):((!empty($profile->logo))?$profile->logo:'');
							if($imag=='')
								$imag	=	Yii::app()->baseUrl.'/uploads/client/small/avatar.png';?>
                        <?php echo $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name; ?></span>
                    <span class="badge pull-right"></span>
                </h5>
            </div>
            <?php if($project->status == 0 || $project->status==1){ ?>
            <!-- black screen  -->
            <div class="info col-sm-12 text-center <?php echo (empty($project->chat_room_id)?'':"hide"); ?>" >
                <a  class="btn btn-info clarification" style="margin-top:15px; margin-left:8px;<?php echo (!empty($project->chat_room_id)?'display:none': ''); ?>"  ><i class="ico-eye" ></i> Seek Clarification</a>
                <script>
                    $('.loadchat').hide();
                </script>
            </div>
            <?php } ?>
            <!-- black screen  -->
            <div class="panel-body np" id="scrollbox7">
                <div class="loadchat text-center"><!--Loading screen while chat initialises-->
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/greenloader.gif">
                </div>
                <!-- message list -->
                <ul class="media-list media-list-bubble clearfix" id="chattingscroll">
                    
                </ul>
                <!--/ message list -->
                <div class="status text-center text-default">
                    <i>
                        <?php echo $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name; ?> is offline</i>
                </div>
            </div>

            <div class="panel-footer border-none pt0">
                <!--write box-->
                <div class="panel-toolbar-wrapper">
                    <div class="panel-toolbar">
                        <div class="input-group" style="width:100%;">
                            <textarea type="text" class="form-control message" placeholder="Type your message" style="height:50px; resize:none;"></textarea>
                            <span class="input-group-btn" style="vertical-align: top !important;">
                                <button class="btn btn-primary send pt15 pb15" type="button">
                                    <i class="ico-paper-plane"></i>
                                    <span class="semibold">Send</span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <hr class="mt10 mb10">
                <!-- horizontal line -->

                <div class="panel-toolbar-wrapper">
                    <div class="panel-toolbar">
                        <div class="btn-group">
                           <!--  <button type="button" class="btn btn-default">
                                <i class="ico-facetime-video"></i> 
                            </button>-->
                        </div>
                    </div>

                    <div class="panel-toolbar text-right">
                        <button class="btn btn-default" id="attachfileformessage">
                            <i class="ico-attachment"></i>Attach files</button>

                    </div>
                </div>
            </div>
            <!-- panel footer -->
        </div>
    </div>
<script type="text/javascript">
     console.log('before other_image');
     var other_image =   "<?php echo $project->clientProjects->clientProfiles->image;?>";
       
    console.log("Hi! other_image is :",other_image);
		var other = {
			id: "<?php echo $project->clientProjects->clientProfiles->users->id; ?>",
			name: "<?php echo $project->clientProjects->clientProfiles->first_name.' '.$project->clientProjects->clientProfiles->last_name; ?>"
		};
        var other_notification = {
            id: "<?php echo $project->clientProjects->clientProfiles->users->id; ?>",
			name: "<?php echo $project->clientProjects->clientProfiles->first_name.' '.$project->clientProjects->clientProfiles->last_name; ?>"
        };
        var project={
            proposalId: "<?php echo $project->id; ?>",
            projectName: "<?php echo $project->clientProjects->name; ?>",
            roomurl : "<?php echo CController::createUrl('/supplier/ajaxChatHandler'); ?>",
            status : "<?php echo $project->status; ?>",
            pid : "<?php echo $project->clientProjects->id; ?>"
        };
     //init();
    $(document).ready(function(){
        var allowedMimeTypeList =['image/*', 'text/plain', 'application/pdf','application/msword','application/vnd.ms-powerpoint','application/vnd.openxmlformats-officedocument.presentationml.presentation'];

     $('#attachfileformessage').on('click', function (e) {
            e.preventDefault();
			console.log("clicked");
			filepicker.setKey("<?php echo $this->filpickerKey; ?>");
			filepicker.pick({
					mimetypes: allowedMimeTypeList
				},
				function (InkBlob) {
					$(".message").val(InkBlob.url);
					$(".send").trigger("click");
					console.log("fil : " + JSON.stringify(InkBlob));
                    return true;
				},
				function (FPError) {
					//alert("Error Uploading Files : " + FPError.toString());
					console.log(FPError.toString());
				}
			);

		});
    });
    
</script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/xchat.js"></script>

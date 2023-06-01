		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-md-4 col-xs-12">
                        <h4 class="page-title"><?=$title;?></h4> </div>
                    <div class="col-lg-9 col-md-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?=admin_url();?>">Home</a></li>
                            <li class="active"><?=$title;?></li>
                        </ol>
                    </div>
                </div>
			<div class="row">
			  	<div class="col-lg-12">
                  <div class="white-box">
						<div class="nav-tabs-custom">
						  <ul class="nav nav-tabs">
						  <li class="nav-item"><a href="#Settings" class="<?php if(isset($_POST['settings']) || $message != '') { echo $tab ; } else if (!isset($_POST['css']) && !isset($_POST['js']) && $css_message == '' && $js_message == '') { echo 'active' ; } ?> nav-link" data-toggle="tab">Settings</a></li>
						  <li class="nav-item"><a href="#Custom_CSS" class="<?=(isset($_POST['css']) || $css_message != '') ? $tab : '';?> nav-link" data-toggle="tab">Custom CSS</a></li>
						  <li class="nav-item"><a href="#Custom_JS" class="<?=(isset($_POST['js']) || $js_message != '') ? $tab : '';?> nav-link" data-toggle="tab">Custom JS</a></li>
						</ul>
						<div class="tab-content">
						  <div class="<?php if(isset($_POST['settings']) || $message != '') { echo $tab ; } else if (!isset($_POST['css']) && !isset($_POST['js']) && $css_message == '' && $js_message == '') { echo 'active' ; } ?> tab-pane" id="Settings">
						  <?=isset($_POST['settings']) ? validation_errors() : $message ?>
							<form class="form-material form-horizontal" name="update_settings" action="<?=admin_url();?>settings/update" enctype="multipart/form-data"  method="post">
							<div class="form-group">
								<label  for="theme" class="col-md-3 control-label">Button Color</label>
								<div class="col-md-9">
								  <select class="form-control" name="button" id="button" style="width: 30% !important;">
										<option value="btn-default" <?=($settings[0]->button == 'btn-default') ? 'selected' : '' ;?> >Black</option>
										<option value="btn-info" <?=($settings[0]->button == 'btn-info') ? 'selected' : '' ;?> >Blue</option>
										<option value="btn-primary" <?=($settings[0]->button == 'btn-primary') ? 'selected' : '' ;?> >Purple</option>
										<option value="btn-success" <?=($settings[0]->button == 'btn-success') ? 'selected' : '' ;?> >Green</option>
										<option value="btn-danger" <?=($settings[0]->button == 'btn-danger') ? 'selected' : '' ;?> >Red</option>
										<option value="btn-warning" <?=($settings[0]->button == 'btn-warning') ? 'selected' : '' ;?> >Yellow</option>
									</select>
								</div>
							  </div>
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
							  <div class="form-group">
								<label   for="sitename" class="col-md-3 control-label">Site Name</label>
								<div class="col-md-4">
								  <input type="text" class="form-control" name="sitename" id="sitename" placeholder="Site Name" value="<?=$settings[0]->title;?>" required >
								</div>
							  </div>
							  <div class="form-group">
								<label for="userfile" class="col-md-3 control-label">Logo</label>
								<div class="col-md-8">
									<input type="file" id="input-file-now-custom-1" name="userfile" class="dropify" data-default-file="<?=!empty($settings[0]->logo) ? base_url().'uploads/'.$settings[0]->logo : base_url().'uploads/logo-dummy.png'; ?>" /> 
								</div>
							  </div>
							  <div class="form-group">
								<label for="favi" class="col-md-3 control-label">Favicon</label>
								<div class="col-md-8">
								  <input type="file" id="input-file-now-custom-1" name="favi" class="dropify" data-default-file="<?=!empty($settings[0]->favicon) ? base_url().'uploads/'.$settings[0]->favicon : base_url().'uploads/favicon.png'; ?>" /> 	
								</div>
							  </div>
							  <div class="form-group">
								<label for="favi" class="col-md-3 control-label">Login Background</label>
								<div class="col-md-8">
								  <input type="file" id="input-file-now-custom-1" name="loginbg" class="dropify" data-default-file="<?=!empty($settings[0]->loginbg) ? base_url().'uploads/'.$settings[0]->loginbg : base_url().'uploads/login-register.jpg'; ?>" /> 	
								</div>
							  </div>
							  <div class="form-group">
								<label   for="infomail" class="col-md-3 control-label">Site Email Id</label>
								<div class="col-md-4">
								  <input type="text" class="form-control" name="infomail" id="infomail"  placeholder="info@yoursiteurl.com" value="<?=!empty($settings[0]->favicon)? $settings[0]->sentmail : '';?>" >
								</div>
							  </div>
							  <div class="form-group">
								<label   for="editor1" class="col-md-3 control-label">Footer Left</label>
								<div class="col-md-8">
									 <textarea  class="form-control ckeditor" style="height: 300px" name="left" id="editor1" cols="80" rows="10" required><?=$settings[0]->footer_left;?></textarea>
								</div>
							  </div>
							  <div class="form-group">
								<label   for="right" class="col-md-3 control-label">Footer Right</label>
								<div class="col-md-8">
									<textarea id="footer-right" class="form-control ckeditor" style="height: 300px" id="right" name="right"  required><?=$settings[0]->footer_right;?></textarea>
								</div>
							  </div>
							  <div class="form-group">
								<label for="maintenance" class="col-md-3 control-label">Maintenance Mode</label>
								<div class="col-md-2">
									<select class="form-control" name="maintenance" id="maintenance">
										<option value="0" <?=($settings[0]->maintenance == '0') ? 'selected' : '' ;?> >No</option>
										<option value="1" <?=($settings[0]->maintenance == '1') ? 'selected' : '' ;?>>Yes</option>
									</select>
								</div>
								<div class="col-md-7 ipaddress <?=($settings[0]->maintenance == 1)?'':'hidden';?>">
								    <input type="text" class="form-control <?=($settings[0]->maintenance == 1)?'':'hidden';?>" name="ipaddress" id="ipaddress" data-role="tagsinput" placeholder="Enter your ip address" value="<?=($settings[0]->ipaddress != '')?$settings[0]->ipaddress:$ipaddress;?>" <?=($settings[0]->maintenance == 1)?'required':'';?>  >
								</div>
							  </div>
							  <div class="form-group">
								<label for="errors" class="col-md-3 control-label">Display Errors</label>
								<div class="col-md-8">
									<select class="form-control" name="errors" id="errors" style="width: 30% !important;">
										<option value="1" <?=($settings[0]->display_errors == '1') ? 'selected' : '' ;?> >Yes</option>
										<option value="0" <?=($settings[0]->display_errors == '0') ? 'selected' : '' ;?>>No</option>
									</select>
								</div>
							  </div>
							  <div class="form-group">
								<label for="display" class="col-md-3 control-label">Show Settings</label>
								<div class="col-md-8">
									<select class="form-control" name="display" id="display" style="width: 30% !important;">
										<option value="show" <?=($settings[0]->display == 'show') ? 'selected' : '' ;?> >Yes</option>
										<option value="hidden" <?=($settings[0]->display == 'hidden') ? 'selected' : '' ;?>>No</option>
									</select>
								</div>
							  </div>
							  <div class="form-group">
								<div class="col-md-offset-1 col-md-11 text-right">
								  <button type="submit" name="settings" class="btn <?=$site[0]->theme;?>">Save</button>
								</div>
							  </div>
							</form>
						</div>    
							
						<div class="<?=(isset($_POST['css']) || $css_message != '') ? $tab : '';?> tab-pane" id="Custom_CSS">
						  <?=isset($_POST['css']) ? $error : $css_message ?>
							<form class="form-material form-horizontal" action="<?=admin_url();?>settings/css" method="post">
							  <div class="form-group">
								<label   for="css_links" class="col-md-3 control-label">Custom Links</label>
								<div class="col-md-8">
								  <textarea  class="form-control" style="height: 300px" id="css_links" name="css_links"><?=$settings[0]->c_links;?></textarea>
								</div>
							  </div>
							  <div class="form-group">
								<label   for="custom_css" class="col-md-3 control-label">Custom CSS</label>
								<div class="col-md-8">
								  <textarea  class="form-control" style="height: 300px" id="custom_css" name="custom_css"><?=$settings[0]->css;?></textarea>
								</div>
							  </div>
							  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
							  <div class="form-group">
								<div class="col-md-offset-1 col-md-11 text-right">
								  <button type="submit" name="css" class="btn <?=$settings[0]->theme;?>">Save</button>
								</div>
							  </div>
							</form>
						</div>
							
						<div class="<?=(isset($_POST['js']) || $js_message != '') ? $tab : '';?> tab-pane" id="Custom_JS">
						  <?=isset($_POST['js']) ? $error : $js_message ?>
							<form class="form-material form-horizontal" action="<?=admin_url();?>settings/js" method="post">
							  <div class="form-group">
								<label   for="js_links" class="col-md-3 control-label">Custom Links</label>
								<div class="col-md-8">
								  <textarea  class="form-control" style="height: 300px" id="js_links" name="js_links" ><?=$settings[0]->j_links;?></textarea>
								</div>
							  </div>
							  <div class="form-group">
								<label   for="custom_js" class="col-md-3 control-label">Custom JS</label>
								<div class="col-md-8">
								  <textarea  class="form-control" style="height: 300px" id="custom_js" name="custom_js" ><?=$settings[0]->js;?></textarea>
								</div>
							  </div>
							  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
							  <div class="form-group">
								<div class="col-md-offset-1 col-md-11 text-right">
								  <button type="submit" name="js" class="btn <?=$settings[0]->theme;?>">Save</button>
								</div>
							  </div>
							</form>
						 </div>
							
						</div>
					  </div>
                  </div>
                </div>
			</div>
        </div>
    <script>
    $(document).ready(function() {
        $('.dropify').dropify();
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });
        var drEvent = $('#input-file-events').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>

        
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><?=$title;?></h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?=admin_url();?>">Home</a></li>
                            <li class="active"><?=$title;?></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
								<h2><i class="fa fa-lock"></i> This Page Currently Locked.</h2>
								<p><h3>We could not remember the password, you may <a href="<?=admin_url();?>">return to dashboard</a>.</h3></p>
							</div>
							<div class="row row-in center" align="center">
								<button id="unclockbutton" class="btn btn-success" data-toggle="modal" data-target="#perform" >Click to Unlock</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
            </div>
			<div class="modal fade" id="perform" tabindex="-1" role="dialog" aria-labelledby="performLabel">
						<form name="permission_form" class="form-material form-horizontal" id="permission_form" action="<?=admin_url();?>permission" method="post">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel1">Unlock</h4> </div>
                                        <div class="modal-body">
											<div class="from_div"></div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
												    <input class="form-control" required autocomplete="off" id="unlock" type="password" placeholder="Password" autofocus name="unlock">
												    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
											    </div>
											</div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <input class="form-control" type="number" name="scan_code" id="scan_code" placeholder="Authenticator code" required >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn <?=$site[0]->button;?>" id="unlock_save">Save</button>
                                        </div>
                                    </div>
                                </div>
						</form>
            </div>
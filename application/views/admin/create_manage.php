<!-- Color picker plugins css -->
<link href="<?=base_url();?>plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-md-4 col-xs-12">
                        <h4 class="page-title"><?=$title;?></h4> </div>
                    <div class="col-lg-9 col-md-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?=admin_url();?>">Home</a></li>
							<li><a href="<?=admin_url();?>create"><?=$title;?></a></li>
                            <li class="active">Manage</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
              <div class="row">
			  	<div class="col-lg-12">
                    <div class="white-box">
                    <form method="post" class="form-material form-horizontal" action="<?=admin_url();?>create/manage/<?=$ct[0]->table_name;?>">
                      <div class="btn-group mb">
                        <button type="submit" name="ctsubmit" id="ctsubmit" data-loading-text="Loading..." class="btn btn-primary" autocomplete="off">Save</button>
                        <a href="<?=admin_url('create');?>"  class="btn btn-warning">Back</a>
                      </div>	
                            <div class="form-horizontal">
								<div class="form-group">
									<div class="row">
										<div class="col-md-12 m-t-10"><?=isset($_POST['ctsubmit'])? validation_errors().$succ : '';?></div>
									</div>
								</div>
                                <div class="form-group">
									<div class="row">
										<label class="form-control-label col-md-4 text-right">Table Name</label>
										<div class="col-md-4"><input class="form-control" value="<?=$ct[0]->table_name;?>" data-ptname="<?=$ct[0]->table_name;?>" id="hidetablename" disabled type="text"></div>
									</div>
                                </div>
                                <div class="form-group">
									<div class="row">
										<label class="form-control-label col-md-4 text-right">Order by</label>
										<div class="col-md-2">
										    <select class="form-control" name="order">
										        <?php if(!empty($ct[0]->order_by)){ $order_by = json_decode($ct[0]->order_by); foreach($order_by as $key => $orderby){ $orderkey = $key; $orderby = $orderby; } } foreach($manage as $key) : ?>
										            <option value="<?=$key;?>" <?php if(!empty($ct[0]->order_by)){ if($orderkey == $key){ echo 'selected';} }?> ><?=$key;?></option>
										        <?php endforeach; ?>
										    </select>
										</div>
										<div class="col-md-2">
										    <select class="form-control" name="by">
										        <option value="asc" <?php if(!empty($ct[0]->order_by)){ if($orderby == "asc"){ echo 'selected';} }?> >ASC</option>
										        <option value="desc" <?php if(!empty($ct[0]->order_by)){ if($orderby == "desc"){ echo 'selected';} }?> >DESC</option>
										    </select>
										</div>
									</div>
                                </div>
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                                <div class="form-group">
									<div class="row">
                                        <label class="col-md-2" style="text-align:center">Column Name</label>
                                        <label class="col-md-2" style="text-align:center">Rename</label>
                                        <label class="col-md-2" style="text-align:center">Pattern</label>
                                        <label class="col-md-2" style="text-align:center">Required</label>
                                        <label class="col-md-2" style="text-align:center">Hidden</label>
                                        <label class="col-md-2" style="text-align:center">Change Type</label>
                                	</div>
								</div>
                                <?php $colname = json_decode($ct[0]->rename_column); $pttrn = json_decode($ct[0]->pattern); $requ = json_decode($ct[0]->required_fields); $hdn = json_decode($ct[0]->hidden); foreach($manage as $key) : ?>
                                   <div class="form-group">
										<div class="row">
                                        <div class="col-md-2 mb"><input class="form-control" value="<?=$key;?>" readonly type="text" name="ctln[]"></div>
                                        <div class="col-md-2 mb"><input class="form-control" name="ctcln[]" type="text" value="<?=!empty($ct[0]->rename_column)?((!empty($colname->$key))?$colname->$key:$key):$key;?>" ></div>
                                        <div class="col-md-2 mb" align="center">
                                            <select class="form-control"  name="ctptrn[]" >
                                                <option value="" <?php if(!empty($ct[0]->pattern)){ if(!empty($pttrn->$key) && ($pttrn->$key == '')){ echo 'selected';} else { echo ''; } }?> >None</option>
                                                <option value="email" <?php if(!empty($ct[0]->pattern)){ if($pttrn->$key == 'email'){ echo 'selected';} else { echo ''; } }?> >Email</option>
                                                <option value="alpha" <?php if(!empty($ct[0]->pattern)){ if($pttrn->$key == 'alpha'){ echo 'selected';} else { echo ''; } }?> >Alpha</option>
                                                <option value="alpha_numeric" <?php if(!empty($ct[0]->pattern)){ if($pttrn->$key == 'alpha_numeric'){ echo 'selected';} else { echo ''; } }?> >Alpha Numeric</option>
                                                <option value="alpha_dash" <?php if(!empty($ct[0]->pattern)){ if($pttrn->$key == 'alpha_dash'){ echo 'selected';} else { echo ''; } }?> >Alpha Dash</option>
                                                <option value="numeric" <?php if(!empty($ct[0]->pattern)){ if($pttrn->$key == 'numeric'){ echo 'selected';} else { echo ''; } }?> >Numeric</option>
                                                <option value="integer" <?php if(!empty($ct[0]->pattern)){ if($pttrn->$key == 'integer'){ echo 'selected';} else { echo ''; } }?> >Integer</option>
                                                <option value="decimal" <?php if(!empty($ct[0]->pattern)){ if($pttrn->$key == 'decimal'){ echo 'selected';} else { echo ''; } }?> >Decimal</option>
                                                <option value="natural" <?php if(!empty($ct[0]->pattern)){ if($pttrn->$key == 'natural'){ echo 'selected';} else { echo ''; } }?> >Natural</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 mb" align="center">
                                            <select class="form-control"  name="ctrqd[]" required>
                                                <option value="required" <?php if(!empty($ct[0]->required_fields)){ if(!empty($requ->$key) && ($requ->$key == 'required')){ echo 'selected';} else { echo ''; } }?> >Required</option>
                                                <option value="not_required" <?php if(!empty($ct[0]->required_fields)){ if($requ->$key == 'not_required'){ echo 'selected';} else { echo ''; } }?> >Not Required</option>
                                                <option value="readonly" <?php if(!empty($ct[0]->required_fields)){ if($requ->$key == 'readonly'){ echo 'selected';} else { echo ''; } }?> >Readonly</option>
                                                <option value="disabled" <?php if(!empty($ct[0]->required_fields)){ if($requ->$key == 'disabled'){ echo 'selected';} else { echo ''; } }?> >Disable</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 mb" align="center">
                                            <select class="form-control"  name="cthidden[]" required>
                                                <option value="show" <?php if(!empty($ct[0]->hidden)){ if(!empty($hdn->$key) && ($hdn->$key == 'show')){ echo 'selected';} else { echo ''; } }?> >Show</option>
                                                <option value="hidden" <?php if(!empty($ct[0]->hidden)){ if($hdn->$key == 'hidden'){ echo 'selected';} else { echo ''; } }?> >Hidden</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2" align="center"><button type="button" class="btn btn-sm <?=$site[0]->button;?> change_type" data-toggle="modal" data-colname="<?=$key;?>" data-tableid="<?=$ct[0]->cid;?>" data-target="#newform">Change Type</button></div>
                                    </div>
								   </div>
                                <?php endforeach ?>
                            </div>
                        <div class="clearfix" style="clear:both;"></div>
                    </form>
                </div>
                </div>
              </div>
			</div>
                    
                     <form name="ct_form" id="ct_form" method="post">
                           <div class="modal fade" id="newform" role="dialog">
                            <div class="modal-dialog modal-lg"> 
                              <div class="modal-content"> 
                                 <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Change Type</h4>
                                </div>
                                 <div class="modal-body">
                                    <div class="form-horizontal">
                                        <div class="form-group">
											<div class="row">
												<div class="col-md-12 text-center"><div class="relsyntax md" style="display:none;margin-bottom:10px;">relation('country','meta_location','id','local_name','type','CO')</div><div class="reldepsyntax md" style="display:none;margin-bottom:10px;">relation('region','meta_location','id','local_name','type','RE','in_location','country')</div></div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
												   <div class="col-md-3 mb"><input class="form-control" id="colname" value="<?=$key;?>" readonly type="text" name="col_name"></div>
												   <div class="col-md-3 mb">
													   <select name="type" class="form-control ct_manage" id="ct_manage" required>
														   <option value="" selected>Select Type</option>
														   <option value="none">None</option>
														   <option value="image">Image</option>
														   <option value="thumbs">Thumbs Image</option>
														   <option value="remote_image">Remote Image</option>
														   <option value="file">File</option>
														   <option value="password">Password</option>
														   <option value="select">Select</option>
														   <option value="datetime">Datetime</option>
														   <option value="textarea">Textarea</option>
														   <option value="int">Int</option>
														   <option value="text">Text</option>
														   <option value="timestamp">Timestamp</option>
														   <option value="relation">Relation</option>
														   <option value="relation_depend">Relation Depend</option>
														   <option value="join">Join</option>
														   <option value="highlight">Highlight</option>
														   <option value="highlight_row">Highlight row</option>
														   <option value="map">Google Map</option>
													   </select>
													</div>
												</div>
											</div>
                                        </div>
										<div class="form-group">
											<div class="col-md-12"><div class="from_div row" style="display: flex !important;"></div></div>
										</div>
                                    </div>
                                     <input type="hidden" name="ct_submit" value="<?=$ct[0]->cid;?>">
                                </div>
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="change_type_save">Save</button>
                                </div>
                             </div> 
                            </div> 
                         </div>
                    </form>

	<!-- Color Picker Plugin JavaScript -->
	<script src="<?=base_url();?>plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="<?=base_url();?>plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>




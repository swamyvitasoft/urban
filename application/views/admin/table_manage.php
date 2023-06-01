<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-md-4 col-xs-12">
                        <h4 class="page-title"><?=$title;?></h4> </div>
                    <div class="col-lg-9 col-md-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?=admin_url();?>">Home</a></li>
							<li><a href="<?=admin_url();?>tables">Tables</a></li>
                            <li class="active">Manage</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="white-box">
                <div class="box-body">
                    <form method="post" class="form-material form-horizontal" action="<?=admin_url();?>tables/manage/<?=$tname;?>">
                      <div class="btn-group mb">
                        <button type="submit" name="ctsubmit" id="ctsubmit" data-loading-text="Loading..." class="btn btn-primary" autocomplete="off">Save</button>
                        <a href="<?=admin_url();?>tables"  class="btn btn-warning">Back</a>
                      </div>
                            <div class="form-horizontal">
								<div class="form-group">
									<div class="row">
										<div class="col-md-12"><?=isset($_POST['ctsubmit'])? validation_errors() : '';?></div>
									</div>
								</div>
                                <div class="form-group">
									<div class="row">
										<label class="control-label col-sm-4">Table Name</label>
										<div class="col-sm-4"><input class="form-control" value="<?=$tname;?>" data-ptname="<?=$tname;?>" name="tablename" id="hidetablename" readonly type="text"></div><div class="col-sm-4"><a href="<?=admin_url();?>tables/columns/<?=$tname;?>" class="btn <?=$site[0]->button;?> mb">Add Columns</a></div>
									</div>
                                </div>
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                                <div class="form-group">
									<div class="row">
                                        <label class="col-sm-2" style="text-align:center">Column Name</label>
                                        <label class="col-sm-2" style="text-align:center">Type</label>
                                        <label class="col-sm-2" style="text-align:center">Lenght/Values</label>
                                        <label class="col-sm-1" style="text-align:center">Default</label>
                                        <label class="col-sm-1" style="text-align:center">Null</label>
                                        <label class="col-sm-1" style="text-align:center">Primary</label>
										<label class="col-sm-1" style="text-align:center">Auto</label>
										<label class="col-sm-2" style="text-align:center">Action</label>
									</div>
                                </div>
								<?php /* print_r($colums); */  foreach($colums as $colum) : ?>
								 <div class="form-group">
									<div class="row">
                                        <input class="form-control" value="<?=$colum->name;?>" readonly required type="hidden" name="column[]">
										<div class="col-sm-2 mb"><input class="form-control" value="<?=$colum->name;?>" readonly  type="text" name="rename[]"></div>
										<div class="col-sm-2 mb">
											<select class="form-control" name="type[]">
												<option value="INT" <?=($colum->type == 'int') ? 'selected' : '';?> >INT</option>
												<option value="VARCHAR" <?=($colum->type == 'varchar') ? 'selected' : '';?> >VARCHAR</option>
												<option value="TEXT" <?=($colum->type == 'text') ? 'selected' : '';?> >TEXT</option>
												<option value="MEDIUMTEXT" <?=($colum->type == 'mediumtext') ? 'selected' : '';?> >MEDIUMTEXT</option>
												<option value="LONGTEXT" <?=($colum->type == 'longtext') ? 'selected' : '';?> >LONGTEXT</option>
												<option value="DATE" <?=($colum->type == 'date') ? 'selected' : '';?> >DATE</option>
												<option value="TINYINT" <?=($colum->type == 'tinyint') ? 'selected' : '';?> >TINYINT</option>
												<option value="FLOAT" <?=($colum->type == 'float') ? 'selected' : '';?> >FLOAT</option>
												<option value="ENUM" <?=($colum->type == 'enum') ? 'selected' : '';?> >ENUM</option>
											</select>
										</div>
										<div class="col-sm-2 mb"><input class="form-control" value="<?=$colum->max_length;?>"  type="text" min="1" max="255" name="lenght[]"></div>
										<div class="col-sm-1 mb">
											<select name="default[]"  class="form-control">
												<option value="NONE" selected="selected">None</option>
												<option value="USER_DEFINED">As defined:</option>
												<option value="NULL">NULL</option>
												<option value="CURRENT_TIMESTAMP">CURRENT_TIMESTAMP</option>
											</select>
										</div>
										<div class="col-sm-1 mb" align="center"><input class="js-switch" data-color="#99d683" data-size="small" value="true"  type="checkbox" name="null[]"></div>
										<div class="col-sm-1 mb" align="center"><input class="js-switch" data-color="#99d683" data-size="small" value="<?=$colum->primary_key;?>"  type="checkbox" <?=($colum->primary_key == 1) ? 'checked' : '' ;?> name="primary[]"></div>
										<div class="col-sm-1 mb" align="center"><input class="js-switch" data-color="#99d683" data-size="small" value="true"  type="checkbox" name="auto[]"></div>
										<div class="col-sm-2 mb pull-right" align="center"><button class="btn btn-warning btn-sm bthmlrn renamecolumn" data-toggle="modal" data-name="<?=$colum->name;?>" data-type="<?=$colum->type;?>" data-lenght="<?=$colum->max_length;?>" type="button" data-target="#rename_column" title="Rename Column" alt="Rename Column"  ><i class="glyphicon glyphicon-pencil"></i></button><a class="btn btn-danger btn-sm bthmlrn delete-alert" data-toggle="tooltip" data-placement="bottom" title="Delete"  href="<?=admin_url();?>tables/columndelete/<?=$tname;?>/<?=$colum->name;?>" alt="Delete"  ><i class="glyphicon glyphicon-trash"></i></a></div>
									</div>	
								</div>
								<?php endforeach; ?>
                                    
                            </div>
                        <div class="clearfix" style="clear:both;"></div>
                    </form>
                </div>
              </div>
            </div>
          </div>
		</div>
<form name="rename_form" id="rename_form" class="rename_form form-material form-horizontal" method="post">
<div class="modal fade" id="rename_column" role="dialog">
	<div class="modal-dialog modal-md"> 
                              <div class="modal-content"> 
                                 <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Rename Column - <span id="rename"></span></h4>
                                </div>
                                 <div class="modal-body">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-md-12 mb">
												<input class="form-control" id="columnname" required readonly type="text" name="columnname">
                                            </div>
											<div class="col-md-12 mb">
												<input class="form-control" id="renamecol"  type="text" name="rename">
                                            </div>
                                        </div>
										<input value="<?=$tname;?>" name="tablename" class="tablename" type="hidden">
										<input name="type" id="type" type="hidden">
										<input name="lenght" id="lenght" type="hidden">
										<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
										<div class="loading"></div>
                                     	<div class="manage_eff"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary columnRename">Save</button>
                                </div>
                             </div> 
                            </div> 
</div>
</form>
<script>
    jQuery(document).ready(function() {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
    });
</script>

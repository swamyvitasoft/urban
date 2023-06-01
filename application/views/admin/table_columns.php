<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-md-4 col-xs-12">
                        <h4 class="page-title"><?=$title;?></h4> </div>
                    <div class="col-lg-9 col-md-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?=admin_url();?>">Home</a></li>
							<li><a href="<?=admin_url();?>tables">Tables</a></li>
							<li><a href="<?=admin_url();?>tables/manage/<?=$tname;?>"><?=ucfirst($tname);?></a></li>
                            <li class="active">Add Columns</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="white-box">
                <div class="box-body">
                    <form method="post" class="form-material form-horizontal" action="<?=admin_url();?>tables/columns/<?=$tname;?>" >
                      <div class="btn-group mb">
                        <button type="submit" name="ctsubmit" id="ctsubmit" data-loading-text="Loading..." class="btn btn-primary" autocomplete="off">Save</button>
                        <a href="<?=admin_url();?>tables/manage/<?=$tname;?>"  class="btn btn-warning">Back</a>
                      </div>
                            <div class="form-horizontal">
								<div class="form-group">
									<div class="row">
										<div class="col-md-12 m-t-10"><?=isset($_POST['ctsubmit'])? validation_errors().$succ : '';?></div>
									</div>
								</div>
                                <div class="form-group">
									<div class="row">
										<label class="control-label col-sm-4">Table Name</label>
										<div class="col-sm-4"><input class="form-control" value="<?=$tname;?>" data-ptname="<?=$tname;?>" name="tablename" id="hidetablename" readonly required type="text"></div>
									</div>
                                </div>
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                                <div class="form-group">
									<div class="row">
                                        <label class="col-sm-2" style="text-align:center">Column Name</label>
                                        <label class="col-sm-2" style="text-align:center">After/Beginning</label>
                                        <label class="col-sm-2" style="text-align:center">Type</label>
                                        <label class="col-sm-2" style="text-align:center">Lenght/Values</label>
                                        <label class="col-sm-2" style="text-align:center">Default</label>
                                        <label class="col-sm-1" style="text-align:center">Primary</label>
										<label class="col-sm-1" style="text-align:center">Auto</label>
									</div>
                                </div>
								 <div class="form-group">
									<div class="row">
                                        <div class="col-sm-2 mb"><input class="form-control" type="text" name="column"></div>
											<div class="col-sm-2 mb">
												<select class="form-control" name="position" required >
													<option value="" selected="selected"></option>
													<option value="first" >at beginning of table</option>
													<?php foreach($colums as $colum) : ?>
													<option value="<?=$colum;?>" >after <?=$colum;?></option>
													<?php endforeach; ?>
												</select>
											</div>
										<div class="col-sm-2 mb">
											<select class="form-control" name="type">
												<option value="INT" >INT</option>
												<option value="VARCHAR" >VARCHAR</option>
												<option value="TEXT" >TEXT</option>
												<option value="MEDIUMTEXT" >MEDIUMTEXT</option>
												<option value="LONGTEXT" >LONGTEXT</option>
												<option value="DATE" >DATE</option>
												<option value="TINYINT" >TINYINT</option>
												<option value="FLOAT" >FLOAT</option>
												<option value="ENUM" >ENUM</option>
											</select>
										</div>
										<div class="col-sm-2 mb"><input class="form-control" type="text" name="lenght"></div>
										<div class="col-sm-2 mb">
											<select name="default"  class="form-control">
												<option value="NONE" selected="selected">None</option>
												<option value="USER_DEFINED">As defined:</option>
												<option value="NULL">NULL</option>
												<option value="CURRENT_TIMESTAMP">CURRENT_TIMESTAMP</option>
											</select>
										</div>
										<div class="col-sm-1 mb" align="center"><input class="js-switch" data-color="#99d683" data-size="small" type="checkbox" name="primary"></div>
										<div class="col-sm-1 mb" align="center"><input class="js-switch" data-color="#99d683" data-size="small" type="checkbox" name="auto"></div>
										</div>
									</div>
								</div>
                                    
                            </div>
                        <div class="clearfix" style="clear:both;"></div>
                    </form>
                </div>
              </div>
            </div>
        </div>
<script>
    jQuery(document).ready(function() {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
    });
</script>

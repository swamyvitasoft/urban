<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-md-4 col-xs-12">
                        <h4 class="page-title"><?=$title;?></h4> </div>
                    <div class="col-lg-9 col-md-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?=admin_url();?>">Home</a></li>
							<li><a href="<?=admin_url();?>tables">Tables</a></li>
                            <li class="active">Add</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div> 
          <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <form method="post" class="form-material form-horizontal" action="<?=admin_url();?>tables/add">
                      <div class="btn-group mb">
                        <button type="submit" name="ctsubmit" class="btn btn-primary">Save &amp; Back</button>
						<button type="submit" name="ctsubmit_new" class="btn btn-default">Save &amp; New</button>
						<button type="submit" name="ctsubmit_edit" class="btn btn-default">Save &amp; Edit</button>
                        <a href="<?=admin_url();?>tables"  class="btn btn-warning">Back</a>
                      </div>
                        <div class="gps-view">
                            <div class="form-horizontal">
								<div class="form-group">
									<div class="row">
										<div class="col-md-12 m-t-10"><?=(isset($_POST['ctsubmit']) || isset($_POST['ctsubmit_new']) || isset($_POST['ctsubmit_edit'])) ? validation_errors().$succ : '';?></div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
                                    <label class="control-label col-md-3">Table Name</label>
                                    <div class="col-md-8"><input class="form-control" name="tablename" required type="text"></div>
									</div>
                                </div>
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
		</div>
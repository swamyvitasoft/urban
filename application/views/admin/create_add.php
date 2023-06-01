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
                            <li class="active">Add</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
              <div class="row">
			  	<div class="col-lg-12">
                    <div class="white-box">
					  <form method="post" class="form-material form-horizontal" action="<?=admin_url('create/add');?>">
						  <div class="btn-group mb">
							<button type="submit" name="ctsubmit" class="btn btn-primary">Save &amp; Back</button>
							<button type="submit" name="ctsubmit_new" class="btn btn-default">Save &amp; New</button>
							<button type="submit" name="ctsubmit_edit" class="btn btn-default">Save &amp; Edit</button>
							<a href="<?=admin_url();?>create"  class="btn btn-warning">Back</a>
						  </div>
                          <div class="gps-view">
								<div class="form-group">
									<div class="row">
										<div class="col-md-12 m-t-10"><?=(isset($_POST['ctsubmit']) || isset($_POST['ctsubmit_new']) || isset($_POST['ctsubmit_edit'])) ? validation_errors().$succ : '';?></div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label class="col-md-3 form-control-label">Title</label>
										<div class="col-md-8"><input class="form-control" name="tntitle" required type="text"></div>
									</div>
                                </div>
								<div class="form-group">
									<div class="row">
										<label for="inputName" class="col-md-3 form-control-label">Select Table</label>
										<div class="col-md-8">
										  <select class="form-control" name="ctname" id="inputName" style="width: 30% !important;">
											<?php foreach($tables as $table) : if($table != 'admin' && $table != 'change_type' && $table != 'admin_sessions' && $table != 'create_table' && $table != 'css' && $table != 'js' && $table != 'settings' && $table != 'type' && $table != 'menu') { ?>
												<option value="<?=$table;?>" ><?=$table;?></option>
											<?php } endforeach; ?>
											</select>
										</div>
									</div>
                      			</div>
                      			<div class="form-group">
									<div class="row">
										<label for="inputName" class="col-md-3 form-control-label">Select Table Type</label>
										<div class="col-md-8">
										  <select class="form-control" name="cttype" class="cttype" id="cttype" style="width: 30% !important;">
												<option value="cms" >CMS</option>
												<option value="custom">Custom</option>
											</select>
										</div>
									</div>
                      			</div>
                      			 <div class="form-group">
    									<div class="row">
    										<label class="form-control-label col-md-3">Icon</label>
    										<div class="col-md-8"><input class="form-control" name="cticon" type="text" required></div>
    									</div>
                                    </div>
                                    <div class="form-group">
    									<div class="row">
                                            <label for="ctcolor" class="form-control-label col-md-3">Dashboard background Color</label>
                                            <div class="col-md-8"><input id="ctcolor" class="form-control colorpicker" name="ctcolor" type="text"></div>
    									</div>
                                    </div>
    								<div class="form-group">
    									<div class="row">
                                        <label for="count" class="form-control-label col-md-3">Show Count</label>
                                        <div class="col-md-2" align="left"><input type="checkbox" id="count" class="js-switch"  name="ctcount" value="show" data-color="#99d683" data-size="small" /></div>
    									</div>
                                    </div>
    								<div class="form-group">
    									<div class="row">
                                        <label for="count_menu" class="form-control-label col-md-3">Show Count in menu</label>
                                        <div class="col-md-2" align="left"><input type="checkbox" id="count_menu" class="js-switch"  name="ctmcount" value="show" data-color="#99d683" data-size="small" /></div>
    									</div>
                                    </div>
                                    <div class="form-group">
    									<div class="row">
    										<label for="display" class="form-control-label col-md-3">Display on home page</label>
    										<div class="col-md-2"><input type="checkbox" checked id="display" class="js-switch" name="ctdisplay" value="show" data-color="#99d683" data-size="small" /></div>
    									</div>
                                    </div>
    								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                      			
                                    <div class="form-group">
    									<div class="row">
    										<label class="form-control-label col-md-3"></label>
    										<div class="col-md-3" align="center"><b>Active</b></div>
    										<div class="col-md-3" align="center"><b>Inactive</b></div>
    									</div>
                                    </div>
                                    <div class="form-group">
    									<div class="row">
    										<label class="form-control-label col-md-3">Title</label>
    										<div class="col-md-3" align="center">
    											<input type="radio" class="check" value="active" name="cttitle" data-radio="iradio_square-green">
    										</div>
    										<div class="col-md-3" align="center">
    											<input type="radio" class="check" value="inactive" checked="" name="cttitle" data-radio="iradio_square-green">
    										</div>
    									</div>
                                    </div>
                                    <div class="form-group">
    									<div class="row">
    										<label class="form-control-label col-md-3">Add Button</label>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctadd" value="active" checked="" type="radio"></div>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctadd" value="inactive"  type="radio"></div>
    									</div>
                                    </div>
                                    <div class="form-group">
    									<div class="row">
    										<label class="form-control-label col-md-3">Edit Button</label>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctedit" value="active" checked="" type="radio"></div>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctedit" value="inactive"  type="radio"></div>
    									</div>
                                    </div>
                                    <div class="form-group">
    									<div class="row">
    										<label class="form-control-label col-md-3">View Button</label>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctview" value="active" checked="" type="radio"></div>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctview" value="inactive"  type="radio"></div>
    									</div>
                                    </div>
                                    <div class="form-group">
    									<div class="row">
    										<label class="form-control-label col-md-3">Remove Button</label>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctremove" value="active" checked="" type="radio"></div>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctremove" value="inactive"  type="radio"></div>
    									</div>
                                    </div>
                                <div class="iscustom">
                                    <div class="form-group">
    									<div class="row">
    										<label class="form-control-label col-md-3">Csv Button</label>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctcsv" value="active" checked="" type="radio"></div>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctcsv" value="inactive"  type="radio"></div>
    									</div>
                                    </div>
                                    <div class="form-group">
    									<div class="row">
    										<label class="form-control-label col-md-3">Print Button</label>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctprint" value="active" checked="" type="radio"></div>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctprint" value="inactive"  type="radio"></div>
    									</div>
                                    </div>
                                    <div class="form-group">
    									<div class="row">
    										<label class="form-control-label col-md-3">Search Button</label>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctsearch" value="active" checked="" type="radio"></div>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctsearch" value="inactive"  type="radio"></div>
    									</div>
                                    </div>
                                    <div class="form-group">
    									<div class="row">
    										<label class="form-control-label col-md-3">Numbers Button</label>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctnumbers" value="active" checked="" type="radio"></div>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctnumbers" value="inactive"  type="radio"></div>
    									</div>
                                    </div>
                                    <div class="form-group">
    									<div class="row">
    										<label class="form-control-label col-md-3">Pagination Button</label>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctpagination" value="active" checked="" type="radio"></div>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctpagination" value="inactive"  type="radio"></div>
    									</div>
                                    </div>
                                    <div class="form-group">
    									<div class="row">
    										<label class="form-control-label col-md-3">Limitlist Button</label>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctlimitlist" value="active" checked="" type="radio"></div>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctlimitlist" value="inactive"  type="radio"></div>
    									</div>
                                    </div>
                                    <div class="form-group">
    									<div class="row">
    										<label class="form-control-label col-md-3">Sortable Button</label>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctsortable" value="active" checked="" type="radio"></div>
    										<div class="col-md-3" align="center"><input class="check"  data-radio="iradio_square-green" name="ctsortable" value="inactive"  type="radio"></div>
    									</div>
                                    </div>
                                </div>
                        </div>
                      </form>
                    </div>
                </div>
			  </div>
			</div>
	<!-- Color Picker Plugin JavaScript -->
		<script src="<?=base_url();?>plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="<?=base_url();?>plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
	<script>
        jQuery(document).ready(function() {
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function() {
                new Switchery($(this)[0], $(this).data());
            });
        });
        $(".colorpicker").asColorPicker()
    </script>

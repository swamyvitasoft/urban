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
                            <li class="active">Edit</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
              <div class="row">
			  	<div class="col-lg-12">
                    <div class="white-box">
                    <form method="post" class="form-material form-horizontal" action="<?=admin_url();?>create/edit/<?=$ct[0]->table_name;?>">
					  <div class="btn-group mb">
                        <button type="submit" name="ctsubmit" class="btn btn-primary">Save &amp; Back</button>
						<button type="submit" name="ctsubmit_new" class="btn btn-default">Save &amp; New</button>
						<button type="submit" name="ctsubmit_edit" class="btn btn-default">Save &amp; Edit</button>
                        <a href="<?=admin_url();?>create"  class="btn btn-warning">Back</a>
                      </div>
                          <div class="gps-view">
                            <div class="form-horizontal">
								<div class="form-group">
									<div class="row">
										<div class="col-md-12 m-t-10"><?=isset($_POST['ctsubmit'])? validation_errors().$succ : '';?></div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
                                    <label for="tntitle" class="form-control-label col-md-3">Title</label>
                                    <div class="col-md-8"><input class="form-control" id="tntitle" name="tntitle" value="<?=$ct[0]->cttitle;?>" required type="text"></div>
									</div>
                                </div>
								<div class="form-group">
									<div class="row">
									<label for="ctname" class="col-md-3 form-control-label">Select Table</label>
									<div class="col-md-8">
									  <select class="form-control" name="ctname" id="ctname" style="width: 30% !important;">
									  	<?php foreach($tables as $table) : if($table != 'admin' && $table != 'change_type' && $table != 'admin_sessions' && $table != 'create_table' && $table != 'css' && $table != 'js' && $table != 'settings' && $table != 'type' && $table != 'menu') { ?>
											<option value="<?=$table;?>" <?=($ct[0]->table_name == $table) ? 'selected' : '';?> ><?=$table;?></option>
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
												<option value="cms" <?=($ct[0]->table_type == 'cms') ? 'selected' : '';?>>CMS</option>
												<option value="custom" <?=($ct[0]->table_type == 'custom') ? 'selected' : '';?>>Custom</option>
											</select>
										</div>
									</div>
                      			</div>
                                <div class="form-group">
									<div class="row">
                                        <label for="cticon" class="form-control-label col-md-3">Icon</label>
                                        <div class="col-md-8"><input id="cticon" class="form-control" name="cticon" value="<?=$ct[0]->icon;?>"  type="text"></div>
									</div>
                                </div>
                                <div class="form-group">
									<div class="row">
                                        <label for="ctcolor" class="form-control-label col-md-3">Dashboard background Color</label>
                                        <div class="col-md-8"><input id="ctcolor" class="form-control colorpicker" name="ctcolor" value="<?=($ct[0]->bg_color != '')?$ct[0]->bg_color:'';?>"  type="text"></div>
									</div>
                                </div>
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
								<div class="form-group">
									<div class="row">
                                    <label for="count" class="form-control-label col-md-3">Show Count</label>
                                    <div class="col-md-2" align="left"><input type="checkbox" id="count" class="js-switch"  name="ctcount" value="show" <?=!empty($permissions->count) ? ($permissions->count == 'show') ? 'checked' : '' : '' ;?> data-color="#99d683" data-size="small" /></div>
									</div>
                                </div>
								<div class="form-group">
									<div class="row">
                                    <label for="count_menu" class="form-control-label col-md-3">Show Count in menu</label>
                                    <div class="col-md-2" align="left"><input type="checkbox" id="count_menu" class="js-switch"  name="ctmcount" value="show" <?=!empty($permissions->count_menu) ? ($permissions->count_menu == 'show') ? 'checked' : '' : '' ;?> data-color="#99d683" data-size="small" /></div>
									</div>
                                </div>
                                <div class="form-group">
									<div class="row">
                                    <label for="display" class="form-control-label col-md-3">Display on home page</label>
                                    <div class="col-md-2" align="left"><input type="checkbox" id="display" class="js-switch"  name="ctdisplay" value="show" <?=!empty($permissions->display) ? ($permissions->display == 'show') ? 'checked' : '' : '' ;?> data-color="#99d683" data-size="small" /></div>
									</div>
                                </div>
                            
                                <div class="form-group">
									<div class="row">
                                    <label class="form-control-label col-md-3"></label>
                                    <div class="col-md-3" align="center"><b>Active</b></div>
                                    <div class="col-md-3" align="center"><b>Inactive</b></div>
									</div>
                                </div>
                                <div class="form-group">
									<div class="row">
                                    <label for="title" class="form-control-label col-md-3">Title</label>
                                    <div class="col-md-3" align="center"><input class="check" id="title"  data-radio="iradio_square-green" name="cttitle" value="active" <?=($permissions->title == 'active') ? 'checked' : '' ;?> type="radio"></div>
                                    <div class="col-md-3" align="center"><input class="check" id="title"  data-radio="iradio_square-green" name="cttitle" value="inactive" <?=($permissions->title == 'inactive') ? 'checked' : '' ;?> type="radio"></div>
									</div>
                                </div>
                                <div class="form-group">
									<div class="row">
                                    <label for="add" class="form-control-label col-md-3">Add Button</label>
                                    <div class="col-md-3" align="center"><input id="add" class="check"  data-radio="iradio_square-green" name="ctadd" value="active" <?=($permissions->add == 'active') ? 'checked' : '' ;?> type="radio"></div>
                                    <div class="col-md-3" align="center"><input id="add" class="check"  data-radio="iradio_square-green" name="ctadd" value="inactive" <?=($permissions->add == 'inactive') ? 'checked' : '' ;?>  type="radio"></div>
									</div>
                                </div>
                                <div class="form-group">
									<div class="row">
                                    <label for="edit" class="form-control-label col-md-3">Edit Button</label>
                                    <div class="col-md-3" align="center"><input id="edit" class="check"  data-radio="iradio_square-green" name="ctedit" value="active" <?=($permissions->edit == 'active') ? 'checked' : '' ;?> type="radio"></div>
                                    <div class="col-md-3" align="center"><input id="edit" class="check"  data-radio="iradio_square-green" name="ctedit" value="inactive" <?=($permissions->edit == 'inactive') ? 'checked' : '' ;?>  type="radio"></div>
									</div>
                                </div>
                                <div class="form-group">
									<div class="row">
                                    <label for="view" class="form-control-label col-md-3">View Button</label>
                                    <div class="col-md-3" align="center"><input id="view" class="check"  data-radio="iradio_square-green" name="ctview" value="active" <?=($permissions->view == 'active') ? 'checked' : '' ;?> type="radio"></div>
                                    <div class="col-md-3" align="center"><input id="view" class="check"  data-radio="iradio_square-green" name="ctview" value="inactive" <?=($permissions->view == 'inactive') ? 'checked' : '' ;?>  type="radio"></div>
									</div>
                                </div>
                                <div class="form-group">
									<div class="row">
                                    <label for="remove" class="form-control-label col-md-3">Remove Button</label>
                                    <div class="col-md-3" align="center"><input id="remove" class="check"  data-radio="iradio_square-green" name="ctremove" value="active" <?=($permissions->remove == 'active') ? 'checked' : '' ;?> type="radio"></div>
                                    <div class="col-md-3" align="center"><input id="remove" class="check"  data-radio="iradio_square-green" name="ctremove" value="inactive" <?=($permissions->remove == 'inactive') ? 'checked' : '' ;?>  type="radio"></div>
									</div>
                                </div>
                                <div class="iscustom">
                                <div class="form-group">
									<div class="row">
                                    <label for="csv" class="form-control-label col-md-3">Csv Button</label>
                                    <div class="col-md-3" align="center"><input id="csv" class="check"  data-radio="iradio_square-green" name="ctcsv" value="active" <?=($permissions->csv == 'active') ? 'checked' : '' ;?> type="radio"></div>
                                    <div class="col-md-3" align="center"><input id="csv" class="check"  data-radio="iradio_square-green" name="ctcsv" value="inactive" <?=($permissions->csv == 'inactive') ? 'checked' : '' ;?>  type="radio"></div>
									</div>
                                </div>
                                <div class="form-group">
									<div class="row">
                                    <label for="print" class="form-control-label col-md-3">Print Button</label>
                                    <div class="col-md-3" align="center"><input id="print" class="check"  data-radio="iradio_square-green" name="ctprint" value="active" <?=($permissions->print == 'active') ? 'checked' : '' ;?> type="radio"></div>
                                    <div class="col-md-3" align="center"><input id="print" class="check"  data-radio="iradio_square-green" name="ctprint" value="inactive" <?=($permissions->print == 'inactive') ? 'checked' : '' ;?>  type="radio"></div>
									</div>
                                </div>
                                <div class="form-group">
									<div class="row">
                                    <label for="search" class="form-control-label col-md-3">Search Button</label>
                                    <div class="col-md-3" align="center"><input id="search" class="check"  data-radio="iradio_square-green" name="ctsearch" value="active" <?=($permissions->search == 'active') ? 'checked' : '' ;?> type="radio"></div>
                                    <div class="col-md-3" align="center"><input id="search" class="check"  data-radio="iradio_square-green" name="ctsearch" value="inactive" <?=($permissions->search == 'inactive') ? 'checked' : '' ;?>  type="radio"></div>
									</div>
                                </div>
                                <div class="form-group">
									<div class="row">
                                    <label for="number" class="form-control-label col-md-3">Numbers Button</label>
                                    <div class="col-md-3" align="center"><input id="number" class="check"  data-radio="iradio_square-green" name="ctnumbers" value="active" <?=($permissions->numbers == 'active') ? 'checked' : '' ;?> type="radio"></div>
                                    <div class="col-md-3" align="center"><input id="number" class="check"  data-radio="iradio_square-green" name="ctnumbers" value="inactive" <?=($permissions->numbers == 'inactive') ? 'checked' : '' ;?>  type="radio"></div>
									</div>
                                </div>
                                <div class="form-group">
									<div class="row">
                                    <label for="pagi" class="form-control-label col-md-3">Pagination Button</label>
                                    <div class="col-md-3" align="center"><input id="pagi" class="check"  data-radio="iradio_square-green" name="ctpagination" value="active" <?=($permissions->pagination == 'active') ? 'checked' : '' ;?> type="radio"></div>
                                    <div class="col-md-3" align="center"><input id="pagi" class="check"  data-radio="iradio_square-green" name="ctpagination" value="inactive" <?=($permissions->pagination == 'inactive') ? 'checked' : '' ;?>  type="radio"></div>
									</div>
                                </div>
                                <div class="form-group">
									<div class="row">
                                    <label for="limit" class="form-control-label col-md-3">Limitlist Button</label>
                                    <div class="col-md-3" align="center"><input id="limit" class="check"  data-radio="iradio_square-green" name="ctlimitlist" value="active" <?=($permissions->limitlist == 'active') ? 'checked' : '' ;?> type="radio"></div>
                                    <div class="col-md-3" align="center"><input id="limit" class="check"  data-radio="iradio_square-green" name="ctlimitlist" value="inactive" <?=($permissions->limitlist == 'inactive') ? 'checked' : '' ;?>  type="radio"></div>
									</div>
                                </div>
                                <div class="form-group">
									<div class="row">
                                    <label for="sort" class="form-control-label col-md-3">Sortable Button</label>
                                    <div class="col-md-3" align="center"><input id="sort" class="check"  data-radio="iradio_square-green" name="ctsortable" value="active" <?=($permissions->sortable == 'active') ? 'checked' : '' ;?> type="radio"></div>
                                    <div class="col-md-3" align="center"><input id="sort" class="check"  data-radio="iradio_square-green" name="ctsortable" value="inactive" <?=($permissions->sortable == 'inactive') ? 'checked' : '' ;?>  type="radio"></div>
                                    <input name="ctid" value="<?=$ct[0]->cid;?>" required type="hidden">
									</div>
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


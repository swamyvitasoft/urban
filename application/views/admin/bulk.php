<div id="page-wrapper">
    <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><?=$title;?></h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?=base_url()?>">Home</a></li>
                            <li class="active"><?=$title;?></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<div class="row">
                    <div class="col-md-3 col-sm-6">
                        <a href="javascript::void(0);" data-toggle="modal" data-target="#bulk_upload">
						<div class="white-box bg-info">
                            <h3 class="title text-white">Card(s)</h3>
                            <ul class="list-inline two-part">
                                <li><span style="color: #ffffff;margin-left: 20px;"><i class="fa fa-users"></i></span></li>
                                <li class="text-right" style="color: #fff;"><span class="counter"><?php echo count_all_results('cards');?></span></li>
                            </ul>
                        </div></a>
                    </div>
                </div>
                <!--row -->
            </div>
<?php if($this->session->userdata('logged_in')['role'] == 'superadmin' || $this->session->userdata('logged_in')['role'] == 'admin'){ ?>
<!-- bulk upload modal starts here -->
<form class="form-horizontal" role="form" action="<?=base_url('bulk/cards');?>" enctype="multipart/form-data" method="post">
    <div class="modal fade" id="bulk_upload">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Bulk Upload</h4>
            </div>
            <div class="modal-body">
                <div class="col-xs-12">
                    <div class="alert alert-danger">**Please follow this <a href="<?=base_url('uploads/bulk/sample.csv');?>" download >sample.csv</a> type of file format and structure.</div>
                </div>
                <div class="form-group <?=form_error('file') ? 'has-error' : ''?>">
                    <div class="col-xs-12">
                        <label for="photo" class="col-xs-12 text-left control-label">
                            Upload CSV <span class="text-red"> *</span>
                        </label>
                            <input type="file" class="form-control" accept=".csv" required name="file"/>
                        <small class="text-danger">(File Type : '.csv') & (File Size : Max 10mb)</small>
                    </div>
                </div>
            </div>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal">Close</button>
                <input type="submit" id="upload_csv" class="btn btn-info" value="Upload" />
            </div>
        </div>
      </div>
    </div>
</form>
<!-- bulk upload end here --> 
<?php } ?>
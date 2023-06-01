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
                    <!-- /.col-lg-12 -->
                </div> 
				<div class="row">
					<div class="col-lg-12">
						<div class="white-box">
							<div class="d-flex align-items-center m-b-20">
								<div class="row">
									<div class="col-md-6">
										<div class="pull-left"><a href="<?=admin_url();?>tables/add" class="btn <?=$site[0]->button;?> mb"><i class="glyphicon glyphicon-plus-sign"></i> Add</a></div>
									</div>
									<div class="col-md-6">
										<div class="pull-right"><a href="<?=admin_url();?>tables/export" class="btn btn-default">Export All Tables</a></div>
									</div>
								</div>
							</div>
							<div class="table-responsive">
							  <table id="tables-export" class="display nowrap" cellspacing="0" width="100%">
								<thead>
								  <tr>
									<th>#</th>
									<th>Table Name</th>
									<th>Action</th>
								  </tr>
								</thead>
								<tbody>
								<?php $no=1; foreach($tables as $table): if($table != 'admin' && $table != 'change_type' && $table != 'admin_sessions' && $table != 'create_table' && $table != 'css' && $table != 'js' && $table != 'settings' && $table != 'type' && $table != 'menu') { ?>
								  <tr>
									<td><?=$no;?></td>
									<td><?=$table;?></td>
									<td><a class="btn btn-info btn-sm bthmlrn" data-toggle="tooltip" data-placement="bottom" title="Manage" href="<?=admin_url();?>tables/manage/<?=$table;?>" alt="Manage" ><i class="glyphicon glyphicon-tasks"></i></a><a class="btn btn-warning btn-sm bthmlrn" data-toggle="tooltip" data-placement="bottom" title="Edit"  href="<?=admin_url();?>tables/edit/<?=$table;?>"  alt="Edit" ><i class="glyphicon glyphicon-pencil "></i></a><a class="btn btn-danger btn-sm bthmlrn delete-alert" data-toggle="tooltip" data-placement="bottom" title="Delete"  href="<?=admin_url();?>tables/delete/<?=$table;?>" alt="Delete"  ><i class="glyphicon glyphicon-trash"></i></a></td>
								  </tr>
								<?php $no++; } endforeach; ?>
								</tbody>
								<tfoot>
								  <tr>
									<th>#</th>
									<th>Table Name</th>
									<th>Action</th>
								  </tr>
								</tfoot>
							  </table>
							</div>
						</div>
					</div>
				</div>
			</div>
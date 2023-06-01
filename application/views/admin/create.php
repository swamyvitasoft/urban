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
						  <a href="<?=admin_url();?>create/add" class="btn <?=$site[0]->button;?> mb"><i class="glyphicon glyphicon-plus-sign"></i> Add</a>
						</div>
						<?php if($tables != false) { ?>
						<div class="table-responsive">
						  <table id="tables-export" class="display nowrap">
							<thead>
							  <tr>
								<th>#</th>
								<th>Title</th>
								<th>Table Name</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody>
							<?php $no=1; foreach($tables as $create): ?>
							  <tr>
								<th scope="row"><?=$no;?></td>
								<td><?=$create->cttitle;?></td>
								<td><?=$create->table_name;?></td>
								<td><a class="btn btn-info btn-sm bthmlrn" data-toggle="tooltip" data-placement="bottom" title="Manage" href="<?=admin_url();?>create/manage/<?=$create->table_name;?>" alt="Manage" ><i class="glyphicon glyphicon-tasks"></i></a><a class="btn btn-warning btn-sm bthmlrn" data-toggle="tooltip" data-placement="bottom" title="Edit"  href="<?=admin_url();?>create/edit/<?=$create->table_name;?>"  alt="Edit" ><i class="glyphicon glyphicon-pencil "></i></a><a class="btn btn-danger btn-sm bthmlrn delete-alert" data-toggle="tooltip" data-placement="bottom" title="Delete"  href="<?=admin_url();?>create/delete/<?=$create->table_name;?>" alt="Delete"  ><i class="glyphicon glyphicon-trash"></i></a></td>
							  </tr>
							<?php $no++; endforeach; ?>
							</tbody>
							<tfoot>
							  <tr>
								<th>#</th>
								<th>Title</th>
								<th>Table Name</th>
								<th>Action</th>
							  </tr>
							</tfoot>
						  </table>
						</div>
						<?php } else { ?>
						<div class="row">
							<div class="col-lg-12">
								<section id="wrapper" class="error-page">
									<div class="error-box" style="position: relative;">
										<div class="error-body text-center">
											<h2>No Data</h2>
										</div>
									</div>
								</section>
							</div>
						</div>
						<?php } ?>
					  </div>
					</div>
				</div>
            </div>
<div id="page-wrapper">
    <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?=admin_url()?>">Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
				<div class="row">
				   <?php if($site != false){ switch($site[0]->theme){ case 'purple-dark': case 'purple': $bgcolor = '#ab8ce4'; break; case 'default-dark': case 'default': $bgcolor = '#fb9678'; break; case 'green-dark': case 'green': $bgcolor = '#00c292'; break; case 'gray-dark': case 'gray': $bgcolor = '#a0aec4'; break; case 'blue-dark': case 'blue': $bgcolor = '#03a9f3'; break; case 'megna-dark': case 'megna': $bgcolor = '#01c0c8'; break;  default: $bgcolor = ''; break; } } 
				    foreach($tables as $tname ) : $pages = json_decode($tname->permissions); if(!empty($pages->display)) { if($pages->display == 'show') { if(permissions($userdata[0]->permissions,$tname->table_name) || $this->session->userdata('logged_in')['role'] == 'superadmin'){  ?>
                    <div class="col-md-3 col-sm-6">
                    <?php $table_type1= $this->adminpanel->getTableType($tname->table_name);if($table_type1[0]->table_type == 'cms') { ?>
                        <a href="<?=admin_url()?>cms/<?=str_replace('_','-',$tname->table_name);?>">
                    <?php } else { ?>
                        <a href="<?=admin_url($c->table_name);?>">
                    <?php } ?>
						<div class="white-box" style="background: <?=($tname->bg_color != '')?$tname->bg_color:$bgcolor;?>" >
                            <h3 class="title"><?=ucfirst($tname->cttitle);?></h3>
                            <ul class="list-inline two-part">
                                <li><span style="color: #ffffff;margin-left: 20px;"><i class="<?=$tname->icon;?>"></i></span>
                                </li>
                                <li class="text-right" style="color: #fff;"><span class="counter"><?php  if($pages->count == 'show') { echo count_all_results($tname->table_name); } ?></span></li>
                            </ul>
                        </div></a>
                    </div>
    				<?php } } } endforeach ?>
                    <?php if($this->session->userdata('logged_in')['role'] == 'superadmin') { ?>
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
						<div class="white-box" style="background: <?=$bgcolor;?>" >
                            <h3 class="title">Admin(s)</h3>
                            <ul class="list-inline two-part">
                                <li><span style="color: #ffffff;margin-left: 20px;"><i class="fa fa-users"></i></span></li>
                                <li class="text-right" style="color: #fff;"><span class="counter"><?php echo $this->db->count_all_results('admin');?></span></li>
                            </ul>
                        </div></a>
                    </div>
                    <?php } ?>
                </div>
                <!--row -->
            </div>
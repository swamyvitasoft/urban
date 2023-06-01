
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-md-4 col-xs-12">
                        <h4 class="page-title"><?=$title;?></h4> </div>
                    <div class="col-lg-9 col-md-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?=admin_url();?>">Home</a></li>
							<li><a href="<?=admin_url();?>cms/customers"><?=$title;?></a></li>
                            <li class="active">Edit</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="<?=(isset($_GET['a']) && $_GET['a'] != '')?'':'active';?> nav-item"><a href="#general" class="nav-link" aria-controls="general" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> General Information</span></a></li>
                                <li role="presentation" class="<?=(isset($_GET['a']) && $_GET['a'] == 'otherinfo')?'active':'';?> nav-item"><a href="#otherinfo" class="nav-link" aria-controls="otherinfo" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Other Information</span></a></li>
                                <li role="presentation" class="<?=(isset($_GET['a']) && $_GET['a'] == 'account')?'active':'';?> nav-item"><a href="#account" class="nav-link" aria-controls="account" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Account Details</span></a></li>
                                <li role="presentation" class="<?=(isset($_GET['a']) && $_GET['a'] == 'splrates')?'active':'';?> nav-item"><a href="#splrates" class="nav-link" aria-controls="splrates" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Special Rates </span></a></li>
                                <li role="presentation" class="<?=(isset($_GET['a']) && $_GET['a'] == 'other')?'active':'';?> nav-item"><a href="#other" class="nav-link" aria-controls="other" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Other Settings </span></a></li>
                                <li role="presentation" class="<?=(isset($_GET['a']) && $_GET['a'] == 'cnotes')?'active':'';?> nav-item"><a href="#cnotes" class="nav-link" aria-controls="cnotes" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Notes</span></a></li>
                                <!-- <li role="presentation" class="<?=(isset($_GET['a']) && $_GET['a'] == 'zonerates')?'active':'';?> nav-item"><a href="#zonerates" class="nav-link" aria-controls="zonerates" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Zone Rates and LCL</span></a></li> -->
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane <?=(isset($_GET['a']) && $_GET['a'] != '')?'':'active';?>" id="general">
                                    <form class="form-horizontal" action="<?=admin_url('customers/edit/'.$this->uri->segment(3));?>" method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-12">Company Name*</label>
												<div class="col-md-12">
													<input type="text" class="form-control" name="companyname" value="<?=(set_value('companyname'))?set_value('companyname'):$getCustomers[0]->companyname;?>" placeholder="Company Name">
												    <span><?=form_error('companyname'); ?></span>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-12">Username*</label>
												<div class="col-md-12">
													<input type="text" class="form-control" name="username" value="<?=(set_value('username'))?set_value('username'):$getCustomers[0]->username;?>" placeholder="Username">
												<span><?=form_error('username'); ?></span>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-12">Password*</label>
												<div class="col-md-12">
													<input type="password" class="form-control" name="password" value="<?=(set_value('password'))?set_value('password'):$getCustomers[0]->password;?>" placeholder="Password">
													<span><?=form_error('password'); ?></span>
											    </div>
											</div>
											<div class="form-group">
												<label class="col-md-12" for="example-email">Email Id* </label>
												<div class="col-md-12">
													<input type="email" class="form-control" id="example-email" name="email" value="<?=(set_value('email'))?set_value('email'):$getCustomers[0]->emailid;?>" placeholder="Email">
													<span><?=form_error('email'); ?></span>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-12">First Name*</label>
												<div class="col-md-12">
													<input type="text" class="form-control" name="firstname" value="<?=(set_value('firstname'))?set_value('firstname'):$getCustomers[0]->firstname;?>" placeholder="First Name">
													<span><?=form_error('firstname'); ?></span>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-12">Last Name*</label>
												<div class="col-md-12">
													<input type="text" class="form-control" name="lastname" value="<?=(set_value('lastname'))?set_value('lastname'):$getCustomers[0]->lastname;?>" placeholder="Last Name">
													<span><?=form_error('lastname'); ?></span>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-12">Mobile Number*</label>
												<div class="col-md-12">
													<input type="text" class="form-control" name="mobilenumber" value="<?=(set_value('mobilenumber'))?set_value('mobilenumber'):$getCustomers[0]->mobilenumber;?>" placeholder="Mobile Number">
													<span><?=form_error('mobilenumber'); ?></span>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-12">Office Number</label>
												<div class="col-md-12">
													<input type="text" class="form-control" name="officenumber" value="<?=(set_value('officenumber'))?set_value('officenumber'):$getCustomers[0]->officenumber;?>" placeholder="Office Number">
													<span><?=form_error('officenumber'); ?></span>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-12">ABN</label>
												<div class="col-md-12">
													<input type="text" class="form-control" name="abn" value="<?=(set_value('abn'))?set_value('abn'):$getCustomers[0]->abn;?>" placeholder="ABN">
													<span><?=form_error('abn'); ?></span>
												</div>
											</div>
												<div class="form-group">
													<label class="col-md-12">Suburb</label>
													<div class="col-md-12">
														<select name="suburb" class="select2 custom-select col-12" id="inlineFormCustomSelect">
															<option value="" >Choose...</option>
															<?php if($suburbs != false){ foreach($suburbs as $suburb ){ $suburbValue = $suburb->suburb.', '.$suburb->state.', '.$suburb->pincode; ?>
															    <option value="<?=$suburbValue;?>" <?=set_select('suburb', $suburbValue, (isset($getCustomers) && $getCustomers[0]->suburb == $suburbValue)?TRUE:''); ?> ><?=$suburbValue;?></option>
															<?php } } ?>
														</select>
													</div>
												</div>
											<div class="form-group">
												<label class="col-md-12">Address</label>
												<div class="col-md-12">
													<textarea class="form-control" name="address" rows="7" placeholder="Address"><?=(set_value('address'))?set_value('address'):$getCustomers[0]->address;?></textarea>
													<span><?=form_error('address'); ?></span>
												</div>
											</div>											
											<div class="form-group">
												<label class="col-md-12">Date Entry</label>
												<div class="col-md-12">
													<input type="text" class="form-control" name="dataentry" value="<?=(set_value('dataentry'))?set_value('dataentry'):$getCustomers[0]->dataentry;?>" placeholder="Data Entry">
													<span><?=form_error('dataentry'); ?></span>
												</div>
											</div>
										</div>
									</div>
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
									<div class="row">											
											<div class="form-group">
												<div class="col-md-12">
													<button type="submit" name="general_update" class="btn btn-block btn-info">Save</button>
												</div>
											</div>
										</div>
									</form>
									<div class="clearfix"></div>
								</div>
                                <div role="tabpanel" class="tab-pane <?=(isset($_GET['a']) && $_GET['a'] == 'otherinfo')?'active':'';?>" id="otherinfo">
                                    <form class="form-horizontal" action="<?=admin_url('customers/edit/'.$this->uri->segment(3));?>?a=otherinfo" method="post">
									
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<div class="form-check bd-example-indeterminate">
														<label class="custom-control custom-checkbox">
															<input type="checkbox" name="cashaccount" value="1" <?=set_checkbox('cashaccount', '1',(isset($otherinfo) && $otherinfo[0]->cashaccount == '1')?TRUE:''); ?> name="cashaccount" class="custom-control-input">
															<span class="custom-control-indicator"></span>
															<span class="custom-control-description"> Cash Account  </span>
														</label>
														<span><?=form_error('cashaccount'); ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">													
													<div class="form-check">
														<label class="custom-control custom-checkbox">
															<input type="checkbox" name="trading" value="1" <?=set_checkbox('trading', '1',(isset($otherinfo) && $otherinfo[0]->trading == '1')?TRUE:''); ?> class="custom-control-input">
															<span class="custom-control-indicator"></span>
															<span class="custom-control-description">Trading</span>
														</label>
														<span><?=form_error('trading'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">												
												<div class="form-group">
													<label class="col-md-12">Master</label>
													<div class="col-md-12">
														<select class="custom-select col-12" id="inlineFormCustomSelect" name="master" >
															<option selected>Choose...</option>
															<option value="1" <?=set_select('master', '1', (isset($otherinfo) && $otherinfo[0]->master == '1')?TRUE:''); ?> >Sydney Plt Transport</option>
														</select>
														<span><?=form_error('master'); ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Category</label>
													<div class="col-md-12">
														<select class="custom-select col-12" id="inlineFormCustomSelect" name="category" >
															<option value="">Choose...</option>
															<option value="Transport" <?=set_select('category', 'Transport', (isset($otherinfo) && $otherinfo[0]->category == 'Transport')?TRUE:''); ?> >Transport</option>
                                        					<option value="Warehouse" <?=set_select('category', 'Warehouse', (isset($otherinfo) && $otherinfo[0]->category == 'Warehouse')?TRUE:''); ?>>Warehouse</option>
                                        					<option value="Freight" <?=set_select('category', 'Freight', (isset($otherinfo) && $otherinfo[0]->category == 'Freight')?TRUE:''); ?>>Freight</option>
                                        					<option value="Others" <?=set_select('category', 'Others', (isset($otherinfo) && $otherinfo[0]->category == 'Others')?TRUE:''); ?>>Others</option>
														</select>
														<span><?=form_error('category'); ?></span>
													</div>
												</div>
											</div>
										</div>
										
										<div class="row">										
											<div class="col-md-12">
												<div class="form-group">
													<div class="form-check bd-example-indeterminate">
														<label class="custom-control custom-checkbox">
															<input type="checkbox" name="refreq" value="1" <?=set_checkbox('refreq', '1',(isset($otherinfo) && $otherinfo[0]->refreq == '1')?TRUE:''); ?> class="custom-control-input">
															<span class="custom-control-indicator"></span>
															<span class="custom-control-description">Ref. Required </span>
														</label>
														<span><?=form_error('refreq'); ?></span>
														<label class="custom-control custom-checkbox">
															<input type="checkbox" name="podreq" value="1" <?=set_checkbox('podreq', '1',(isset($otherinfo) && $otherinfo[0]->podreq == '1')?TRUE:''); ?> class="custom-control-input">
															<span class="custom-control-indicator"></span>
															<span class="custom-control-description">POD Required</span>
														</label>
														<span><?=form_error('podreq'); ?></span>
														<label class="custom-control custom-checkbox">
															<input type="checkbox" name="prioritycust" value="1" <?=set_checkbox('prioritycust', '1',(isset($otherinfo) && $otherinfo[0]->prioritycust == '1')?TRUE:''); ?> class="custom-control-input">
															<span class="custom-control-indicator"></span>
															<span class="custom-control-description">Priority Customer</span>
														</label>
														<span><?=form_error('prioritycust'); ?></span>
														<label class="custom-control custom-checkbox">
															<input type="checkbox" name="dailyrepreq" value="1" <?=set_checkbox('dailyrepreq', '1',(isset($otherinfo) && $otherinfo[0]->dailyrepreq == '1')?TRUE:''); ?> class="custom-control-input">
															<span class="custom-control-indicator"></span>
															<span class="custom-control-description">Daily Report Required</span>
														</label>
														<span><?=form_error('dailyrepreq'); ?></span>
														<label class="custom-control custom-checkbox">
															<input type="checkbox" name="bookingprompt" value="1" <?=set_checkbox('bookingprompt', '1',(isset($otherinfo) && $otherinfo[0]->bookingprompt == '1')?TRUE:''); ?> class="custom-control-input">
															<span class="custom-control-indicator"></span>
															<span class="custom-control-description">Booking Prompt</span>
														</label>
														<span><?=form_error('bookingprompt'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
											<label>Account Contact </label>
												<div class="form-group">
													<label class="col-md-12">Name</label>
													<div class="col-md-12">
														<input type="text" class="form-control" name="accountname" value="<?=(set_value('accountname'))?set_value('accountname'):(isset($otherinfo)?$otherinfo[0]->accountname:'');?>" placeholder="Name">
												    <span><?=form_error('accountname'); ?></span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-12">Phone</label>
													<div class="col-md-12">
														<input type="text" class="form-control" name="accountphone" value="<?=(set_value('accountphone'))?set_value('accountphone'):(isset($otherinfo)?$otherinfo[0]->accountphone:'');?>" placeholder="Phone">
												    <span><?=form_error('accountphone'); ?></span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-12">Email</label>
													<div class="col-md-12">
														<input type="email" class="form-control" name="accountemail" value="<?=(set_value('accountemail'))?set_value('accountemail'):(isset($otherinfo)?$otherinfo[0]->accountemail:'');?>" placeholder="Email">
												    <span><?=form_error('accountemail'); ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
											<label>Operation Contact </label>
												<div class="form-group">
													<label class="col-md-12">Name</label>
													<div class="col-md-12">
														<input type="text" class="form-control" name="operationname" value="<?=(set_value('operationname'))?set_value('operationname'):(isset($otherinfo)?$otherinfo[0]->operationname:'');?>" placeholder="Name">
												    <span><?=form_error('operationname'); ?></span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-12">Phone</label>
													<div class="col-md-12">
														<input type="text" class="form-control" name="operationphone" value="<?=(set_value('operationphone'))?set_value('operationphone'):(isset($otherinfo)?$otherinfo[0]->operationphone:'');?>" placeholder="Phone">
												    <span><?=form_error('operationphone'); ?></span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-12">Email</label>
													<div class="col-md-12">
														<input type="email" class="form-control" name="operationemail" value="<?=(set_value('operationemail'))?set_value('operationemail'):(isset($otherinfo)?$otherinfo[0]->operationemail:'');?>" placeholder="Email">
												    <span><?=form_error('operationemail'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<div class="form-check bd-example-indeterminate">
														<label class="custom-control custom-checkbox">
															<input type="checkbox" name="senddailyreportemail" value="1" <?=set_checkbox('senddailyreportemail', '1',(isset($otherinfo) && $otherinfo[0]->senddailyreportemail == '1')?TRUE:''); ?> class="custom-control-input">
															<span class="custom-control-indicator"></span>
															<span class="custom-control-description">Send Daily Report By Email</span>
														</label>
														<span><?=form_error('senddailyreportemail'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<button type="submit" name="other_update" class="btn btn-block btn-info">Save</button>
												</div>
											</div>
										</div>
									</form>
									<div class="clearfix"></div>
                                </div>
								<div role="tabpanel" class="tab-pane <?=(isset($_GET['a']) && $_GET['a'] == 'account')?'active':'';?>" id="account">
                                    <form class="form-horizontal" action="<?=admin_url('customers/edit/'.$this->uri->segment(3));?>?a=account" method="post">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Rates Link to Set</label>
													<div class="col-md-12">
														<select class="custom-select col-12" id="inlineFormCustomSelect" name="linktoset">
															<option value="">Choose...</option>
															<option value="1" <?=set_select('linktoset', '1', (isset($account) && $account[0]->linktoset == '1')?TRUE:''); ?> >Master Rates</option>
															<option value="2" <?=set_select('linktoset', '2', (isset($account) && $account[0]->linktoset == '2')?TRUE:''); ?> >Special Rates</option>
														</select>
														<span><?=form_error('linktoset'); ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Discount Rates %</label>
													<div class="col-md-12">
														<input type="number" step="any" class="form-control" name="discountrates" value="<?=(set_value('discountrates'))?set_value('discountrates'):(isset($account)?$account[0]->discountrates:'');?>" placeholder="Discount Rates %">
												    <span><?=form_error('discountrates'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Acc/Fee %</label>
													<div class="col-md-12">
														<input type="number" step="any" class="form-control" name="accfee" value="<?=(set_value('accfee'))?set_value('accfee'):(isset($account)?$account[0]->accfee:'');?>" placeholder="Acc/Fee %">
												    <span><?=form_error('accfee'); ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Credit Days</label>
													<div class="col-md-12">
														<input type="text" class="form-control" name="creditdays" value="<?=(set_value('creditdays'))?set_value('creditdays'):(isset($account)?$account[0]->creditdays:'');?>" placeholder="Credit Days">
												    <span><?=form_error('creditdays'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Credit Limit $</label>
													<div class="col-md-12">
														<input type="number" step="any" class="form-control" name="creditlimit" value="<?=(set_value('creditlimit'))?set_value('creditlimit'):(isset($account)?$account[0]->creditlimit:'');?>" placeholder="Credit Limit">
												    <span><?=form_error('creditlimit'); ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Fuel Levy (%)</label>
													<div class="col-md-12">
														<input type="number" step="any" class="form-control" name="fuellevy" value="<?=(set_value('fuellevy'))?set_value('fuellevy'):(isset($account)?$account[0]->fuellevy:'');?>" placeholder="Fuel Levy">
												    <span><?=form_error('fuellevy'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Futile (%)</label>
													<div class="col-md-12">
														<input type="number" step="any" class="form-control" name="futile" value="<?=(set_value('futile'))?set_value('futile'):(isset($account)?$account[0]->futile:'');?>" placeholder="Futile">
												    <span><?=form_error('futile'); ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Return (%)</label>
													<div class="col-md-12">
														<input type="number" step="any" class="form-control" name="returnj" value="<?=(set_value('returnj'))?set_value('returnj'):(isset($account)?$account[0]->returnj:'');?>" placeholder="Return">
												    <span><?=form_error('returnj'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Cancellation $</label>
													<div class="col-md-12">
														<input type="number" step="any" class="form-control" name="cancel" value="<?=(set_value('cancel'))?set_value('cancel'):(isset($account)?$account[0]->cancel:'');?>" placeholder="Cancellation">
												    <span><?=form_error('cancel'); ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Toll Levy (%)</label>
													<div class="col-md-12">
														<input type="number" step="any" class="form-control" name="tolllevy" value="<?=(set_value('tolllevy'))?set_value('tolllevy'):(isset($account)?$account[0]->tolllevy:'');?>" placeholder="Toll Levy">
												    <span><?=form_error('tolllevy'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">WT Charges</label>
													<div class="col-md-12">
														<input type="number" step="any" class="form-control" name="wtime" value="<?=(set_value('wtime'))?set_value('wtime'):(isset($account)?$account[0]->wtime:'');?>" placeholder="WT Charges">
												    <span><?=form_error('wtime'); ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">WT/Free</label>
													<div class="col-md-12">
														<input type="number" step="any" class="form-control" name="wtfree" value="<?=(set_value('wtfree'))?set_value('wtfree'):(isset($account)?$account[0]->wtfree:'');?>" placeholder="WT/Free">
												    <span><?=form_error('wtfree'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12"> Trading Terms</label>
													<div class="col-md-12">
														<select class="custom-select col-12" id="inlineFormCustomSelect" name="tradingterms" >
															<option value="" >Choose...</option>
															<option value="Weekly" <?=set_select('tradingterms', 'Weekly', (isset($account) && $account[0]->tradingterms == 'Weekly')?TRUE:''); ?> >Weekly</option>
                                        					<option value="Fortnightly" <?=set_select('tradingterms', 'Fortnightly', (isset($account) && $account[0]->tradingterms == 'Fortnightly')?TRUE:''); ?> >Fortnightly</option>
                                        					<option value="Monthly" <?=set_select('tradingterms', 'Monthly', (isset($account) && $account[0]->tradingterms == 'Monthly')?TRUE:''); ?> >Monthly</option>
														</select>
														<span><?=form_error('tradingterms'); ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Long Distance Surcharge (%)</label>
													<div class="col-md-12">
														<input type="number" step="any" class="form-control" name="distance" value="<?=(set_value('distance'))?set_value('distance'):(isset($account)?$account[0]->distance:'');?>" placeholder="Long Distance Surcharge">
												        <span><?=form_error('distance'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Overdue Acc. Fee %</label>
													<div class="col-md-12">
														<input type="number" step="any" class="form-control" name="overdueaccfee" value="<?=(set_value('overdueaccfee'))?set_value('overdueaccfee'):(isset($account)?$account[0]->overdueaccfee:'');?>" placeholder="Overdue Fee">
												    <span><?=form_error('overdueaccfee'); ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Manager </label>
													<div class="col-md-12">
														<input type="text" class="form-control" name="managerdetails" value="<?=(set_value('managerdetails'))?set_value('managerdetails'):(isset($account)?$account[0]->managerdetails:'');?>" placeholder="Manager">
												    <span><?=form_error('managerdetails'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Manager Email</label>
													<div class="col-md-12">
														<input type="text" class="form-control" name="manageremail" value="<?=(set_value('manageremail'))?set_value('manageremail'):(isset($account)?$account[0]->manageremail:'');?>" placeholder="Email">
												    <span><?=form_error('manageremail'); ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Sales Rep</label>
													<div class="col-md-12">
														<input type="text" class="form-control" name="salesrepd" value="<?=(set_value('salesrepd'))?set_value('salesrepd'):(isset($account)?$account[0]->salesrepd:'');?>" placeholder="Sales Rep">
												    <span><?=form_error('salesrepd'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Percentage %</label>
													<div class="col-md-12">
														<input type="number" step="any" class="form-control" name="manpercentage" value="<?=(set_value('manpercentage'))?set_value('manpercentage'):(isset($account)?$account[0]->manpercentage:'');?>" placeholder="Percentage">
												    <span><?=form_error('manpercentage'); ?></span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-12">Not Apply GST</label>
													<div class="form-check bd-example-indeterminate">
														<label class="custom-control custom-checkbox">
															<input type="checkbox" name="notapplygst" value="1" <?=set_checkbox('notapplygst', '1',(isset($account) && $account[0]->notapplygst == '1')?TRUE:''); ?> class="custom-control-input">
															<span class="custom-control-indicator"></span>
															<span class="custom-control-description">Not Apply GST</span>
														</label>
														<span><?=form_error('notapplygst'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
										<div class="row">											
											<div class="form-group">
												<div class="col-md-12">
													<button type="submit" name="account_update" class="btn btn-block btn-info">Save</button>
												</div>
											</div>
										</div>
											
											
									</form>
                                    <div class="clearfix"></div>
                                </div>
								<div role="tabpanel" class="tab-pane <?=(isset($_GET['a']) && $_GET['a'] == 'splrates')?'active':'';?>" id="splrates">
                                    <form class="form-horizontal" action="<?=admin_url('customers/edit/'.$this->uri->segment(3));?>?a=splrates" method="post">
									<?php if($services != false){ foreach($services as $key => $service){ $splrates = $this->get->table('customerservices',array('customerid' => $this->uri->segment(3), 'code' => $service->service_name)); ?>
									<div class="row">	
									    <div class="col-md-4">								
											<div class="form-group">
												<label class="col-md-12">Code</label>
												<div class="col-md-12">
													<input type="text" class=" col-md-12 form-control" name="code[<?=$key;?>]" value="<?=(set_value('code['.$key.']'))?set_value('code['.$key.']'):((($splrates != false) && $splrates[0]->code == $service->service_name)?$service->service_name:$service->service_name);?>" readonly placeholder="Code">
												    <span><?=form_error('code'); ?></span>
												</div>
											</div>
										</div>
										<div class="col-md-4">								
											<div class="form-group">
												<label class="col-md-12">Description</label>
												<div class="col-md-12">
													<textarea class=" col-md-12 form-control" name="description[<?=$key;?>]" placeholder="Description"><?=(set_value('description['.$key.']'))?set_value('description['.$key.']'):((($splrates != false) && $splrates[0]->code == $service->service_name)?$splrates[0]->description:'');?></textarea>
												    <span><?=form_error('description'); ?></span>
												</div>
											</div>
										</div>
										<div class="col-md-4">								
											<div class="form-group">
												<label class="col-md-12">Rate $</label>
												<div class="col-md-12">
													<input type="number" step="any" class="col-md-12 form-control" name="rate[<?=$key;?>]" value="<?=(set_value('rate['.$key.']'))?set_value('rate['.$key.']'):((($splrates != false) && $splrates[0]->code == $service->service_name)?$splrates[0]->rate:'');?>" placeholder="">
												    <span><?=form_error('rate'); ?></span>
												</div>
											</div>
										</div>
									</div>
									<?php } ?>
									    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
										<div class="row">											
											<div class="form-group">
												<div class="col-md-12">
													<button type="submit" value="1" name="splrates_update" class="btn btn-block btn-info">Save</button>
												</div>
											</div>
										</div>
									<?php } ?>
									</form>
                                    <div class="clearfix"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane <?=(isset($_GET['a']) && $_GET['a'] == 'other')?'active':'';?>" id="other">
                                    <form class="form-horizontal" action="<?=admin_url('customers/edit/'.$this->uri->segment(3));?>?a=other" method="post">
									<div class="row">	
										<div class="col-md-6">		
												<div class="form-group">
													<label class="col-md-12">Default Service</label>
													<div class="col-md-12">
														<select class="custom-select col-12" id="inlineFormCustomSelect" name="defaultservice" >
															<option value="">Choose...</option>
															<option value="1" <?=set_select('defaultservice', '1', (isset($settings) && $settings[0]->defaultservice == '1')?TRUE:''); ?> >Skid - 100kgs</option>
															<option value="2" <?=set_select('defaultservice', '2', (isset($settings) && $settings[0]->defaultservice == '2')?TRUE:''); ?> >HTS - 500kgs</option>
															<option value="3" <?=set_select('defaultservice', '3', (isset($settings) && $settings[0]->defaultservice == '3')?TRUE:''); ?> >1TS - 1000kgs</option>
															<option value="4" <?=set_select('defaultservice', '4', (isset($settings) && $settings[0]->defaultservice == '4')?TRUE:''); ?> >2TS - 2000KGS</option>
															<option value="5" <?=set_select('defaultservice', '5', (isset($settings) && $settings[0]->defaultservice == '5')?TRUE:''); ?> >4TS - 4000KGS</option>
															<option value="6" <?=set_select('defaultservice', '6', (isset($settings) && $settings[0]->defaultservice == '6')?TRUE:''); ?> >6TS - 6000KGS</option>
															<option value="7" <?=set_select('defaultservice', '7', (isset($settings) && $settings[0]->defaultservice == '7')?TRUE:''); ?> >All Day Pallet Rate</option>
														</select>
														<span><?=form_error('defaultservice'); ?></span>
													</div>
												</div>
										</div>
										<div class="col-md-6">								
											<div class="form-group">
												<label class="col-md-12">Customer References Notes</label>
												<div class="col-md-12">
													<textarea class=" col-md-12 form-control" name="customerreferencenotes" placeholder="Customer References Notes"><?=(set_value('customerreferencenotes'))?set_value('customerreferencenotes'):(isset($settings)?$settings[0]->customerreferencenotes:'');?></textarea>
												    <span><?=form_error('customerreferencenotes'); ?></span>
												</div>
											</div>
										</div>
									</div>
									    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
										<div class="row">											
											<div class="form-group">
												<div class="col-md-12">
													<button type="submit" name="setting_update" class="btn btn-block btn-info">Save</button>
												</div>
											</div>
										</div>
									</form>
                                    <div class="clearfix"></div>
                                </div>
								
                                <div role="tabpanel" class="tab-pane <?=(isset($_GET['a']) && $_GET['a'] == 'cnotes')?'active':'';?>" id="cnotes">
                                    <form class="form-horizontal" action="<?=admin_url('customers/edit/'.$this->uri->segment(3));?>?a=cnotes" method="post">
									<div class="row">	
										<div class="col-md-6">								
											<div class="form-group">
												<label class="col-md-12">Notes</label>
												<div class="col-md-12">
													<textarea class=" col-md-12 form-control" name="notes" placeholder="Notes"><?=(set_value('notes'))?set_value('notes'):(isset($note)?$note[0]->notes:'');?></textarea>
												    <span><?=form_error('notes'); ?></span>
												</div>
											</div>
										</div>
										<div class="col-md-6">								
											<div class="form-group">
												<label class="col-md-12">Booking Screen Notes</label>
												<div class="col-md-12">
													<textarea class=" col-md-12 form-control" name="bookingscreennotes" placeholder="Booking Screen Notes"><?=(set_value('bookingscreennotes'))?set_value('bookingnotes'):(isset($note)?$note[0]->bookingscreennotes:'');?></textarea>
												    <span><?=form_error('bookingscreennotes'); ?></span>
												</div>
											</div>
										</div>
									</div>
									    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
										<div class="row">											
											<div class="form-group">
												<div class="col-md-12">
													<button type="submit" name="cnotes_update" class="btn btn-block btn-info">Save</button>
												</div>
											</div>
										</div>
									</form>
                                    <div class="clearfix"></div>
                                </div>
                                <!--
                                <div role="tabpanel" class="tab-pane <?=(isset($_GET['a']) && $_GET['a'] == 'zonerates')?'active':'';?>" id="zonerates">
                                    <h3>Zone Rates and LCL</h3>
                                    <div class="clearfix"></div>
                                </div>
                                -->
                            </div>
                        </div>
                    </div>
                    
                   
                </div>
                
                
            </div>
           
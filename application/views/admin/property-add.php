<div id="page-wrapper">
    <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Property</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?=base_url()?>">Home</a></li>
                            <li class="active">Add Property</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body wizard-content">
                                <form action="#" class="tab-wizard wizard-circle">
                                    <!-- Step 1 -->
                                    <h6>Property Info</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">Title :</label>
                                                    <input type="text" class="form-control" id="title"> </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="propertyType">Property Type :</label>
                                                    <select class="custom-select form-control" id="propertyType" name="location">
                                                        <option value="">Select Type</option>
                                                        <option value="apartment">Apartment</option>
                                                        <option value="independent">Individual / Independent</option>
                                                        <option value="villa">Villa</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="availableFrom">Available From :</label>
                                                    <input type="date" class="form-control" id="availableFrom">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">Description :</label>
                                                    <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="builtYear">Built Year :</label>
                                                    <select class="custom-select form-control" id="builtYear" name="builtYear">
                                                        <option value="">Select Year</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="date1">Area (in SQFT) :</label>
                                                    <input type="number" class="form-control" id="date1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="date1">Bedrooms :</label>
                                                    <input type="number" class="form-control" id="date1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="date1">Bathrooms :</label>
                                                    <input type="number" class="form-control" id="date1"> </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="date1">Parkings :</label>
                                                    <input type="number" class="form-control" id="date1"> </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="date1">Balconies :</label>
                                                    <input type="number" class="form-control" id="date1"> </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Location & Price</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="address">Address :</label>
                                                    <input type="text" class="form-control" id="address"> </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="region">Region :</label>
                                                    <select class="custom-select form-control" id="region" name="region">
                                                        <option value="">Select Region</option>
                                                        <option value="apartment">Apartment</option>
                                                        <option value="independent">Individual / Independent</option>
                                                        <option value="villa">Villa</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="district">District :</label>
                                                    <select class="custom-select form-control" id="district" name="district">
                                                        <option value="">Select District</option>
                                                        <option value="apartment">Apartment</option>
                                                        <option value="independent">Individual / Independent</option>
                                                        <option value="villa">Villa</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="suburb">Suburb :</label>
                                                    <select class="custom-select form-control" id="suburb" name="suburb">
                                                        <option value="">Select Suburb</option>
                                                        <option value="apartment">Apartment</option>
                                                        <option value="independent">Individual / Independent</option>
                                                        <option value="villa">Villa</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="actualPrice">Actual Price :</label>
                                                    <input type="number" class="form-control" id="actualPrice"> </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="offerPrice">Offer Price :</label>
                                                    <input type="number" class="form-control" id="offerPrice">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="duration">Duration :</label>
                                                    <select class="custom-select form-control" id="duration" name="duration">
                                                        <option value="">Select Duration</option>
                                                        <option value="week">Week</option>
                                                        <option value="month">Month</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Media</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="thumbnail">Thumbnail :</label>
                                                    <input type="file" id="input-file-now" class="dropify" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="images">Images :</label>
                                                    <input type="file" id="input-file-now" class="dropify" />
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 4 -->
                                    <h6>Amenities</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="amenities">Amenities :</label>
                                                    <div class="c-inputs-stacked">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Lift</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Gas Pipeline</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Fridge</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Washing Machine</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Sofa</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Stove</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Intercom</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Lift</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Gas Pipeline</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Fridge</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Washing Machine</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Sofa</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Stove</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Intercom</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Lift</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Gas Pipeline</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Fridge</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Washing Machine</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Sofa</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Stove</span> 
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="inline custom-control custom-checkbox block">
                                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> 
                                                                    <span class="custom-control-description ml-0">Intercom</span> 
                                                                </label>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
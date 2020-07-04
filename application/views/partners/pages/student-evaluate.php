<!-- main content -->
            <div class="container content">
                <div class="row">
                    <div class="col-md-4">
                        <?php $path = (!empty($results->USER_PHOTO)) ? base_url($results->USER_PHOTO) : base_url('assets/images/no_image.png'); ?>
                        <img src="<?php echo $path; ?>" class="rounded-circle" width="130px">
                        <legend><?php echo $results->FULL_NAME; ?></legend>
                        <label><?= $results->COMPANY_NAME; ?> | <?= $results->COMPANY_ADDRESS; ?></label>
                        <label><?= $results->SCHOOL_NAME; ?> | <?= $results->SCHOOL_ADDRESS; ?></label>
                        <table class="table table-responsive">
                            <tbody>
                                <thead class="table-success">
                                    <tr>
                                        <th>Descriptive Rating</th>
                                        <th>Numerical Rating</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>Excellent</td>
                                    <td>97 - 100</td>
                                </tr>
                                <tr>
                                    <td>Outstanding</td>
                                    <td>94 - 96</td>
                                </tr>
                                <tr>
                                    <td>Very Good</td>
                                    <td>91 - 93</td>
                                </tr>
                                <tr>
                                    <td>Good</td>
                                    <td>88 - 90</td>
                                </tr>
                                <tr>
                                    <td>Very Satisfactory</td>
                                    <td>85 - 87</td>
                                </tr>
                                <tr>
                                    <td>Throughly Satisfactory</td>
                                    <td>82 - 84</td>
                                </tr>
                                <tr>
                                    <td>Satisfactory</td>
                                    <td>79 - 81</td>
                                </tr>
                                <tr>
                                    <td>Fair</td>
                                    <td>76 - 78</td>
                                </tr>
                                <tr>
                                    <td>Passed</td>
                                    <td>75</td>
                                </tr>
                                <tr>
                                    <td>Failed</td>
                                    <td>Below 75%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-8">
                        <!-- Form Wizard -->
                        <div class="form-wizard form-header-classic form-body-classic">
                        <form role="form" class="evaluation-form" action="" method="post">

                            <h3>On The Job Training</h3>
                            <p>Evaluation Form</p>
                            
                            <!-- Form progress -->
                            <div class="form-wizard-steps form-wizard-tolal-steps-4">
                                <div class="form-wizard-progress">
                                    <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="4" style="width: 12.25%;"></div>
                                </div>
                                <!-- Step 1 -->
                                <div class="form-wizard-step active">
                                    <div class="form-wizard-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    <p>I</p>
                                </div>
                                <!-- Step 1 -->
                                
                                <!-- Step 2 -->
                                <div class="form-wizard-step">
                                    <div class="form-wizard-step-icon"><i class="fas fa-chart-bar"></i></div>
                                    <p>II</p>
                                </div>
                                <!-- Step 2 -->
                                
                                <!-- Step 3 -->
                                <div class="form-wizard-step">
                                    <div class="form-wizard-step-icon"><i class="fas fa-chart-line"></i></div>
                                    <p>III</p>
                                </div>
                                <!-- Step 3 -->
                                
                                <!-- Step 4 -->
                                <div class="form-wizard-step">
                                    <div class="form-wizard-step-icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                                    <p>IV</p>
                                </div>
                                <!-- Step 4 -->
                            </div>
                            <!-- Form progress -->
                            
                            
                            <!-- Form Step 1 -->
                            <fieldset>
                                <!-- Progress Bar -->
                                <div class="progress">
                                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                                  </div>
                                </div>
                                <!-- Progress Bar -->
                                <h4>I. Quality and Quantity of Work: (40%)</h4>
                                <div class="form-group">
                                    <label>1. Ability to perform the assigned work well</label>
                                    <input type="text" name="ability" placeholder="Input Numerical Rating" onkeypress="return this.value.length == 0 && event.which == 48 ? false : (event.which < 48 || event.which > 57) ? false : true;" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>2. Accuracy of work</label>
                                    <input type="text" name="accuracy" placeholder="Input Numerical Rating" onkeypress="return this.value.length == 0 && event.which == 48 ? false : (event.which < 48 || event.which > 57) ? false : true;" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>3. Volume of Work Accomplished</label>
                                    <input type="text" name="volume" placeholder="Input Numerical Rating" onkeypress="return this.value.length == 0 && event.which == 48 ? false : (event.which < 48 || event.which > 57) ? false : true;" class="form-control required">
                                </div>
                                <div class="form-wizard-buttons">
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>
                            <!-- Form Step 1 -->

                            <!-- Form Step 2 -->
                            <fieldset>
                                <!-- Progress Bar -->
                                <div class="progress">
                                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                  </div>
                                </div>
                                <!-- Progress Bar -->
                                <h4>I. Knowledge of Work: (40%)</h4>
                                <div class="form-group">
                                    <label>1. Knowledge of the Basic Principle Neccessary for the Accomplishment of assigned Work.</label>
                                    <input type="text" name="knowledge" onkeypress="return this.value.length == 0 && event.which == 48 ? false : (event.which < 48 || event.which > 57) ? false : true;" placeholder="Input Numerical Rating" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>2. Extent of Knowledge with regards to Department Operations.</label>
                                    <input type="text" name="extent" onkeypress="return this.value.length == 0 && event.which == 48 ? false : (event.which < 48 || event.which > 57) ? false : true;" placeholder="Input Numerical Rating" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>3. Ability to follow Instructions.</label>
                                    <input type="text" name="follow" onkeypress="return this.value.length == 0 && event.which == 48 ? false : (event.which < 48 || event.which > 57) ? false : true;" placeholder="Input Numerical Rating" class="form-control required">
                                </div>
                                <div class="form-wizard-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>
                            <!-- Form Step 2 -->

                            <!-- Form Step 3 -->
                            <fieldset>
                                <!-- Progress Bar -->
                                <div class="progress">
                                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                  </div>
                                </div>
                                <h4>I. Work Habits and Personality: (20%)</h4>
                                <div class="form-group">
                                    <label>1. Punctuality</label>
                                    <input type="text" name="punctuality" onkeypress="return this.value.length == 0 && event.which == 48 ? false : (event.which < 48 || event.which > 57) ? false : true;" placeholder="Input Numerical Rating" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>2. Attendance</label>
                                    <input type="text" name="attendance" onkeypress="return this.value.length == 0 && event.which == 48 ? false : (event.which < 48 || event.which > 57) ? false : true;" placeholder="Input Numerical Rating" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>3. Department/Behavior</label>
                                    <input type="text" name="department" onkeypress="return this.value.length == 0 && event.which == 48 ? false : (event.which < 48 || event.which > 57) ? false : true;" placeholder="Input Numerical Rating" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>4. Industry</label>
                                    <input type="text" name="industry" onkeypress="return this.value.length == 0 && event.which == 48 ? false : (event.which < 48 || event.which > 57) ? false : true;" placeholder="Input Numerical Rating" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>5. Interested and Enthusiasm in the Performance of Work</label>
                                    <input type="text" name="interested" onkeypress="return this.value.length == 0 && event.which == 48 ? false : (event.which < 48 || event.which > 57) ? false : true;" placeholder="Input Numerical Rating" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>6. Orderliness</label>
                                    <input type="text" name="orderliness" onkeypress="return this.value.length == 0 && event.which == 48 ? false : (event.which < 48 || event.which > 57) ? false : true;" placeholder="Input Numerical Rating" class="form-control required">
                                </div>
                                <div class="form-wizard-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>
                            <!-- Form Step 3 -->
                            
                            <!-- Form Step 4 -->
                            <fieldset>
                                <!-- Progress Bar -->
                                <div class="progress">
                                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                  </div>
                                </div>
                                <!-- Progress Bar -->
                                <div style="clear:both;"></div>
                                    <div class="success">
                                        <h3>Evaluation Success</h3>
                                        <div class="success-icon"><i class="fa fa-check" aria-hidden="true"></i></div>                    
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks:</label>
                                        <textarea name="remarks" class="form-control" placeholder="Enter comments" style="height: 100%"></textarea>
                                    </div>
                                <div class="form-wizard-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </fieldset>
                            <!-- Form Step 4 -->
                        
                        </form>
                        
                        </div>
                        <!-- Form Wizard -->
                    </div>
                </div>
                    
            </div>
        <!-- main content -->
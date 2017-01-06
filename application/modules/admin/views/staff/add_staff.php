<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>

$(document).ready(function() {
	$("form[name='add_staff']").submit(function(e) {
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "<?php echo base_url('admin/staff/add_process'); ?>",
            type: "POST",
            data: formData,
            async: false,
            success: function (msg) {
			$('body,html').animate({ scrollTop: 0 }, 200);
            $("#staff_ajax").html(msg); 
			$("#staff_submitbutton").html('<button type="submit" class="btn btn-embossed btn-primary">Save</button>');
			 
            $("form[name='add_staff']").find("input[type=text], input[type=checkbox]").val("");
        },
            cache: false,
            contentType: false,
            processData: false
        });

        e.preventDefault();
    });
});
 

 </script>
 
 <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-thin">
        <div class="header">
            <h2>Add Staff</h2>            
          </div>
           <div class="row">
           	<div class="col-md-12">
                  <div class="panel">
                     
                     <div class="panel-content">
                   					<div id="staff_ajax">                      	                       
				                          <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>                     	
				                           
				                      </div>
				                      
                  				    <form id="add_staff" name="add_staff" class="form-validation" accept-charset="utf-8" enctype="multipart/form-data" method="post">
 
                        				
                        				 
                        				<div class="row">
                          					<div class="col-sm-6">
					                            <div class="form-group">
					                              <label class="control-label">First Name</label>
					                              <div class="append-icon">
					                                <input type="text" name="first_name" value="" class="form-control">
					                                <i class="icon-user"></i>
					                              </div>
					                            </div>
					                          </div>
					                          <div class="col-sm-6">
					                            <div class="form-group">
					                              <label class="control-label">Last Name</label>
					                              <div class="append-icon">
					                                <input type="text" name="last_name" value="" class="form-control">
					                                <i class="icon-user"></i>
					                              </div>
					                            </div>
					                          </div>
					                        </div>
                        				<div class="row">				                         
				                          <div class="col-sm-6">
				                            <div class="form-group">
				                              <label class="control-label">Phone Number</label>
				                              <div class="append-icon">
				                                <input type="text" name="phone_number" value="" class="form-control">
				                                <i class="icon-screen-smartphone"></i>
				                              </div>
				                            </div>
				                          </div>
				                           <div class="col-sm-6">
				                            <div class="form-group">
				                              <label class="control-label">Email Address</label>
				                              <div class="append-icon">
				                                <input type="email" name="email" value="" class="form-control">
				                                <i class="icon-envelope"></i>
				                              </div>
				                            </div>
				                          </div>
				                        </div>
				                        <div class="row">
				                        	<div class="col-sm-6">
				                            <div class="form-group">
				                              <label class="control-label">Password</label>
				                              <div class="append-icon">
				                                <input type="password" name="pass1" id="password1" value="" class="form-control">
				                                <i class="icon-lock"></i>
				                              </div>
				                            </div>
				                          </div>
											<div class="col-sm-6">
				                            <div class="form-group">
				                              <label class="control-label">Repeat Password</label>
				                              <div class="append-icon">
				                                <input type="password" name="pass2" id="password2" value="" class="form-control">
				                                <i class="icon-lock"></i>
				                              </div>
				                            </div>
				                          </div>
				                        </div>
				                        <div class="row">
				                            
				                          <div class="col-sm-6">
				                            <div class="form-group">
				                              <label class="control-label">Upload your avatar</label>
				                              <div class="append-icon">
				                                <div class="file">
					                                <div class="option-group">
					                                  <span class="file-button btn-primary">Choose File</span>
					                                  <input type="file" class="custom-file" name="user_avatar" id="user_avatar" onchange="document.getElementById('uploader').value = this.value;">
					                                  <input type="text" class="form-control" id="uploader" placeholder="no file selected" readonly="">
					                                </div>
				                                </div>
				                              </div>
				                            </div>
				                          </div>
				                         
                          				</div>
										
										<div class="row">
					                    
					                    	 <div class="panel-content">
                   									
                   								<h3><i class="icon-check"></i> <strong>Permissions</strong></h3> 
                   						   <div class="row">		
               				 				<div class="col-md-2">
               				 				<p><strong>Sales Teams</strong></p>	
               				               	 <div class="input-group">
                               					 <div class="icheck-list">
					                                  <label>
					                                  <input type="checkbox" name="sales_team_read" value="1" data-checkbox="icheckbox_square-blue">Read</label>
					                                  <label>
					                                  <input type="checkbox" name="sales_team_write" value="1" data-checkbox="icheckbox_square-blue">Write</label>
					                                  <label>
					                                  <input type="checkbox" name="sales_team_delete" value="1" data-checkbox="icheckbox_square-blue">Delete</label>
                               					 </div>
                    				          </div>		
                   							</div>
                   							
               				 				<div class="col-md-2">
               				 				<p><strong>Leads</strong></p>	
               				               	 <div class="input-group">
                               					 <div class="icheck-list">
					                                  <label>
					                                  <input type="checkbox" name="lead_read" value="1" data-checkbox="icheckbox_square-blue">Read</label>
					                                  <label>
					                                  <input type="checkbox" name="lead_write" value="1" data-checkbox="icheckbox_square-blue">Write</label>
					                                  <label>
					                                  <input type="checkbox" name="lead_delete" value="1" data-checkbox="icheckbox_square-blue">Delete</label>
                               					 </div>
                    				          </div>		
                   							</div>
                   							
                   							<div class="col-md-2">
               				 				<p><strong>Opportunities</strong></p>	
               				               	 	<div class="input-group">
                               					 <div class="icheck-list">
					                                  <label>
					                                  <input type="checkbox" name="opportunities_read" value="1" data-checkbox="icheckbox_square-blue">Read</label>
					                                  <label>
					                                  <input type="checkbox" name="opportunities_write" value="1" data-checkbox="icheckbox_square-blue">Write</label>
					                                  <label>
					                                  <input type="checkbox" name="opportunities_delete" value="1" data-checkbox="icheckbox_square-blue">Delete</label>
                               					 </div>
                    				          </div>	
                   							</div>		 
                   							
                   							<div class="col-md-2">
               				 				<p><strong>Logged Calls</strong></p>	
               				               	 	<div class="input-group">
                               					 <div class="icheck-list">
					                                  <label>
					                                  <input type="checkbox" name="logged_calls_read" value="1" data-checkbox="icheckbox_square-blue">Read</label>
					                                  <label>
					                                  <input type="checkbox" name="logged_calls_write" value="1" data-checkbox="icheckbox_square-blue">Write</label>
					                                  <label>
					                                  <input type="checkbox" name="logged_calls_delete" value="1" data-checkbox="icheckbox_square-blue">Delete</label>
                               					 </div>
                    				          </div>	
                   							</div>
                   							
                   							<div class="col-md-2">
               				 				<p><strong>Meetings</strong></p>	
               				               	 	<div class="input-group">
                               					 <div class="icheck-list">
					                                  <label>
					                                  <input type="checkbox" name="meetings_read" value="1" data-checkbox="icheckbox_square-blue">Read</label>
					                                  <label>
					                                  <input type="checkbox" name="meetings_write" value="1" data-checkbox="icheckbox_square-blue">Write</label>
					                                  <label>
					                                  <input type="checkbox" name="meetings_delete" value="1" data-checkbox="icheckbox_square-blue">Delete</label>
                               					 </div>
                    				          </div>	
                   							</div>
                   							
                   							<div class="col-md-2">
               				 				<p><strong>Products</strong></p>	
               				               	 	<div class="input-group">
                               					 <div class="icheck-list">
					                                  <label>
					                                  <input type="checkbox" name="products_read" value="1" data-checkbox="icheckbox_square-blue">Read</label>
					                                  <label>
					                                  <input type="checkbox" name="products_write" value="1" data-checkbox="icheckbox_square-blue">Write</label>
					                                  <label>
					                                  <input type="checkbox" name="products_delete" value="1" data-checkbox="icheckbox_square-blue">Delete</label>
                               					 </div>
                    				          </div>	
                   							</div>

											</div>
											
											<div class="row">&nbsp;</div>
											
											<div class="row">		
               				 				
               				 					<div class="col-md-2">
               				 					<p><strong>Quotations</strong></p>	
               				               	 <div class="input-group">
                               					 <div class="icheck-list">
					                                  <label>
					                                  <input type="checkbox" name="quotations_read" value="1" data-checkbox="icheckbox_square-blue">Read</label>
					                                  <label>
					                                  <input type="checkbox" name="quotations_write" value="1" data-checkbox="icheckbox_square-blue">Write</label>
					                                  <label>
					                                  <input type="checkbox" name="quotations_delete" value="1" data-checkbox="icheckbox_square-blue">Delete</label>
                               					 </div>
                    				          </div>		
                   							</div>

												<div class="col-md-2">
               				 					<p><strong>Sales Orders</strong></p>	
               				               	 <div class="input-group">
                               					 <div class="icheck-list">
					                                  <label>
					                                  <input type="checkbox" name="sales_orders_read" value="1" data-checkbox="icheckbox_square-blue">Read</label>
					                                  <label>
					                                  <input type="checkbox" name="sales_orders_write" value="1" data-checkbox="icheckbox_square-blue">Write</label>
					                                  <label>
					                                  <input type="checkbox" name="sales_orders_delete" value="1" data-checkbox="icheckbox_square-blue">Delete</label>
                               					 </div>
                    				          </div>		
                   							</div>
                   							
                   								<div class="col-md-2">
               				 					<p><strong>Invoices</strong></p>	
               				               	 <div class="input-group">
                               					 <div class="icheck-list">
					                                  <label>
					                                  <input type="checkbox" name="invoices_read" value="1" data-checkbox="icheckbox_square-blue">Read</label>
					                                  <label>
					                                  <input type="checkbox" name="invoices_write" value="1" data-checkbox="icheckbox_square-blue">Write</label>
					                                  <label>
					                                  <input type="checkbox" name="invoices_delete" value="1" data-checkbox="icheckbox_square-blue">Delete</label>
                               					 </div>
                    				          </div>		
                   							</div>
                   							
                   								<div class="col-md-2">
               				 					<p><strong>Pricelists</strong></p>	
               				               	 <div class="input-group">
                               					 <div class="icheck-list">
					                                  <label>
					                                  <input type="checkbox" name="pricelists_read" value="1" data-checkbox="icheckbox_square-blue">Read</label>
					                                  <label>
					                                  <input type="checkbox" name="pricelists_write" value="1" data-checkbox="icheckbox_square-blue">Write</label>
					                                  <label>
					                                  <input type="checkbox" name="pricelists_delete" value="1" data-checkbox="icheckbox_square-blue">Delete</label>
                               					 </div>
                    				          </div>		
                   							</div>
                   								
                   								<div class="col-md-2">
               				 					<p><strong>Contracts</strong></p>	
               				               	 <div class="input-group">
                               					 <div class="icheck-list">
					                                  <label>
					                                  <input type="checkbox" name="contracts_read" value="1" data-checkbox="icheckbox_square-blue">Read</label>
					                                  <label>
					                                  <input type="checkbox" name="contracts_write" value="1" data-checkbox="icheckbox_square-blue">Write</label>
					                                  <label>
					                                  <input type="checkbox" name="contracts_delete" value="1" data-checkbox="icheckbox_square-blue">Delete</label>
                               					 </div>
                    				          </div>		
                   							</div>
                   								
                   								<div class="col-md-2">
               				 					<p><strong>Staff</strong></p>	
               				               	 <div class="input-group">
                               					 <div class="icheck-list">
					                                  <label>
					                                  <input type="checkbox" name="staff_read" value="1" data-checkbox="icheckbox_square-blue">Read</label>
					                                  <label>
					                                  <input type="checkbox" name="staff_write" value="1" data-checkbox="icheckbox_square-blue">Write</label>
					                                  <label>
					                                  <input type="checkbox" name="staff_delete" value="1" data-checkbox="icheckbox_square-blue">Delete</label>
                               					 </div>
                    				          </div>		
                   							</div>


											</div>	
                   							</div>
                   						</div>
                        				<div class="text-left  m-t-20">
                         				 <div id="staff_submitbutton"><button type="submit" class="btn btn-embossed btn-primary">Create</button></div>
                           
                        </div>
                      </form>
                   				 </div>
                  </div>
                </div>
           	</div>
            	
 		</div>   
  <!-- END PAGE CONTENT -->
 

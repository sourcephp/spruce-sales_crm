<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>

$(document).ready(function() {
	 
	$("form[name='update_customer']").submit(function(e) {
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "<?php echo base_url('admin/customers/update_process'); ?>",
            type: "POST",
            data: formData,
            async: false,
            success: function (msg) {
			$('body,html').animate({ scrollTop: 0 }, 200);
            $("#customer_ajax").html(msg); 
			$("#customer_submitbutton").html('<button type="submit" class="btn btn-embossed btn-primary">Save</button>');
			
			$('#password,#company_avatar,#uploader').val('');
			
            
        },
            cache: false,
            contentType: false,
            processData: false
        });

        e.preventDefault();
    });
});


//Contact Person
 $(document).ready(function(){
    $(':input#main_contact_person').live('change',function(){
    var sel_opt = $(this).val();
    //alert(sel_opt);
    if(sel_opt=='creat_new')
    {
      model_hide_show();
      $("#main_contact_person").each(function() { this.selectedIndex = 0 });
    }
      
    });

 });
 
 //Modal Open and Close
 function model_hide_show()
 {   
  	     //$("#modal-all_calls").removeClass("fade").modal("hide");
         $("#modal-create_contact_person").modal("show").addClass("fade");
  	     
 }
//Contact Person
$(document).ready(function() {
	$("form[name='add_contact_person']").submit(function(e) {
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "<?php echo base_url('admin/contact_persons/add_process_ajax'); ?>",
            type: "POST",
            data: formData,
            dataType:'json', 
            async: false,
            success: function (data) {
			$('body,html').animate({ scrollTop: 0 }, 200);           
            
          /*  $('#main_contact_person').prepend($('<option>', {
			    value: data.co_person_id,
			    text: data.co_person_name,
			    selected: true
			}));
			*/
			$("#main_contact_person option:first").after($('<option>', {
			    value: data.co_person_id,
			    text: data.co_person_name,
			    selected: true
			}));
			 
			 if(data.co_person_id)
			 {
			 	$("#contact_person_ajax").html("Contact person create succesful");
			 }
            
			$("#contact_person_submitbutton").html('<button type="submit" class="btn btn-embossed btn-primary">Save</button>');
			
			$("form[name='add_contact_person']").find("input[type=text], textarea").val("");
			
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
        <div class="page-content">
        <div class="header">
            <h2><strong>Update Customer</strong></h2> 
            <div class="breadcrumb-wrapper">
               
               <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-create_contact_person" onclick="">New Contact Person</a>
              
             </div>         
          </div>
           <div class="row">
           	<div class="col-md-12">
                  <div class="panel">
                     
                     <div id="test_div_id" class="panel-content">
                   					<div id="customer_ajax"> 
				                          <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>         
				                      </div>
				         
				           <form id="update_customer" name="update_customer" class="form-validation" accept-charset="utf-8" enctype="multipart/form-data" method="post">
 
                        				<input type="hidden" name="company_id" value="<?php echo $customer->id; ?>" />	                                        				 
                        				<div class="row">
                          					<div class="col-sm-6">
					                            <div class="form-group">
					                              <label class="control-label">Comapany Name</label>
					                              <div class="append-icon">
					                                <input type="text" name="name" value="<?php echo $customer->name;?>" class="form-control">
					                                 
					                              </div>
					                            </div>
					                          </div>
					                           
					                        </div>
                        				<div class="row">				                         
				                          <div class="col-sm-6">
				                            <div class="form-group">
				                              <label class="control-label">Address</label>
				                              <div class="append-icon">
				                                 
				                                <textarea name="address" rows="4" class="form-control"><?php echo $customer->address;?></textarea> 
				                              </div>
				                            </div>
				                          </div>
				                           <div class="col-sm-6">
				                            <div class="form-group">
				                              <label class="control-label">Website</label>
				                              <div class="append-icon">
				                                <input type="text" name="website" value="<?php echo $customer->website;?>" class="form-control">
				                                <i class="icon-globe"></i>
				                              </div>
				                            </div>
				                          </div>
				                        </div>
				                        <div class="row">
					                          <div class="col-sm-6">
					                            <div class="form-group">
					                              <label class="control-label">Phone</label>
					                              <div class="append-icon">
					                                <input type="text" name="phone" value="<?php echo $customer->phone;?>" class="form-control">
					                                <i class="icon-screen-smartphone"></i>
					                              </div>
					                            </div>
					                          </div>
					                          <div class="col-sm-6">
					                            <div class="form-group">
					                              <label class="control-label">Mobile</label>
					                              <div class="append-icon">
					                                <input type="text" name="mobile" value="<?php echo $customer->mobile;?>" class="form-control">
					                                <i class="icon-screen-smartphone"></i>
					                              </div>
					                            </div>
					                          </div>
					                        </div>
					                    <div class="row">
					                          <div class="col-sm-6">
					                            <div class="form-group">
					                              <label class="control-label">Fax</label>
					                              <div class="append-icon">
					                                <input type="text" name="fax" value="<?php echo $customer->fax;?>" class="form-control">
					                                <i class="icon-screen-smartphone"></i>
					                              </div>
					                            </div>
					                          </div>
					                          <div class="col-sm-6">
				                            <div class="form-group">
				                              <label class="control-label">Email</label>
				                              <div class="append-icon">
				                                <input type="email" name="email" value="<?php echo $customer->email;?>" class="form-control">
				                                <i class="icon-envelope"></i>
				                              </div>
				                            </div>
				                          </div>
					                    </div>
					                        
				                        <div class="row">
				                        	
				                         <div class="col-sm-6">
					                            <div class="form-group">
					                              <label class="control-label">Main Contact Person</label>
					                              <div class="append-icon">
					                                <select name="main_contact_person" id="main_contact_person" class="form-control" data-search="true">
					                                <option value=""></option>
					                                <?php foreach( $contact_persons as $contact_person){ ?>
					                                <option value="<?php echo $contact_person->id;?>" <?php if($contact_person->id==$customer->main_contact_person){?>selected<?php }?>><?php echo $contact_person->first_name.' '.$contact_person->last_name;?></option>
					                                <?php }?> 
					                                 
					                                </select>
					                                 
					                              </div>
					                            </div>
					                          </div>
					                          <div class="col-sm-6">
				                            <div class="form-group">
				                              <label class="control-label">Sales Teams</label>
				                              <div class="append-icon">
				                                <select name="sales_team_id" class="form-control" data-search="true">
					                                <option value=""></option>
					                                <?php foreach( $salesteams as $salesteam){ ?>
					                                <option value="<?php echo $salesteam->id;?>" <?php if($salesteam->id==$customer->sales_team_id){?>selected<?php }?>><?php echo $salesteam->salesteam;?></option>
					                                <?php }?> 
					                                </select> 
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
					                                  <input type="file" class="custom-file" name="company_avatar" id="company_avatar" onchange="document.getElementById('uploader').value = this.value;">
					                                  <input type="text" class="form-control" id="uploader" placeholder="no file selected" readonly="">
					                                </div>
				                                </div>
				                              </div>
				                            </div>
				                          </div>
				                          
				                          <div class="col-sm-6">
				                            <div class="form-group">
				                              <label class="control-label">Upload Attachment</label>
				                              <div class="append-icon">
				                                <div class="file">
					                                <div class="option-group">
					                                  <span class="file-button btn-primary">Choose File</span>
					                                  <input type="file" class="custom-file" name="company_attachment" id="company_attachment" onchange="document.getElementById('uploader_attach').value = this.value;">
					                                  <input type="text" class="form-control" id="uploader_attach" placeholder="no file selected" readonly="">
					                                  <input type="hidden" name="attach_file" value="<?php echo $customer->company_attachment;?>" class="form-control">
					                                </div>
				                                </div>
				                              </div>
				                            </div>
				                          </div>
                          				</div>
                        				<div class="text-left  m-t-20">
                         				 <div id="customer_submitbutton"><button type="submit" class="btn btn-embossed btn-primary">Update</button></div>
                           
                        </div>
                      </form>            
                  				    
                  </div>
                  </div>
                </div>
           	</div>
            	
 		</div>   
  <!-- END PAGE CONTENT -->
 
<!-- START MODAL CONTENT -->
 <div class="modal fade" id="modal-create_contact_person" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                  <h4 class="modal-title"><strong>Add</strong> Contact Person</h4>
                </div>
               <div id="contact_person_ajax" style="color:red;margin-left:15px;"> 
				                          <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>         
				                      </div>
				         
				 <form id="add_contact_person" name="add_contact_person" class="form-validation" accept-charset="utf-8" enctype="multipart/form-data" method="post">
               	 <input type="hidden" name="company" value="<?php echo $customer->id; ?>"/>
               	      	
               	 <div class="modal-body">
                   
                  <div class="row">
                          					<div class="col-sm-6">
					                            <div class="form-group">
					                              <label class="control-label">First Name</label>
					                              <div class="append-icon">
					                                <input type="text" name="first_name" value="" class="form-control" required>
					                                <i class="icon-user"></i>
					                              </div>
					                            </div>
					                          </div>
					                          <div class="col-sm-6">
					                            <div class="form-group">
					                              <label class="control-label">Last Name</label>
					                              <div class="append-icon">
					                                <input type="text" name="last_name" value="" class="form-control" required>
					                                <i class="icon-user"></i>
					                              </div>
					                            </div>
					                          </div>
					                        </div>
                        				<div class="row">				                         
				                          <div class="col-sm-6">
				                            <div class="form-group">
				                              <label class="control-label">Address</label>
				                              <div class="append-icon">
				                                 
				                                <textarea name="address" rows="4" class="form-control"></textarea> 
				                              </div>
				                            </div>
				                          </div>
				                           <div class="col-sm-6">
				                            <div class="form-group">
				                              <label class="control-label">Website</label>
				                              <div class="append-icon">
				                                <input type="text" name="website" value="" class="form-control">
				                                <i class="icon-globe"></i>
				                              </div>
				                            </div>
				                          </div>
				                        </div>
				                        <div class="row">
                          					<div class="col-sm-6">
					                            <div class="form-group">
					                              <label class="control-label">Job Position</label>
					                              <div class="append-icon">
					                                <input type="text" name="job_position" value="" class="form-control">
					                                
					                              </div>
					                            </div>
					                          </div>
					                          <div class="col-sm-6">
					                            <div class="form-group">
					                              <label class="control-label">Phone</label>
					                              <div class="append-icon">
					                                <input type="text" name="phone" value="" class="form-control">
					                                <i class="icon-screen-smartphone"></i>
					                              </div>
					                            </div>
					                          </div>
					                        </div>
					                    <div class="row">
                          					<div class="col-sm-6">
					                            <div class="form-group">
					                              <label class="control-label">Mobile</label>
					                              <div class="append-icon">
					                                <input type="text" name="mobile" value="" class="form-control">
					                                <i class="icon-screen-smartphone"></i>
					                              </div>
					                            </div>
					                          </div>
					                          <div class="col-sm-6">
					                            <div class="form-group">
					                              <label class="control-label">Fax</label>
					                              <div class="append-icon">
					                                <input type="text" name="fax" value="" class="form-control">
					                                <i class="icon-screen-smartphone"></i>
					                              </div>
					                            </div>
					                          </div>
					                    </div>
					                    <div class="row">
                          					<div class="col-sm-6">
					                            <div class="form-group">
					                              <label class="control-label">Title</label>
					                              <div class="append-icon">
					                                <input type="text" name="title" value="" class="form-control">
					                                
					                              </div>
					                            </div>
					                          </div>
					                          <div class="col-sm-6">
					                             
					                          </div>
					                        </div>    
				                        <div class="row">
				                        	<div class="col-sm-6">
				                            <div class="form-group">
				                              <label class="control-label">Email</label>
				                              <div class="append-icon">
				                                <input type="email" name="email" value="" class="form-control" required>
				                                <i class="icon-envelope"></i>
				                              </div>
				                            </div>
				                          </div>
				                        	<div class="col-sm-6">
				                            <div class="form-group">
				                              <label class="control-label">Password</label>
				                              <div class="append-icon">
				                                <input type="password" name="password" id="password1" value="" class="form-control" required>
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
					                                  <input type="file" class="custom-file" name="customer_avatar" id="customer_avatar" onchange="document.getElementById('uploader').value = this.value;">
					                                  <input type="text" class="form-control" id="uploader" placeholder="no file selected" readonly="">
					                                </div>
				                                </div>
				                              </div>
				                            </div>
				                          </div>
				                          <div class="col-sm-6">
				                            <div class="form-group">
				                              <label class="control-label">Sales Teams</label>
				                              <div class="append-icon">
				                                <select name="sales_team_id" class="form-control" data-search="true">
					                                <option value=""></option>
					                                <?php foreach( $salesteams as $salesteam){ ?>
					                                <option value="<?php echo $salesteam->id;?>" <?php if($salesteam->id==$contact_person->sales_team_id){?>selected<?php }?>><?php echo $salesteam->salesteam;?></option>
					                                <?php }?> 
					                                </select> 
				                              </div>
				                            </div>
				                          </div>	
                          				</div>
                </div>
                 
                  <div id="contact_person_submitbutton" class="modal-footer text-center"><button type="submit" class="btn btn-primary btn-embossed bnt-square">Create</button></div>
                 
                </form>
              </div>
            </div>
          </div>

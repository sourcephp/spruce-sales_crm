<div class="sidebar">
        <div class="logopanel">
          <a href="<?php echo base_url('admin/dashboard/'); ?>"><img src="<?php echo base_url('uploads/site').'/'.config('site_logo'); ?>" alt="company logo" class="" style="height: 30px;"></a>
          
        </div>
        <div class="sidebar-inner">
          
          <div class="menu-title">
            Navigation 
            <!--<div class="pull-right menu-settings">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300"> 
              <i class="icon-settings"></i>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#" id="reorder-menu" class="reorder-menu">Reorder menu</a></li>
                <li><a href="#" id="remove-menu" class="remove-menu">Remove elements</a></li>
                <li><a href="#" id="hide-top-sidebar" class="hide-top-sidebar">Hide user &amp; search</a></li>
              </ul>
            </div>-->
          </div>
           
          
          	<ul class="nav nav-sidebar">
            <li class=" nav-active <?php echo is_active_menu('dashboard'); ?>"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icon-home"></i><span>Dashboard</span></a></li>
            <?php if (check_staff_permission('sales_team_read')){?>
            <li class=" nav-active <?php echo is_active_menu('salesteams'); ?>"><a href="<?php echo base_url('admin/salesteams'); ?>"><i class="icon-users"></i><span>Sales Teams</span></a></li>
            <?php }?>
            
            <?php if (check_staff_permission('lead_read')){?>
            <li class=" nav-active <?php echo is_active_menu('leads'); ?>"><a href="<?php echo base_url('admin/leads'); ?>"><i class="icon-rocket"></i><span>Leads</span></a></li>
            <?php }?>
            
            <?php if (check_staff_permission('opportunities_read')){?>
            <li class=" nav-active <?php echo is_active_menu('opportunities'); ?>"><a href="<?php echo base_url('admin/opportunities'); ?>"><i class="icon-key"></i><span>Opportunities</span></a></li>
            <?php }?>
            
            <li class="nav-parent <?php echo is_active_menu('customers'); ?><?php echo is_active_menu('contact_persons'); ?>">
              <a href="#"><i class="icon-user"></i><span>Customers</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                
                <li class="<?php echo is_active_menu('customers'); ?>"><a href="<?php echo base_url('admin/customers'); ?>">Customers</a></li>

			<li class="<?php echo is_active_menu('contact_persons'); ?>"><a href="<?php echo base_url('admin/contact_persons'); ?>">Contact Persons</a></li>                
              </ul>
            </li>
             
             <?php if (check_staff_permission('logged_calls_read')){?>
             <li class=" nav-active <?php echo is_active_menu('logged_calls'); ?>"><a href="<?php echo base_url('admin/logged_calls'); ?>"><i class="fa fa-phone"></i><span>Logged Calls</span></a></li>
             <?php }?>
             
             <?php if (check_staff_permission('meetings_read')){?>
             <li class=" nav-active <?php echo is_active_menu('meetings'); ?>"><a href="<?php echo base_url('admin/meetings'); ?>"><i class="fa fa-user"></i><span>Meetings</span></a></li>
             <?php }?>
             
             <?php if (check_staff_permission('products_read')){?>
             
            <li class="nav-parent <?php echo is_active_menu('category'); ?><?php echo is_active_menu('products'); ?>">
              <a href="#"><i class="fa fa-cubes"></i><span>Products</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li class="<?php echo is_active_menu('products'); ?>"><a href="<?php echo base_url('admin/products'); ?>"> Products</a></li>
                <li class="<?php echo is_active_menu('category'); ?>"><a href="<?php echo base_url('admin/category'); ?>"> Category</a></li>                
              </ul>
            </li>
             <?php }?>
             
             <?php if (check_staff_permission('quotations_read')){?>
             
             <li class="nav-parent <?php echo is_active_menu('quotations'); ?><?php echo is_active_menu('qtemplates'); ?>">
              <a href="#"><i class="icon-tag"></i><span>Quotations</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">                 
                <li class="<?php echo is_active_menu('quotations'); ?>"><a href="<?php echo base_url('admin/quotations'); ?>"> Quotations</a></li>
                <li class="<?php echo is_active_menu('qtemplates'); ?>"><a href="<?php echo base_url('admin/qtemplates'); ?>"> Quotations Template</a></li>
              </ul>
            </li>
            <?php }?>
            
            <?php if (check_staff_permission('sales_orders_read')){?>
            <li class=" nav-active <?php echo is_active_menu('salesorder'); ?>"><a href="<?php echo base_url('admin/salesorder'); ?>"><i class="fa fa-shopping-cart"></i><span>Sales Order</span></a></li>
            <?php }?>
            
            <?php if (check_staff_permission('invoices_read')){?> 
            <li class="nav-parent <?php echo is_active_menu('invoices'); ?> <?php echo is_active_menu('invoices_payment_log'); ?>">
              <a href="#"><i class="icon-note"></i><span>Invoices</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">                 
                <li class="<?php echo is_active_menu('invoices'); ?>"><a href="<?php echo base_url('admin/invoices'); ?>"> Invoices</a></li>
                <li class="<?php echo is_active_menu('invoices_payment_log'); ?>"><a href="<?php echo base_url('admin/invoices_payment_log'); ?>">Payment Log</a></li>
              </ul>
            </li>
            <?php }?>
            
            <?php if (check_staff_permission('pricelists_read')){?> 
            <li class="nav-parent <?php echo is_active_menu('pricelists'); ?><?php echo is_active_menu('pricelist_versions'); ?>">
              <a href="#"><i class="icon-list"></i><span>Pricelists</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">                 
                <li class=" nav-active <?php echo is_active_menu('pricelists'); ?>"><a href="<?php echo base_url('admin/pricelists'); ?>"><span>Pricelists</span></a></li>
                <li class="<?php echo is_active_menu('pricelist_versions'); ?>"><a href="<?php echo base_url('admin/pricelist_versions'); ?>">Pricelist Versions</a></li>
              </ul>
</li>
            <?php }?>
            
            <?php if (check_staff_permission('contracts_read')){?> 
            <li class=" nav-active <?php echo is_active_menu('contracts'); ?>"><a href="<?php echo base_url('admin/contracts'); ?>"><i class="fa fa-search-plus"></i><span>Contracts</span></a></li>
            <?php }?>
             
        
        <li class=" nav-active <?php echo is_active_menu('calendar'); ?>"><a href="<?php echo base_url('admin/calendar'); ?>"><i class="fa fa-calendar"></i><span>Calendar</span></a></li> 
        
        	<?php if (check_staff_permission('staff_read')){?>    
            <li class=" nav-active <?php echo is_active_menu('staff'); ?>"><a href="<?php echo base_url('admin/staff'); ?>"><i class="icon-users"></i><span>Staff</span></a></li>
            <?php }?>
              
          </ul>
           
          
           
        </div>
      </div>
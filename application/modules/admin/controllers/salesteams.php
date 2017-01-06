<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salesteams extends CI_Controller {

    function Salesteams() 
    {
         parent::__construct();
		 $this->load->database();
		 $this->load->model("salesteams_model");
		 $this->load->model("staff_model");
		    
         $this->load->library('form_validation');
         
         /*cache control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
         
         check_login();  
    }

	function index()
	{
				//checking permission for staff
			if (!check_staff_permission('sales_team_read'))	
			{
				redirect(base_url('admin/access_denied'), 'refresh');  
			}
			
		    	$data['salesteams'] = $this->salesteams_model->salesteams_list();
		    			    	 
				$this->load->view('header');
				$this->load->view('salesteams/index',$data);
				$this->load->view('footer');
			 
	}
	function add()
	{
				//checking permission for staff
			if (!check_staff_permission('sales_team_write'))	
			{
				redirect(base_url('admin/access_denied'), 'refresh');  
			}
			
		    	$data['staffs'] = $this->staff_model->staff_list();
		    	
				$this->load->view('header');
				$this->load->view('salesteams/add',$data);
				$this->load->view('footer');
			 
	}
	function add_process()
	{
			  
		//checking permission for staff
			if (!check_staff_permission('sales_team_write'))	
			{
				redirect(base_url('admin/access_denied'), 'refresh');  
			}
		  
		$this->form_validation->set_rules('salesteam', 'Sales Team', 'required');
		$this->form_validation->set_rules('invoice_target', 'Invoice Target', 'required');
		$this->form_validation->set_rules('invoice_forecast', 'Invoice Forecast', 'required');
		$this->form_validation->set_rules('team_leader', 'Team Leader', 'required');
		$this->form_validation->set_rules('team_members', 'Team Members', 'required'); 
			 
		
		if( $this->form_validation->run() == FALSE )
        {
            echo '<div class="alert error"><ul>' . validation_errors('<li style="color:red">','</li>') . '</ul></div>';
        }         
        else
        {
            
            if( $this->salesteams_model->add_salesteam())
            { 
                echo '<div class="alert alert-success">'.$this->lang->line('create_succesful').'</div>';
            }
            else
            {
                echo $this->lang->line('technical_problem');
            }
        }
			 
	}
	
	function view($salesteam_id)
	{
		    	//checking permission for staff
			if (!check_staff_permission('sales_team_read'))	
			{
				redirect(base_url('admin/access_denied'), 'refresh');  
			}
			  
				$data['opportunity'] = $this->salesteams_model->get_salesteam( $salesteam_id );	 
		    	 
				$this->load->view('header');
				$this->load->view('salesteams/view',$data);
				$this->load->view('footer');
			 
	}
	
	function update($salesteam_id)
	{
				//checking permission for staff
			if (!check_staff_permission('sales_team_write'))	
			{
				redirect(base_url('admin/access_denied'), 'refresh');  
			}
			
				$data['staffs'] = $this->staff_model->staff_list();
		    	 
		    	$data['salesteam'] = $this->salesteams_model->get_salesteam( $salesteam_id );	 
		    	 
				$this->load->view('header');
				$this->load->view('salesteams/update',$data);
				$this->load->view('footer');
			 
	}
	
	function update_process()
	{
		//checking permission for staff
			if (!check_staff_permission('sales_team_write'))	
			{
				redirect(base_url('admin/access_denied'), 'refresh');  
			}  
		
		$this->form_validation->set_rules('salesteam', 'Sales Team', 'required');
		$this->form_validation->set_rules('invoice_target', 'Invoice Target', 'required');
		$this->form_validation->set_rules('invoice_forecast', 'Invoice Forecast', 'required');
		$this->form_validation->set_rules('team_leader', 'Team Leader', 'required');
		$this->form_validation->set_rules('team_members', 'Team Members', 'required');
		
		if( $this->form_validation->run() == FALSE )
        {
            echo '<div class="alert error"><ul>' . validation_errors('<li style="color:red">','</li>') . '</ul></div>';
        }
        else
        {
            
            if( $this->salesteams_model->update_salesteam() )
            {
                echo '<div class="alert alert-success">'.$this->lang->line('update_succesful').'</div>';
            }
            else
            {
                echo $this->lang->line('technical_problem');
            }
        }
	}
	
	/*
     * deletes opportunity     *  
     */
	function delete( $salesteam_id )
	{
		//checking permission for staff
			if (!check_staff_permission('sales_team_delete'))	
			{
				redirect(base_url('admin/access_denied'), 'refresh');  
			}  
		 
		if( $this->salesteams_model->delete($salesteam_id) )
		{
			echo 'deleted';
		}
		
	}	
	 
	 
}

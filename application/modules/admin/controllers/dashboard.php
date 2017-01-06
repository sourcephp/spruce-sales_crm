<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function Dashboard() 
    {
         parent::__construct();
		 $this->load->database();
		 $this->load->model("dashboard_model");
		 $this->load->model("invoices_model");
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
    	$data['salesteams']=$this->dashboard_model->total_salesteams();
    	$data['leads']=$this->dashboard_model->total_leads();		    	
    	$data['opportunities']=$this->dashboard_model->total_opportunities();
    	$data['products']=$this->dashboard_model->total_products();	
    	$data['quotations']=$this->dashboard_model->total_quotations();
    	$data['salesorders']=$this->dashboard_model->total_salesorders();
    	$data['calls']=$this->dashboard_model->total_calls();
    	$data['customers']=$this->dashboard_model->total_customers();
    	$data['meetings']=$this->dashboard_model->total_meetings();    
    	$data['emails']=$this->dashboard_model->total_email();
    	$data['contracts']=$this->dashboard_model->total_contracts();
    		
    	/*Invoicing Details*/
    	$data['open_invoice_total'] = $this->invoices_model->open_invoices_total_collection();
		    	
    	$data['overdue_invoices_total'] = $this->invoices_model->overdue_invoices_total_collection();
    	
    	$data['paid_invoices_total'] = $this->invoices_model->paid_invoices_total_collection();
    	
    	$data['invoices_total_collection'] = $this->invoices_model->invoices_total_collection();
    	
    	/*SALES STATISTICS*/
    	$data['sales_today_total'] = $this->dashboard_model->sales_today_total();
    	
    	$data['sales_yesterday_total'] = $this->dashboard_model->sales_yesterday_total();
    	
    	$data['sales_this_week_total'] = $this->dashboard_model->sales_this_week_total();
    	
    	$data['sales_this_month_total'] = $this->dashboard_model->sales_this_month_total();
    	
    	$data['top_selling_team'] = $this->dashboard_model->top_selling_team();
    	
    	$data['salesteams_performance_list'] = $this->dashboard_model->salesteams_performance_list();
    	
    	/*LIST*/
    	
    	$salesteam_id = $this->dashboard_model->get_staff_salesteam(userdata('id'));
    	
    	$data['staff_leads_list'] = $this->dashboard_model->staff_leads_list(userdata('id'));  	  
    	
    	$data['staff_leads_by_team'] = $this->dashboard_model->staff_leads_by_team($salesteam_id);
    	
    	$data['staff_opportunities_list'] = $this->dashboard_model->staff_opportunities_list(userdata('id'));  	  
    	
    	$data['staff_opportunities_by_team'] = $this->dashboard_model->staff_opportunities_by_team($salesteam_id);
    
    	$data['staff_call_log_list'] = $this->dashboard_model->staff_call_log_list(userdata('id'));
    	
    	$data['staff_contracts_list'] = $this->dashboard_model->staff_contracts_list(userdata('id'));  	  
    
    	$data['staff_quotations_list'] = $this->dashboard_model->staff_quotations_list(userdata('id'));  	  
    	
    	$data['staff_quotations_by_team'] = $this->dashboard_model->staff_quotations_by_team($salesteam_id);
    	
    	$data['staff_invoices_list'] = $this->dashboard_model->staff_invoices_list(userdata('id'));  	  
    	
    	$data['staff_invoices_by_team'] = $this->dashboard_model->staff_invoices_by_team($salesteam_id);
    	
    	/*EVENTS*/
    	$data['staff_leads_event_list'] = $this->dashboard_model->staff_leads_event_list(userdata('id'));
    	
    	$data['staff_opportunities_event_list'] = $this->dashboard_model->staff_opportunities_event_list(userdata('id'));
    	
    	$data['staff_logged_call_event_list'] = $this->dashboard_model->staff_logged_call_event_list(userdata('id'));
    	
    	$data['staff_meetings_event_list'] = $this->dashboard_model->staff_meetings_event_list(userdata('id'));
    	$data['staff_contracts_event_list'] = $this->dashboard_model->staff_contracts_event_list(userdata('id'));
    	
		$this->load->view('header');			 
		$this->load->view('dashboard/index',$data);
		$this->load->view('footer');	
			  
	}
	
	/*
     * delete notification     *  
     */
	function delete_notification( $notification_id)
	{
		 
			if( $this->dashboard_model->delete_notification($notification_id) )
			{
				echo 'deleted';
			}
		
	}
}

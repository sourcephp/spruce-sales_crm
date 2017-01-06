<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Dashboard_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }   
     
    function total_salesteams() 
    {
        $this->db->order_by("id", "desc");
        $this->db->from('salesteams');       
        	
		return count($this->db->get()->result());	
	}
	function total_leads() 
    {	
    	if(userdata('id')!='1')
		{
			$this->db->where('salesperson_id', userdata('id'));
		}
		
        $this->db->order_by("id", "desc");
        $this->db->from('leads');       
        	
		return count($this->db->get()->result());	
	}
	function total_opportunities() 
    {
    	if(userdata('id')!='1')
		{
			$this->db->where('salesperson_id', userdata('id'));
		}
		
        $this->db->order_by("id", "desc");
        $this->db->from('opportunities');       
        	
		return count($this->db->get()->result());	
	}
	
	function total_products() 
    {
        $this->db->order_by("id", "desc");
        $this->db->from('products');       
        	
		return count($this->db->get()->result());	
	}
	
	function total_quotations() 
    {
    	if(userdata('id')!='1')
		{
			$this->db->where('sales_person', userdata('id'));
		}
		
        $this->db->where("quot_or_order", "q");
        $this->db->order_by("id", "desc");
        $this->db->from('quotations_salesorder');       
        	
		return count($this->db->get()->result());	
	}
	
	function total_salesorders() 
    {
    	if(userdata('id')!='1')
		{
			$this->db->where('sales_person', userdata('id'));
		}
		
        $this->db->where("quot_or_order", "o");
        $this->db->order_by("id", "desc");
        $this->db->from('quotations_salesorder');       
        	
		return count($this->db->get()->result());	
	}
	
	function total_calls() 
    {   
    	if(userdata('id')!='1')
		{
			$this->db->where('resp_staff_id', userdata('id'));
		}
		      
        $this->db->order_by("id", "desc");
        $this->db->from('calls');       
        	
		return count($this->db->get()->result());	
	}
	
    function total_customers() 
    {
        $this->db->order_by("id", "desc");
        $this->db->from('company');       
        	
		return count($this->db->get()->result());	
	}
	
	function total_meetings() 
    {
    	if(userdata('id')!='1')
		{
			$this->db->where('responsible', userdata('id'));
		}
		
        $this->db->order_by("id", "desc");
        $this->db->from('meetings');       
        	
		return count($this->db->get()->result());	
	}
    
	function total_email() 
    {
    	$this->db->where('to', userdata('id'));
		 
        $this->db->order_by("id", "desc");
        $this->db->from('emails');       
        	
		return count($this->db->get()->result());	
	}
	function total_contracts() 
    {
    	if(userdata('id')!='1')
		{
			$this->db->where('resp_staff_id', userdata('id'));
		}
		
        $this->db->order_by("id", "desc");
        $this->db->from('contracts');       
        	
		return count($this->db->get()->result());	
	}
	
	function sales_today_total() 
    {
    	$date = strtotime(date('Y-m-d'));
		
		$this->db->select_sum('grand_total');	
		$this->db->where(array('sales_order_create_date' => $date,'quot_or_order' => 'o'));
        $this->db->from('quotations_salesorder');  
        
        $query = $this->db->get();
	    $total_sales = $query->row()->grand_total;
		
	    if ($total_sales > 0)
	    {
	        return round($total_sales);
	        
	    }

	    return '0';
        	
		//return count($this->db->get()->result());	
	}
	
	function sales_yesterday_total() 
    {
    	$date = strtotime(date('Y-m-d',strtotime("-1 days")));
		$this->db->select_sum('grand_total'); 	
		$this->db->where(array('sales_order_create_date' => $date,'quot_or_order' => 'o'));	
        $this->db->order_by("id", "desc");
        $this->db->from('quotations_salesorder');  
        	
		$query = $this->db->get();
	    $total_sales = $query->row()->grand_total;
		
	    if ($total_sales > 0)
	    {
	        return round($total_sales);
	        
	    }

	    return '0';
		
		//return count($this->db->get()->result());	
	}
	
	function sales_this_week_total() 
    {
    	 
         $start = (date('D') != 'Mon') ? date('Y-m-d', strtotime('last Monday')) : date('Y-m-d');
  		
  		 $finish = (date('D') != 'Sat') ? date('Y-m-d', strtotime('next Saturday')) : date('Y-m-d');     
		 
		$this->db->select_sum('grand_total'); 
		$this->db->where('sales_order_create_date BETWEEN "'.strtotime($start).'" AND "'.strtotime($finish).'"'); 
		$this->db->where('quot_or_order','o');
        $this->db->from('quotations_salesorder');  
        
        $query = $this->db->get();
	    $total_sales = $query->row()->grand_total;
		
	    if ($total_sales > 0)
	    {
	        return round($total_sales);
	        
	    }

	    return '0';
        	
		//return count($this->db->get()->result());	
	}
	
	function sales_this_month_total() 
    {
    	$first_date = date('d-m-Y',strtotime('first day of this month'));
		$last_date = date('d-m-Y',strtotime('last day of this month'));
 		
 		$this->db->select_sum('grand_total');
		$this->db->where('sales_order_create_date BETWEEN "'.strtotime($first_date).'" AND "'.strtotime($last_date).'"'); 
		$this->db->where('quot_or_order','o');
        $this->db->from('quotations_salesorder');  
        	
		$query = $this->db->get();
	    $total_sales = $query->row()->grand_total;
		
	    if ($total_sales > 0)
	    {
	        return round($total_sales);
	        
	    }

	    return '0';

		
		//return count($this->db->get()->result());	
	}
	
	function top_selling_team() 
    {
        $this->db->order_by("actual_invoice", "desc");
        $this->db->from('salesteams');       
        	
		return $this->db->get()->result();	
	}
	
	function salesteams_performance_list() 
    {
        $this->db->order_by("id", "desc");
        $this->db->from('salesteams');       
        	
		return $this->db->get()->result();	
	}
	
	function salesteams_percent_count($salesteam_id) 
    {
        $res=$this->db->get_where('salesteams',array('id' => $salesteam_id))->row();       
        	 
				if($res->invoice_target!="0" and $res->actual_invoice!="0")
              	{
					$percent = $res->actual_invoice/$res->invoice_target;
				 	$percent_total = number_format( $percent * 100, 2 ) . '%';
				
				}
				else
				{
					$percent_total = '0%';
				}
		return $percent_total;	
		
	} 
	
	function sales_data_by_team_id($id) 
    { 			
		$this->db->where(array('sales_team_id' => $id,'quot_or_order' => 'o'));	
        $this->db->order_by("id", "desc");
        $this->db->from('quotations_salesorder');  
        $res=$this->db->get()->result();	
		
		return $res;	
	}
	
	function get_staff_salesteam($id) 
    {
    	
    	$query = $this->db->query('SELECT id FROM salesteams WHERE FIND_IN_SET('.$id.',team_members) LIMIT 1'); 
		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();
		 	$team_id=$row['id'];
			return $team_id;
		}     	
    }
	
	function staff_leads_list($id) 
    {
    	$this->db->where(array('salesperson_id' => $id));
        $this->db->order_by("id", "desc");
        $this->db->limit(5);
        $this->db->from('leads');       
        	
		return $this->db->get()->result();	
	}
	
	function staff_leads_by_team($team_id) 
    {
    	$this->db->where(array('sales_team_id' => $team_id));
        $this->db->order_by("id", "desc");
        $this->db->limit(5);
        $this->db->from('leads');       
        	
		return $this->db->get()->result();	
	}
	
	function staff_opportunities_list($id) 
    {
    	$this->db->where(array('salesperson_id' => $id));
        $this->db->order_by("id", "desc");
        $this->db->limit(5);
        $this->db->from('opportunities');       
        	
		return $this->db->get()->result();	
	}
	
	function staff_opportunities_by_team($team_id) 
    {
    	$this->db->where(array('sales_team_id' => $team_id));
        $this->db->order_by("id", "desc");
        $this->db->limit(5);
        $this->db->from('opportunities');       
        	
		return $this->db->get()->result();	
	}
	
	function staff_quotations_list($id) 
    {
    	$this->db->where(array('sales_person' => $id,'quot_or_order' => 'q'));
        $this->db->order_by("id", "desc");
        $this->db->limit(5);
        $this->db->from('quotations_salesorder'); 
        	
		return $this->db->get()->result();	
	}
	
	function staff_quotations_by_team($team_id) 
    {
    	$this->db->where(array('sales_team_id' => $team_id,'quot_or_order' => 'q'));
        $this->db->order_by("id", "desc");
        $this->db->limit(5);
        $this->db->from('quotations_salesorder'); 
        	
		return $this->db->get()->result();	
	}
	
	function staff_invoices_list($id) 
    {
    	$this->db->where(array('salesperson_id' => $id));
        $this->db->order_by("id", "desc");
        $this->db->limit(5);
        $this->db->from('invoices'); 
        	
		return $this->db->get()->result();	
	}
	
	function staff_invoices_by_team($team_id) 
    {
    	$this->db->where(array('sales_team_id' => $team_id));
        $this->db->order_by("id", "desc");
        $this->db->limit(5);
        $this->db->from('invoices'); 
        	
		return $this->db->get()->result();	
	}
	
	function staff_call_log_list($id) 
    {
    	$this->db->where(array('resp_staff_id' => $id));
        $this->db->order_by("id", "desc");
        $this->db->limit(5);
        $this->db->from('calls'); 
        	
		return $this->db->get()->result();	
	}
	
	function staff_contracts_list($id) 
    {
    	$this->db->where(array('resp_staff_id' => $id));
        $this->db->order_by("id", "desc");
        $this->db->limit(5);
        $this->db->from('contracts'); 
        	
		return $this->db->get()->result();	
	}
	
	function staff_leads_event_list($id) 
    {
    	$start = (date('D') != 'Mon') ? date('Y-m-d', strtotime('last Monday')) : date('Y-m-d');
  		
  		 $finish = (date('D') != 'Sat') ? date('Y-m-d', strtotime('next Saturday')) : date('Y-m-d');
  		 
    	 
    	$this->db->where('register_time BETWEEN "'.strtotime($start).'" AND "'.strtotime($finish).'"'); 
		$this->db->where('salesperson_id',$id);
        
        $this->db->order_by("id", "desc");
        $this->db->limit(2);
        $this->db->from('leads'); 
        	
		return $this->db->get()->result();	
	}
	
	function staff_opportunities_event_list($id) 
    {
    	$start = (date('D') != 'Mon') ? date('Y-m-d', strtotime('last Monday')) : date('Y-m-d');
  		
  		 $finish = (date('D') != 'Sat') ? date('Y-m-d', strtotime('next Saturday')) : date('Y-m-d');
  		 
    	 
    	$this->db->where('register_time BETWEEN "'.strtotime($start).'" AND "'.strtotime($finish).'"'); 
		$this->db->where('salesperson_id',$id);
        
        $this->db->order_by("id", "desc");
        $this->db->limit(2);
        $this->db->from('opportunities'); 
        	
		return $this->db->get()->result();	
	}
	
	function staff_logged_call_event_list($id) 
    {
    	$start = (date('D') != 'Mon') ? date('Y-m-d', strtotime('last Monday')) : date('Y-m-d');
  		
  		 $finish = (date('D') != 'Sat') ? date('Y-m-d', strtotime('next Saturday')) : date('Y-m-d');
  		 
    	 
    	$this->db->where('date BETWEEN "'.strtotime($start).'" AND "'.strtotime($finish).'"'); 
		$this->db->where('resp_staff_id',$id);
        
        $this->db->order_by("id", "desc");
        $this->db->limit(2);
        $this->db->from('calls'); 
        	
		return $this->db->get()->result();	
	}
	
	function staff_meetings_event_list($id) 
    {
    	$start = (date('D') != 'Mon') ? date('Y-m-d', strtotime('last Monday')) : date('Y-m-d');
  		
  		 $finish = (date('D') != 'Sat') ? date('Y-m-d', strtotime('next Saturday')) : date('Y-m-d');
  		 
    	 
    	$this->db->where('starting_date BETWEEN "'.strtotime($start).'" AND "'.strtotime($finish).'"'); 
		$this->db->where('responsible',$id);
        
        $this->db->order_by("id", "desc");
        $this->db->limit(2);
        $this->db->from('meetings'); 
        	
		return $this->db->get()->result();	
	}
	
	function staff_contracts_event_list($id) 
    {
    	$start = (date('D') != 'Mon') ? date('Y-m-d', strtotime('last Monday')) : date('Y-m-d');
  		
  		 $finish = (date('D') != 'Sat') ? date('Y-m-d', strtotime('next Saturday')) : date('Y-m-d');
  		 
    	 
    	$this->db->where('end_date BETWEEN "'.strtotime($start).'" AND "'.strtotime($finish).'"'); 
		$this->db->where('resp_staff_id',$id);
        
        $this->db->order_by("id", "desc");
        $this->db->limit(2);
        $this->db->from('contracts'); 
        	
		return $this->db->get()->result();	
	}
	
	function delete_notification( $notification_id )
	{ 
		if( $this->db->delete('notifications',array('id' => $notification_id)) )  // Delete customer
		{  
			return true;
		}
	}
	
}

?>
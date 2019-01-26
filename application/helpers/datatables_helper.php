<?php
class Datatables extends CI_Controller
{
	private $table;
    private $param;
    private $CI;
    private $column_order;
    private $order;

	function __construct($table, $param, $column_order, $order){
		$this->table = $table;
        $this->param = $param;
        $this->column_order = $column_order;
        $this->order = $order;
        $this->CI  =& get_instance();
        $this->CI->load->database();
	}

	public function getDatatableQuery() {
        $this->CI->db->from($this->table);
        $i = 0;

        foreach ($this->param['column_search'] as $item) // loop column 
        {
            if($this->param['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->CI->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->CI->db->like($item, $this->param['search']['value']);
                }
                else
                {
                    $this->CI->db->or_like($item, $this->param['search']['value']);
                }

                if(count($this->param['column_search']) - 1 == $i) //last loop
                    $this->CI->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($this->param['order']['column'])) // here order processing
        {
            $this->CI->db->order_by($this->column_order[ $this->param['order']['column'] ],  $this->param['order']['dir'] );
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->CI->db->order_by($this->param['id'], $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->getDatatableQuery();
        if($this->param['length'] != -1)
        $this->CI->db->limit($this->param['length'], $this->param['start']);
		$query = $this->CI->db->get();
		
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->getDatatableQuery();
		$query = $this->CI->db->get();
		
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->CI->db->from($this->table);
        return $this->CI->db->count_all_results();
    }
}


?>
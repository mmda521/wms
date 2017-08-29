<?php
/**
 *库位模型
 *
 *
 **/

class Month_report_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}
		
		
		/**
		 *导出的数据
		 *
		 *
		 * */
		public function export_data($where = ''){
       		$query = $this->db->select('*')->from('month_report')->where($where)->get();
       		$total = $query->result_array();
       		return $total;

		}
		
		/**
		 *总行数
		 *
		 *
		 * */
		public function count_num($where = ''){
       		$query = $this->db->select('count(*)')->from('month_report')->where($where)->get();
       		$total = $query->row_array();
       		return $total['count(*)'];

		}

		/**
		 *获取数据列表
		 *
		 *
		 * */
		public function get_list($where = '', $limit = '', $offset = '' ){
        	$query = $this->db->select('*')->from('month_report')->where($where)->order_by('report_no','desc')->limit($limit,$offset)->get();
            $list = $query->result_array();
            return $list;
    	}

		
		/**
		 *获取月报编号
		 *
		 *
		 * */
		public function get_report_no($where = '', $limit = '', $offset = ''){
        	//SELECT username FROM `{$this->table_}common_user` where username = '{$username}' limit 1 
        	$query = $this->db->select('report_no')->from('month_report')->where($where)->limit('1')->get();
    		$list = $query->result_array();
    		return $list;
    	}

		/**
		

		
		
		


		
		/  
		/**
		 *删除数据
		 *
		 *
		 * */
		public function delete($report_no){
			//$this->db->where('GUID', $GUID);
            //$this->db->delete('month_report');
			//$this->db->delete('month_report', $data,"index_no=$index_no");	
            $this->db->where_in('report_no',$report_no)->delete('month_report');    		
    		return 'ok';
		}

}


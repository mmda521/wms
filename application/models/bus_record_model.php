<?php
/**
 *库位模型
 *
 *
 **/

class Bus_record_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}
		
		
		/**
		 *导出的数据
		 *
		 *
		 * */
		public function export_data($where = ''){
       		$query = $this->db->select('*')->from('con_freightlot')->where($where)->get();
       		$total = $query->result_array();
       		return $total;

		}
		
		/**
		 *总行数
		 *
		 *
		 * */
		public function count_num($where = ''){
       		$query = $this->db->select('count(*)')->from('bus_record')->where($where)->get();
       		$total = $query->row_array();
       		return $total['count(*)'];

		}

		/**
		 *获取数据列表
		 *
		 *
		 * */
		public function get_list($where = '', $limit = '', $offset = ''){
        	$query = $this->db->select('*')->from('bus_record')->where($where)->limit($limit,$offset)->get();
            $list = $query->result_array();
            return $list;
    	}
		
		public function get_data(){
        	$query = $this->db->select('*')->from('bus_record')->get();
            $list = $query->row_array();
            return $list;
    	}


		/**
		 *插入数据
		 *
		 *
		 * */
		public function insert($data = ''){
        	$this->db->insert('bus_record', $data);
    		//$list = $query->result_array();
    		//return $list;
    		return 'ok';
    	}

		
		
		


		
		/**
		 *更新数据
		 *
		 *
		 * */
           public function update($data = '',$bus_record_id){
			$this->db->where('bus_record_id', $bus_record_id); 
        	$this->db->update('bus_record', $data);	 
    		return 'ok';
    	}
		/**
		 *删除数据
		 *
		 *
		 * */
		public function delete($bus_record_id){	
            $this->db->where_in('bus_record_id',$bus_record_id)->delete('bus_record');    		
    		return 'ok';
		}

}


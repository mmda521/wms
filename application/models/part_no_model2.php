<?php
/**
 *库位模型
 *
 *
 **/

class Part_no_model extends CI_Model {

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
       		$query = $this->db->select('count(*)')->from('part_no')->where($where)->get();
       		$total = $query->row_array();
       		return $total['count(*)'];

		}
		
		/**
		 *总行数
		 *
		 *
		 * */
		public function count_num_id($where = ''){
       		$query = $this->db->select('count(*)')->from('part_no')->where_in('part_id',$where)->get();
       		$total = $query->row_array();
       		return $total['count(*)'];

		}

		/**
		 *获取数据列表
		 *
		 *
		 * */
		public function get_list($where = '', $limit = '', $offset = ''){
        	$query = $this->db->select('*')->from('part_no')->where($where)->limit($limit,$offset)->get();
            $list = $query->result_array();
            return $list;
    	}
		public function get_data($where = ''){
        	$query = $this->db->select('*')->from('part_no')->where($where)->get();
            $list = $query->row_array();
            return $list;
    	}

		
		/**
		 *获取数据列表
		 *
		 *
		 * */
		public function get_list_id($where = '', $limit = '', $offset = ''){
        	$query = $this->db->select('*')->from('part_no')->where_in('item_id',$where)->limit($limit,$offset)->get();
            $list = $query->result_array();
            return $list;
    	}

		/**
		 *插入数据
		 *
		 *
		 * */
		public function insert($data = ''){
        	$this->db->insert('part_no', $data);	
    		
    		//$list = $query->result_array();
    		//return $list;
    		return 'ok';
    	}

		
		
		


		
		/**
		 *更新数据
		 *
		 *
		 * */
           public function update($data = '',$part_id){
			 $this->db->where('part_id', $part_id); 
        	$this->db->update('part_no', $data);	 
    		return 'ok';
    	}
		/**
		 *删除数据
		 *
		 *
		 * */
		public function delete($part_id){	
            $this->db->where_in('part_id',$part_id)->delete('part_no');    		
    		return 'ok';
		}

}


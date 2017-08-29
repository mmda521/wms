<?php
/**
 *库位模型
 *
 *
 **/

class Item_number_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}
		
		
		/**
		 *导出的数据
		 *
		 *
		 * */
		public function export_data($where = ''){
       		$query = $this->db->select('*')->from('item_number')->where_in('g_no',$where)->get();
       		$total = $query->row_array();
       		return $total;

		}
		
		/**
		 *总行数
		 *
		 *
		 * */
		public function count_num($where = ''){
       		$query = $this->db->select('count(*)')->from('item_number')->where($where)->get();
       		$total = $query->row_array();
       		return $total['count(*)'];

		}

		/**
		 *获取数据列表
		 *
		 *
		 * */
		public function get_list($where = '', $limit = '', $offset = ''){
        	$query = $this->db->select('*')->from('item_number')->where($where)->limit($limit,$offset)->get();
            $list = $query->result_array();
            return $list;
    	}

        /**
		 *获取数据列表
		 *
		 *
		 * */
		public function get_data($where = ''){
        	$query = $this->db->select('*')->from('item_number')->where($where)->get();
            $list = $query->result_array();
            return $list;
    	}
		/**
		 *插入数据
		 *
		 *
		 * */
		public function insert($data = ''){
        	$this->db->insert('item_number', $data);	
    		
    		//$list = $query->result_array();
    		//return $list;
    		return 'ok';
    	}

		
		
		


		
		/**
		 *更新数据
		 *
		 *
		 * */
           public function update($data = '',$item_id){
			 $this->db->where('item_id', $item_id); 
        	$this->db->update('item_number', $data);	 
    		return 'ok';
    	}
		/**
		 *删除数据
		 *
		 *
		 * */
		public function delete($item_id){	
            $this->db->where_in('item_id',$item_id)->delete('item_number');    		
    		return 'ok';
		}
		
		
			public function delete_record_id($record_id){			
            $this->db->where_in('record_id',$record_id)->delete('item_number');    		
    		return 'ok';
		}

}


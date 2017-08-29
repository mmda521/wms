<?php
/**
 *库位模型
 *
 *
 **/

class Zhangce_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}
		
		
		/**
		 *导出的数据
		 *
		 *
		 * */
		public function export_data($where = ''){
			//PC::debug($where);
       		$query = $this->db->select('*')->from('kbook_record')->where_in('record_id',$where)->get();
       		$total = $query->row_array();
       		return $total;

		}
		
		/**
		 *总行数
		 *
		 *
		 * */
		public function count_num($where = ''){
       		$query = $this->db->select('count(*)')->from('kbook_record')->where($where)->get();
       		$total = $query->row_array();
       		return $total['count(*)'];

		}

		/**
		 *获取数据列表
		 *
		 *
		 * */
		public function get_list($where = '', $limit = '', $offset = ''){
        	$query = $this->db->select('*')->from('kbook_record')->where($where)->limit($limit,$offset)->get();
            $list = $query->result_array();
            return $list;
    	}


		/**
		 *插入数据
		 *
		 *
		 * */
		public function insert($data = ''){
        	$this->db->insert('kbook_record', $data);	
    		
    		//$list = $query->result_array();
    		//return $list;
    		return 'ok';
    	}

		
		
		


		
		/**
		 *更新数据
		 *
		 *
		 * */
           public function update($data = '',$record_id){
			 $this->db->where('record_id', $record_id); 
        	$this->db->update('kbook_record', $data);	 
    		return 'ok';
    	}
		/**
		 *删除数据
		 *
		 *
		 * */
		public function delete($record_id){			
            $this->db->where_in('record_id',$record_id)->delete('kbook_record');    		
    		return 'ok';
		}

}


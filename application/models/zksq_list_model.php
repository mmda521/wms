<?php
/**
 *库位模型
 *
 *
 **/

class Zksq_list_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}
		
		
		/**
		 *导出的数据
		 *
		 *
		 * */
		public function export_data($where = ''){
       		$query = $this->db->select('*')->from('zksq_list')->where($where)->get();
       		$total = $query->result_array();
       		return $total;

		}
		
		/**
		 *总行数
		 *
		 *
		 * */
		public function count_num($where = ''){
       		$query = $this->db->select('count(*)')->from('zksq_list')->where($where)->get();
       		$total = $query->row_array();
       		return $total['count(*)'];

		}

		/**
		 *获取数据列表
		 *
		 *
		 * */
		public function get_list($where = '', $limit = '', $offset = ''){
        	$query = $this->db->select('*')->from('zksq_list')->where($where)->order_by('zksq_list_id','desc')->limit($limit,$offset)->get();
            $list = $query->result_array();
            return $list;
    	}

		
		/**
		 *获取库位号
		 *
		 *
		 * */
		public function get_zksq_id($where = '', $limit = '', $offset = ''){
        	//SELECT username FROM `{$this->table_}common_user` where username = '{$username}' limit 1 
        	$query = $this->db->select('zksq_list_id')->from('zksq_list')->where($where)->limit('1')->get();
    		$list = $query->result_array();
    		return $list;
    	}

		/**
		 *插入数据
		 *
		 *
		 * */
		public function insert($data = ''){
		     
        	PC::debug($data);
			$this->db->insert('zksq_list', $data);	
    		
    		//$list = $query->result_array();
    		//return $list;
    		return 'ok';
    	}

		
		
		


		
		/**
		 *更新数据
		 *
		 *
		 * */
           public function update($data = '',$zksq_list_id){
			 $this->db->where('zksq_list_id', $zksq_list_id); 
			PC::debug($data);
        	$this->db->update('zksq_list', $data);	 
        	
    		return 'ok';
    	}
		/**
		 *删除数据
		 *
		 *
		 * */
		public function delete($zksq_list_id){
				
            $this->db->where_in('zksq_list_id',$zksq_list_id)->delete('zksq_list');    		
    		return 'ok';
		}

}


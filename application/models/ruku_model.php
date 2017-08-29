<?php
/**
 *库位模型
 *
 *
 **/

class Ruku_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}
		
		
		/**
		 *导出的数据
		 *
		 *
		 * */
		public function export_data($where = ''){
       		$query = $this->db->select('*')->from('ruku_bill')->where($where)->get();
       		$total = $query->result_array();
       		return $total;

		}
		
		/**
		 *总行数
		 *
		 *
		 * */
		public function count_num($where = ''){
       		$query = $this->db->select('count(*)')->from('ruku_bill')->where($where)->get();
       		$total = $query->row_array();
       		return $total['count(*)'];

		}

		/**
		 *获取数据列表
		 *
		 *
		 * */
		public function get_list($where = '', $limit = '', $offset = ''){
        	$query = $this->db->select('*')->from('ruku_bill')->where($where)->order_by('rk_id','desc')->limit($limit,$offset)->get();
            $list = $query->result_array();
            return $list;
    	}

		
		/**
		 *获取库位号
		 *
		 *
		 * */
		public function get_rk_id($where = '', $limit = '', $offset = ''){
        	//SELECT username FROM `{$this->table_}common_user` where username = '{$username}' limit 1 
        	$query = $this->db->select('rk_id')->from('ruku_bill')->where($where)->limit('1')->get();
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
			$this->db->insert('ruku_bill', $data);	
    		
    		//$list = $query->result_array();
    		//return $list;
    		return 'ok';
    	}

		
		
		


		
		/**
		 *更新数据
		 *
		 *
		 * */
           public function update($data = '',$rk_id){
			 $this->db->where('rk_id', $rk_id); 
			 
        	$this->db->update('ruku_bill', $data);	 
        	
    		return 'ok';
    	}
		/**
		 *删除数据
		 *
		 *
		 * */
		public function delete($rk_id){
			
			PC::debug($rk_id);	
            $this->db->where_in('rk_id',$rk_id)->delete('ruku_bill');    		
    		return 'ok';
		}

}


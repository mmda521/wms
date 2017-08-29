<?php
/**
 *库位模型
 *
 *
 **/

class Putpre_head_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}
		
		
		/**
		 *导出的数据
		 *
		 *
		 * */
		public function export_data($where = ''){
       		$query = $this->db->select('*')->from('store_bill_in_head')->where($where)->get();
       		$total = $query->result_array();
       		return $total;

		}
		
		/**
		 *总行数
		 *
		 *
		 * */
		public function count_num($where = ''){
       		$query = $this->db->select('count(*)')->from('store_bill_in_head')->where($where)->get();
       		$total = $query->row_array();
       		return $total['count(*)'];

		}

		/**
		 *获取数据列表
		 *
		 *
		 * */
		public function get_list($where = '', $limit = '', $offset = ''){
        	$query = $this->db->select('*')->from('store_bill_in_head')->where($where)->order_by('putpre_head_id','desc')->limit($limit,$offset)->get();
            $list = $query->result_array();
            return $list;
    	}

		/**
		 *获取数据列表
		 *
		 *
		 * */
		public function get_data($where = '', $limit = '', $offset = ''){
        	$query = $this->db->select('*')->from('store_bill_in_head')->where($where)->order_by('putpre_head_id','desc')->limit($limit,$offset)->get();
            $list = $query->row_array();
            return $list;
    	}
		
		/**
		 *获取库位号
		 *
		 *
		 * */
		public function get_putpre_id($where = '', $limit = '', $offset = ''){
        	//SELECT username FROM `{$this->table_}common_user` where username = '{$username}' limit 1 
        	$query = $this->db->select('putpre_head_id')->from('store_bill_in_head')->where($where)->limit('1')->get();
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
        	$this->db->insert('store_bill_in_head', $data);	
    		
    		//$list = $query->result_array();
    		//return $list;
    		return 'ok';
    	}

		
		
		


		
		/**
		 *更新数据
		 *
		 *
		 * */
           public function update($data = '',$putpre_head_id){
			 $this->db->where('putpre_head_id', $putpre_head_id); 
			 PC::debug($data);
        	$this->db->update('store_bill_in_head', $data);	 
        	
    		return 'ok';
    	}
		/**
		 *删除数据
		 *
		 *
		 * */
		public function delete($putpre_head_id){
				
            $this->db->where_in('putpre_head_id',$putpre_head_id)->delete('store_bill_in_head');    		
    		return 'ok';
		}

}


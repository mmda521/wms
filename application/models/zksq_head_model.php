<?php
/**
 *库位模型
 *
 *
 **/

class Zksq_head_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}
		
		
		/**
		 *导出的数据
		 *
		 *
		 * */
		public function export_data($where = ''){
       		$query = $this->db->select('*')->from('zksq_head')->where($where)->get();
       		$total = $query->result_array();
       		return $total;

		}
		
		/**
		 *总行数
		 *
		 *
		 * */
		public function count_num($where = ''){
       		$query = $this->db->select('count(*)')->from('zksq_head')->where($where)->get();
       		$total = $query->row_array();
       		return $total['count(*)'];

		}

		/**
		 *获取数据列表
		 *
		 *
		 * */
		public function get_list($where = '', $limit = '', $offset = ''){
        	$query = $this->db->select('*')->from('zksq_head')->where($where)->order_by('zksq_head_id','desc')->limit($limit,$offset)->get();
            $list = $query->result_array();
            return $list;
    	}

		/**
		 *获取数据列表
		 *
		 *
		 * */
		public function get_data($where = '', $limit = '', $offset = ''){
        	$query = $this->db->select('*')->from('zksq_head')->where($where)->order_by('zksq_head_id','desc')->limit($limit,$offset)->get();
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
        	$query = $this->db->select('zksq_head_id')->from('zksq_head')->where($where)->limit('1')->get();
    		$list = $query->result_array();
    		return $list;
    	}

		/**
		 *插入数据
		 *
		 *
		 * */
		public function insert($data = ''){
		     
        	$this->db->insert('zksq_head', $data);	
    		
    		return 'ok';
    	}

		
		
		


		
		/**
		 *更新数据
		 *
		 *
		 * */
           public function update($data = '',$zksq_head_id){
			 $this->db->where('zksq_head_id', $zksq_head_id); 
        	$this->db->update('zksq_head', $data);	 
    		return 'ok';
    	}
		/**
		 *删除数据
		 *
		 *
		 * */
		public function delete($zksq_head_id){
				
            $this->db->where_in('zksq_head_id',$zksq_head_id)->delete('zksq_head');    		
    		return 'ok';
		}

}


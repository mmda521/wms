<?php
/**
 *库位模型
 *
 *
 **/

class Kuweiguanli_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}
		
		
		/**
		 *导出的数据
		 *
		 *
		 * */
		public function export_data($where = ''){
       		$query = $this->db->select('*')->from('location_manage')->where($where)->get();
       		$total = $query->result_array();
       		return $total;

		}
		
		/**
		 *总行数
		 *
		 *
		 * */
		public function count_num($where = ''){
       		$query = $this->db->select('count(*)')->from('location_manage')->where($where)->get();
       		$total = $query->row_array();
       		return $total['count(*)'];

		}

		/**
		 *获取数据列表
		 *
		 *
		 * */
		public function get_list($where = '', $limit = '', $offset = ''){
        	$query = $this->db->select('*')->from('location_manage')->where($where)->order_by('location_no','desc')->limit($limit,$offset)->get();
            $list = $query->result_array();
            return $list;
    	}
       
		
		/**
		 *获取库位号
		 *
		 *
		 * */
		public function get_location_no($where = '', $limit = '', $offset = ''){
        	//SELECT username FROM `{$this->table_}common_user` where username = '{$username}' limit 1 
        	$query = $this->db->select('location_no')->from('location_manage')->where($where)->limit('1')->get();
    		$list = $query->result_array();
    		return $list;
    	}

		/**
		 *插入数据
		 *
		 *
		 * */
		public function insert($data = ''){
        	$this->db->insert('location_manage', $data);	
    		
    		//$list = $query->result_array();
    		//return $list;
    		return 'ok';
    	}

		
		
		


		
		/**
		 *更新数据
		 *
		 *
		 * */
           public function update($data = '',$location_id){
			 $this->db->where('location_id', $location_id); 
        	$this->db->update('location_manage', $data);	 
			
    		return 'ok';
    	}
		 public function update1($data = '',$location_name){
			 $this->db->where('location_name', $location_name); 
        	$this->db->update('location_manage', $data);	 
			
    		return 'ok';
    	}
		/**
		 *删除数据
		 *
		 *
		 * */
		public function delete($location_id){
			//$this->db->where('GUID', $GUID);
            //$this->db->delete('location_manage');
			//$this->db->delete('location_manage', $data,"index_no=$index_no");	
            $this->db->where_in('location_id',$location_id)->delete('location_manage');    		
    		return 'ok';
		}

}


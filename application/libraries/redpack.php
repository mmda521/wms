<?php
/*
 *红包接口
 *
 */
if (! defined('BASEPATH')) {
    exit('Access Denied');
}

class Redpack{

	function __construct() {
		
	}

        //var_dump($re);
		
		//普通红包
		//$re_openid 用户openid
		//$total_amount 红包金额默认为100
		//$scene_id 当红包金额大于200时必需
		function sendredpack($re_openid,$total_amount=100,$scene_id=''){
			//return '123';
			$mch_billno = '1417986702'.date("YmdHis",time()).rand(1000, 9999);      //商户订单号
			$mch_id = '1417986702';                         //微信支付分配的商户号
			$wxappid = 'wxd3e30b0c1f79a434';        //公众账号appid
			$send_name = "中浩信息科技";                          //商户名称
			//$re_openid = "oyTynw89Gf5ZLL8EbTfXnZH-Ij6c";         //用户openid
			//$total_amount = "100";                              // 付款金额，单位分
			$total_num = 1;                                          //红包发放总人数
			$wishing = "恭喜发财";                             //红包祝福语
			$client_ip = "117.158.156.136";                //Ip地址
			$act_name = "关注有礼";                         //活动名称
			//$scene_id = "PRODUCT_1";
			$remark = "测试";                                      //备注
			$apikey = "WdrxUZ5e4VDd4YQSKcCZoxHWXxdd24Uo";   // key 商户后台设置的  微信商户平台(pay.weixin.qq.com)-->账户设置-->API安全-->密钥设置
			$nonce_str =  md5(rand());                                  //随机字符串，不长于32位
			$m_arr = array (
				'mch_billno' => $mch_billno,
				'mch_id' => $mch_id,
				'wxappid' => $wxappid,
				'send_name' => $send_name,
				're_openid' => $re_openid,
				'total_amount' => $total_amount,
				'total_num' => $total_num,
				'wishing' => $wishing,
				'client_ip' => $client_ip,
				'act_name' => $act_name,
				'remark' => $remark,
				//'scene_id' => $scene_id,
				'nonce_str'=> $nonce_str
			);
			array_filter($m_arr ); // 清空参数为空的数组元素
			ksort($m_arr ); // 按照参数名ASCII码从小到大排序
			$stringA = "";
			foreach ($m_arr as $key => $row){
				$stringA .= "&" . $key . '=' . $row;
			}
			$stringA = substr ( $stringA, 1 );
			//拼接API密钥：
			$stringSignTemp = $stringA."&key=" . $apikey;
			$sign = strtoupper(md5($stringSignTemp));         //签名
			//echo $sign;
			$textTpl = '<xml>
						<sign><![CDATA[%s]]></sign>
						<mch_billno><![CDATA[%s]]></mch_billno>
						<mch_id><![CDATA[%s]]></mch_id>
						<wxappid><![CDATA[%s]]></wxappid>
						<send_name><![CDATA[%s]]></send_name>
						<re_openid><![CDATA[%s]]></re_openid>
						<total_amount><![CDATA[%s]]></total_amount>
						<total_num><![CDATA[%s]]></total_num>
						<wishing><![CDATA[%s]]></wishing>
						<client_ip><![CDATA[%s]]></client_ip>
						<act_name><![CDATA[%s]]></act_name>
						<remark><![CDATA[%s]]></remark>
						<nonce_str><![CDATA[%s]]></nonce_str>
						</xml>';
			$resultStr = sprintf($textTpl, $sign, $mch_billno, $mch_id, $wxappid, $send_name,$re_openid,$total_amount,$total_num,$wishing,$client_ip,$act_name,$remark,$nonce_str);
			$url = "https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack";
			return $this->curl_post_ssl($url, $resultStr);
}
		
		
        //裂变红包
		//$re_openid 用户openid
		//$total_amount 红包金额默认为300
		//$total_num 红包金额默认为3
        function sendgroupredpack($re_openid,$total_amount='300',$total_num='3')
		{
			$mch_billno = '1417986702'.date("YmdHis",time()).rand(1000,9999);//商户订单号
			$mch_id = '1417986702';//微信支付分配的商户号
			$wxappid = 'wxd3e30b0c1f79a434';//公众账号appid
			$send_name = "中浩信息科技";//商户名称
			//$re_openid = "oyTynw89Gf5ZLL8EbTfXnZH-Ij6c"; //用户openid
			//付款金额，默认300
			//if($total_amount == ''){
				//$total_amount = 300;
			//}                              
			//红包发放总人数,默认3
			//if($total_num == ''){
				//$total_num = 3;
			//}                                          
			$amt_type = "ALL_RAND";                      //红包金额设置方式 ALL_RAND—全部随机,商户指定总金额和红包发放总人数，由微信支付随机计算出各红包金额
			$wishing = "恭喜发财";                             //红包祝福语
			$act_name = "关注有礼";                         //活动名称
			$remark = "测试";                                      //备注
			$apikey = "WdrxUZ5e4VDd4YQSKcCZoxHWXxdd24Uo";   // key 商户后台设置的  微信商户平台(pay.weixin.qq.com)-->账户设置-->API安全-->密钥设置
			$nonce_str =  md5(rand());                                  //随机字符串，不长于32位
			$m_arr = array (
				'mch_billno' => $mch_billno,
				'mch_id' => $mch_id,
				'wxappid' => $wxappid,
				'send_name' => $send_name,
				're_openid' => $re_openid,
				'total_amount' => $total_amount,
				'total_num' => $total_num,
				'amt_type' => $amt_type,
				'wishing' => $wishing,
				'act_name' => $act_name,
				'remark' => $remark,
				'nonce_str'=> $nonce_str
			);
			array_filter ($m_arr); // 清空参数为空的数组元素
			ksort ($m_arr); // 按照参数名ASCII码从小到大排序
			$stringA = "";
			foreach ($m_arr as $key => $row ) {
				$stringA .= "&" . $key . '=' . $row;
			}
			 $stringA = substr ( $stringA, 1 );
			// 拼接API密钥：
			$stringSignTemp = $stringA."&key=" . $apikey;
			$sign = strtoupper ( md5 ( $stringSignTemp ) );         //签名
                $textTpl = '<xml>
							<sign><![CDATA[%s]]></sign>
							<mch_billno><![CDATA[%s]]></mch_billno>
							<mch_id><![CDATA[%s]]></mch_id>
							<wxappid><![CDATA[%s]]></wxappid>
							<send_name><![CDATA[%s]]></send_name>
							<re_openid><![CDATA[%s]]></re_openid>
							<total_amount><![CDATA[%s]]></total_amount>
							<amt_type><![CDATA[%s]]></amt_type>
							<total_num><![CDATA[%s]]></total_num>
							<wishing><![CDATA[%s]]></wishing>
							<act_name><![CDATA[%s]]></act_name>
							<remark><![CDATA[%s]]></remark>
							<nonce_str><![CDATA[%s]]></nonce_str>
							</xml>';
			$resultStr = sprintf($textTpl, $sign, $mch_billno, $mch_id, $wxappid, $send_name,$re_openid,$total_amount,$amt_type,$total_num,$wishing,$act_name,$remark,$nonce_str);
			$url = "https://api.mch.weixin.qq.com/mmpaymkttransfers/sendgroupredpack";
			return $this->curl_post_ssl($url, $resultStr);
		}
		
		//红包查询
		function gethbinfo($mch_billno='')
		{
			$mch_id = '1417986702';//商户号
			$appid = 'wxd3e30b0c1f79a434';//Appid
			$bill_type = 'MCHT';//订单类型
			$apikey = "WdrxUZ5e4VDd4YQSKcCZoxHWXxdd24Uo";//key商户后台设置的
			$nonce_str =  md5(rand());//随机字符串
			$m_arr = array (
				'mch_id' => $mch_id,
				'appid' => $appid,
				'mch_billno' => $mch_billno,
				'bill_type' => $bill_type,
				'nonce_str'=> $nonce_str
			);
			array_filter($m_arr); // 清空参数为空的数组元素
			ksort ($m_arr); // 按照参数名ASCII码从小到大排序
			$stringA = "";
			foreach ( $m_arr as $key => $row ) {
				$stringA .= "&".$key.'='.$row;
			}
			$stringA = substr($stringA,1);
			// 拼接API密钥：
			$stringSignTemp = $stringA."&key=".$apikey;
			$sign = strtoupper(md5($stringSignTemp));//签名
			 
			$textTpl = '<xml>
						<sign><![CDATA[%s]]></sign>
						<mch_billno><![CDATA[%s]]></mch_billno>
						<mch_id><![CDATA[%s]]></mch_id>
						<appid><![CDATA[%s]]></appid>
						<bill_type><![CDATA[%s]]></bill_type>
						<nonce_str><![CDATA[%s]]></nonce_str>
						</xml>';
			$resultStr = sprintf($textTpl,$sign,$mch_billno, $mch_id, $appid, $bill_type,$nonce_str);
			$url = 'https://api.mch.weixin.qq.com/mmpaymkttransfers/gethbinfo';
			return $this->curl_post_ssl($url, $resultStr);
			
		}
		
		function curl_post_ssl($url, $vars, $second=30,$aHeader=array())
		{
			$ch = curl_init();
			//超时时间
			curl_setopt($ch,CURLOPT_TIMEOUT,$second);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
			//这里设置代理，如果有的话
			//curl_setopt($ch,CURLOPT_PROXY, '10.206.30.98');
			//curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
			curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
			//以下两种方式需选择一种
		 	//第一种方法，cert 与 key 分别属于两个.pem文件
			//默认格式为PEM，可以注释
			curl_setopt($ch,CURLOPT_SSLCERTTYPE,'PEM');
			curl_setopt($ch,CURLOPT_SSLCERT,'D:/certificate/apiclient_cert.pem');
			// 默认格式为PEM，可以注释
			curl_setopt($ch,CURLOPT_SSLKEYTYPE,'PEM');
			curl_setopt($ch,CURLOPT_SSLKEY,'D:/certificate/apiclient_key.pem');
			
			//第二种方式，两个文件合成一个.pem文件
			//curl_setopt($ch,CURLOPT_SSLCERT,getcwd().'/all.pem');
			if( count($aHeader) >= 1 ){
				curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
			}
			curl_setopt($ch,CURLOPT_POST, 1);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$vars);
			$data = curl_exec($ch);
			if($url === 'https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack' || $url == 'https://api.mch.weixin.qq.com/mmpaymkttransfers/sendgroupredpack')
			{	
				if($data){
					//echo($data);
					$arr = '';
					$xml = simplexml_load_string($data);
					$arr['send_listid'] = ((string)$xml->send_listid);
					$arr['mch_billno'] = ((string)$xml->mch_billno);
					return($arr);
				}else{
					$error = curl_errno($ch);
					//echo "call faild, errorCode:$error\n";
					curl_close($ch);
					return false;
				}
			}else if($url === 'https://api.mch.weixin.qq.com/mmpaymkttransfers/gethbinfo')
			{	
				
				if($data){
					$arr = '';
					$xml = simplexml_load_string($data);
					
					$arr['mch_billno'] = ((string)$xml->mch_billno);
					$arr['mch_id'] = ((string)$xml->mch_id);
					$arr['detail_id'] = ((string)$xml->detail_id);
					$arr['status'] = ((string)$xml->status);
					$arr['send_type'] = ((string)$xml->send_type);
					$arr['hb_type'] = ((string)$xml->hb_type);
					$arr['toatl_num'] = ((string)$xml->total_num);
					$arr['total_amount'] = ((string)$xml->total_amount);
					$arr['reason'] = ((string)$xml->reason);
					$arr['send_time'] = ((string)$xml->send_time);
					$arr['refund_time'] = ((string)$xml->refund_time);
					$arr['refund_amount'] = ((string)$xml->refund_amount);
					$arr['act_name'] = ((string)$xml->act_name);
					$hblist = $xml->hblist;
					$i = -1;
					$hb_one = '';
					$hbinfo_list = '';
					foreach($hblist->children() as $childltem)
					{	
						$i += 1 ;
						foreach($childltem->children() as $childltem1)
						{
							$hb_one[$childltem1->getName()] = ((string)$childltem1);
						}
						$hbinfor_list[$i] = $hb_one; 
					}
					$arr['hblist'] = $hbinfor_list;
					return($arr);
				}else{
					$error = curl_errno($ch);
					//echo "call faild, errorCode:$error\n";
					curl_close($ch);
					return false;
					}
				
			}else{
					return false;
				}
		}
	
	
}

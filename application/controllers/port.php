<?php


class Port extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        $this->load->helper('guid');
        $this->load->library("common_page");  
        $this->load->model('location_model');      
        $this->load->library('session');    
    }
	
	public function port(){
	//报文头部信息
	
	$messageType = "";//报文业务类型
	$messageId = "";//报文传输编号	数据交换的报文唯一标识编号, 报文业务类型_环节号(申报S/回执R)_申报系统（平台代码）_ 发送企业编码（报文发出点地址）_接受企业编码（报文接受点代码）_业务单号（SeqNo）_年月日时分秒毫秒_随机码（36位）
	$messageTime = Date();//报文传输时间		报文的生成或发送时间：yyyy-MM-ddTHH:mm:ss.fff
	exit($messageTime);
	$senderId = "";//报文发送者编号	报文发出点代码：平台代码（由双方协定）
	$senderAddress = "";//报文发送者地址	报文发出点地址：平台代码地址（由双方协定）
	$receiverId = "";//报文接收者编号	报文接受点代码：平台代码（由双方协定）
	$receiveAddress = "";//报文接收者地址	报文接受地址: 平台代码地址（由双方协定）
	$platFromNo = "";//结点编号	填写企业10位海关代码
	$customCode = "";//海关代码	主管海关4位编号
	$seqNo = "";//业务单号	单证的主单号
	$note = "";//备注
	
	$message_header = <<<abc
	<?xml version="1.0" encoding="utf-8"?>
    <DTC_Message>
    	<MessageHeader>
        	<MessageType>$messageType</MessageType>
            <MessageId>$messageId</MessageId>
            <MessageTime>$messageTime</MessageTime>
            <SenderId>$senderId</SenderId>
            <SenderAddress>$senderAddress</SenderAddress>
            <ReceiverId>$receiverId</ReceiverId>
            <ReceiverAddress>$receiveAddress</ReceiverAddress>
            <PlatFromNo>$platFromNo</PlatFromNo>
            <CustomCode>$customCode</CustomCode>
            <SeqNo>$seqNo</SeqNo>
            <Note>$note</Note>
        </MessageHeader>
        <MessageBody>
        
        </MessageBody>
    </DTC_Message>
    abc;
    
    }
}
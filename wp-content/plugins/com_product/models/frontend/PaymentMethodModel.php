<?php
class PaymentMethodModel{	
	public function getDDLPaymentMethod(){	
		global $wpdb;
		$table = $wpdb->prefix . 'shk_payment_method';	
		$sql = "SELECT 	p.id,p.title 
FROM 	`".$table."` AS p 
WHERE 	p.`status`=1 
UNION
SELECT 0 AS id,'' AS title
ORDER BY title ASC" ;
		$result = $wpdb->get_results($sql,ARRAY_A);		
		return $result;
	}
	public function getPaymentMethodDetail($payment_method_id){	
		global $wpdb;
		$table = $wpdb->prefix . 'shk_payment_method';	
		$sql = " SELECT p.* FROM `".$table."` AS p WHERE p.id=".$payment_method_id ;
		$result = $wpdb->get_row($sql, ARRAY_A);			
		return $result;
	}
}
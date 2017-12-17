<?php 

	global $zController,$zendvn_sp_settings;	
	
	$msg = '';
	if(count($zController->_error)>0){
		$msg .= '<div class="error"><ul>';		
		foreach ($zController->_error as $key => $val){
			$msg .= '<li>' . $val . '</li>';
		}
		$msg .= '</ul></div>';
	}		
	$vHtml = new HtmlControl();	
	$page 	= $zController->getParams('page');		
	$action = ($zController->getParams('action') != '')? $zController->getParams('action'):'add';	
	$lbl 	= 'Invoice';			
	$lblCode 	= 	@$zController->_data['code'];
	$lblCreatedDate 	=$zController->getHelper('DateTimeConverter')->datetimeConverterVn(@$zController->_data['created_date']) 	;
	$lblUsername 	= 	@$zController->_data['username'];
	$inputEmail 	= $vHtml->cmsTextbox('email','email',"regular-text",sanitize_text_field(@$zController->_data['email']))	;
	$inputFullname 	=$vHtml->cmsTextbox('fullname','fullname',"regular-text",sanitize_text_field(@$zController->_data['fullname']));
	$inputAddress 	=$vHtml->cmsTextbox('address','address',"regular-text",sanitize_text_field(@$zController->_data['address']));
	$inputPhone 	=$vHtml->cmsTextbox('phone','phone',"regular-text",sanitize_text_field(@$zController->_data['phone']));
	$inputMobilePhone 	=$vHtml->cmsTextbox('mobilephone','mobilephone',"regular-text",sanitize_text_field(@$zController->_data['mobilephone']));
	$inputFax 	=$vHtml->cmsTextbox('fax','fax',"regular-text",sanitize_text_field(@$zController->_data['fax']));
	$lblPaymentMethodTitle=@$zController->_data["payment_method_title"];
	$lblQuantity 	= number_format(@$zController->_data['quantity'],0,",",".")	;
	$lblTotalPrice 	=$vHtml->fnPrice(@$zController->_data['total_price']) 	;
	$status                 =   (count(@$zController->_data) > 0) ? (int)@$zController->_data['status'] : 1 ;
	$arrStatus              =   array(-1 => '- Select status -', 1 => 'Hiển thị', 0 => 'Ẩn');  
	$ddlStatus              =   $vHtml->cmsSelectbox("status","status","form-control",$arrStatus,$status,"");
	// lấy danh sách chi tiết đơn hàng
	$invoiceDetailModel=$zController->getModel("/backend","AdminInvoiceModel");
	$arrInvoiceDetail=$invoiceDetailModel->getInvoiceDetail();		
?>
<div class="wrap">
	<h1><?php echo $lbl;?></h1>
	<?php echo $msg;?>
	<form method="post" action="" id="<?php echo $page;?>"
		enctype="multipart/form-data">
		<input name="action" value="<?php echo $action;?>" type="hidden">				
		<?php wp_nonce_field($action,'security_code',true);?>				
		<table class="content-form">
				<tr>
					<td scope="row" align="right">
						<label><i><b>Code :</b></i></label>
					</td>
					<td><?php echo $lblCode;?></td>
				</tr>	
				<tr>
					<td scope="row" align="right">
						<label><i><b>Created date :</b></i></label>
					</td>
					<td><?php echo $lblCreatedDate;?></td>
				</tr>	
				<tr>
					<td scope="row" align="right">
						<label><i><b>Username :</b></i></label>
					</td>
					<td><?php echo $lblUsername;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i><b>Email :</b></i></label>
					</td>
					<td><?php echo $inputEmail;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i></i><b>Fullname :</b></label>
					</td>
					<td><?php echo $inputFullname;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i><b>Address :</b></i></label>
					</td>
					<td><?php echo $inputAddress;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i><b>Phone :</b></i></label>
					</td>
					<td><?php echo $inputPhone;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i><b>Mobilephone :</b></i></label>
					</td>
					<td><?php echo $inputMobilePhone;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i><b>Fax :</b></i></label>
					</td>
					<td><?php echo $inputFax;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i><b>Payment method :</b></i></label>
					</td>
					<td><?php echo $lblPaymentMethodTitle;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i><b>Quantity :</b></i></label>
					</td>
					<td><?php echo $lblQuantity;?></td>
				</tr>	
				<tr>
					<td scope="row" align="right">
						<label><i><b>Total price :</b></i></label>
					</td>
					<td><?php echo $lblTotalPrice;?></td>
				</tr>											
				<tr>
					<td scope="row" align="right">
						<label><i><b>Status :</b></i></label>
					</td>
					<td><?php echo $ddlStatus;?></td>
				</tr>							
		</table>		
		<p class="submit">
			<input name="submit" id="submit" class="button button-primary" value="Save Changes" type="submit">
		</p>
	</form>
	<div>
		<table width="100%" id="com_product16" class="com_product16">
			<thead>
				<tr>
					<th>Code</th>
					<th>Name</th>
					<th>Image</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total price</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$width=$zendvn_sp_settings["product_width"];	
		$height=$zendvn_sp_settings["product_height"];		
			foreach ($arrInvoiceDetail as $key => $value) {
				$product_code=$value["product_code"];
				$product_name=$value["product_name"];
				$product_image=$value["product_image"];
				$newFileUrl=wp_upload_dir()["url"] . DS . $width . "x" . $height . "-" . $product_image; 
				$product_price=$vHtml->fnPrice(@$value["product_price"]) ;
				$product_quantity=number_format($value["product_quantity"],0,",",".") ;
				$product_total_price=$vHtml->fnPrice(@$value["product_total_price"]);
			 	?>
			 	<tr>
					<td><?php echo $product_code; ?></td>
					<td><?php echo $product_name; ?></td>
					<td align="center"><img  src="<?php echo $newFileUrl; ?>" width="84" height="112" /></td>
					<td align="right"><?php echo $product_price; ?></td>
					<td align="right"><?php echo $product_quantity; ?></td>
					<td align="right"><?php echo $product_total_price; ?></td>
				</tr>
			 	<?php
			 } 
			?>				
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" align="center"><b>Tổng cộng</b></td>
					<td align="right"><?php echo $lblQuantity; ?></td>
					<td align="right"><?php echo $lblTotalPrice; ?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

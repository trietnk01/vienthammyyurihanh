<div class="our-member relative">
    <div class="opacity-absolute"></div>    
</div>
<div class="container margin-top-15">  
<?php    
    $meta_key="_zendvn_sp_zaproduct_";
    $vHtml=new HtmlControl();
    if(have_posts()){
        while (have_posts()) {
            the_post();
            echo '<h3 class="ecommerce">'.get_the_title().'</h3>';
        }
        wp_reset_postdata();
    }
    $msg = "";
    $data=array();        
    if(count($zController->_data["data"]) > 0){
        $data=$zController->_data["data"];
    }
    $error=$zController->_data["error"];        
    if(count($error) > 0){
        $msg .= '<ul class="comproduct33">';        
        foreach ($error as $key => $val){
            $msg .= '<li>' . $val . '</li>';
        }
        $msg .= '</ul>';
        echo $msg;
    }        
?>   
<form method="post" name="frm" class="margin-top-15">    
    <input type="hidden" name="action" value="register-member" />                      
                        <?php wp_nonce_field("register-member",'security_code',true);?>                      
    <table id="com_product30" class="com_product30" border="0" width="90%" cellpadding="0" cellspacing="0">                   
        <tbody>        
            <tr>
                <td align="right">Tài khoản</td>
                <td><input type="text" name="username" value="<?php echo @$data["username"]; ?>" /></td>        
            </tr>       
            <tr>
                <td align="right">Mật khẩu</td>
                <td><input type="password" name="password" value="<?php echo @$data["password"]; ?>" /></td>        
            </tr>
            <tr>
                <td align="right">Xác nhận mật khẩu</td>
                <td><input type="password" name="password_confirm" value="<?php echo @$data["password_confirm"]; ?>" /></td>        
            </tr>               
            <tr>
                <td align="right">Email</td>
                <td><input type="text" name="email" value="<?php echo @$data["email"]; ?>" /></td>                   
            </tr>                     
            <tr>
                <td align="right">Tên</td>
                <td><input type="text" name="fullname" value="<?php echo @$data["fullname"]; ?>" /></td>            
            </tr>
            <tr>
                <td align="right">Địa chỉ</td>
                <td><input type="text" name="address" value="<?php echo @$data["address"]; ?>" /></td>            
            </tr>                
            <tr>
                <td align="right">Phone</td>
                <td><input type="text" name="phone" value="<?php echo @$data["phone"]; ?>" /></td>            
            </tr>
            <tr>
                <td align="right">Mobile phone</td>
                <td><input type="text" name="mobilephone" value="<?php echo @$data["mobilephone"]; ?>" /></td>            
            </tr>
            <tr>
                <td align="right">Fax</td>
                <td><input type="text" name="fax" value="<?php echo @$data["fax"]; ?>" /></td>            
            </tr>   
            <tr>           
                <td></td>
                <td class="com_product31" align="right">
                    <input name="btnRegisterMember" type="submit" class="com_product32" />
                                 
                </td>                      
            </tr> 
        </tbody>    
    </table>
</form>
</div>

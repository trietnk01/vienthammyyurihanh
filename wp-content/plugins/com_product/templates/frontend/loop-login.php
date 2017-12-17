<div class="our-member relative">
    <div class="opacity-absolute"></div>    
</div>
<div class="container margin-top-15">  
    <?php  
    $vHtml=new HtmlControl(); 
    if(have_posts()){
        while (have_posts()) {
            the_post();
            echo '<h3 class="ecommerce">'.get_the_title().'</h3>';
        }
        wp_reset_postdata();
    }
    $msg = "";
    $data=$zController->_data["data"];
    $error=$zController->_data["error"];  
    $success=$zController->_data["success"];      
    if(!empty($error)){
        $msg .= '<ul class="comproduct33">';        
        foreach ($error as $key => $val){
            $msg .= '<li>' . $val . '</li>';
        }
        $msg .= '</ul>';
    }
    else{
        if(!empty($success)){
            $msg .= '<ul class="comproduct35">';        
            foreach ($success as $key => $val){
                $msg .= '<li>' . $val . '</li>';
            }
            $msg .= '</ul>';
        }
    }
    if(!empty($msg)){
        echo $msg;     
    }
?>
<form method="post" name="frmLogin" class="margin-top-15">
    <input type="hidden" name="action" value="login" />
                        <?php wp_nonce_field("login",'security_code',true);?>              
        <table id="com_product30" class="com_product30" border="0" width="90%" cellpadding="0" cellspacing="0">            
            <tbody>                
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value=""></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="password" name="password" value=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="btnCheckLogin" value="Login" class="com_product32">Đăng nhập</button>&nbsp;&nbsp;
                        <a href="<?php echo $register_member_link; ?>" class="com_product32">Đăng ký</a>
                        
                    </td>
                </tr>               
            </tbody>    
                        
                        </table>    
</form>
</div>

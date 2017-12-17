<div class="our-member relative">
    <div class="opacity-absolute"></div>    
</div>
<div class="container margin-top-15">  
    <?php 
    $vHtml=new HtmlControl();    
    $pageIDLogin = $zController->getHelper('GetPageId')->get('_wp_page_template','login.php');   
    $permarlinkLogin = get_permalink($pageIDLogin);           
    $ssName="vmuser";
    $ssValue="userlogin";
    $ssUser     = $zController->getSession('SessionHelper',$ssName,$ssValue);
    $arrUser = @$ssUser->get($ssValue)["userInfo"];
    if(count($arrUser) == 0){
        wp_redirect($permarlinkLogin);
    }
    $id=$arrUser["id"];
    $userModel=$zController->getModel("/frontend","UserModel"); 
    $info=$userModel->getUserById($id);
    $detail=$info[0];   
    if(have_posts()){
        while (have_posts()) {
            the_post();
            echo '<h3 class="ecommerce">'.get_the_title().'</h3>';
        }
        wp_reset_postdata();
    }
    $msg = "";
    $data=array();        
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
    if(!empty($msg)) {
        echo $msg;          
    }
    if(count($zController->_data["data"])==0){
        $data=$detail;
    }
    else{
        $data=$zController->_data["data"];
    }        
    ?>
    <form  method="post"  class="frm margin-top-15" name="frm">        
        <input type="hidden" name="id" value="<?php echo $detail["id"]; ?>" />
        <input type="hidden" name="action" value="change-info" />                    
        <?php wp_nonce_field("change-info",'security_code',true);?>         
        <table id="com_product30" class="com_product30" border="0" width="90%" cellpadding="0" cellspacing="0">        
            <tbody>        
                <tr>
                    <td align="right">Tài khoản</td>
                    <td><?php echo @$detail["username"]; ?></td>        
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
                    <input name="btnChangeInfo" type="submit" class="com_product32" value="Cập nhật" />
                                                 
                </td>                      
            </tr>              
            </tbody>    
        </table>
    </form>          
</div>

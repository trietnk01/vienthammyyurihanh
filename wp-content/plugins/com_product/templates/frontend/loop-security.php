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
    $id=0;
    $ssUser     = $zController->getSession('SessionHelper',$ssName,$ssValue);
    $arrUser = @$ssUser->get($ssValue)["userInfo"];
    if(count($arrUser) == 0){
        wp_redirect($permarlinkLogin);
    }
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
        $id=$arrUser["id"];
        $userModel=$zController->getModel("/frontend","UserModel"); 
        $info=$userModel->getUserById($id);
        $detail=$info[0];
        ?>
        <form method="post" name="frm" class="margin-top-15"> 
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <input type="hidden" name="username" value="<?php echo $detail["username"]; ?>" />
                            <input type="hidden" name="action" value="change-password" />                    
                            <?php wp_nonce_field("change-password",'security_code',true);?>             
            <table id="com_product30" class="com_product30" border="0" width="90%" cellpadding="0" cellspacing="0">                   
                <tbody>        
                    <tr>
                        <td align="right">Tài khoản</td>
                        <td><?php echo $detail["username"]; ?></td>        
                    </tr>                           
                    <tr>
                        <td align="right">Mật khẩu</td>
                        <td><input type="password" name="password" /></td>        
                    </tr>
                    <tr>
                        <td align="right">Xác nhận mật khẩu</td>
                        <td><input type="password" name="password_confirm" /></td>        
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

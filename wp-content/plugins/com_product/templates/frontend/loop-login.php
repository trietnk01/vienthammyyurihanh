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
    $data=array();   
    $error=$zController->_data["error"];
    $success=$zController->_data["success"];                           
    if(count($zController->_data["data"]) > 0){
        $data=$zController->_data["data"];                  
    }
?>
<form method="post" name="frmLogin" class="margin-top-15">
    <input type="hidden" name="action" value="login" />
                        <?php wp_nonce_field("login",'security_code',true);?>        
                        <?php 
        if(count($error) > 0 || count($success) > 0){
            ?>
            <div class="alert">
                <?php                                           
                if(count($error) > 0){
                    ?>
                    <ul class="comproduct33">
                        <?php 
                        foreach ($error as $key => $value) {
                            ?>
                            <li><?php echo $value; ?></li>
                            <?php
                        }
                        ?>                              
                    </ul>
                    <?php
                }
                if(count($success) > 0){
                    ?>
                    <ul class="comproduct50">
                        <?php 
                        foreach ($success as $key => $value) {
                            ?>
                            <li><?php echo $value; ?></li>
                            <?php
                        }
                        ?>                              
                    </ul>
                    <?php
                }
                ?>                                              
            </div>              
            <?php
        }
        ?>                 
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

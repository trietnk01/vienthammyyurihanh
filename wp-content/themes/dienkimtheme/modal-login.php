<!-- begin modal box -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<form method="post" name="frm">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>        
      </div>
      <div class="modal-body">
        <!--begin sp-->
        <div class="clr"></div>
        <div class="comproduct37">
        <div class="comproduct38">LOGIN FORM</div>
        <div class="comproduct39">
            <div class="comproduct44">
                <div class="comproduct45"><div class="fa fa-user comproduct46" aria-hidden="true"></div></div>
                <input type="text" name="username" id="txtLoginWhiteBox" placeholder="Username" class="comproduct40" />
            </div>            
        </div>
        <div class="comproduct39">
            <div class="comproduct44">
            <div class="comproduct45"><div class="fa fa-lock comproduct46" aria-hidden="true"></div></div>
            <input type="password" name="password" id="txtPasswordWhiteBox" placeholder="Password" class="comproduct40" />
            </div>            
        </div>
        <div class="comproduct39">
            <div class="comproduct41"><button class="btn_quick_view" type="submit" name="btnLogin"  ><span>LOGIN</span>
</button>
<input type="hidden" name="action" value="login" />
<?php wp_nonce_field("login",'security_code',true);?>           
</div>
           <div class="comproduct42"><a class="btn_quick_view" href="<?php echo $register_member_link; ?>" ><span>REGISTER</span>
</a></div>
        <div class="clr"></div>
        </div>
        <div class="comproduct39">
            <div class="comproduct47"><input id="mod-login_remember230" class="comproduct43" type="checkbox" name="remember" value="yes"></div>            
            Remember me
        </div>
        <div class="comproduct39">
            Forgot
            <a href="index.php" class="comproduct43" >username</a>
            /
            <a href="index.php" class="comproduct43" >password</a>
            ?
        </div>
    </div>
        <!--end sp-->
      </div>      
    </div>
  </div>
  </form>
</div>
<!-- end modal box-->
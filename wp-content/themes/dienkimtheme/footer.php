<?php 
     global $zendvn_sp_settings;
     $contacted_phone=$zendvn_sp_settings['contacted_phone'];
$email_to=$zendvn_sp_settings['email_to'];
$address=$zendvn_sp_settings['address'];
$to_name=$zendvn_sp_settings['to_name'];
$telephone=$zendvn_sp_settings['telephone'];
$website=$zendvn_sp_settings['website'];
$opened_time=$zendvn_sp_settings['opened_time'];
$opened_date=$zendvn_sp_settings['opened_date'];
$contaced_name=$zendvn_sp_settings['contacted_name'];
$facebook_url=$zendvn_sp_settings['facebook_url'];
$twitter_url=$zendvn_sp_settings['twitter_url'];
$google_plus=$zendvn_sp_settings['google_plus'];
$youtube_url=$zendvn_sp_settings['youtube_url'];
$instagram_url=$zendvn_sp_settings['instagram_url'];
$pinterest_url=$zendvn_sp_settings['pinterest_url'];   
?>
<footer>
	<div class="container lipton">
        <div class="col-lg-3">
            <div><a href="<?php echo site_url( '',  null ); ?>"><img src="<?php echo site_url( 'wp-content/uploads/logo.png', null ); ?>" /></a></div>
            <div class="mmc">
                <?php if(is_active_sidebar('slogan-bottom')):?>
                    <?php dynamic_sidebar('slogan-bottom')?>
                <?php endif; ?> 
            </div>
            <div class="margin-top-5"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $address; ?></div>
            <div class="margin-top-5"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;<?php echo $email_to; ?></div>
            <div class="margin-top-5"><i class="fa fa-globe"></i>&nbsp;&nbsp;<?php echo $website; ?></div>
            <div class="margin-top-5"><i class="fa fa-phone"></i>&nbsp;&nbsp;<?php echo $telephone; ?></div>
        </div>
        <div class="col-lg-3">
            <div>
                <h3 class="bellesa-title-footer">Footer menu</h3>
                <div class="margin-top-15">
                     <?php     
                     $args = array( 
                        'menu'              => '', 
                        'container'         => '', 
                        'container_class'   => '', 
                        'container_id'      => '', 
                        'menu_class'        => 'footermenu', 
                        'menu_id'           => 'footer-menu', 
                        'echo'              => true, 
                        'fallback_cb'       => 'wp_page_menu', 
                        'before'            => '', 
                        'after'             => '', 
                        'link_before'       => '', 
                        'link_after'        => '', 
                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',  
                        'depth'             => 3, 
                        'walker'            => '', 
                        'theme_location'    => 'footer-menu' 
                    );
                     wp_nav_menu($args);
                     ?>   
                     <div class="clr"></div> 
                </div>
            </div>            
        </div>
        <div class="col-lg-3">
            <?php if(is_active_sidebar('instagram')):?>
                <?php dynamic_sidebar('instagram')?>
            <?php endif; ?> 
        </div>
        <div class="col-lg-3">
          <?php if(is_active_sidebar('quick-contact')):?>
                <?php dynamic_sidebar('quick-contact')?>
            <?php endif; ?>
        </div>
        <div class="clr"></div>
    </div>
    <div class="footer-bottom margin-top-45">
      <?php if(is_active_sidebar('copyright')):?>
                <?php dynamic_sidebar('copyright')?>
      <?php endif; ?>
    </div>
</footer>
<div class="modal fade modal-add-cart" id="modal-alert-add-cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header relative">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>        
      </div>
      <div class="modal-body">

      </div>      
    </div>
  </div>
</div>

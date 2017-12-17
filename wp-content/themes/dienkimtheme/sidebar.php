<div class="module module_right_menu">

        <div class="header-module">

          <table class="tbl-standard">

            <tbody><tr>

              <td><img src="<?php echo wp_upload_dir()['url'].'/icon-e.png'; ?>"></td>

              <td class="td-yellow-menu">Danh mục</td>

            </tr>

          </tbody></table>          

        </div>
<?php     
                    $args = array( 
                            'menu'              => '', 
                            'container'         => '', 
                            'container_class'   => '', 
                            'container_id'      => '', 
                            'menu_class'        => 'nav nav-stacked', 
                            'menu_id'           => 'accordion-1', 
                            'echo'              => true, 
                            'fallback_cb'       => 'wp_page_menu', 
                            'before'            => '', 
                            'after'             => '', 
                            'link_before'       => '', 
                            'link_after'        => '', 
                            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',  
                            'depth'             => 3, 
                            'walker'            => '', 
                            'theme_location'    => '' 
                        );
                    wp_nav_menu($args);
                ?>
      </div>
<?php if(is_active_sidebar('khuyen-mai-sidebar-widget')):?>
                        <?php dynamic_sidebar('khuyen-mai-sidebar-widget')?>
                    <?php endif; ?>
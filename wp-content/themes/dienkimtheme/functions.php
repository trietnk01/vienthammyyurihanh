<?php
require_once get_template_directory() . DS . 'inc'.DS.'customizer.php';

global $customizerGlobal;
$customizerGlobal = new CustomizerControl();
add_filter( 'nav_menu_link_attributes', 'wp_nav_menu_link', 10, 3 );
function wp_nav_menu_link( $atts, $item, $args ) {	
	if(in_array("current-menu-item", $item->classes)){
		$class = 'active'; 
    	$atts['class'] = $class;    
	}
    return $atts;
}
add_action('init', 'zendvn_theme_register_menus');
function zendvn_theme_register_menus(){
	register_nav_menus(
		array(						
			'main-menu' 			=> __('MainMenu'),
			'mobile-menu' 			=> __('MobileMenu'),		
			'huong-dan' 			=> __('Hướng dẫn'),		
			'footer-menu' 			=> __('FooterMenu'),			
		)
	);
}
add_action('after_setup_theme', 'zendvn_theme_support');
function zendvn_theme_support(){
	add_theme_support( 'post-formats', array('aside','image','gallery','video','audio') );
	add_theme_support('post-thumbnails');
	add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	
	
}
add_action('widgets_init', 'zendvn_theme_widgets_init');
function zendvn_theme_widgets_init(){	
	$themeName="dienkimtheme";	
	register_sidebar(array(
		'name'          => __( 'Slideshow', $themeName ),
		'id'            => 'slideshow',		
		'class'         => '',
		'before_widget' => '',
		'before_title'  => '',
		'after_title'   => '',
		'after_widget'  => ''				
	));
	register_sidebar(array(
		'name'          => __( 'Massage Theraphy', $themeName ),
		'id'            => 'massage-theraphy',		
		'class'         => '',
		'before_widget' => '<div>',
		'before_title'  => '<h3 class="bellesa-title">',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'		
	));	
	register_sidebar(array(
		'name'          => __( 'About our spa', $themeName ),
		'id'            => 'about-our-spa',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'Why we are', $themeName ),
		'id'            => 'why-we-are',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'Special service', $themeName ),
		'id'            => 'special-service',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	
	register_sidebar(array(
		'name'          => __( 'Working our team', $themeName ),
		'id'            => 'working-our-team',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'All service', $themeName ),
		'id'            => 'all-service-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'Face service', $themeName ),
		'id'            => 'face-service-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'Foot service', $themeName ),
		'id'            => 'foot-service-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'Body service', $themeName ),
		'id'            => 'body-service-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'Massage service', $themeName ),
		'id'            => 'massage-service-widget',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'Vitoria Esparts', $themeName ),
		'id'            => 'victoria-esparts',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));	
	register_sidebar(array(
		'name'          => __( 'Our best price', $themeName ),
		'id'            => 'our-best-price',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	
	register_sidebar(array(
		'name'          => __( 'Our products', $themeName ),
		'id'            => 'our-products',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	
	register_sidebar(array(
		'name'          => __( 'Our Testmonail', $themeName ),
		'id'            => 'our-testmonail',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'Our Cleative Blog', $themeName ),
		'id'            => 'our-cleative-blog',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'Our member', $themeName ),
		'id'            => 'our-member',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'Slogan bottom', $themeName ),
		'id'            => 'slogan-bottom',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'Instagram', $themeName ),
		'id'            => 'instagram',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'Quick contact', $themeName ),
		'id'            => 'quick-contact',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'Copyright', $themeName ),
		'id'            => 'copyright',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
	register_sidebar(array(
		'name'          => __( 'Report', $themeName ),
		'id'            => 'report',		
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'after_widget'  => '</div>'				
	));
}
add_action("wp_enqueue_scripts",function(){
	wp_deregister_script("jquery");
	wp_deregister_script("jquery-migrate");
});
add_action('wp_footer', 'footer_script_code');
add_action('wp_head', 'header_script_code');
function header_script_code(){
	$strScript='<script type="text/javascript" language="javascript">
        ddsmoothmenu.init({
            mainmenuid: "smoothmainmenu", 
            orientation: "h", 
            classname: "ddsmoothmenu",
            contentsource: "markup" 
        });         
    </script>';
    echo $strScript;
}
function footer_script_code(){
	$strScript= '<script type=\'text/javascript\'>
	var wpexLocalize = {
		"mobileMenuOpen" : "Browse Categories",
		"mobileMenuClosed" : "Close navigation",
		"homeSlideshow" : "false",
		"homeSlideshowSpeed" : "7000",
		"UsernamePlaceholder" : "Username",
		"PasswordPlaceholder" : "Password",
		"enableFitvids" : "true"
	};	
	</script>
	';
	echo $strScript;
}

function loadSpecialService($attrs){	

	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'item' => '',
				'title'=>'',
				'description'=>''		,
				'picture'=>''			
			), 
			$attrs
		)
	);	
	global $zController,$zendvn_sp_settings;
	$vHtml=new HtmlControl();
	$width=$zendvn_sp_settings["product_width"];    
	$height=$zendvn_sp_settings["product_height"];      
	$meta_key = "_zendvn_sp_post_";
	$data=explode(',',$item);
	$picture=site_url( 'wp-content/uploads/'.$picture, null );	
	if(count($data) > 0){		
		?>
		<div>
			<div class="col-lg-6 no-padding relative">
				<div class="relative opacity-absolute">
					<img src="<?php echo $picture; ?>" />
				</div>
				<div  class="roonin">
					<h3 class="bellesa-title"><?php echo $title; ?></h3>			
					<div>
						<p><font color="#ffffff"><?php echo $description; ?></font></p>
					</div>
				</div>            
			</div>
			<div class="col-lg-6 no-padding special-service-jeaujo">
				   <?php 
					$k=1;
					foreach ($data as $key => $value) {
						$args = array(  		
							'p' => 	$value,			
							'post_type' => 'post'
						);			
						$query = new WP_Query($args);				
						if($query->have_posts()){									
							while ($query->have_posts()) {
								$query->the_post();		
								$post_id=$query->post->ID;							
								$permalink=get_the_permalink($post_id);
								$title=get_the_title($post_id);
								$excerpt=get_post_meta($post_id,$meta_key."intro",true);
								$excerpt=substr($excerpt, 0,999).'...';			
								$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		    							                
								?>			
								<div class="col-sm-6 no-padding kiot">
									<div>
										<h3 class="special-service-child-title"><a href="<?php echo $permalink ?>"><?php echo $title; ?></a></h3>			
										<div >
											<p>
												<?php echo $excerpt; ?>
											</p>
										</div>
									</div>                            
								</div>
								<?php
							}				
							wp_reset_postdata();  
						}
						if($k%2 ==0 || $k==count($data)){
							echo '<div class="clr"></div>';
						}
						$k++;						
					}
					?>			            
			</div>
			<div class="clr"></div>                
		</div>
		<?php		
	}	
}
//add_shortcode('special_service', 'loadSpecialService');
function getAboutOurSpa($attrs){	
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'item' => '',					
			), 
			$attrs
		)
	);	
	global $zController,$zendvn_sp_settings;
	$vHtml=new HtmlControl();
	$width=$zendvn_sp_settings["product_width"];    
	$height=$zendvn_sp_settings["product_height"];      
	$meta_key = "_zendvn_sp_page_";
	$data=explode(',',$item);
	if(count($data) > 0){
		?>
		<div class="about-our-spa">		
			<div class="row">
				<?php 
				$k=1;
				foreach ($data as $key => $value) {
					$args = array(  		
						'p' => 	$value,			
						'post_type' => 'page'
					);			
					$query = new WP_Query($args);				
					if($query->have_posts()){		
									
						
						while ($query->have_posts()) {
							$query->the_post();		
							$post_id=$query->post->ID;							
							$permalink=get_the_permalink($post_id);
							$title=get_the_title($post_id);
							$excerpt=get_post_meta($post_id,$meta_key."intro",true);							
							$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		    							                
							?>										
							<div class="col-lg-6 no-padding about-img opacity-absolute "><img src="<?php echo $featureImg; ?>" /></div>
							<div class="col-lg-6 no-padding">
								<div class="about-our-spa-child">
									<h3 class="home-article-title"><?php echo $title; ?></h3>
									<div><?php echo $excerpt; ?></div>
								</div>								
							</div>
							<?php
												
						}				
						wp_reset_postdata();  
					}	
					if($k%4 ==0 || $k==count($data)){
							echo '<div class="clr"></div>';
						}
						$k++;
				}
				?>
			</div>				
		</div>
		<?php		
	}	
}
//add_shortcode('about_our_spa', 'getAboutOurSpa');
function getWhyWeAre($attrs){	
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'item' => '',					
			), 
			$attrs
		)
	);	
	global $zController,$zendvn_sp_settings;
	$vHtml=new HtmlControl();
	$width=$zendvn_sp_settings["product_width"];    
	$height=$zendvn_sp_settings["product_height"];      
	$meta_key = "_zendvn_sp_page_";
	$data=explode(',',$item);
	if(count($data) > 0){
		?>
		<div class="why-we-are">			
				<?php 
				$k=1;
				foreach ($data as $key => $value) {
					$args = array(  		
						'p' => 	$value,			
						'post_type' => 'page'
					);			
					$query = new WP_Query($args);				
					if($query->have_posts()){		
									
						
						while ($query->have_posts()) {
							$query->the_post();		
							$post_id=$query->post->ID;							
							$permalink=get_the_permalink($post_id);
							$title=get_the_title($post_id);
							$excerpt=get_post_meta($post_id,$meta_key."intro",true);							
							$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		    							                
							?>			
							<div class="col-lg-6 no-padding">
								<div class="about-our-spa-child">
									<h3 class="home-article-title"><?php echo $title; ?></h3>
									<div><?php echo $excerpt; ?></div>
								</div>								
							</div>
							<div class="col-lg-6 no-padding about-img opacity-absolute"><img src="<?php echo $featureImg; ?>" /></div>
							
							<?php
												
						}				
						wp_reset_postdata();  
					}	
					if($k%4 ==0 || $k==count($data)){
							echo '<div class="clr"></div>';
						}
						$k++;
				}
				?>
			
		</div>
		<?php		
	}	
}
//add_shortcode('why_we_are', 'getWhyWeAre');
function loadService($attrs){
	
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'item' => '',					
			), 
			$attrs
		)
	);	
	global $zController,$zendvn_sp_settings;
	$vHtml=new HtmlControl();
	$width=$zendvn_sp_settings["product_width"];    
	$height=$zendvn_sp_settings["product_height"];      
	$meta_key = "_zendvn_sp_post_";
	$data=explode(',',$item);

	if(count($data) > 0){		
		?>
		
		<script type="text/javascript" language="javascript">
			jQuery(document).ready(function(){
				jQuery(".service").owlCarousel({
					autoplay:true,                    
					loop:true,
					margin:10,                        
					nav:true,            
					mouseDrag: false,
					touchDrag: false,                                
					responsiveClass:true,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:3
						},
						1000:{
							items:3
						}
					}
				});
				var chevron_left='<i class="fa fa-chevron-left"></i>';
				var chevron_right='<i class="fa fa-chevron-right"></i>';
				jQuery("div.service div.owl-prev").html(chevron_left);
				jQuery("div.service div.owl-next").html(chevron_right);	
				jQuery("a.youtube").YouTubePopup({ hideTitleBar: true });				
			});  			     
		</script>
		<div class="owl-carousel service owl-theme">						
				<?php 
				$k=1;
				foreach ($data as $key => $value) {
					$args = array(  		
						'p' => 	$value,			
						'post_type' => 'post'
					);			
					$query = new WP_Query($args);				
					if($query->have_posts()){		
									
						
						while ($query->have_posts()) {
							$query->the_post();		
							$post_id=$query->post->ID;							
							$permalink=get_the_permalink($post_id);
							$title=get_the_title($post_id);
							$excerpt=get_post_meta($post_id,$meta_key."intro",true);
							$videoclip=get_post_meta($post_id,$meta_key."video-clip",true);
							$excerpt=substr($excerpt, 0,100).'...';			
							$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		    							                
							?>			
							<div class="relative liverpool">
								<div><center><a href="<?php echo $permalink; ?>"><img src="<?php echo $featureImg; ?>" /></a></center></div>			
								<div class="youtube"></div>		
								<div class="youtube-img" >
									<div><a class="youtube" rel="<?php echo $videoclip; ?>" href="javascript:void(0);"><img src="<?php echo site_url( 'wp-content/uploads/youtube.png', null ); ?>"></a></div>		
								</div>									
							</div>
							<?php
												
						}				
						wp_reset_postdata();  
					}						
				}
				?>			
		</div>
		<?php		
	}	
}
//add_shortcode('service', 'loadService');
function loadVictoriaEspart($attrs){
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'item' => '',
				'title'=>'',
				'description'=>''					
			), 
			$attrs
		)
	);	
	global $zController,$zendvn_sp_settings;
	$vHtml=new HtmlControl();
	$width=$zendvn_sp_settings["product_width"];    
	$height=$zendvn_sp_settings["product_height"];   
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
	$linkedin_url=$zendvn_sp_settings['linkedin_url'];   
	$meta_key = "_zendvn_sp_post_";
	$data=explode(',',$item);
	
	if(count($data) > 0){		
		?>		
		<h3 class="bellesa-title"><?php echo $title; ?></h3>	
		<div class="clr"></div>
		<div class="margin-top-15">
			<div class="category-description"><?php echo $description; ?></div>
			<div class="clr"></div>
		</div>	
		<div class="margin-top-45">
			<script type="text/javascript" language="javascript">
				jQuery(document).ready(function(){
					jQuery(".vitoria-esparts").owlCarousel({
						autoplay:true,                    
						loop:true,
						margin:10,                        
						nav:true,            
						mouseDrag: false,
						touchDrag: false,                                
						responsiveClass:true,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:3
							},
							1000:{
								items:3
							}
						}
					});					
					var chevron_left='<i class="fa fa-chevron-left"></i>';
					var chevron_right='<i class="fa fa-chevron-right"></i>';
					jQuery("div.vitoria-esparts div.owl-prev").html(chevron_left);
					jQuery("div.vitoria-esparts div.owl-next").html(chevron_right);
				});                
			</script>
			<div class="owl-carousel vitoria-esparts owl-theme">						
				<?php 
				$k=1;
				foreach ($data as $key => $value) {
					$args = array(  		
						'p' => 	$value,			
						'post_type' => 'post'
					);			
					$query = new WP_Query($args);				
					if($query->have_posts()){		
						while ($query->have_posts()) {
							$query->the_post();		
							$post_id=$query->post->ID;							
							$permalink=get_the_permalink($post_id);
							$title=get_the_title($post_id);
							$excerpt=get_post_meta($post_id,$meta_key."intro",true);
							$nickname=get_post_meta($post_id,$meta_key."nickname",true);
							$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		    							                
							?>			
							<div class="relative ramma">
								<div><center><a href="<?php echo $permalink; ?>"><img src="<?php echo $featureImg; ?>" /></a></center></div>			
								<div class="vitoria-espart-title">
									<div><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></div>
									<div><?php echo $nickname; ?></div>
								</div>		
								<div class="cinux">
									<div><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></div>
									<div><?php echo $nickname; ?></div>
									<div><?php echo $excerpt ?></div>
									<div>
										<center>
											<ul class="social">
												<li><a href="<?php echo $facebook_url; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
												<li><a href="<?php echo $twitter_url; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
												<li><a href="<?php echo $linkedin_url; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
												<li ><a href="<?php echo $google_plus; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="<?php echo $youtube_url; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
											</ul>
										</center>
									</div>
								</div>	
							</div>
							<?php

						}				
						wp_reset_postdata();  
					}						
				}
				?>			
			</div>
		</div>			
		<?php		
	}	
}
//add_shortcode('victoria_esparts', 'loadVictoriaEspart');

function loadOurBestPrice($attrs){
	
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'item' => '',
				'title'=>'',
				'description'=>''					
			), 
			$attrs
		)
	);	
	global $zController,$zendvn_sp_settings;
	$vHtml=new HtmlControl();
	$width=$zendvn_sp_settings["product_width"];    
	$height=$zendvn_sp_settings["product_height"];   
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
	$linkedin_url=$zendvn_sp_settings['linkedin_url']; 
	$page_id_contact = $zController->getHelper('GetPageId')->get('_wp_page_template','contact.php');
	$contact_link = get_permalink($page_id_contact);    
	$meta_key = "_zendvn_sp_post_";
	$data=explode(',',$item);
		
	
	if(count($data) > 0){		
		?>
		<div class="margin-top-45">
			<h3 class="bellesa-title"><?php echo $title; ?></h3>	
			<div class="clr"></div>
			<div class="margin-top-15">
				<div class="category-description"><?php echo $description; ?></div>
				<div class="clr"></div>
			</div>	
			<div class="prince margin-top-45">
				<?php 
				$k=1;
				foreach ($data as $key => $value) {
					$args = array(  		
						'p' => 	$value,			
						'post_type' => 'post'
					);			
					$query = new WP_Query($args);				
					if($query->have_posts()){								
						while ($query->have_posts()) {
							$query->the_post();		
							$post_id=$query->post->ID;							
							$permalink=get_the_permalink($post_id);
							$title=get_the_title($post_id);
							$excerpt=get_post_meta($post_id,$meta_key."intro",true);
							$nickname=get_post_meta($post_id,$meta_key."nickname",true);
							$price=get_post_meta($post_id,$meta_key."price",true);
							$price=$vHtml->fnPrice($price);							
							$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		    							                
							?>			
							<div class="col-sm-4 no-padding">
								<div class="jewerlymastic">
									<h3><?php echo $title; ?></h3>
									<div><?php echo $price; ?></div>
									<div>
										<?php echo $excerpt; ?>
									</div>
									<div class="takeit"><a href="<?php echo $contact_link ?>">Take it</a></div>
								</div>
							</div>
							<?php

						}				
						wp_reset_postdata();  
					}
					if($k%3 ==0 || $k==count($data)){
						echo '<div class="clr"></div>';
					}
					$k++;						
				}
				?>			
			</div>	
		</div>		
		<?php		
	}	
}
add_shortcode('our_best_price', 'loadOurBestPrice');

function loadOurProduct($attrs){
	
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'item' => '',
				'title'=>'',
				'description'=>'',						
			), 
			$attrs
		)
	);	
	global $zController,$zendvn_sp_settings;
	$vHtml=new HtmlControl();
	$width=$zendvn_sp_settings["product_width"];    
	$height=$zendvn_sp_settings["product_height"];      
	$meta_key = "_zendvn_sp_zaproduct_";
	$data=explode(',',$item);	
	if(count($data) > 0){		
		?>
		<h3 class="bellesa-title"><?php echo $title; ?></h3>	
		<div class="clr"></div>
		<div class="margin-top-15">
			<div class="category-description"><?php echo $description; ?></div>
			<div class="clr"></div>
		</div>	
		<div class="margin-top-45">
			<script type="text/javascript" language="javascript">
				jQuery(document).ready(function(){
					jQuery(".perfume-featured").owlCarousel({
						autoplay:true,                    
						loop:true,
						margin:10,                        
						nav:true,            
						mouseDrag: false,
						touchDrag: false,                                
						responsiveClass:true,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:3
							},
							1000:{
								items:3
							}
						}
					});					
					var chevron_left='<i class="fa fa-chevron-left"></i>';
					var chevron_right='<i class="fa fa-chevron-right"></i>';
					jQuery("div.perfume-featured div.owl-prev").html(chevron_left);
					jQuery("div.perfume-featured div.owl-next").html(chevron_right);
				});                
			</script>
			<div class="owl-carousel perfume-featured owl-theme">						
				<?php 
				$k=1;
				foreach ($data as $key => $value) {
					$args = array(  		
						'p' => 	$value,			
						'post_type' => 'zaproduct'
					);			
					$query = new WP_Query($args);				
					if($query->have_posts()){								
						while ($query->have_posts()) {
							$query->the_post();		
							$post_id=$query->post->ID;							
							$permalink=get_the_permalink($post_id);
							$title=get_the_title($post_id);
							$excerpt=get_post_meta($post_id,$meta_key."intro",true);
							$excerpt=substr($excerpt, 0,100).'...';			
							$price=get_post_meta($post_id,$meta_key."price",true);
							$sale_price=get_post_meta($post_id,$meta_key."sale_price",true);
							$html_price='';						
							if((int)($sale_price) > 0){				
								$price ='<span class="price-regular">'.$vHtml->fnPrice($price).'</span>';
								$sale_price='<span class="price-sale">'.$vHtml->fnPrice($sale_price).'</span>' ;					
								$html_price='<div class="col-xs-6">'.$price.'</div><div class="col-xs-6">'.$sale_price.'</div><div class="clr"></div>' ;				
							}else{
								$price='<span class="price-sale">'.$vHtml->fnPrice($price).'</span>' ;	
								$html_price=$price;		
							}		
							$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		    							                
							?>			
							<div class="perfume-box">
								<div><center><figure><a href="<?php echo $permalink; ?>"><img src="<?php echo $featureImg; ?>" /></a></figure></center></div>			
								<div class="perfume-title"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></div>						
								<div class="perfume-rating">
									<center>
										<ul >
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</center>
								</div>
								<div class="perfume-featured-price">
									<div><?php echo $html_price; ?></div>

								</div>
								<div class="perfume-cart">								
									<ul>
										<li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-alert-add-cart" onclick="addToCart(<?php echo $post_id; ?>,1);" >Add to cart</a></li>										
									</ul>
								</div>
							</div>
							<?php
						}				
						wp_reset_postdata();  
					}						
				}
				?>			
			</div>
		</div>				
		<?php		
	}	
}
add_shortcode('our_products', 'loadOurProduct');

function loadOurTestMonail($attrs){	
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'item' => '',
				'title'=>'',
				'description'=>'',						
			), 
			$attrs
		)
	);	
	global $zController,$zendvn_sp_settings;
	$vHtml=new HtmlControl();
	$width=$zendvn_sp_settings["product_width"];    
	$height=$zendvn_sp_settings["product_height"];      
	$meta_key = "_zendvn_sp_post_";
	$data=explode(',',$item);	
	if(count($data) > 0){		
		?>		
		<div class="our-testmonail relative">
			<div class="opacity-absolute"></div>
			<div class="tarik">
				<div class="container vista">                
					<h3 class="bellesa-title"><?php echo $title; ?></h3>	
					<div class="clr"></div>
					<div class="margin-top-15">
						<div class="category-description"><?php echo $description; ?></div>
						<div class="clr"></div>
					</div>		
					<div class="margin-top-45">
						<script type="text/javascript" language="javascript">
							jQuery(document).ready(function(){
								jQuery(".our-test-monails").owlCarousel({
									autoplay:false,                    
									loop:true,
									margin:10,                        
									nav:true,            
									mouseDrag: false,
									touchDrag: false,                                
									responsiveClass:true,
									responsive:{
										0:{
											items:1
										},
										600:{
											items:1
										},
										1000:{
											items:1
										}
									}
								});
								var chevron_left='<i class="fa fa-chevron-left"></i>';
								var chevron_right='<i class="fa fa-chevron-right"></i>';
								jQuery("div.vista div.owl-prev").html(chevron_left);
								jQuery("div.vista div.owl-next").html(chevron_right);
							});                
						</script>
						<div class="owl-carousel our-test-monails  owl-theme">						
							<?php 
							$k=1;
							foreach ($data as $key => $value) {
								$args = array(  		
									'p' => 	$value,			
									'post_type' => 'post'
								);			
								$query = new WP_Query($args);				
								if($query->have_posts()){								
									while ($query->have_posts()) {
										$query->the_post();		
										$post_id=$query->post->ID;							
										$permalink=get_the_permalink($post_id);
										$title=get_the_title($post_id);
										$nickname=get_post_meta($post_id,$meta_key."nickname",true);
										$excerpt=get_post_meta($post_id,$meta_key."intro",true);
										$excerpt=substr($excerpt, 0,99999).'...';			
										$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		    	    							                
										?>			
										<div class="canax relative">
											<div class="relative opacity-absolute"><img src="<?php echo $featureImg; ?>" /></div>
											<div class="our-testmonail-content">
												<div class="our-testmonail-title"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></div>
												<div><?php echo $nickname; ?></div>
												<div>
													<?php echo $excerpt; ?>
												</div>				
											</div>
										</div>		
										<?php
									}				
									wp_reset_postdata();  
								}						
							}
							?>			
						</div>
					</div>								
				</div>
			</div>        
		</div>				
		<?php		
	}	
}
add_shortcode('our_testmonail', 'loadOurTestMonail');
function loadOurCleativeBlog($attrs){
	
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'item' => '',
				'title'=>'',
				'description'=>'',						
			), 
			$attrs
		)
	);	
	global $zController,$zendvn_sp_settings;
	$vHtml=new HtmlControl();
	$width=$zendvn_sp_settings["product_width"];    
	$height=$zendvn_sp_settings["product_height"];      
	$meta_key = "_zendvn_sp_post_";
	$data=explode(',',$item);	
	if(count($data) > 0){		
		?>
		<div class="container xmas">
			<h3 class="bellesa-title"><?php echo $title; ?></h3>	
			<div class="clr"></div>
			<div class="margin-top-15">
				<div class="category-description"><?php echo $description; ?></div>
				<div class="clr"></div>
			</div>	
			<div class="margin-top-45">
				<script type="text/javascript" language="javascript">
					jQuery(document).ready(function(){
						jQuery(".cleative-blog").owlCarousel({
							autoplay:true,                    
							loop:true,
							margin:10,                        
							nav:true,            
							mouseDrag: false,
							touchDrag: false,                                
							responsiveClass:true,
							responsive:{
								0:{
									items:1
								},
								600:{
									items:3
								},
								1000:{
									items:3
								}
							}
						});					
						var chevron_left='<i class="fa fa-chevron-left"></i>';
						var chevron_right='<i class="fa fa-chevron-right"></i>';
						jQuery("div.cleative-blog div.owl-prev").html(chevron_left);
						jQuery("div.cleative-blog div.owl-next").html(chevron_right);
					});                
				</script>
				<div class="owl-carousel cleative-blog owl-theme">						
					<?php 
					$k=1;
					foreach ($data as $key => $value) {
						$args = array(  		
							'p' => 	$value,			
							'post_type' => 'post'
						);			
						$query = new WP_Query($args);				
						if($query->have_posts()){								
							while ($query->have_posts()) {
								$query->the_post();		
								$post_id=$query->post->ID;							
								$permalink=get_the_permalink($post_id);
								$title=get_the_title($post_id);
								$excerpt=get_post_meta($post_id,$meta_key."intro",true);
								$excerpt=substr($excerpt, 0,200).'...';			

								$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		    							                
								?>			
								<div class="perfume-box">
									<div><center><figure><a href="<?php echo $permalink; ?>"><img src="<?php echo $featureImg; ?>" /></a></figure></center></div>
									<div class="cleative-blog-wrapper">										
										<div class="cleative-blog-title margin-top-5"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></div>
										<div class="cleative-blog-excerpt margin-top-5"><?php echo $excerpt; ?></div>
									</div>
								</div>
								<?php

							}				
							wp_reset_postdata();  
						}						
					}
					?>			
				</div>
			</div>				
		</div>		
		<?php		
	}	
}
add_shortcode('our_cleative_blog', 'loadOurCleativeBlog');
function loadOurMember($attrs){
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'item' => '',
				'title'=>'',
				'description'=>'',						
			), 
			$attrs
		)
	);	
	global $zController,$zendvn_sp_settings,$wpdb;
	$vHtml=new HtmlControl();
	$width=$zendvn_sp_settings["product_width"];    
	$height=$zendvn_sp_settings["product_height"];      
	$meta_key = "_zendvn_sp_post_";
	$data=explode(',',$item);	
	if(count($data) > 0){		
		?>		
		<div class="our-member relative">
			<div class="opacity-absolute"></div>
			<div class="tarik">
				<div class="container vinmart relative">                
					<h3 class="bellesa-title"><?php echo $title; ?></h3>	
					<div class="clr"></div>
					<div class="margin-top-15">
						<div class="category-description"><?php echo $description; ?></div>
						<div class="clr"></div>
					</div>		
					<div class="margin-top-45">
						<script type="text/javascript" language="javascript">
					jQuery(document).ready(function(){
						jQuery(".our-member-mma").owlCarousel({
							autoplay:true,                    
							loop:true,
							margin:10,                        
							nav:true,            
							mouseDrag: false,
							touchDrag: false,                                
							responsiveClass:true,
							responsive:{
								0:{
									items:1
								},
								600:{
									items:5
								},
								1000:{
									items:5
								}
							}
						});
						var chevron_left='<i class="fa fa-chevron-left"></i>';
						var chevron_right='<i class="fa fa-chevron-right"></i>';
						jQuery("div.our-member-mma div.owl-prev").html(chevron_left);
						jQuery("div.our-member-mma div.owl-next").html(chevron_right);
					});                
				</script>
						<div class="owl-carousel our-member-mma owl-theme">						
							<?php 
							$k=1;
							foreach ($data as $key => $value) {
								$table = $wpdb->prefix . 'shk_banner';	
								$sql = "SELECT 	*
								FROM 	".$table." AS p 
								WHERE 	p.id = ".(int)$value;
								$result = $wpdb->get_results($sql,ARRAY_A);
								$banner=site_url('/wp-content/uploads/'.$result[0]['image']);	
								$link_web=$result[0]['link_web'];	
								?>			
								<div class="symphony"><a href="<?php echo $link_web; ?>" target="_blank"><img src="<?php echo $banner; ?>" /></a></div>
								<?php			
							}
							?>			
						</div>
					</div>			
				</div>
			</div>        
		</div>		
		<?php		
	}	
}
add_shortcode('our_member', 'loadOurMember');

function loadInstagram($attrs){
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'item' => '',
				'title'=>'',
				
			), 
			$attrs
		)
	);	
	global $zController,$zendvn_sp_settings;
	$vHtml=new HtmlControl();
	$width=$zendvn_sp_settings["product_width"];    
	$height=$zendvn_sp_settings["product_height"];      
	$meta_key = "_zendvn_sp_post_";
	$data=explode(',',$item);	
	if(count($data) > 0){		
		?>		
		<div>
			<h3 class="bellesa-title-footer"><?php echo $title; ?></h3>
			<div class="margin-top-15 instagram-album">
				<?php 
				$k=1;
				foreach ($data as $key => $value) {
					$args = array(  		
						'p' => 	$value,			
						'post_type' => 'post'
					);			
					$query = new WP_Query($args);				
					if($query->have_posts()){								
						while ($query->have_posts()) {
							$query->the_post();		
							$post_id=$query->post->ID;							
							$permalink=get_the_permalink($post_id);
							$title=get_the_title($post_id);							
							$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		    	    						                
							?>			
							<div class="col-xs-6"><center><figure><img  src="<?php echo $featureImg; ?>" /></figure></center></div>
							<?php
						}				
						wp_reset_postdata();  
					}
					if($k%2 ==0 || $k==count($data)){
						echo '<div class="clr"></div>';
					}
					$k++;							
				}
				?>		
			</div>
		</div>		
		<?php		
	}	
}
add_shortcode('instagram', 'loadInstagram');
function loadQuickContact($attrs){
	ob_start();        	
	extract(
		shortcode_atts(
			array(				
				'title'=>'',				
			), 
			$attrs
		)
	);	
	global $zController,$zendvn_sp_settings;
	$vHtml=new HtmlControl();
	?>
	<form action="" method="POST" name="frm-contact">
		<input type="hidden" name="action" value="contact" />                    
		<?php wp_nonce_field("contact",'security_code',true);?>           
		<div>
			<h3 class="bellesa-title-footer"><?php echo $title; ?></h3>
			<div class="margin-top-15">
				<div class="margin-top-5"><input type="text" name="name" placeholder="Full Name" class="contact-input"></div>
				<div class="margin-top-5"><input type="email" name="email" placeholder="Your Email Id" class="contact-input"></div>
				<div class="margin-top-5"><textarea name="massage" id="massage" cols="30" rows="10" placeholder="Your massage" class="contact-textarea"></textarea></div>
				<div class="margin-top-5">
					<a href="javascript:void(0)" onclick="document.forms['frm-contact'].submit();" class="send">Send</a>
				</div>
			</div>
		</div>
	</form>	
	<?php
}
add_shortcode('quick_contact', 'loadQuickContact');
function loadCopyright($attrs){
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'item' => '',
						
			), 
			$attrs
		)
	);	
	global $zController,$zendvn_sp_settings;
	$vHtml=new HtmlControl();
	$width=$zendvn_sp_settings["product_width"];    
	$height=$zendvn_sp_settings["product_height"];      
	$meta_key = "_zendvn_sp_post_";
	$data=explode(',',$item);
	
	if(count($data) > 0){				
		foreach ($data as $key => $value) {
			$args = array(  		
				'p' => 	$value,			
				'post_type' => 'post'
			);			
			$query = new WP_Query($args);				
			if($query->have_posts()){								
				while ($query->have_posts()) {
					$query->the_post();		
					$post_id=$query->post->ID;							
					$content=get_the_content($post_id);            	    						                
					echo $content;
				}				
				wp_reset_postdata();  
			}

		}
	}	
}
add_shortcode('copyright', 'loadCopyright');
function loadReport($attrs){	
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'item' => '',							
			), 
			$attrs
		)
	);	
	global $zController,$zendvn_sp_settings;
	$vHtml=new HtmlControl();    
	$meta_key = "_zendvn_sp_post_";
	$data=explode(',',$item);	
	if(count($data) > 0){		
		?>
		<div class="parallax opacity-absolute">
			<div class="container">
				<?php 
				$k=1;
				foreach ($data as $key => $value) {
					$args = array(  		
						'p' => 	$value,			
						'post_type' => 'post'
					);			
					$query = new WP_Query($args);				
					if($query->have_posts()){		
						while ($query->have_posts()) {
							$query->the_post();		
							$post_id=$query->post->ID;							
							$permalink=get_the_permalink($post_id);
							$title=get_the_title($post_id);
							$excerpt=get_post_meta($post_id,$meta_key."intro",true);					
							$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		    							                
							?>			
							<div class="col-sm-3">
								<h3 class="parallax-title"><?php echo $excerpt; ?></h3>
								<div class="parallax-content margin-top-15"><?php echo $title; ?></div>
							</div>
							<?php
						}				
						wp_reset_postdata();  
					}
					if($k%4 ==0 || $k==count($data)){
						echo '<div class="clr"></div>';
					}
					$k++;							
				}
				?>							
			</div>
		</div>	
		<?php		
	}	
}
add_shortcode('report', 'loadReport');
function loadCategoryList($attrs){	
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'item' => '',	
				'taxonomy'=>''						
			), 
			$attrs
		)
	);	
	global $zController,$zendvn_sp_settings;
	$vHtml=new HtmlControl();    		
	$data=explode(',',$item);	
	if(count($data) > 0){
		$k=1  ; 
		foreach ($data as $key => $value) {
			$term = get_term( $value, $taxonomy );			
			$term_id=$term->term_id;
			$term_name=$term->name;					
			$term_link=get_term_link($term,$taxonomy);	
			$description='';
			$description=substr($term->description, 0,200) ;							
			$option_name='';
			switch ($taxonomy) {
				case 'category':
				$option_name='mp-taxonomy-category-';
				break;		
				case 'za_category':
				$option_name='zendvn-sp-zacategory-';
				break;
			}
			$option_name 	= $option_name . $term_id;

			$option_value	= get_option($option_name);						
			$term_img=$option_value['picture'];
			$term_img=$vHtml->getFileName($term_img);
			$term_img=site_url('/wp-content/uploads/'.$term_img ,null );
			?>          
			<div class="col-sm-3 no-padding-left">
				<div class="margin-top-15">
					<div><center><a href="<?php echo $term_link; ?>"><figure><img src="<?php echo $term_img; ?>" /></figure></a></center></div>
					<div class="product-article">
						<div class="product-home-title margin-top-15"><a href="<?php echo $term_link; ?>"><?php echo $term_name; ?></a></div>
						<div class="article-home-excerpt margin-top-15"><?php echo $description; ?></div>
						<div class="margin-top-15"><a class="readmore" href="<?php echo $term_link; ?>">Read more</a></div>
						<div class="clr"></div>
					</div>                              
				</div>                        
			</div>
			<?php
			if($k%4 ==0 || $k==count($data)){
				echo '<div class="clr"></div>';
			}
			$k++;
		}
	}
}
add_shortcode('category_list', 'loadCategoryList');
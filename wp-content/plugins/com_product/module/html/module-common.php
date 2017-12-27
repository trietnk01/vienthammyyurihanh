<?php 
global $zController,$zendvn_sp_settings,$wpdb;
$vHtml=new HtmlControl();    
$position=$instance["position"];
switch ($position) {
	case "slideshow":			
	?>
	<div>
		<script type="text/javascript" language="javascript">        
			jQuery(document).ready(function(){
				jQuery(".slick-slideshow").slick({
					dots: true,
					autoplay:true,
					arrows:false,
					adaptiveHeight:true,
					loop:true
				});  
			});     
		</script>
		<div class="slick-slideshow">
			<?php 
			$args = array(  										
				'post_type' => 'banner',
				'orderby' => 'date',
				'order'   => 'DESC',  
				'posts_per_page' => 10,  
				'tax_query' => array(
					array(
						'taxonomy' => 'category_banner',
						'field'    => 'slug',
						'terms'    => 'slideshow',
					),
				),
			);	
			$the_query = new WP_Query($args);				
			if($the_query->have_posts()){
				while ($the_query->have_posts()) {
					$the_query->the_post();		
					$post_id=$the_query->post->ID;
					$alt=get_post_meta($post_id,"banner_alt",true);
					$link_web=get_post_meta($post_id,"banner_url",true);
					$featureImg=get_the_post_thumbnail_url($post_id, 'full');
					?>
					<div><a href="<?php echo $link_web; ?>" target="_blank"><img alt="<?php echo $alt; ?>" src="<?php echo $featureImg; ?>" /></a></div>  
					<?php
				}
				wp_reset_postdata();  
			}				
			?>				
		</div>
	</div>			
	<?php
	break;	
	case 'all-service-widget':		
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
	<?php 
	$args = array(  										
				'post_type' => 'post',
				'orderby' => 'date',
				'order'   => 'DESC',  
				'posts_per_page' => 10,  
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => array('body','face','foot','massage'),
					),
				),
			);		
	$the_query = new WP_Query($args);		
	if($the_query->have_posts()){		
		echo '<div class="owl-carousel service owl-theme">	';								
		while ($the_query->have_posts()) {
			$the_query->the_post();		
			$post_id=$the_query->post->ID;							
			$permalink=get_the_permalink($post_id);
			$title=get_the_title($post_id);
			$excerpt=get_post_meta($post_id,"article_intro",true);
			$videoclip=get_post_meta($post_id,"article_video_clip",true);
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
		echo '</div>';
	}					
	break;				
}
?>







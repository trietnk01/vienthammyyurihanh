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
}
?>







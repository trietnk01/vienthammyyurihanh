<?php 
global $zController,$zendvn_sp_settings;
$vHtml=new HtmlControl();
$category_id=$instance["category_id"];
$items_per_page=$instance["items_per_page"];
$description=$instance["description"];
$position=$instance["position"];
$meta_key = "_zendvn_sp_post_";
$page_id_contact = $zController->getHelper('GetPageId')->get('_wp_page_template','contact.php');
$contact_link = get_permalink($page_id_contact);    
$arrID=array(); 	
if((int)@$category_id==0){
	$terms = get_terms( array(
		'taxonomy' => 'category_banner',
		'hide_empty' => false,  ) );	
	if(count($terms) > 0){
		foreach ($terms as $key => $value) {
			$arrID[]=$value->term_id;
		}
	}		
}else{
	$arrID[]=(int)@$category_id;
}		
$args = array(
	'post_type' => 'banner',  
	'orderby' => 'date',
	'order'   => 'DESC',  
	'posts_per_page' => $items_per_page,        								
	'tax_query' => array(
		array(
			'taxonomy' => 'category_banner',
			'field'    => 'term_id',
			'terms'    => $arrID,									
		),
	),
);    			
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
	case 'our-member':
	$the_query=new WP_Query($args);
	if($the_query->have_posts()){
		?>		
		<div class="margin-top-15">
			<div class="category-description"><font color="#ffffff"><?php echo $description; ?></font></div>
			<div class="clr"></div>
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
			<div class="owl-carousel our-member-mma owl-theme margin-top-30">
				<?php 
				while ($the_query->have_posts()) {
					$the_query->the_post();		
					$post_id=$the_query->post->ID;
					$alt=get_post_meta($post_id,"banner_alt",true);
					$link_web=get_post_meta($post_id,"banner_url",true);
					$featureImg=get_the_post_thumbnail_url($post_id, 'full');
					?>
					<div class="symphony"><a href="<?php echo $link_web; ?>" target="_blank"><img src="<?php echo $featureImg; ?>" /></a></div>
					<?php
				}
				?>
			</div>
		</div>							
		<?php
	}
	break;
}
?>







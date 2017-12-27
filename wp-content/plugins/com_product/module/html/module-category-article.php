<?php 
global $zController,$zendvn_sp_settings,$wpdb;
$vHtml=new HtmlControl();
$title=$instance["title"];
$category_id=$instance["category_id"];
$items_per_page=$instance["items_per_page"];
$description=$instance["description"];
$position=$instance["position"];
switch ($position) {
	case "massage-theraphy":		
	$arrID=array(); 	
	if((int)@$category_id==0){
		$terms = get_terms( array(
			'taxonomy' => 'category',
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
		'post_type' => 'post',  
		'orderby' => 'date',
		'order'   => 'DESC',  
		'posts_per_page' => $items_per_page,        								
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'term_id',
				'terms'    => $arrID,									
			),
		),
	);    	
	$the_query=new WP_Query($args);				
	if($the_query->have_posts()){		
		?>		
			<div class="clr"></div>
			<div class="margin-top-15">
				<div class="category-description"><?php echo $description; ?></div>
				<div class="clr"></div>
			</div>	
			<div class="margin-top-45">
				<script type="text/javascript" language="javascript">
					jQuery(document).ready(function(){
						jQuery(".massage-theraphy").owlCarousel({
							autoplay:true,                    
							loop:true,
							margin:10,                        
							nav:true,            
							mouseDrag: true,
							touchDrag: true,                                
							responsiveClass:true,
							responsive:{
								0:{
									items:1
								},
								600:{
									items:4
								},
								1000:{
									items:4
								}
							}
						});
						var chevron_left='<i class="fa fa-chevron-left"></i>';
						var chevron_right='<i class="fa fa-chevron-right"></i>';
						jQuery("div.massage-theraphy div.owl-prev").html(chevron_left);
						jQuery("div.massage-theraphy div.owl-next").html(chevron_right);
					});                
				</script>
				<div class="owl-carousel massage-theraphy owl-theme">						
					<?php 
					while ($the_query->have_posts()) {
								$the_query->the_post();		
								$post_id=$the_query->post->ID;							
								$permalink=get_the_permalink($post_id);
								$title=get_the_title($post_id);
								$excerpt=get_post_meta($post_id,"article_intro",true);
								$excerpt=substr($excerpt, 0,100).'...';			
								$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		    							                
								?>			
								<div class="massage-theraphy-slick">
									<div><center><figure><a href="<?php echo $permalink; ?>"><img src="<?php echo $featureImg; ?>" /></a></figure></center></div>
									<div class="product-article">
										<div class="product-home-title margin-top-15"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></div>
										<div class="article-home-excerpt margin-top-15"><?php echo $excerpt; ?></div>
										<div class="margin-top-15"><a class="readmore" href="<?php echo $permalink; ?>">Read more</a></div>
										<div class="clr"></div>
									</div>								
								</div>
								<?php

							}				
							wp_reset_postdata();  
					?>			
				</div>
			</div>			
		<?php
	}
	break;				
}
?>







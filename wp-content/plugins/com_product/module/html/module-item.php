<?php 
global $zController,$zendvn_sp_settings,$wpdb;
$vHtml=new HtmlControl();
$width=$zendvn_sp_settings["product_width"];    
$height=$zendvn_sp_settings["product_height"];      
$post_meta_key = "_zendvn_sp_post_";
$page_meta_key = "_zendvn_sp_page_";
$product_meta_key = "_zendvn_sp_zaproduct_";
if(!empty($instance['item_id'])){
	$arrItemID=explode(",",$instance["item_id"]);
	$title=$instance["title"];
	$description=$instance["description"];
	$position=$instance["position"];
	if(count($arrItemID) > 0){
		switch ($position) {			
			case "about-our-spa":
			case "special-service":
			?>
			<div class="about-our-spa">		
				<div class="row">
					<?php 
					$k=1;
					foreach ($arrItemID as $key => $value){
						$args = array(  		
							'p' => 	$value,			
							'post_type' => 'page'
						);			
						$the_query = new WP_Query($args);				
						if($the_query->have_posts()){																	
							while ($the_query->have_posts()) {
								$the_query->the_post();		
								$post_id=$the_query->post->ID;							
								$permalink=get_the_permalink($post_id);
								$title=get_the_title($post_id);
								$excerpt=get_post_meta($post_id,"page_intro",true);							
								$featureImg=get_the_post_thumbnail_url($post_id, 'full');						                
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
					}					
					?>
				</div>				
			</div>
			<?php
			break;
			case "why-we-are":
			?>
			<div class="why-we-are">						
					<?php 
					$k=1;
					foreach ($arrItemID as $key => $value){
						$args = array(  		
							'p' => 	$value,			
							'post_type' => 'page'
						);			
						$the_query = new WP_Query($args);				
						if($the_query->have_posts()){																	
							while ($the_query->have_posts()) {
								$the_query->the_post();		
								$post_id=$the_query->post->ID;							
								$permalink=get_the_permalink($post_id);
								$title=get_the_title($post_id);
								$excerpt=get_post_meta($post_id,"page_intro",true);							
								$featureImg=get_the_post_thumbnail_url($post_id, 'full');						                
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
					}					
					?>			
			</div>
			<?php
			break;
		}
	}	
}
?>







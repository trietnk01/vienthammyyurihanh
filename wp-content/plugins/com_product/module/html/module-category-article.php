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
switch ($position) {
	case "massage-theraphy":		
	$the_query=new WP_Query($args);				
	if($the_query->have_posts()){		
		?>		
		<div>
			<div class="clr"></div>
			<div class="margin-top-15">
				<div class="category-description"><?php echo $description; ?></div>
				<div class="clr"></div>
			</div>	
			<div class="margin-top-15">
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
		</div>			
		<?php
	}
	break;	
	case 'face-service-widget':
	case 'foot-service-widget':
	case 'body-service-widget':
	case 'massage-service-widget':	
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
	case 'our-best-price':	
	$the_query = new WP_Query($args);	
	$k=1;	
	if($the_query->have_posts()){
		?>		
		<div>					
			<div class="margin-top-15">
				<div class="category-description"><?php echo $description; ?></div>
				<div class="clr"></div>
			</div>	
			<div class="prince margin-top-45">
				<?php 
				while ($the_query->have_posts()) {
					$the_query->the_post();		
					$post_id=$the_query->post->ID;							
					$permalink=get_the_permalink($post_id);
					$title=get_the_title($post_id);
					$excerpt=get_post_meta($post_id,"article_intro",true);
					$nickname=get_post_meta($post_id,"article_nickname",true);
					$price=get_post_meta($post_id,$meta_key."price",true);
					$price=$vHtml->fnPrice($price);						
					$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		    							                
					?>			
					<div class="col-sm-4 no-padding">
						<div class="jewerlymastic">
							<h3><?php echo $title; ?></h3>
							<div><?php echo $price; ?></div>
							<div><?php echo $excerpt; ?></div>										
							<div class="takeit"><a href="<?php echo $contact_link ?>">Take it</a></div>
						</div>
					</div>
					<?php
					if($k%3 ==0 || $k==(int)@$the_query->post_count){
						echo '<div class="clr"></div>';
					}
					$k++;	
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







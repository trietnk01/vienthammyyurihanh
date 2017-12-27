<?php 
global $zController,$zendvn_sp_settings;
$width=$zendvn_sp_settings["product_width"];    
$height=$zendvn_sp_settings["product_height"];      
$meta_key = "_zendvn_sp_zaproduct_";
$vHtml=new HtmlControl();
$category_id=$instance["category_id"];
$items_per_page=$instance["items_per_page"];
$description=$instance["description"];
$position=$instance["position"];
$arrID=array(); 	
if((int)@$category_id==0){
	$terms = get_terms( array(
		'taxonomy' => 'za_category',
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
	'post_type' => 'zaproduct',  
	'orderby' => 'date',
	'order'   => 'DESC',  
	'posts_per_page' => $items_per_page,        								
	'tax_query' => array(
		array(
			'taxonomy' => 'za_category',
			'field'    => 'term_id',
			'terms'    => $arrID,									
		),
	),
);    
$the_query=new WP_Query($args);	
if($the_query->have_posts()){
	switch ($position) {
		case 'our-products':	
		?>
		<div class="margin-top-15">
			<div class="category-description"><?php echo $description; ?></div>
			<div class="clr"></div>
		</div>	
		<div class="margin-top-15">
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
				while ($the_query->have_posts()) {
					$the_query->the_post();		
					$post_id=$the_query->post->ID;							
					$permalink=get_the_permalink($post_id);
					$title=get_the_title($post_id);
					$excerpt=get_post_meta($post_id,"product_intro",true);
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
				?>			
			</div>
		</div>				
		<?php	
		break;
	}
}		
?>







<div class="our-member relative">
    <div class="opacity-absolute"></div>    
</div>
<div class="container margin-top-15">  
	<?php  
	$vHtml=new HtmlControl();
	/* begin load config contact */
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
	$map_url=$zendvn_sp_settings['ban_do'];
	/* end load config contact */	
	?>	
	<h3 class="ecommerce"><?php the_title(); ?></h3>
			<div class="padding-left-15 padding-right-15">				
				<div class="margin-top-15">
					<div class="col-md-4 contact no-padding">
						<?php 						
						if(have_posts()){									
							while (have_posts()) {
								the_post();																			 			
								the_content( null, false );
							}
							wp_reset_postdata();  								
						}
						?>									
					</div>
					<div class="col-md-8 contact-info no-padding-right">
						<?php 
						$args = array(  		
							'name' => 'thong-tin-lien-he',
							'post_type'=>'page'
						);
						$query = new WP_Query($args);		
						if($query->have_posts()){									
							while ($query->have_posts()) {
								$query->the_post();		
								$post_id=$query->post->ID;							
								$permalink=get_the_permalink($post_id);
								$title=get_the_title($post_id);
								$content=get_the_content( $post_id );
								$excerpt=substr(get_the_excerpt( $post_id ), 0,200).'...';			
								$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		       			
								echo $content;
							}
							wp_reset_postdata();  								
						}
						?>						
					</div>
					<div class="clr"></div>
				</div>	
				<div class="margin-top-15">
					<iframe src="<?php echo $map_url; ?>" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>				
			</div>
</div>

<?php 
$post_meta_key = "_zendvn_sp_post_";
$page_meta_key = "_zendvn_sp_page_";
$query=$wp_query;
?>
<div class="our-member relative">
    <div class="opacity-absolute"></div>
    <div class="tarik">
        <div class="container category-service">
         Service
        </div>
    </div>
</div>
<div class="container margin-top-45">
    <?php 
    if($query->have_posts()){
        while ($query->have_posts()) {
            $query->the_post();                     
            $post_id=$query->post->ID;               
            $permalink=get_the_permalink($post_id);
            $title=get_the_title($post_id);
            $excerpt='';
            $excerpt=get_post_meta($post_id,$page_meta_key."intro",true);
            if(empty($excerpt)){
                $excerpt=get_post_meta($post_id,$post_meta_key."intro",true);
            }
            $content=get_the_content($post_id);        
            $featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));            
            ?>
            <h3 class="bellesa-title"><?php echo $title; ?></h3> 
            <div class="margin-top-15">
                <?php echo $content; ?>
            </div>      
            <?php
      }
      wp_reset_postdata();    
  }
  ?>
</div>
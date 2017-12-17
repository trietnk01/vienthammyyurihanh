<?php 
global $zController,$zendvn_sp_settings;    
$meta_key = "_zendvn_sp_post_";
$vHtml=new HtmlControl();
$productModel=$zController->getModel("/frontend","ProductModel"); 
$query=$wp_query;
$totalItemsPerPage=0;
$pageRange=10;
$currentPage=1; 
if(!empty($zendvn_sp_settings["article_number"]))
    $totalItemsPerPage=$zendvn_sp_settings["article_number"];        
if(!empty(@$_POST["filter_page"]))          
    $currentPage=@$_POST["filter_page"];  
$productModel->setWpQuery($query);   
$productModel->setPerpage($totalItemsPerPage);        
$productModel->prepare_items();               
$totalItems= $productModel->getTotalItems();               
$arrPagination=array(
  "totalItems"=>$totalItems,
  "totalItemsPerPage"=>$totalItemsPerPage,
  "pageRange"=>$pageRange,
  "currentPage"=>$currentPage   
);    
$pagination=$zController->getPagination("Pagination",$arrPagination); 
?>
<form  method="post"  class="frm" name="frm">
    <input type="hidden" name="filter_page" value="1" /> 
    <div class="our-member relative">
        <div class="opacity-absolute"></div>
        <div class="tarik">
            <div class="container category-service">
               <?php single_cat_title(); ?>
           </div>
       </div>
    </div>
    <div class="container margin-top-15">
        <div>
            <?php 
            if($query->have_posts()){     
                $k=1  ; 
                while ($query->have_posts()) {
                    $query->the_post();     
                    $post_id=$query->post->ID;                          
                    $permalink=get_the_permalink($post_id);
                    $title=get_the_title($post_id);
                    $excerpt=get_post_meta($post_id,$meta_key."intro",true);
                    $excerpt=substr($excerpt, 0,100).'...';         
                    $featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));                                                     
                    ?>          
                    <div class="col-sm-3 no-padding-left">
                        <div class="margin-top-15">
                            <div><center><a href="<?php echo $permalink; ?>"><figure><img src="<?php echo $featureImg; ?>" /></figure></a></center></div>
                            <div class="product-article">
                                <div class="product-home-title margin-top-15"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></div>
                                <div class="article-home-excerpt margin-top-15"><?php echo $excerpt; ?></div>
                                <div class="margin-top-15"><a class="readmore" href="<?php echo $permalink; ?>">Read more</a></div>
                                <div class="clr"></div>
                            </div>                              
                        </div>                        
                    </div>
                    <?php
                    if($k%4 ==0 || $k==$query->post_count){
                        echo '<div class="clr"></div>';
                    }
                    $k++;
                }               
                wp_reset_postdata();              
            }       
            ?>    
        </div>     
        <div>
            <?php echo $pagination->showPagination();            ?>
            <div class="clr"></div>
        </div>
    </div>
</form>




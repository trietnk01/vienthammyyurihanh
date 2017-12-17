<?php 
$meta_key = "_zendvn_sp_zaproduct_";                   
global $zController,$zendvn_sp_settings;    
$vHtml=new HtmlControl();

$productModel=$zController->getModel("/frontend","ProductModel"); 
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
$product_number=$zendvn_sp_settings["product_number"];
/* end load config contact */
        
$query=$wp_query;

            // begin phân trang
$totalItemsPerPage=0;
$pageRange=10;
$currentPage=1; 
if(!empty($zendvn_sp_settings["product_number"])){
    $totalItemsPerPage=$product_number;        
}
if(!empty(@$_POST["filter_page"]))          {
    $currentPage=@$_POST["filter_page"];  
}
$productModel->setWpQuery($query);   
$productModel->setPerpage($totalItemsPerPage);        
$productModel->prepare_items();               
$totalItems= $productModel->getTotalItems();   
$query=$productModel->getItems();                
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
            <div class="col-sm-4 no-padding-left">
                <div class="perfume-box margin-top-15">
                    <div><center><a href="<?php echo $permalink; ?>"><figure><img src="<?php echo $featureImg; ?>" /></figure></a></center></div>            
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
            </div>            
            <?php
            if($k%3 ==0 || $k==$query->post_count){
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
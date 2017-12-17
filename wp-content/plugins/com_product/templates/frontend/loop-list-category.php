<?php 
if(have_posts()){
    while (have_posts()) {
        the_post()
        ?>
        <form  method="post"  class="frm" name="frm">
            <input type="hidden" name="filter_page" value="1" /> 
            <div class="our-member relative">
                <div class="opacity-absolute"></div>
                <div class="tarik">
                    <div class="container category-service">
                        <?php the_title( '','', true ); ?>
                    </div>
                </div>
            </div>
            <div class="container margin-top-15">
                <div>            
                    <?php the_content( null,false ); ?>
                </div>                       
            </div>    
        </form>
        <?php
    }
}
?>

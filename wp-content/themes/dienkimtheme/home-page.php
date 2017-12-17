<?php 
	/*
	 Template Name: HomePage
	 */	 
     global $zendvn_sp_settings;
     $contacted_phone=$zendvn_sp_settings['contacted_phone'];
$email_to=$zendvn_sp_settings['email_to'];
$address=$zendvn_sp_settings['address'];
$to_name=$zendvn_sp_settings['to_name'];
$telephone=$zendvn_sp_settings['telephone'];
$website=$zendvn_sp_settings['website'];
$opened_time=$zendvn_sp_settings['opened_time'];
$opened_date=$zendvn_sp_settings['opened_date'];
$contaced_name=$zendvn_sp_settings['contacted_name'];
$facebook_url=$zendvn_sp_settings['facebook_url'];
$twitter_url=$zendvn_sp_settings['twitter_url'];
$google_plus=$zendvn_sp_settings['google_plus'];
$youtube_url=$zendvn_sp_settings['youtube_url'];
$instagram_url=$zendvn_sp_settings['instagram_url'];
$pinterest_url=$zendvn_sp_settings['pinterest_url'];   
     ?>
     <?php get_header();     ?>

     <?php if(is_active_sidebar('slideshow')):?>
        <?php dynamic_sidebar('slideshow')?>
    <?php endif; ?>
    <div class="container margin-top-45">
        <div class="row">
            <?php if(is_active_sidebar('massage-theraphy')):?>
                <?php dynamic_sidebar('massage-theraphy')?>
            <?php endif; ?>
        </div>
    </div>    
    <?php if(is_active_sidebar('about-our-spa')):?>
        <?php dynamic_sidebar('about-our-spa')?>
    <?php endif; ?>
    <?php if(is_active_sidebar('why-we-are')):?>
        <?php dynamic_sidebar('why-we-are')?>
    <?php endif; ?>
    <div class="clr"></div>
    <?php if(is_active_sidebar('special-service')):?>
        <?php dynamic_sidebar('special-service')?>
    <?php endif; ?>
    <div class="container working vanhelsing">        
        <?php if(is_active_sidebar('working-our-team')):?>
            <?php dynamic_sidebar('working-our-team')?>
        <?php endif; ?>        
        <div class="clr"></div>       
        <script type="text/javascript" language="javascript">
            function openCity(evt, cityName) {    
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }   
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }   
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            jQuery(document).ready(function(){
                    jQuery("#all-service").show();
                    jQuery("div.tab > button.tablinks:first-child").addClass('active');
                });
        </script>             
        <div class="tab">
            <button class="tablinks h-title" onclick="openCity(event, 'all-service')">All</button>
            <button class="tablinks h-title" onclick="openCity(event, 'face-service')">Face</button>
            <button class="tablinks h-title" onclick="openCity(event, 'foot-service')">Foot</button>
            <button class="tablinks h-title" onclick="openCity(event, 'body-service')">Body</button>
            <button class="tablinks h-title" onclick="openCity(event, 'massage-service')">Massage</button>                 
            <div class="clr"></div>           
        </div>
        <div id="all-service" class="tabcontent">
            <?php if(is_active_sidebar('all-service-widget')):?>
                    <?php dynamic_sidebar('all-service-widget')?>
                <?php endif; ?>
        </div>
        <div id="face-service" class="tabcontent">
            <?php if(is_active_sidebar('face-service-widget')):?>
                    <?php dynamic_sidebar('face-service-widget')?>
                <?php endif; ?>
        </div>
        <div id="foot-service" class="tabcontent">
            <?php if(is_active_sidebar('foot-service-widget')):?>
                    <?php dynamic_sidebar('foot-service-widget')?>
                <?php endif; ?>
        </div>
        <div id="body-service" class="tabcontent">
            <?php if(is_active_sidebar('body-service-widget')):?>
                    <?php dynamic_sidebar('body-service-widget')?>
                <?php endif; ?>
        </div>
        <div id="massage-service" class="tabcontent">
            <?php if(is_active_sidebar('massage-service-widget')):?>
                    <?php dynamic_sidebar('massage-service-widget')?>
                <?php endif; ?>
        </div>           
    </div>
    <?php if(is_active_sidebar('report')):?>
        <?php dynamic_sidebar('report')?>
    <?php endif; ?>
    <div class="container margin-top-45">
        <?php if(is_active_sidebar('victoria-esparts')):?>
            <?php dynamic_sidebar('victoria-esparts')?>
        <?php endif; ?>            
        <?php if(is_active_sidebar('our-best-price')):?>
            <?php dynamic_sidebar('our-best-price')?>
        <?php endif; ?>
        <div class="clr"></div>        
        <?php if(is_active_sidebar('our-products')):?>
            <?php dynamic_sidebar('our-products')?>
        <?php endif; ?>           
    </div>    
    <?php if(is_active_sidebar('our-testmonail')):?>
        <?php dynamic_sidebar('our-testmonail')?>
    <?php endif; ?> 
    <?php if(is_active_sidebar('our-cleative-blog')):?>
        <?php dynamic_sidebar('our-cleative-blog')?>
    <?php endif; ?> 
    <?php if(is_active_sidebar('our-member')):?>
        <?php dynamic_sidebar('our-member')?>
    <?php endif; ?> 
    
    <?php get_footer(); ?>
    <?php wp_footer();?>
</body>
</html>
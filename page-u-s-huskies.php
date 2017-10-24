<?php 
get_header(); 
wp_enqueue_script(array('USHuskiesMap'));
wp_enqueue_style('mapbox');
wp_localize_script( 'mapbox', 'homeLink', array( 'endpointURL' => apply_filters('remove_cms', home_url('/api/communities/geojson', 'https' ) ) ) );
$communitiesSidebarMenu = $UWAA->UI->buildCommunitySidebar();


?>

<div class="uw-hero-image communities"></div>

<div class="container uw-body">

  <div class="row">

    <div class="col-md-8 uw-content" role='main'>
      <h2 class="uw-site-title">Communities</h2>

      <div class="uw-body-copy">

     <?php get_template_part('partials/sidebar', 'page-breadcrumbs') ?>

        <?php
          // Start the Loop.
          while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            
             include(locate_template( 'content-page-communities.php' ));

           

          endwhile;

          
        ?>

      </div>

    </div>
    
     <div class="col-md-4 uw-sidebar">
    <?php    

       

        $communitiesSidebarMenu->renderCommunitiesChapterMenu();  
        
      
    ?>

         <div id="no-chapter-widget" class="widget widget_text">             
             <div class="uwaa-btn-wrapper">
                 <a class="uwaa-btn btn-slant-right btn-purple" href="#accordion">Find your community</a>
             </div>
         </div>

         

         <div id="text-3" class="widget widget_text">
             <h2 class="widgettitle">Update your contact information</h2>
             <div class="textwidget">
                 Help keep our records current!  Please <a href="/update">update your contact information,</a> which helps ensure that you receive relevant communications from the UW and the UW Alumni Association.
             </div>
         </div>

         <?php

        the_widget("UWAA\Widgets\SidebarSeeYourChapter");
        

    ?>

      

     
      </div>

    </div>

  </div>



<?php get_footer(); ?>

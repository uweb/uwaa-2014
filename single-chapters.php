<?php get_header(); 
$chapterSidebar = $UWAA->UI->buildCommunitySidebar();

use \UWAA\View\ThumbnailBrowser\Thumbnail\Chapters;  
  // Start the Loop.
  while ( have_posts() ) : the_post();
  

?>

<div class="uwaa-chapter-header">
<?php get_template_part('partials/chapter-header') ?>
</div>

<div class="container uw-body">

  <div class="row">

    <div class="col-md-8 uw-content" role='small'>

          <?php include(locate_template( 'partials/sidebar-single-breadcrumbs.php')); 


          

          ?>


     
      
      <div class="uw-body-copy">

      <?php $chapterSidebar->renderMobileCommunitiesChapterMenu();  ?>

       <div class="row">
       <?php
      

      $thumbnailRow = new \UWAA\View\ThumbnailBrowser\ThumbnailBrowser;

      $thumbnailRow->makeThumbnails(new Chapters(basename(get_permalink() ) ) );



      ?>

    </div>
            <?php
                // // Start the Loop.
                // while ( have_posts() ) : the_post();

                    /*
                     * Include the post format-specific template for the content. If you want to
                     * use this in a child theme, then include a file called called content-___.php
                     * (where ___ is the post format) and that will be used instead.
                     */
                    

                    get_template_part( 'content-chapters' );                    

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template('/comments.php');
                    }

                
            ?>

      </div>

    </div>

    <div class="col-md-4 uw-sidebar">    
    <?php        
        endwhile;

        

        $chapterSidebar->renderCommunitiesChapterMenu();        

        $chapterSidebar->renderLeaderWidget();

        $chapterSidebar->renderSocialWidget();

        $chapterSidebar->renderChapterContactForm();
    ?>

      
    </div>


  </div>

</div>

<?php get_footer(); ?>

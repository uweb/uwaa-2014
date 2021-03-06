<?php namespace UWAA;
/**
 * This is where all the JS files are registered
 *    Modified version of the UW-2014 Script loader.  Yanking out jquery, child theme stuff as they already call it.  Mirronring
 *    their approach to loading admin and public and site scripts.
 *    Also loading our scripts in the footer...
 */

class Scripts
{

  private $SCRIPTS;
  private $SUPPORT_SCRIPTS;


  function __construct()
  {

    $this->SCRIPTS = array_merge( array(

      'site'   => array (
        'id'      => 'uwaa.site',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/uwaa.site' . $this->dev_script() . '.js',
        'deps'    => array(),
        'version' => wp_get_theme()->get('Version'),
        'in_footer' => true,
        'admin'   => false
      ),

      'admin' => array (
        'id'      => 'uwaa.wp.admin',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/admin/admin.js',
        'deps'    => array(),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => true
      ),


    ));

    $this->STYLES = array(

      'mapbox' => array(
          'id'      => 'mapbox',
          'url'     => 'https://api.tiles.mapbox.com/mapbox.js/v2.1.2/mapbox.css',
          'deps'    => array(),
          'version' => '2.1.2',
          'admin'   => false
      ),

    );

    $this->SUPPORT_SCRIPTS = array_merge( array(
      'responsiveFrame'   => array (
        'id'      => 'responsiveFrame',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/libraries/responsiveiframe/dist/jquery.responsiveiframe.js',
        'deps'    => array('jquery'),
        'version' => '2.0.1',
        'in_footer' => false,
        'admin'   => false
      ),
      'responsiveFrameHelper'   => array (
        'id'      => 'responsiveFrameHelper',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/support/responsiveFrameHelper' . $this->min_script() . '.js',
        'deps'    => array('responsiveFrame'),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false
      ),
      'isotope'   => array (
        'id'      => 'isotope',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/libraries/isotope/dist/isotope.pkgd.js',
        'deps'    => array('jquery'),
        'version' => '2.0.1',
        'in_footer' => true,
        'admin'   => false
      ),
      // @TODO  Local fallback if CDN is no-go.
      'mapbox'   => array (
        'id'      => 'mapbox',
        'url'     => "https://api.tiles.mapbox.com/mapbox.js/v2.1.2/mapbox.js",
        'deps'    => array(),
        'version' => '2.1.2',
        'in_footer' => true,
        'admin'   => false
      ),

      'seattleMap'   => array (
        'id'      => 'seattleMap',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/support/seattle_map' . $this->min_script() . '.js',
        'deps'    => array('mapbox'), 
        'version' => '1.0',       
        'in_footer' => true,
        'admin'   => false
      ),

      'isotopeInit' => array (
        'id'      => 'isotopeInit',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/support/isotopeInit' . $this->min_script() . '.js',
        'deps'    => array('isotope'),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false
      ),

      'isotopeVetsInit' => array (
        'id'      => 'isotopeInitVets',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/support/isotopeInitVets' . $this->min_script() . '.js',
        'deps'    => array('isotope'),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false

      ),

       'toursMap' => array (
        'id'      => 'toursMap',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/support/toursMap' . $this->min_script() . '.js',
        'deps'    => array('mapbox'),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false

      ),
	  'CommunitiesMap' => array (
        'id'      => 'communitiesMap',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/support/communitiesMap' . $this->min_script() . '.js',
        'deps'    => array('mapbox'),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false
      ),
        'USHuskiesMap' => array (
        'id'      => 'USHuskiesMap',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/support/USHuskiesMap' . $this->min_script() . '.js',
        'deps'    => array('mapbox'),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false
      ),
      'internationalHuskiesMap' => array (
        'id'      => 'internationalHuskiesMap',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/support/internationalHuskiesMap' . $this->min_script() . '.js',
        'deps'    => array('mapbox'),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false
      ),
        'velocity' => array (
        'id'      => 'velocity',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/libraries/velocity/velocity.min.js',
        'deps'    => array(),
        'version' => '2.0',
        'in_footer' => true,
        'admin'   => false
      ),
        'membershipStoreInit' => array (
        'id'      => 'membershipStoreInit',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/support/membershipStoreInit' . $this->min_script() . '.js',
        'deps'    => array('velocity'),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false

      ),
        'superHero' => array (
        'id'      => 'superHero',
        'url'     => get_bloginfo( 'stylesheet_directory' ) . '/js/support/uw.slider'. $this->min_script() .'.js',
        'deps'    => array( 'backbone' ),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false,
    ),
        'memberChecker' => array (
        'id'      => 'memberChecker',
        'url'     => get_bloginfo( 'stylesheet_directory' ) . '/js/support/memberChecker'. $this->min_script() .'.js',
        'deps'    => array( 'backbone' ),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false,
    ),
        'chapterAccordionOpener' => array (
        'id'      => 'chapterAccordionOpener',
        'url'     => get_bloginfo( 'stylesheet_directory' ) . '/js/support/chapterAccordionOpener'. $this->min_script() .'.js',
        'deps'    => array( 'backbone' ),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false,
    ),
        'footballScheduleOpener' => array (
        'id'      => 'footballScheduleOpener',
        'url'     => get_bloginfo( 'stylesheet_directory' ) . '/js/support/footballScheduleOpener'. $this->min_script() .'.js',
        'deps'    => array( 'backbone' ),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false,
    ),
        'gradpack' => array (
        'id'      => 'gradpack',
        'url'     => get_bloginfo( 'stylesheet_directory' ) . '/js/support/gradpack'. $this->min_script() .'.js',
        'deps'    => array(),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false,
    ),
        'covervid' => array (
        'id'      => 'covervid',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/libraries/covervid/covervid.js',
        'deps'    => array('jquery', 'uwaa.site'),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false
      ),
        'bootstrap-modal' => array (
        'id'      => 'bootstrap-modal',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/libraries/bootstrap/js/bootstrap.js',
        'deps'    => array('jquery', 'uwaa.site'),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false
      ),
       'subman' => array (
        'id'      => 'subman',
        'url'     => 'https://subscribe.gifts.washington.edu/Scripts/SubManBuilder/submanbuilder.js',
        'deps'    => array(),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false
      ),
      'archiveSignupForm' => array (
        'id'      => 'archiveSignupForm',
        'url'     => get_bloginfo('stylesheet_directory') . '/js/support/archiveSubscriptionForm' . $this->min_script() . '.js',
        'deps'    => array('isotopeInit'),
        'version' => '1.0',
        'in_footer' => true,
        'admin'   => false
      ),

      



    ));

    add_action( 'wp_enqueue_scripts', array( $this, 'uwaa_register_default_scripts' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'uwaa_register_support_scripts' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'uwaa_enqueue_default_scripts' ) );
    add_action( 'admin_enqueue_scripts', array( $this, 'uwaa_enqueue_admin_scripts' ) );

  }

  function uwaa_register_default_scripts()
  {

      foreach ( $this->SCRIPTS as $script )
      {
        $script = (object) $script;

        wp_register_script(
          $script->id,
          $script->url,
          $script->deps,
          $script->version,
          $script->in_footer
        );

      }

  }

  //Used to register, but not necessarily Enqueue certain scripts unless needed.  Scripts can be loaded on specific templates as necessary.

  public function uwaa_register_support_scripts()
  {

      foreach ( $this->SUPPORT_SCRIPTS as $script )
      {
        $script = (object) $script;

        wp_register_script(
          $script->id,
          $script->url,
          $script->deps,
          $script->version,
          $script->in_footer
        );

      }

  }

  function uwaa_enqueue_default_scripts()
  {
      foreach ( $this->SCRIPTS as $script )
      {
        $script = (object) $script;

        if ( ! $script->admin )
          wp_enqueue_script( $script->id );
      }
  }

  function uwaa_enqueue_admin_scripts()
  {
      if ( ! is_admin() )
        return;

      foreach ( $this->SCRIPTS as $script )
      {
        $script = (object) $script;

        if ( $script->admin )
        {

          wp_register_script(
            $script->id,
            $script->url,
            $script->deps,
            $script->version
          );

          wp_enqueue_script( $script->id );

        }
      }

  }

  public function dev_script()
  {
    return is_user_logged_in() ? '.dev' : '';
  }

  public function min_script()
  {
    return !is_user_logged_in() ? '.min' : '';
  }

}

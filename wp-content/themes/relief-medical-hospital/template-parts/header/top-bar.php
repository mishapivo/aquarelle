<?php 
/*
* Display Top Bar
*/
?>

<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6"> 
        <div class="contact-details">      
          <span class="call">
            <?php if( get_theme_mod( 'relief_medical_hospital_call','' ) != '') { ?>
              <i class="fas fa-mobile-alt"></i><span><?php echo esc_html( get_theme_mod('relief_medical_hospital_call','') ); ?></span>
            <?php } ?>
          </span>
          <span class="email">
            <?php if( get_theme_mod( 'relief_medical_hospital_mail','' ) != '') { ?>
              <i class="far fa-envelope"></i><span><?php echo esc_html( get_theme_mod('relief_medical_hospital_mail','') ); ?></span>
            <?php } ?>
          </span>
        </div>       
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="social-media">
          <?php if( get_theme_mod( 'relief_medical_hospital_facebook_url' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'relief_medical_hospital_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'relief_medical_hospital_twitter_url' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'relief_medical_hospital_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'relief_medical_hospital_linkedin_url' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'relief_medical_hospital_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'relief_medical_hospital_insta_url' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'relief_medical_hospital_insta_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
          <?php } ?>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
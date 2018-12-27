<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package techlauncher
 */

get_header(); ?>

<!--==================== ti breadcrumb section end ====================-->
<main id="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center TL-section">
        <div id="primary" class="content-area">
          <main id="main" class="site-main" role="main">
            <div class="TL-error-404">
              <h1><?php esc_html_e('4','techlauncher'); ?><i class="fa fa-times-circle-o"></i><?php esc_html_e('4','techlauncher'); ?></h1>
              <h4>
                <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'techlauncher' ); ?>
              </h4>
              <p>
                <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'techlauncher' ); ?>
              </p>
              <a href="<?php echo esc_url(home_url());?>" onClick="history.back();" class="btn btn-theme"><?php esc_html_e('Go Back','techlauncher'); ?></a> </div>
            <section class="error-404 not-found">
              <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Go for a search', 'techlauncher'); ?></h1>
              </header>
              <!-- .page-header -->
              
              <div class="page-content">
                <div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
                  <div class="TL-sidebar">
                    <?php
						          get_search_form();
					          ?>
                  </div>
                </div>
              </div>
              <!-- .page-content --> 
            </section>
            <!-- .error-404 -->
          </main>
          <!-- #main --> 
        </div>
        <!-- #primary --> 
      </div>
    </div>
  </div>
</main>
<?php
  get_footer();
?>
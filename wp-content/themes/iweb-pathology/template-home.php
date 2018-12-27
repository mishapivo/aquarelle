<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Template Name: Front Page
 * @package IWeb_Pathology
 */

  get_header();
?>

<div  class="content-area">
	<main id="main" class="site-main" role="main">

		<?php  get_template_part( 'template-parts/islides' ); ?>

<!-- About Us Section  -->
<?php if ( get_theme_mod( 'iwebpatho_display_abtus','1' ) === '1' ) : ?>
	<div class="iwebpath-abtus">
		<div class="iwebpath-abtus-w ifadezomin-pckg">
		<!-- Working Hours -->
			<div class="iwebpath-abtus-a">
				<h3 class="abtus-a-h3 iweb-patho-mtitle"><?php echo esc_html( get_theme_mod( 'iwebpatho_whours_title', __( 'Working Hours','iweb-pathology' ) ) );?></h3>
				<p id="abtdesc" class="abtus-a1"><?php echo esc_html( get_theme_mod( 'iwebpatho_whours_desc', __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.','iweb-pathology' ) ) ); ?></p>
				<?php if ( get_theme_mod( 'iwebpatho_whours_days1' ) != null ) :?>
				<div class="iwebpath-abtus-a1">
					<div class="iwebpath-abtus-a1-a">
						<p id="abtdy1" class="abtus-a1"><?php echo esc_html( get_theme_mod( 'iwebpatho_whours_days1' ) ); ?></p>
					</div>
					<div class="iwebpath-abtus-a1-b">
						<p id="abttm1" class="abtus-a1"><?php echo esc_html( get_theme_mod( 'iwebpatho_whours_time1' ) );?></p>
					</div>
				</div><?php endif; ?>
				<?php if ( get_theme_mod( 'iwebpatho_whours_days2' ) != null ) :?>
				<div class="iwebpath-abtus-a1">
					<div class="iwebpath-abtus-a1-a">
						<p id="abtdy2" class="abtus-a1"><?php echo esc_html( get_theme_mod( 'iwebpatho_whours_days2' ) );?></p>
					</div>
					<div class="iwebpath-abtus-a1-b">
						<p id="abttm2" class="abtus-a1"><?php echo esc_html( get_theme_mod( 'iwebpatho_whours_time2' ) );?></p>
					</div>
				</div><?php endif; ?>
				<?php if ( get_theme_mod( 'iwebpatho_whours_days3' ) != null ) :?>
				<div class="iwebpath-abtus-a1">
					<div class="iwebpath-abtus-a1-a">
						<p id="abtdy3" class="abtus-a1"><?php echo esc_html( get_theme_mod( 'iwebpatho_whours_days3' ) );?></p>
					</div>
					<div class="iwebpath-abtus-a1-b">
						<p id="abttm3" class="abtus-a1"><?php echo esc_html( get_theme_mod( 'iwebpatho_whours_time3' ) );?></p>
					</div>
				</div><?php endif; ?>
				<?php if ( get_theme_mod( 'iwebpatho_whours_days4' ) != null ) :?>
				<div class="iwebpath-abtus-a1" style="border-bottom:none;">
					<div class="iwebpath-abtus-a1-a">
						<p id="abtdy4" class="abtus-a1"><?php echo esc_html( get_theme_mod( 'iwebpatho_whours_days4' ) );?></p>
					</div>
					<div class="iwebpath-abtus-a1-b">
						<p id="abttm4" class="abtus-a1"><?php echo esc_html( get_theme_mod( 'iwebpatho_whours_time4' ) );?></p>
					</div>
				</div><?php endif; ?>
			 </div><!--
END - Working Hours
			 --><div class="iwebpath-abtus-b">
				<?php
					$iwebpatho_abtus_cat = esc_html( get_theme_mod( 'iwebpatho_aboutus_catg','0' ) );
				?>
			<?php
				$isection1_args = array(
					'page_id' => $iwebpatho_abtus_cat,
					'post_type' => 'page',
					'post_status' => 'publish',
				);
				$isection1_query = new WP_Query( $isection1_args );

				$isection1_query->have_posts();
				$isection1_query->the_post();
			?>
			<?php if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'full' );?>
			<?php else : ?>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no_image.jpg" alt="<?php echo esc_attr__( 'No Image','iweb-pathology' ); ?>" />
			<?php endif; ?>

			</div><!--
			 --><div class="iwebpath-abtus-c">
			<div style="text-align:left;">
				<a href="<?php the_permalink(); ?>"><h3 class="iweb-patho-mtitle h2hover"><?php the_title();?></h3></a>
				<?php add_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );
					add_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );?>
					<?php the_excerpt();?>
				<a class="patho-button" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more','iweb-pathology' );?></a>
				<?php remove_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );
				remove_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );?>
			</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<!-- END - About Us Section  -->

<!-- Health Packages Section  -->
<?php if ( get_theme_mod( 'iwebpatho_display_package','1' ) === '1' ) :?>
	<div class="iwebpath-pckg">
		<div class="iwebpath-pckg-w ifadezomin-pckg">
			<h1 id="hpckgmt" class="iweb-patho-mtitle"><?php echo esc_html( get_theme_mod( 'iwebpatho_package_mtitle', __( 'Health Packages','iweb-pathology' ) ) ); ?></h1>
			<?php
				$iweb_patho_hpckg_cat = esc_html( get_theme_mod( 'iwebpatho_hpckg_category' ) );
			if ( 0 != $iweb_patho_hpckg_cat ) :
				$iweb_patho_hpckg_args = array(
					'cat' => $iweb_patho_hpckg_cat,
					'post_status' => 'publish',
					'posts_per_page' => 4,
				);
				$iweb_patho_hpckg_query = new WP_Query( $iweb_patho_hpckg_args );
				$iweb_patho_hpckg = 0;
			?>
		<?php
		if ( $iweb_patho_hpckg_query->have_posts() ) :
			while ( $iweb_patho_hpckg_query->have_posts() ) :
				$iweb_patho_hpckg_query->the_post();
				$iweb_patho_hpckg_title1 = esc_html( get_the_title() );
				if ( strpos( $iweb_patho_hpckg_title1, ',' ) !== false ) {
					$iweb_patho_hpckg_title = explode( ',', $iweb_patho_hpckg_title1, 2 );
				}
		?>

			<div class="iwebpath-pckg-a">
				<div class="iwebpath-pckg-a1">
					<?php if ( has_post_thumbnail() ) :
						the_post_thumbnail( 'full' );?>
					<?php else : ?>
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no_image.jpg" alt="<?php echo esc_attr__( 'No Image','iweb-pathology' ); ?>" />
					<?php endif; ?>
					<?php if ( strpos( $iweb_patho_hpckg_title1, ',' ) !== false ) :?>
					<?php if ( null != $iweb_patho_hpckg_title[0] ) :?>
						<div class="txt-pckg-a1"><?php echo esc_html( $iweb_patho_hpckg_title[0] );?></div>
					<?php endif;
					else : ?>
						<div class="txt-pckg-a1"><?php echo esc_html( $iweb_patho_hpckg_title1 );?></div>
					<?php endif; ?>
				</div>
				<?php if ( strpos( $iweb_patho_hpckg_title1, ',' ) !== false ) :?>
				<div class="iwebpath-pckg-a3">
					<?php if ( null != $iweb_patho_hpckg_title[1] ) :?>
						<h5 class="pckg-a3"><?php echo esc_html( $iweb_patho_hpckg_title[1] );?></h5>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<?php add_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length' );?>
				<div class="iwebpath-pckg-a2"><?php the_excerpt();?></div>
				<?php remove_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length' );?>
			</div>
					<?php  endwhile; ?>
				<?php endif; ?>
			<?php endif; ?>

				<?php if ( get_theme_mod( 'iwebpatho_package_btnlink' ) != null ) :?>
				<div style="padding:20px 0">
					<a class="patho-button" href='<?php echo esc_url( get_theme_mod( 'iwebpatho_package_btnlink' ) ); ?>'><?php esc_html_e( 'Details', 'iweb-pathology' ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
<!-- END - Packages Section  -->

<!-- Featured Test Profiles  -->

<?php if ( get_theme_mod( 'iwebpatho_display_ftp','1' ) === '1' ) : ?>
	<div class="iwebpatho_testpf">
		<div class="iwebpatho_testpf-b"><div class="ifadezomin-pckg">
			<h1 id="ftpcust1" class="testpf-b-h3 talign-c iwebpatho_package_mtitle"><?php echo esc_html( get_theme_mod( 'iwebpatho_testprofile_title',__( 'Featured Test Profiles','iweb-pathology' ) ) );?></h1>
			<p id="ftpcust2" class="isecdesc"><?php echo esc_html( get_theme_mod( 'iwebpatho_testprofile_desc',__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin feugiat, turpis nec interdum cursus, Lorem ipsum dolor sit amet, consectetur adipiscing elit','iweb-pathology' ) ) );?></p>
			<?php
				$iweb_patho_tpf_cat = esc_html( get_theme_mod( 'iwebpatho_tpf_category' ) );
			if ( 0 != $iweb_patho_tpf_cat ) :
				$iweb_patho_tpf_args = array(
					'cat' => $iweb_patho_tpf_cat,
					'post_status' => 'publish',
					'posts_per_page' => 6,
				);
				$iweb_patho_tpf_query = new WP_Query( $iweb_patho_tpf_args );
			?>
		<?php
		if ( $iweb_patho_tpf_query->have_posts() ) :
			while ( $iweb_patho_tpf_query->have_posts() ) :
				$iweb_patho_tpf_query->the_post();
				$iweb_patho_tpf_title1 = esc_html( get_the_title() );
		?>
			<div class="iwebpatho_testpf-b1">
				<?php if ( has_post_thumbnail() ) :
					the_post_thumbnail( 'full' );?>
				<?php else : ?>
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no_image.jpg" alt="<?php echo esc_attr__( 'No Image','iweb-pathology' ); ?>" />
				<?php endif; ?>
				<p style="font-weight: normal" ><?php echo esc_html( $iweb_patho_tpf_title1 );?></p>
				<?php add_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );
					the_excerpt();
				remove_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );?>
			</div>
			<?php  endwhile; ?>
			<?php endif; ?>
		<?php endif; ?>
  <br>
			<?php if ( get_theme_mod( 'iwebpatho_testprofile_btntxt' ) != null ) :?>
		   <a id="tpfbtn" class="patho-button" href="<?php echo esc_url( get_theme_mod( 'iwebpatho_testprofile_btnlink' ) );?>"><?php echo esc_html( get_theme_mod( 'iwebpatho_testprofile_btntxt' ) ); ?></a>
			<?php endif ;?>
		</div></div>
	 </div>
<?php endif; ?>
<!-- END - Features Test Profiles  -->

<!-- Home Collection  -->

<?php if ( get_theme_mod( 'iwebpatho_display_homcoll','1' ) === '1' ) :?>
	<div class="iweb-patho-isection3">
		<div class="iweb-patho-isection3-a">
			<div class="iweb-patho-isection3-a1">
				<h1 class="txtcolfff bmarg-0"><?php echo esc_html( get_theme_mod( 'iwebpatho_homcoll_title',__( 'Call: 0731-12345678','iweb-pathology' ) ) );?></h1>
				<p style="font-size:20px;margin:0 0 15px 0;"><?php echo esc_html( get_theme_mod( 'iwebpatho_homcoll_desc',__( 'For Home Collection','iweb-pathology' ) ) );?></p>
			</div>
			<div class="iweb-patho-isection3-a2">
				<a id="hmcbtn" class="patho-button" style="padding:6px 25px;font-size: 18px;" href="<?php echo esc_url( get_theme_mod( 'iwebpatho_homcoll_btnlink' ) );?>"><?php echo esc_html( get_theme_mod( 'iwebpatho_homcoll_btntxt',__( 'Book A Test','iweb-pathology' ) ) ); ?></a>
			</div>
		</div>
	</div>
		<?php endif; ?>
<!-- END - Home Collection  -->

<!-- Our Doctors  -->
<?php if ( get_theme_mod( 'iwebpatho_display_ourdoc','1' ) === '1' ) : ?>
	<div class="iwebpatho-ourdoc">
		<div class="iwebpatho-ourdoc-w ifadezomin-pckg">
			<h1 class="testpf-b-h3 talign-c iwebpatho_package_mtitle"><?php echo esc_html( get_theme_mod( 'iwebpatho_ourdoc_title',__( 'Our Doctors','iweb-pathology' ) ) );?></h1>
				<p id="oddesc" class="isecdesc"><?php echo esc_html( get_theme_mod( 'iwebpatho_ourdoc_desc',__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin feugiat, turpis nec interdum cursus, Lorem ipsum dolor sit amet','iweb-pathology' ) ) );?></p>
			<?php
				$iweb_patho_ourdoc_cat = esc_html( get_theme_mod( 'iwebpatho_doctors_category' ) );
			if ( 0 != $iweb_patho_ourdoc_cat ) :
				$iweb_patho_ourdoc_args = array(
					'cat' => $iweb_patho_ourdoc_cat,
					'post_status' => 'publish',
					'posts_per_page' => 3,
				);
				$iweb_patho_ourdoc_query = new WP_Query( $iweb_patho_ourdoc_args );
				$iweb_patho_ourdoc = 0;
			?>
		<?php
		if ( $iweb_patho_ourdoc_query->have_posts() ) :
			while ( $iweb_patho_ourdoc_query->have_posts() ) :
				$iweb_patho_ourdoc_query->the_post();
				$iweb_patho_ourdoc_title1 = esc_html( get_the_title() );
				if ( strpos( $iweb_patho_ourdoc_title1, ',' ) !== false ) {
						$iweb_patho_ourdoc_title = explode( ',', $iweb_patho_ourdoc_title1, 2 );
				}
		?>
			<div class="iwebpatho-ourdoc-a">
				<div class="iwebpatho-ourdoc-a1">
					<a href="<?php echo esc_url( the_permalink() );?>">
					<?php if ( has_post_thumbnail() ) :
						the_post_thumbnail( 'full' );?>
					<?php else : ?>
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no_image.jpg" alt="<?php echo esc_attr__( 'No Image','iweb-pathology' ); ?>" />
					<?php endif; ?> </a>
					<div class="iwebpatho-ourdoc-a1-box"><i class="fa fa fa-plus aligncenter"></i></div>
				</div>
				<div class="iwebpatho-ourdoc-a2">
					<?php if ( strpos( $iweb_patho_ourdoc_title1, ',' ) !== false ) : ?>
						<?php if ( null != $iweb_patho_ourdoc_title[0] ) :?>
						   <h5 class="bmarg-0" ><?php echo esc_html( $iweb_patho_ourdoc_title[0] );?></h5>
						<?php endif; ?>
						<?php if ( null != $iweb_patho_ourdoc_title[1] ) :?>
							<p style="font-size:13px;margin-bottom:5px;margin-top:0;"><?php echo esc_html( $iweb_patho_ourdoc_title[1] );?></p>
						<?php endif; ?>
					<?php else : ?>
						<h5 class="bmarg-0" ><?php echo esc_html( $iweb_patho_ourdoc_title1 );?></h5>
					<?php endif; ?>

				</div>
			</div>
			<?php  endwhile; ?>
		<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
		<?php endif; ?>
<!-- END - Our Doctors  -->

<!-- Testimonials  -->
		<?php if ( get_theme_mod( 'iwebpatho_display_tstmon','1' ) === '1' ) :?>
	<div class="iwebpatho-tmonial-slider">
	   <div class="iwebpatho-tmonial-slider-w ifadezomin-pckg">
			  <h1 class="upcase"><?php echo esc_html( get_theme_mod( 'iwebpatho_tmonials_title',__( 'TESTIMONIALs','iweb-pathology' ) ) ); ?></h1>
			<p id="tmonialsp" class="isecdesc tmarg-0"><?php echo esc_html( get_theme_mod( 'iwebpatho_tmonials_desc', __( "Many patients can't go wrong",'iweb-pathology' ) ) ); ?></p>

		<?php
				$iweb_patho_tmonials_cat = esc_html( get_theme_mod( 'iwebpatho_testimonials_category' ) );
		if ( 0 != $iweb_patho_tmonials_cat ) :
				$iweb_patho_tmonials_args = array(
					'cat' => $iweb_patho_tmonials_cat,
					'post_status' => 'publish',
					'posts_per_page' => 3,
				);
				$iweb_patho_tmonials_query = new WP_Query( $iweb_patho_tmonials_args );
				$iweb_patho_tmonials = 1;
		?>
		<?php
		if ( $iweb_patho_tmonials_query->have_posts() ) :
			while ( $iweb_patho_tmonials_query->have_posts() ) :
				$iweb_patho_tmonials_query->the_post();
				$iweb_patho_tmonials_v1 = 0 ;
				$iweb_patho_tmonials_title1 = esc_html( get_the_title() );

				if ( strpos( $iweb_patho_tmonials_title1, ',' ) !== false ) {
						$iweb_patho_tmonials_title = explode( ',', $iweb_patho_tmonials_title1, 2 );
						$iweb_patho_tmonials_v1 = 1 ;
				}
		?>
		   <div class="iwebpatho-tmonial-islides">
				<?php add_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_others' );
					add_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );?>
			   <div class="tmonial-islides-p"><?php the_excerpt();?></div>
				<?php remove_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_others' );
					remove_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );?>
					<div class="iwebpatho-tmonial-islides-a">
						<?php if ( has_post_thumbnail() ) :
							the_post_thumbnail( 'medium' );?>
						<?php else : ?>
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no_image.jpg" alt="<?php echo esc_attr__( 'No Image','iweb-pathology' ); ?>" />
						<?php endif; ?>
					</div>
			<?php if ( 1 == $iweb_patho_tmonials_v1 ) : ?>
				<?php if ( null != $iweb_patho_tmonials_title[0] ) : ?>
					<p class="bmarg-0"><?php echo esc_html( $iweb_patho_tmonials_title[0] );?></p>
				<?php endif; ?>
				<?php if ( null != $iweb_patho_tmonials_title[1] ) : ?>
					<p style="font-size:13px;margin:0;"><?php echo esc_html( $iweb_patho_tmonials_title[1] );?></p>
				<?php endif; ?>
			<?php else : ?>
				<p class="bmarg-0"><?php echo esc_html( $iweb_patho_tmonials_title1 );?></p>
			<?php endif; ?>
		   </div>
			<?php $iweb_patho_tmonials = $iweb_patho_tmonials + 1 ;?>
			<?php endwhile; ?>
				<?php endif; ?>
				<div style="text-align:center">
				  <span class="iwebpatho-dot"></span>
					<?php if ( $iweb_patho_tmonials > 2 ) :?>
				  <span class="iwebpatho-dot"></span>
					<?php if ( 4 == $iweb_patho_tmonials ) :?>
				  <span class="iwebpatho-dot"></span><?php endif ;?><?php endif ;?>
				</div>
			<?php endif;?>

		</div>
	</div>
		<?php endif; ?>
<!-- END - Testimonials  -->

<!-- Latest News  -->

<?php if ( get_theme_mod( 'iwebpatho_display_letestnews', '1' ) == '1' ) : ?>
<div class="iweb-patho-isection8">
	<div class="iweb-patho-isection8-a ifadezomin-pckg">
		<div>
			<h1 class="testpf-b-h3 talign-c iwebpatho_package_mtitle"><?php echo esc_html( get_theme_mod( 'iwebpatho_latestnews_title',__( 'Blog/Latest News','iweb-pathology' ) ) );?></h1>
		</div>
		<p id="ilnwsdsc" class="isecdesc"><?php echo esc_html( get_theme_mod( 'iwebpatho_latestnews_desc',__( 'Select a category of posts in Latest News section of Theme Customizer','iweb-pathology' ) ) ); ?></p>

		<?php
			   $iwebpatho_news_cat = esc_html( get_theme_mod( 'iwebpatho_letestnews_category' ) );
		if ( 0 != $iwebpatho_news_cat ) :
		?>
			<?php
				$bk12_news_args = array(
					'cat' => $iwebpatho_news_cat,
					'post_status' => 'publish',
					'posts_per_page' => 3,
				);
				$bk12_news_query = new WP_Query( $bk12_news_args );
				$iwebpatho = 0;

			if ( $bk12_news_query->have_posts() ) :
				while ( $bk12_news_query->have_posts() ) :
						$bk12_news_query->the_post();
			?>

		<div class="iweb-patho-isection8-a1">
			<?php $iwebpatho_post_title = esc_html( get_the_title() );
				$iwebnwdate = get_the_date();
				$inwmonth = date( 'M',strtotime( $iwebnwdate ) );
				$inwdate = date( 'd',strtotime( $iwebnwdate ) );
				$inwauthor = esc_html( get_the_author() );

				?>
				<div class="iweb-patho-isection8-b1">
					<a href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) :
							the_post_thumbnail( 'full' );?>
						<?php else : ?>
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no_image.jpg" alt="<?php echo esc_attr__( 'No Image','iweb-pathology' ); ?>" />
						<?php endif; ?>
					</a>
					<div class="iwebpatho_latnews-b1-box">
						<div style="padding:0 0;margin: 0 0;line-height:normal;"><?php echo esc_html( $inwdate );?></div>
						<div style="font-size:16px;padding:0 0;margin: 0 0;line-height:5px;"><?php echo esc_html( $inwmonth );?></div>
					</div>
				</div>

			<p style="font-size:13px;color:#999;padding:15px 10px 0;line-height:5px;margin: 0 0;">
				<?php echo esc_html__( 'by: ','iweb-pathology' ) . esc_html( $inwauthor );?></p>

			<a href="<?php the_permalink(); ?>"> <h4 class="h2hover"><?php echo esc_html( $iwebpatho_post_title ); ?></h4></a>
			<div style="font-size:15px;padding: 0 10px 1px;">
				<?php add_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );
				add_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );
					the_excerpt();
				remove_filter( 'excerpt_more', 'iweb_pathology_change_link_excerpt' );
				remove_filter( 'excerpt_length', 'iweb_pathology_custom_excerpt_length_short' );?>
			</div>
		</div>
		<?php  endwhile; ?>
		<?php endif; ?>
		<?php endif; ?>
	 </div>
</div>
<?php endif; ?>

<!-- END - Latest News  -->

	</main><!-- #main -->
			</div><!-- #primary -->



<?php get_footer(); ?>

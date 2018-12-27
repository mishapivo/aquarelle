<?php
/*Template Name:Contact Us*/
?>
<?php get_header();
	global $wpdb;
	$admin_email = get_option('admin_email');
?>
<div id="content" class="site-content">
<section class="gmap-wrapper">
<?php
	$map = esc_html(get_theme_mod('map'));
	if ($map){
?>
	<div class="map-container">
		<?php cpmmagz_seperate_frame_src($map); ?>
	</div>
<?php } ?>
</section>
<!-- Gmap Wrapper -->
<div class="container">
<div class="row">
	<div class="col l8 s12 m12">
		<div id="primary" class="content-area">
			<main class="site-main" id="main" role="main">
				<div class="card post-card contact-card">
					<article class="post">
						<?php if (have_posts()) : while (have_posts()) : the_post();?>
							<div class="featured-media">
								<?php if (has_post_thumbnail()) : ?>
									<div class="card-image valign-wrapper">
										<?php  the_post_thumbnail('post-thumb');?>
									</div>
								<?php endif; ?>
							</div>
						<div class="card-desc">
							<div class="card-content card-wrapper">
								<header class="entry-header">
									<h1 class="entry-title"><?php the_title(); ?></h1>
								</header>
								<!-- Entry Header -->
								<div class="entry-content clearfix">
									<?php the_content();?>
									<?php endwhile; endif;?>
									<?php
										if (isset($_POST['send']) == "Submit") {
											echo '<div class="form-msg success">'.'<i class="rfa fa-check"></i>' . "Thank you " .esc_attr(ucfirst(esc_attr($_POST['first_name']))). ". Your message has been sent."  . '</div>';
											$subject = "New message from "  . esc_attr(ucfirst(esc_attr($_POST['first_name']))) ;
											$message  = '<html><body>';
											$message .= '<table>';
											$message .= '<tr><td><strong>Full Name : </strong>' . strip_tags(esc_attr($_POST['first_name'])) . '</td></tr>';
											$message .= '<tr><td><strong> Email : </strong>' . strip_tags(esc_attr($_POST['email_id'])). '</td></tr>';
											$message .= '<tr><td><strong> Website : </strong>' . strip_tags(esc_attr($_POST['website'])). '</td></tr>';
											$message .= '<tr><td><strong> Comments : </strong>' . strip_tags(esc_attr($_POST['textarea1'])). '</td></tr>';
											$message .= '</table>';
											$message .= "</body></html>";

									        $headers = 'From:'. esc_attr($_POST['email_id']) . "\r\n"; // Sender's Email
									        $headers .= 'Cc:'. esc_attr($_POST['email_id']) . "\r\n"; // Carbon copy to Sender

									        // Always set content-type when sending HTML email
									        $headers .= "MIME-Version: 1.0\r\n";
									        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

									        $to = $admin_email ;

									        wp_mail($to, $subject, $message, $headers);
									        unset($_POST['send']);
									   	 }
								    	?>
										<form action="" method= "post" id="commentform" class="comment-form wpcf7">
				 							<div class="input-field">
												<input placeholder=" " id="first_name" name="first_name" type="text" class="validate" required="required">
												<label for="first_name"><?php esc_attr_e('First Name', 'cpmmagz'); ?><span class="required">*</span></label>
											</div>
											<div class="input-field">
												<input placeholder=" " id="email_id" name="email_id" type="email" class="validate" required="required">
												<label for="first_name"><?php esc_attr_e('Email', 'cpmmagz'); ?><span class="required">*</span></label>
											</div>
											<div class="input-field">
												<input placeholder=" " id="website" name="website" type="url" class="validate">
												<label for="first_name"><?php esc_attr_e('Website', 'cpmmagz'); ?></label>
											</div>
											<div class="input-field">
												<textarea placeholder=" " id="textarea1" name="textarea1" class="materialize-textarea" required></textarea>
												<label for="textarea1"><?php esc_attr_e('Comments', 'cpmmagz'); ?><span class="required">*</span></label>
											</div>
											<button type="submit" class="waves-effect waves-light btn" id="send" name="send" ><?php esc_attr_e('Send', 'cpmmagz'); ?></button>
										</form>
								</div>
								<!-- Entry Content -->
							</div>
							<!-- Card Content -->
						</div>
						<!-- Card Desc -->
					</article>
				</div>
				<!-- Post Card -->
			</main>

		</div>
		<!-- End Primary -->
	</div>
	<!-- End Col 8 -->
		<div class="col l4 s12 m12 right">
			<?php get_sidebar(); ?>
		</div><!-- Col 4 Sidebar -->
</div><!-- row -->
</div><!-- container -->
</div>
<?php get_footer();?>
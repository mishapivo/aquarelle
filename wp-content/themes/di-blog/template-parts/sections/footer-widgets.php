<?php
// Do not load if disabled footer widgets using meta box options + do not check on posts loop page.
if( get_the_ID() && ! is_home() ) {
	if( get_post_meta( get_the_ID(), '_di_blog_hide_footer_widgets', true ) == '1' ) {
		return;
	}
}

$enordis = absint( get_theme_mod( 'endis_ftr_wdgt', '0' ) );
$layout = absint( get_theme_mod( 'ftr_wdget_lyot', '3' ) );

// Do not load if disabled in customize.
if( $enordis == 0 ) {
	return;
}

?>

<div class="container-fluid footer-widgets clearfix">
	<div class="container">
		<div class="row">

<?php
// If set 1 widget in customize.
if( $layout == 1 ) {
	if( is_active_sidebar( 'footer_1' ) ) {
		echo '<div class="col-md-12">';
		if( is_active_sidebar( 'footer_1' ) ) {
			dynamic_sidebar( 'footer_1' );
		}
		echo '</div>';
	}
}
?>


<?php
// If set 2 widgets in customize.
if( $layout == 2 ) {
	if( is_active_sidebar( 'footer_1' ) || is_active_sidebar( 'footer_2' ) ) {
		echo '<div class="col-md-6">';
		if( is_active_sidebar( 'footer_1' ) ) {
			dynamic_sidebar( 'footer_1' );
		}
		echo '</div>';

		echo '<div class="col-md-6">';
		if( is_active_sidebar( 'footer_2' ) ) {
			dynamic_sidebar( 'footer_2' );
		}
		echo '</div>';
	}
}
?>


<?php
// If set 3 widgets in customize.
if( $layout == 3 ) {
	if( is_active_sidebar( 'footer_1' ) || is_active_sidebar( 'footer_2' ) || is_active_sidebar( 'footer_3' ) ) {	
		echo '<div class="col-md-4">';
		if( is_active_sidebar( 'footer_1' ) ) {
			dynamic_sidebar( 'footer_1' );
		}
		echo '</div>';

		echo '<div class="col-md-4">';
		if( is_active_sidebar( 'footer_2' ) ) {
			dynamic_sidebar( 'footer_2' );
		}
		echo '</div>';
			
		echo '<div class="col-md-4">';
		if( is_active_sidebar( 'footer_3' ) ) {
			dynamic_sidebar( 'footer_3' );
		}
		echo '</div>';
	}
}
?>


<?php
// If set 4 widgets in customize.
if( $layout == 4 ) {
	if( is_active_sidebar( 'footer_1' ) || is_active_sidebar( 'footer_2' ) || is_active_sidebar( 'footer_3' ) || is_active_sidebar( 'footer_4' ) ) {
		echo '<div class="col-md-3">';
		if( is_active_sidebar( 'footer_1' ) ) {
			dynamic_sidebar( 'footer_1' );
		}
		echo '</div>';
		
		echo '<div class="col-md-3">';
		if( is_active_sidebar( 'footer_2' ) ) {
			dynamic_sidebar( 'footer_2' );
		}
		echo '</div>';
			
		echo '<div class="col-md-3">';
		if( is_active_sidebar( 'footer_3' ) ) {
			dynamic_sidebar( 'footer_3' );
		}
		echo '</div>';
			
		echo '<div class="col-md-3">';
		if( is_active_sidebar( 'footer_4' ) ) {
			dynamic_sidebar( 'footer_4' );
		}
		echo '</div>';
	}
}
?>


<?php
// If set 4 - 8 widgets in customize.
if( $layout == 48 ) {
	if( is_active_sidebar( 'footer_1' ) || is_active_sidebar( 'footer_2' ) ) {
		echo '<div class="col-md-4">';
		if( is_active_sidebar( 'footer_1' ) ) {
			dynamic_sidebar( 'footer_1' );
		}
		echo '</div>';

		echo '<div class="col-md-8">';
		if( is_active_sidebar( 'footer_2' ) ) {
			dynamic_sidebar( 'footer_2' );
		}
		echo '</div>';
	}
}
?>

<?php
// If set 84 widgets in customize.
if( $layout == 84 ) {
	if( is_active_sidebar( 'footer_1' ) || is_active_sidebar( 'footer_2' ) ) {
		echo '<div class="col-md-8">';
		if( is_active_sidebar( 'footer_1' ) ) {
			dynamic_sidebar( 'footer_1' );
		}
		echo '</div>';

		echo '<div class="col-md-4">';
		if( is_active_sidebar( 'footer_2' ) ) {
			dynamic_sidebar( 'footer_2' );
		}
		echo '</div>';
	}
}
?>

		</div>
	</div>
</div>

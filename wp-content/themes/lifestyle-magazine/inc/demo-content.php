<?php
/**
 * Lifestyle Magazine Theme Info
 *
 * @package Lifestyle Magazine
 */


if( class_exists( 'WP_Customize_control' ) ){

	class Lifestyle_Magazine_Theme_Info extends WP_Customize_Control
	{
    	/**
       	* Render the content on the theme customizer page
       	*/
       	public function render_content()
       	{
       		?>
       		<label>
       			<strong class="customize-text_editor"><?php echo esc_html( $this->label ); ?></strong>
       			<br />
       			<span class="customize-text_editor_desc">
       				<?php echo wp_kses_post( $this->description ); ?>
       			</span>
       		</label>
       		<?php
       	}
    }//editor close
    
}//class close

function lifestyle_magazine_customizer_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'theme_info' , array(
		'title'       => __( 'Demo and Documentation' , 'lifestyle-magazine' ),
		'priority'    => 6,
	) );
        
    $wp_customize->add_setting( 'setup_instruction', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Lifestyle_Magazine_Theme_Info( $wp_customize, 'setup_instruction', array(
		'settings'		=> 'setup_instruction',
		'section'		=> 'theme_info',
		'description'	=> __( 'Check out step-by-step tutorial to create your website like the demo of Lifestyle Magazine WordPress theme.', 'lifestyle-magazine'),
	) ) );
    

	$wp_customize->add_setting( 'theme_info_theme', array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
    
    $theme_info = '';
	
	$theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Theme Demo', 'lifestyle-magazine' ) . ': </label><a href="' . esc_url( 'http://thebootstrapthemes.com/preview/?demo=lifestyle-magazine' ) . '" target="_blank">' . __( 'Click Here', 'lifestyle-magazine' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Theme Details', 'lifestyle-magazine' ) . ': </label><a href="' . esc_url( 'https://thebootstrapthemes.com/downloads/free-lifestyle-magazine-wordpress-theme/' ) . '" target="_blank">' . __( 'Click Here', 'lifestyle-magazine' ) . '</a></span><br />';
	$theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'How to use', 'lifestyle-magazine' ) . ': </label><a href="' . esc_url( 'https://thebootstrapthemes.com/lifestyle-magazine-wordpress-theme-documentation/' ) . '" target="_blank">' . __( 'Click Here', 'lifestyle-magazine' ) . '</a></span><br />';

	$wp_customize->add_control( new Lifestyle_Magazine_Theme_Info( $wp_customize ,'theme_info_theme',array(
		'section' => 'theme_info',
		'description' => $theme_info
	) ) );
}
add_action( 'customize_register', 'lifestyle_magazine_customizer_theme_info' );
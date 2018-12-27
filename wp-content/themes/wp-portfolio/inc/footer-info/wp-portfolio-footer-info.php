<?php
/**
 * Contains all the current date, year of the theme.
 *
 * @package Theme Horse
 * @subpackage WP_Portfolio
 * @since WP_Portfolio 1.0
 */
?>
<?php
	/**
	 * To display the current year.
	 *
	 * @uses date() Gets the current year.
	 * @return string
	 */
	function wp_portfolio_the_year() {
	   return date( 'Y' );
	}
	/**
	 * To display a link back to the site.
	 *
	 * @uses get_bloginfo() Gets the site link
	 * @return string
	 */
	function wp_portfolio_site_link() {
	   return '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';
	}
	/**
	 * To display a link to WordPress.org
	 *
	 * @return string
	 */
	function wp_portfolio_wp_link() {
	   return __(' ', 'wp-portfolio') .'<a href="'.esc_url( 'http://builderbody.ru/','wp-portfolio' ).'" target="_blank" title="' . sprintf( __( '%s', 'wp-portfolio' ), 'Бодибидлинг'). '"><span>' . sprintf( __( '%s', 'wp-portfolio' ), 'Спорт') . '</span></a>';
	}
	/**
	 * To display a link to themehorse.com
	 *
	 * @return string
	 */
	function wp_portfolio_themehorse_link() {
	   return __(' ', 'wp-portfolio') .'<a href="'.esc_url( 'http://themehorse.com','wp-portfolio' ).'" target="_blank" title="' . sprintf( __( '%s', 'wp-portfolio' ), 'Theme Horse').'" ><span>'.sprintf( __( '%s', 'wp-portfolio' ), 'Theme Horse') .'</span></a>';
	}
?>

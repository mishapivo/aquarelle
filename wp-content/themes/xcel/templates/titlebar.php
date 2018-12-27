<?php
if ( is_archive() || is_search() ) {
    $page = get_option( 'page_for_posts' );
    $featured_image = wp_get_attachment_url( get_post_thumbnail_id( $page ) );
} else {
    $page = get_queried_object();
    $featured_image = wp_get_attachment_url( get_post_thumbnail_id( $page->ID ) );
} ?>
<div class="<?php echo ( $featured_image ) ? 'has-' : 'no-'; ?>page-thumbnail page-titlebar xcel-setting-title-size-small <?php echo ( get_theme_mod( 'xcel-setting-header-layout', false ) ) ? sanitize_html_class( get_theme_mod( 'xcel-setting-header-layout', false ) ) : sanitize_html_class( 'xcel-setting-header-layout-standard' ); ?> <?php echo ( get_theme_mod( 'xcel-setting-title-layout', false ) ) ? sanitize_html_class( get_theme_mod( 'xcel-setting-title-layout', false ) ) : sanitize_html_class( 'xcel-setting-title-layout-standard' ); ?> <?php echo ( get_theme_mod( 'xcel-setting-title-bgimg', false ) ) ? sanitize_html_class( get_theme_mod( 'xcel-setting-title-bgimg', false ) ) : sanitize_html_class( 'xcel-setting-title-bgimg-middle' ); ?>" <?php echo ( $featured_image ) ? 'style="background-image: url(' . esc_url( $featured_image ) . ');"' : ''; ?>>
    
    <div class="site-container">
        
        <div class="page-titlebar-left">
        
            <?php if ( is_home() ) : ?>
                
                <?php echo ( get_theme_mod( 'xcel-setting-blog-title' ) ) ? '<h1 class="entry-title">' . esc_html( get_theme_mod( 'xcel-setting-blog-title', false ) ) . '</h1>' : '<h1 class="entry-title">' . __( 'Blog', 'xcel' ) . '</h1>'; ?>
                
            <?php else: ?>
                
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                
            <?php endif; ?>
            
        </div>
        
        <div class="page-titlebar-right">
            
            <?php if ( function_exists( 'bcn_display' ) ) : ?>
            
                <?php bcn_display(); ?>
                
            <?php endif; ?>
            
        </div>
        <div class="clearboth"></div>
    
    </div>
    
</div>
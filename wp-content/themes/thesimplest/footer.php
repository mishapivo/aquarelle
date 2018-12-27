        </div><!-- .site-content -->
        
        <?php
            /**
             * In case you want to disable the footer.
             */
            $thesimplest_footer = apply_filters( 'thesimplest_display_footer', true );

            if( $thesimplest_footer ) :
        ?>
        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="site-info container">
            <?php /* translators: %s: WordPress */ ?>
                <a href="<?php echo esc_url( esc_attr__( 'https://wordpress.org/', 'thesimplest' ) ) ?>"><?php printf( esc_attr__( 'Proudly powered by %s', 'thesimplest' ), 'WordPress' ); ?></a>
            </div>
        </footer>
        <?php 
            endif; 
        ?>

    </div><!-- site-inner -->
</div><!-- site -->

<?php wp_footer(); ?>
</body>
</html>
<?php
/*
 * Search Template File
 */
get_header();

if (have_posts()) :
    get_template_part('content'); 
else : ?>
<div class="" id="" role="dialog" style="">
    <div class="modal-dialog">
        <div class="modal-content" id="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="foodies-section text-center">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="blog-content-area fadeIn animated">
            					<p class="spage">
            						<?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords', 'foodies'); ?>.
                                </p> 
            					<p><?php get_search_form(); ?></p>
            				    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<?php endif; get_footer(); ?>
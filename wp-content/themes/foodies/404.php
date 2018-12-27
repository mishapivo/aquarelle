<?php
/*
* 404 Template File
*/
get_header();
?>
<div role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="foodies-section text-center">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="blog-content-area fadeIn animated">
                                    <h4><?php _e("Oops! That page can't be found.",'foodies') ?></h4>
            					<p class="spage">
            						<?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'foodies'); ?>.</p>
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
<?php get_footer(); ?>
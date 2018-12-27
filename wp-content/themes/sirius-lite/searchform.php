<form role="search" name="main-search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
    <input type="text" class="form-control input-search" name="s" placeholder="" value="<?php echo get_search_query() ?>" />
    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
</form>

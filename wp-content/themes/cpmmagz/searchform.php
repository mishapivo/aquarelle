
<?php
/**
 * The template for displaying search forms in CPM magazine Theme
 *
 * @package CPM magazine
 */
?>
<div class="search-inline">
	<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" role="search">
		<div class="input-field">
			<input placeholder="Search" id="search-page" type="text" class="validate" name="s" value="<?php echo esc_attr(get_search_query()); ?>"  placeholder="<?php esc_attr_e('Search here;', 'cpmmagz');?>">
		</div>
		<button class="search-btn waves-effect waves-light"><i class="fa fa-search"></i></button>
	</form>
</div>
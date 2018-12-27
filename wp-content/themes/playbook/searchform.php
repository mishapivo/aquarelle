<form method="get" id="searchform" class="search-form" action="<?php echo home_url(); ?>" _lpchecked="1">
	<fieldset>
		<input type="text" name="s" id="s" value="Поиск по сайту" onblur="if (this.value == '') {this.value = 'Поиск по сайту';}" onfocus="if (this.value == 'Поиск по сайту') {this.value = '';}" >
		<input id="search-image" class="sbutton" type="submit" style="border:0; vertical-align: top;" value="Искать">
	</fieldset>
</form>
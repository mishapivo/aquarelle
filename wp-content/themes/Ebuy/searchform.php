<div id="search">
	<form method="get" id="searchform" action="<?php bloginfo('home'); ?>" >
	<input id="s"  type="text" name="s" onfocus="if(this.value=='search site'){this.value=''};" onblur="if(this.value==''){this.value='поиск по сайту'};" value="<?php echo wp_specialchars($s, 1); ?>" />
	
	</form>
</div>
<div class='clear'></div>	

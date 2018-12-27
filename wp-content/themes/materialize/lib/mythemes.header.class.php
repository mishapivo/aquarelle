<?php
if( !class_exists( 'mythemes_header' ) ){

class mythemes_header
{
	static function head()
	{
        get_template_part( 'templates/head' );
		get_template_part( 'templates/style' );
	}
}

}	/* END IF CLASS EXISTS */
?>
<?php
/**
 * A class to create a dropdown for all categories in your wordpress site
 * @package CPMMagz
 */

    // Category dropdown in customizer.
    if ( ! class_exists( 'WP_Customize_Control' ) ) {
        return NULL;
    }

 class WP_Customize_Category_Control extends WP_Customize_Control
 {
    private $sel_cats = false;
    public function __construct( $manager, $id, $args = array(), $options = array() )
    {
		$options =  array(
						'echo'              => 0,
                        'show_option_none'  => esc_attr( __( 'None','cpmmagz' ) ),
                        'option_none_value' => '0',
                        'hide_empty' => 1
                        );
        $this->sel_cats = get_categories( $options );
        parent::__construct( $manager, $id, $args );
    }
    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
       {
            if(! empty($this->sel_cats))
            {
                ?>
                    <label class="customize-control-select">
                      <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
                      <select <?php $this->link(); ?>>
					  <option><?php esc_attr_e( __( 'None','cpmmagz' ) ); ?></option>
                           <?php
                                foreach ($this->sel_cats as $sel_cat)
                                {
                                    printf( '<option value="%s" %s>%s</option>', esc_attr($sel_cat->term_id), selected( $this->value(), esc_attr($sel_cat->term_id), false ), esc_attr($sel_cat->name) );
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 }
?>
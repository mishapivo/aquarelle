<?php  
/**
 *
 *
 *
 */
if ( ! class_exists( 'WP_Customize_Control' ) )
  return NULL;

/**
 * Class Blogger_Era_Dropdown_Taxonomies_Control
 */
class Blogger_Era_Dropdown_Taxonomies_Control extends WP_Customize_Control {

    /**
     * Render the control's content.
     *
     * @since 1.0.0
     */
    public function render_content() {
        $dropdown = wp_dropdown_categories(
            array(
                'name'              => 'blogger-era-dropdown-categories-' . $this->id,
                'echo'              => 0,
                'show_option_none'  => __( '&mdash; Select &mdash;', 'blogger-era' ),
                'option_none_value' => '0',
                'selected'          => $this->value(),
                'hide_empty'        => 0,                   

            )
        ); 
        
        $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

        printf(
            '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s <span class="description customize-control-description"></span>%s </label>',
            esc_html($this->label),
            esc_html($this->description),
            $dropdown

        );
    }

}
/**
 * Class Blogger_Era_Info
 */
class Blogger_Era_Info extends WP_Customize_Control {
    /**
     * Render the control's content.
     *
     * @since 1.0.0
     */    
    public $type = 'info';
    public $label = '';
    public function render_content() {
    ?>
        <h2><?php echo esc_html( $this->label ); ?></h2>
    <?php
    }
}

/**
* Customize sidebar layout control.
*/
class Blogger_Era_Image_Radio_Control extends WP_Customize_Control {

    public function render_content() {

        if (empty($this->choices))
            return;

        $name = '_customize-radio-' . $this->id;
        ?>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <ul class="controls" id='blogger-era-img-container'>
            <?php
            foreach ($this->choices as $value => $label) :
                $class = ($this->value() == $value) ? 'blogger-era-radio-img-selected blogger-era-radio-img-img' : 'blogger-era-radio-img-img';
                ?>
                <li style="display: inline;">
                    <label>
                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
                                                      $this->link();
                                                      checked($this->value(), $value);
                                                      ?> />
                        <img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
                    </label>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
        <?php
    }

}

    class Blogger_Era_Range_Value_Control extends WP_Customize_Control {

        public $type = 'range-input';

        /**
         * Render the control's content.
         *
         * @author soderlind
         * @version 1.2.0
         */
        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <div class="range-slider"  style="width:100%; display:flex;flex-direction: row;justify-content: flex-start;">
                    <span  style="width:100%; flex: 1 0 0; vertical-align: middle;"><input class="range-slider__range" type="range" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?>>
                    <span class="range-slider__value">0</span></span>
                </div>
                <?php if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_attr( $this->description) ; ?></span>
                <?php endif; ?>
            </label>
            <?php
        }
    }
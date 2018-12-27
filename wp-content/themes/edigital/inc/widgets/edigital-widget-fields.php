<?php
/**
 * Define custom fields for widgets
 * 
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

function edigital_widgets_show_widget_field( $instance = '', $widget_field = '', $mt_widget_field_value = '' ) {
    
    extract( $widget_field );

    switch ( $edigital_widgets_field_type ) {

        // Standard text field
        case 'text' :
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $edigital_widgets_name ) ); ?>"><?php echo esc_html( $edigital_widgets_title ); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $edigital_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $edigital_widgets_name ) ); ?>" type="text" value="<?php echo esc_html( $mt_widget_field_value ); ?>" />

                <?php if ( isset( $edigital_widgets_description ) ) { ?>
                    <br />
                    <small><em><?php echo wp_kses_post( $edigital_widgets_description ); ?></em></small>
                <?php } ?>
            </p>
        <?php
            break;

        // Standard url field
        case 'url' :
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $edigital_widgets_name ) ); ?>"><?php echo esc_html( $edigital_widgets_title ); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $edigital_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $edigital_widgets_name ) ); ?>" type="text" value="<?php echo esc_url( $mt_widget_field_value ); ?>" />

                <?php if ( isset( $edigital_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo wp_kses_post( $edigital_widgets_description ); ?></small>
                <?php } ?>
            </p>
        <?php
            break;

        // Textarea field
        case 'textarea' :
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $edigital_widgets_name ) ); ?>"><?php echo esc_html( $edigital_widgets_title ); ?>:</label>
                <textarea class="widefat" rows="<?php echo absint( $edigital_widgets_row ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $edigital_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $edigital_widgets_name ) ); ?>"><?php echo esc_textarea( $mt_widget_field_value ); ?></textarea>
            </p>
        <?php
            break;
        
        // Checkbox field
        case 'checkbox' :
            ?>
            <p>
                <input id="<?php echo esc_attr( $instance->get_field_id( $edigital_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $edigital_widgets_name ) ); ?>" type="checkbox" value="1" <?php checked( '1', $mt_widget_field_value ); ?>/>
                <label for="<?php echo esc_attr( $instance->get_field_id( $edigital_widgets_name ) ); ?>"><?php echo esc_html( $edigital_widgets_title ); ?>:</label>

                <?php if ( isset( $edigital_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo wp_kses_post( $edigital_widgets_description ); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Select field
        case 'select' :
            if( empty( $mt_widget_field_value ) ) {
                $mt_widget_field_value = $edigital_widgets_default;
            }
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $edigital_widgets_name ) ); ?>"><?php echo esc_html( $edigital_widgets_title ); ?>:</label>
                <select name="<?php echo esc_attr( $instance->get_field_name( $edigital_widgets_name ) ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $edigital_widgets_name ) ); ?>" class="widefat">
                    <?php foreach ( $edigital_widgets_field_options as $mt_select_option_name => $mt_select_option_title ) { ?>
                        <option value="<?php echo esc_attr( $mt_select_option_name ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $mt_select_option_name ) ); ?>" <?php selected( $mt_select_option_name, $mt_widget_field_value ); ?>><?php echo esc_html( $mt_select_option_title ); ?></option>
                    <?php } ?>
                </select>

                <?php if ( isset( $edigital_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo wp_kses_post( $edigital_widgets_description ); ?></small>
                <?php } ?>
            </p>
        <?php
            break;

        // Number field
        case 'number' :
            if( empty( $mt_widget_field_value ) ) {
                $mt_widget_field_value = $edigital_widgets_default;
            }
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $edigital_widgets_name ) ); ?>"><?php echo esc_html( $edigital_widgets_title ); ?>:</label>
                <input name="<?php echo esc_attr( $instance->get_field_name( $edigital_widgets_name ) ); ?>" type="number" step="1" min="1" id="<?php echo esc_attr( $instance->get_field_id( $edigital_widgets_name ) ); ?>" value="<?php echo esc_html( $mt_widget_field_value ); ?>" class="small-text" />

                <?php if ( isset( $edigital_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo wp_kses_post( $edigital_widgets_description ); ?></small>
                <?php } ?>
            </p>
        <?php
            break;

        // Multi checkboxes field
        case 'multicheckboxes':
        ?>
            <label><?php echo esc_html( $edigital_widgets_title ); ?>:</label>

        <?php    
            foreach ( $edigital_widgets_field_options as $athm_option_name => $athm_option_title) {
                if( isset( $mt_widget_field_value[$athm_option_name] ) ) {
                    $mt_widget_field_value[$athm_option_name] = 1;
                }else{
                    $mt_widget_field_value[$athm_option_name] = 0;
                }
                
            ?>
                <p>
                    <input id="<?php echo esc_attr( $instance->get_field_id( $athm_option_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $edigital_widgets_name ).'['.$athm_option_name.']' ); ?>" type="checkbox" value="1" <?php checked('1', $mt_widget_field_value[$athm_option_name]); ?>/>
                    <label for="<?php echo esc_attr( $instance->get_field_id( $athm_option_name ) ); ?>"><?php echo esc_html( $athm_option_title ); ?></label>
                </p>
            <?php
                }
                if ( isset( $edigital_widgets_description ) ) {
            ?>
                    <small><em><?php echo wp_kses_post( $edigital_widgets_description ); ?></em></small>
            <?php
                }
            break;

        // Upload field
        case 'upload':
            $image = $image_class = "";
            if( $mt_widget_field_value ){ 
                $image = '<img src="'.esc_url( $mt_widget_field_value ).'" style="max-width:100%;"/>';    
                $image_class = ' hidden';
            }
            ?>
            <div class="attachment-media-view">

            <label for="<?php echo esc_attr( $instance->get_field_id( $edigital_widgets_name ) ); ?>"><?php echo esc_html( $edigital_widgets_title ); ?>:</label><br />
            
                <div class="placeholder<?php echo esc_attr( $image_class ); ?>">
                    <?php esc_html_e( 'No image selected', 'edigital' ); ?>
                </div>
                <div class="thumbnail thumbnail-image">
                    <?php echo $image; ?>
                </div>

                <div class="actions clearfix">
                    <button type="button" class="button edigital-delete-button align-left"><?php esc_html_e( 'Remove', 'edigital' ); ?></button>
                    <button type="button" class="button edigital-upload-button alignright"><?php esc_html_e( 'Select Image', 'edigital' ); ?></button>
                    
                    <input name="<?php echo esc_attr( $instance->get_field_name( $edigital_widgets_name ) ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $edigital_widgets_name ) ); ?>" class="upload-id" type="hidden" value="<?php echo esc_url( $mt_widget_field_value ) ?>"/>
                </div>

            <?php if ( isset( $edigital_widgets_description ) ) { ?>
                <br />
                <small><?php echo wp_kses_post( $edigital_widgets_description ); ?></small>
            <?php } ?>

            </div>
            <?php
            break;
    }
}

function edigital_widgets_updated_field_value( $widget_field, $new_field_value ) {

    extract( $widget_field );

    if ( $edigital_widgets_field_type == 'number') {
        return absint( $new_field_value );
    } elseif ( $edigital_widgets_field_type == 'textarea' ) {
        return wp_kses_post( $new_field_value );
    } elseif ( $edigital_widgets_field_type == 'url' ) {
        return esc_url( $new_field_value );
    } elseif( $edigital_widgets_field_type == 'multicheckboxes' ) {
        return wp_kses_post( $new_field_value );
    } else {
        return sanitize_text_field( $new_field_value );
    }

}
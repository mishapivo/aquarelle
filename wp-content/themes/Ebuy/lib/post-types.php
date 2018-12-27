<?php 

/* Goods post type*/

function post_type_goods() {
register_post_type(
                    'goods', 
                    array( 'public' => true,
					 		'publicly_queryable' => true,
							'has_archive' => true, 
							'hierarchical' => false,
							'menu_icon' => get_stylesheet_directory_uri() . '/images/box.png',
                    		'labels'=>array(
    									'name' => _x('Товары', 'post type general name'),
    									'singular_name' => _x('Товары', 'post type singular name'),
    									'add_new' => _x('Добавить новый', 'Goods'),
    									'add_new_item' => __('Добавить товары'),
    									'edit_item' => __('Изменить товар'),
    									'new_item' => __('Новый товар'),
    									'view_item' => __('Просмотр товаров'),
    									'search_items' => __('Поиск товаров'),
    									'not_found' =>  __('Товаров не найдено'),
    									'not_found_in_trash' => __('No Goods found in Trash'), 
    									'parent_item_colon' => ''
  										),							 
                            'show_ui' => true,
							'menu_position'=>5,
							'query_var' => true,
							'rewrite' => true,
							'rewrite' => array( 'slug' => 'item', 'with_front' => FALSE,),
							'register_meta_box_cb' => 'mytheme_add_box',
							'supports' => array(
							 			'title',
										'thumbnail',
										'custom-fields',
										'comments',
										'editor'
										)
							) 
					);
				} 
add_action('init', 'post_type_goods');

/* Movie genre taxonomy */

function create_products_taxonomy() 
{
$labels = array(
	  						  'name' => _x( 'Группы товаров', 'taxonomy general name' ),
    						  'singular_name' => _x( 'Product type', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Search Product types' ),
   							  'all_items' => __( 'Все группы товаров' ),
    						  'parent_item' => __( 'Parent Product type' ),
   					   		  'parent_item_colon' => __( 'Parent Product type:' ),
   							  'edit_item' => __( 'Правка группы продукта' ), 
  							  'update_item' => __( 'Обновить группу продукта' ),
  							  'add_new_item' => __( 'Добавить группу продукта' ),
  							  'new_item_name' => __( 'Новое имя группы продукта' ),
); 	
register_taxonomy('product',array('goods'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'product' ),
  ));
}

add_action( 'init', 'create_products_taxonomy', 0 );

/* ADD FEATURED TERM */

function add_product_term_featured() {
if(!is_term('Featured', 'product')){
  wp_insert_term('Featured', 'product');
}
}
add_action( 'init', 'add_product_term_featured' );

?>
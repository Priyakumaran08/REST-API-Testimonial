//Custom Post Type - Testimonials
function custom_testimonial_type(){
	register_post_type('testimonials', array(
		'labels'=> array(
			'name'=> 'Testimonials',
			'singular_name' => 'Testimonial',
		),
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
	));
}
add_action('init', 'custom_testimonial_type');

//Register Custom Endpoints
add_action('rest_api_init', 'custom_testimonial_route');
function custom_testimonial_route(){
	register_rest_route(
		'custom/v2',
		'/testimonials',
		array(
		'methods' => 'GET',
		'callback' => 'get_testimonials',
		)
	);
}

//Callback Function
function get_testimonials(){
	$testimonials = array();
	$args = array(
	'post_type' => 'testimonials',
	'nopaging' => true,
	);
	$query = new WP_Query($args);
		if($query->have_posts()){
			while($query->have_posts()){
				$query->the_post();
				$testimonial_data = array(
				'title' => get_the_title(),
				'content' => get_the_content(),
				);
				$testimonials[] = $testimonial_data;
			}
			wp_reset_postdata();
		}
	return rest_ensure_response($testimonials);
}

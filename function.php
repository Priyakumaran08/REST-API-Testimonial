//Create Custom Post Type - Testimonials
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
		'custom/v1',
		'/testimonials',
		array(
		'methods' => 'GET',
		'callback' => 'get_testimonials',
		)
	);
}

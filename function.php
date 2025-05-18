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

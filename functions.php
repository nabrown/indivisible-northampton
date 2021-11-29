<?php
/* Functions for Indivisible Northampton child theme (Twenty Twenty) */

add_action( 'wp_enqueue_scripts', 'indivisible_enqueue_styles' );
function indivisible_enqueue_styles() {
    $parenthandle = 'twentytwenty-style';
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'indivisible-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

/**
 * Custom color palette for Gutenberg.
 * @link https://wpdevelopment.courses/articles/gutenberg-colour-settings/
 */
function add_custom_gutenberg_color_palette() {
	add_theme_support(
		'editor-color-palette',
		[
			[
				'name'  => esc_html__( 'Red' ),
				'slug'  => 'red',
				'color' => '#CA4948',
			],
			[
				'name'  => esc_html__( 'Blue' ),
				'slug'  => 'blue',
				'color' => '#519ed4',
			],
			[
				'name'  => esc_html__( 'Light Blue' ),
				'slug'  => 'lightblue',
				'color' => '#8ec2ed',
			],
			[
				'name'  => esc_html__( 'Text Black' ),
				'slug'  => 'textblack',
				'color' => '#292929',
			],
			[
				'name'  => esc_html__( 'Dark Grey' ),
				'slug'  => 'darkgray',
				'color' => '#827B87',
			],
			[
				'name'  => esc_html__( 'Medium Gray' ),
				'slug'  => 'mediumgray',
				'color' => '#BAB5BD',
			],			
			[
				'name'  => esc_html__( 'Light Gray' ),
				'slug'  => 'lightgray',
				'color' => '#EAE9EB',
			],
    ]
	);
}
add_action( 'after_setup_theme', 'add_custom_gutenberg_color_palette', 100 );
// remove the parent theme action
add_action( 'after_setup_theme', 'twentytwenty_block_editor_settings', 0 );
/**
 * Custom gradient palette for Gutenberg.
 * @link https://wpdevelopment.courses/articles/gutenberg-colour-settings/
 */
function add_custom_gutenberg_gradient_presets() {
	add_theme_support(
		'editor-gradient-presets',
		[
			[
				'name' => esc_html__( 'Red-Blue'),
				'gradient' => 'linear-gradient(150deg, #CA4948, #4646d8)',
				'slug' => 'red-blue'
			],
		]
	);
}
add_action( 'after_setup_theme', 'add_custom_gutenberg_gradient_presets' );

// opt-out of block editor for widgets
remove_theme_support( 'widgets-block-editor' );


function output_verification() { ?>
	<!-- Site Verification Tag -->
	<meta name="google-site-verification" content="3ArrSKIEj_CovmmmMtw1uHj1FmSQ4eXdmzOep-J3_QA" />
<?php
	}
add_action('wp_head', 'output_verification', 1);
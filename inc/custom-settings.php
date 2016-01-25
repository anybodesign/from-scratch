<?php defined('ABSPATH') or die(); 

add_action( 'admin_menu', 'fs_add_admin_menu' );
add_action( 'admin_init', 'fs_settings_init' );


function fs_add_admin_menu(  ) { 

	add_menu_page( 
		__( 'Custom Settings', 'fromscratch' ), 
		__( 'Custom Settings', 'fromscratch' ), 
		'manage_options', 
		'from_scratch', 
		'from_scratch_options_page' );

}


function fs_settings_init(  ) { 

	register_setting( 'pluginPage', 'fs_settings' );

	add_settings_section(
		'fs_pluginPage_section1', 
		__( 'Site Settings', 'fromscratch' ), 
		'fs_settings_section1_callback', 
		'pluginPage'
	);
	add_settings_section(
		'fs_pluginPage_section2', 
		__( 'Social Networks', 'fromscratch' ), 
		'fs_settings_section2_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'fs_copyright', 
		__( 'Copyright', 'fromscratch' ), 
		'fs_copyright_render', 
		'pluginPage', 
		'fs_pluginPage_section1' 
	);

	add_settings_field( 
		'fs_twitter', 
		__( 'Twitter URL', 'fromscratch' ), 
		'fs_twitter_render', 
		'pluginPage', 
		'fs_pluginPage_section2' 
	);

	add_settings_field( 
		'fs_facebook', 
		__( 'Facebook URL', 'fromscratch' ), 
		'fs_facebook_render', 
		'pluginPage', 
		'fs_pluginPage_section2' 
	);


}


function fs_copyright_render(  ) { 

	$options = get_option( 'fs_settings' );
	?>
	<textarea cols='40' rows='5' name='fs_settings[fs_copyright]'><?php echo $options['fs_copyright']; ?></textarea>
	<?php

}


function fs_twitter_render(  ) { 

	$options = get_option( 'fs_settings' );
	?>
	<input type='text' name='fs_settings[fs_twitter]' value='<?php echo $options['fs_twitter']; ?>'>
	<?php

}


function fs_facebook_render(  ) { 

	$options = get_option( 'fs_settings' );
	?>
	<input type='text' name='fs_settings[fs_facebook]' value='<?php echo $options['fs_facebook']; ?>'>
	<?php

}


function fs_settings_section1_callback(  ) { 

	echo __( 'The site’s copyright, displayed in the footer', 'fromscratch' );

}
function fs_settings_section2_callback(  ) { 

	echo __( 'Enter your Social Networks URLs', 'fromscratch' );

}


function from_scratch_options_page(  ) { ?>
<div class="wrap">

	<form action='options.php' method='post'>
		
		<h1><?php _e( 'Custom Settings', 'fromscratch' ); ?></h1>
		
		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>
		
	</form>

</div>
<?php }

?>
<?php

namespace Caf\MetaFields\WpOptions;

add_action( 'cmb2_admin_init', function(){
  /**
   * Registers options page menu item and form.
   */
  $cmb_options = new_cmb2_box( array(
    'id'           => 'theme_options',
    'title'        => esc_html__( 'Theme Options', 'myprefix' ),
    'object_types' => array( 'options-page' ),
    /*
     * The following parameters are specific to the options-page box
     * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
     */
    'option_key'      => 'theme_options', // The option key and admin menu page slug.
    // 'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
    // 'menu_title'      => esc_html__( 'Options', 'myprefix' ), // Falls back to 'title' (above).
    // 'parent_slug'     => 'themes.php', // Make options page a submenu item of the themes menu.
    // 'capability'      => 'manage_options', // Cap required to view options-page.
    // 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
    // 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
    // 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
    // 'save_button'     => esc_html__( 'Save Theme Options', 'myprefix' ), // The text for the options-page save button. Defaults to 'Save'.
  ) );

  $cmb_options->add_field( array(
    'name' => 'Footer sign off',
    'id'   => 'footer-sign-off',
    'description' => 'Comma separated for multiple addresses',
    'type' => 'wysiwyg',
    'default' => '<div>All rights reserved</div>',
    'options' => [
      'textarea_rows' => 5
    ]
  ) );
} );

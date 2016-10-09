<?php
class CBUS_Content_Manager {
	protected $loader;
	protected $plugin_slug;
	protected $version;

	public function __construct() {
		$this->plugin_slug = 'cbus-content-manager-slug';
		$this->version = '0.2.0';
		// $this->models  = array( "cbus-service-model" );

		$this->load_dependencies();
		$this->define_admin_hooks();
	}

	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-cbus-content-manager-admin.php';
		// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/interfaces/IDataAccess.php';

		require_once plugin_dir_path( __FILE__ ) . 'class-cbus-content-manager-loader.php';
		// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/interfaces/IDataAccess.php';
		// foreach( $this->models as $model ) {
		// 	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/models/'. $model . '.php';
		// }
		$this->loader = new CBUS_Content_Manager_Loader();
	}

	private function define_admin_hooks() {
		$admin = new CBUS_Content_Manager_Admin( $this->get_version() );
		$this->loader->add_action( 'init', $admin, 'register_cbus_custom_post');
		$this->loader->add_action ( 'admin_enqueue_scripts', $admin, 'enqueue_scripts_and_styles') ;
		// $this->loader->add_action( 'add_meta_boxes', $admin, 'add_meta_box');
		// $this->loader->add_action('admin_menu', $admin, 'create_cbus_menu_admin' );

		// $this->loader->add_action( 'wp_ajax_RetrievePagination', $admin, 'retrieve_pagination' );
		// $this->loader->add_action( 'wp_ajax_RetrieveList', $admin, 'retrieve_list' );

		// $this->loader->add_action( 'wp_ajax_CreateNewService', $admin, 'create_service' );
		// $this->loader->add_action( 'wp_ajax_UpdateService', $admin, 'update_service' );
	}

	public function run() {
		$this->loader->run();
	}

	public function get_version() {
		return $this->version;
	}
}
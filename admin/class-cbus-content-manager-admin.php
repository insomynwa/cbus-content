<?php
class CBUS_Content_Manager_Admin {
	protected $version;

	public function __construct( $version ) {
		$this->version = $version;
	}

	public function enqueue_scripts_and_styles() {
		wp_enqueue_style(
			'cbus-content-manager-admin',
			plugin_dir_url( __FILE__ ) . 'css/cbus-content-manager-admin.css',
			array(),
			$this->version,
			FALSE
			);

		// wp_register_script( 'cbus-script', plugin_dir_url( __FILE__ ) . 'js/cbus-script.js' );
		// wp_enqueue_script( 'cbus-script' );

		// wp_localize_script( 'cbus-script', 'cbus_ajax', array('ajaxurl' => admin_url('admin-ajax.php')));
	}

	// public function add_meta_box() {
	// 	add_meta_box(
	// 		'cbus-content-manager-admin',
	// 		'CBUS Content Manager',
	// 		array( $this, 'render_meta_box' ),
	// 		'post',
	// 		'normal',
	// 		'core'
	// 		);
	// }

	// public function render_meta_box() {
	// 	require_once plugin_dir_path( __FILE__ ) . 'partials/cbus-content-manager.php';
	// }

	public function register_cbus_custom_post() {
		$labels = array(
			"name" => __( 'CBUS', '' ),
			"singular_name" => __( 'CBUS', '' )
			);

		$args = array(
			"label" => __( 'CBUS', '' ),
			"labels" => $labels,
			"description" => "for CBUS Contents post",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "cbus_contents", "with_front" => true ),
			"query_var" => true,
			
			// "supports" => array( "title", "editor", "thumbnail" ),
			);
		register_post_type( "cbus_contents", $args );

		$labels = array(
			"name" => __( 'SERVICES', '' ),
			"singular_name" => __( 'Service', '' ),
			);

		$args = array(
			"label" => __( 'Services', '' ),
			"labels" => $labels,
			"description" => "for service post",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => false,
			"show_in_menu" => "edit.php?post_type=cbus_contents",
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "cbus_services", "with_front" => true ),
			"query_var" => true,
			
			"supports" => array( "title", "editor" ),
			);
		register_post_type( "cbus_services", $args );

		$labels = array(
			"name" => __( 'CLIENTS', '' ),
			"singular_name" => __( 'Client', '' ),
			);

		$args = array(
			"label" => __( 'Client', '' ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => false,
			"show_in_menu" => "edit.php?post_type=cbus_contents",
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "cbus_clients", "with_front" => true ),
			"query_var" => true,
			
			"supports" => array( "title", "editor", "thumbnail" ),
			);
		register_post_type( "cbus_clients", $args );
	}

	// public function create_cbus_menu_admin() {
	// 	add_menu_page(
	// 		'CBUS Content',
	// 		'<b style="color:#ffA500">CBUS</b>',
	// 		'manage_options',
	// 		'cbus-content-dashboard',
	// 		array( $this, 'render_cbus_dasboard'),
	// 		plugins_url ( 'images/cbus-logo.png', __FILE__), '0.1.0'
	// 		);

	// 	add_submenu_page(
	// 		'cbus-content-dashboard',
	// 		'CBUS' . ' Services',
	// 		'<b style="color:#ffA500">SERVICES</b>',
	// 		'manage_options',
	// 		'cbus-services',
	// 		array( $this, 'render_cbus_service')
	// 		);

	// 	add_submenu_page(
	// 		'cbus-content-dashboard',
	// 		'CBUS' . ' Clients',
	// 		'<b style="color:#ffA500">CLIENTS</b>',
	// 		'manage_options',
	// 		'cbus-clients',
	// 		array( $this, 'render_cbus_client')
	// 		);
	// }

	// public function render_cbus_dasboard() {}
	// public function render_cbus_service() {
	// 	// if( isset( $_GET['action'] ) && $_GET['action'] != "" ) {
	// 	// 	$content = null;
	// 	// }else {
	// 	// 	$content = $this->get_html_template( 'pages', 'cbus-service', null, TRUE);
	// 	// }
	// 	// $this->get_html_template( 'pages', 'cbus-template-admin', $content );
	// 	if( isset( $_GET[ 'detail' ] ) && $_GET[ 'detail' ] > 0 ) {
	// 		$get_detail = sanitize_text_field( $_GET[ 'detail'] );
	// 		$obj = new Sltg_UKM();

	// 		$content = $this->load_detail( $obj, $get_detail, "ukm", "ukm");
	// 	}
	// 	else if( isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] != "" ){
	// 		$get_action = sanitize_text_field( $_GET[ 'action' ] );
			
	// 		$attributes = array();

	// 		$attributes[ 'service' ] = $this->get_array_datalist( 'service' );

	// 		$action_template = "";
	// 		if( $get_action == "create-new" ){
	// 			$action_template = "cbus-service-add";

	// 			if( isset( $_GET[ 'status' ] )) {
	// 				$get_status = sanitize_text_field( $_GET[ 'status' ] );
	// 				if( $get_status == 'success' ) {
	// 					$attributes[ 'message' ] = "Success Bro!";
	// 				}
	// 			}
	// 		}
	// 		else {
	// 			if ( isset( $_GET[ 'service' ] ) && ($_GET[ 'service' ] > 0) ) {
	// 				$get_service_id = sanitize_text_field( $_GET[ 'service' ] );

	// 				if( $get_action == "update" ) {

	// 					$action_template = "cbus-service-update";

	// 					if( isset( $_GET[ 'status' ] )) {
	// 						$get_status = sanitize_text_field( $_GET[ 'status' ] );
	// 						if( $get_status == 'success' ) {
	// 							$attributes[ 'message' ] = "Success Bro!";
	// 						}
	// 					}
	// 				}
	// 				else if( $get_action == 'delete' ) {

	// 					$action_template = 'cbus-service-delete';
	// 				}

	// 				$obj = new CBUS_Service_Model();
	// 				$obj->HasID( $get_service_id );
	// 				$attributes[ 'service' ] = $obj;
	// 			}
	// 		}

	// 		$content = $this->get_html_template( 'pages', $action_template, $attributes, TRUE );
	// 	}
	// 	else {
	// 		// $obj = new Sltg_UKM();
	// 		$content = $this->get_html_template( 'pages', 'cbus-service', null, TRUE);
	// 	}

	// 	$this->get_html_template( 'pages', 'cbus-template-admin', $content );
	// }
	// public function render_cbus_client() {
		
	// }

	// private function get_html_template( $location, $template_name, $attributes = null , $return_val = FALSE) {
	// 	if (! $attributes ) {
	// 		$attributes = array();
	// 	}
	// 	ob_start();
	// 	require( $location . '/' . $template_name . '.php' );
	// 	$html = ob_get_contents();
	// 	ob_end_clean();
	// 	if ( $return_val )
	// 		return $html;
	// 	echo $html;
	// }

	// private function get_array_datalist( $listof ) {
	// 	$attributes = array();

	// 	if( $listof == 'service' ) {
	// 		$obj = new CBUS_Service_Model();
	// 		$dtlist = $obj->Datalist();
	// 		foreach( $dtlist as $dl ) {
	// 			$data = new CBUS_Service_Model();
	// 			$data->HasID( $dl->service_id );
	// 			$attributes[] = $data;
	// 		}
	// 	}

	// 	return $attributes;
	// }

	// public function retrieve_pagination() {

	// 	if( isset( $_GET[ 'listfor' ] ) && isset( $_GET[ 'limit' ] ) ) {

	// 		$get_listfor = sanitize_text_field( $_GET[ 'listfor' ] );
	// 		$get_limit = sanitize_text_field( $_GET[ 'limit' ] );
	// 		$get_search = "";
	// 		$get_kategori = 0;
	// 		$get_genre = 0;
	// 		$filter = 0;

	// 		if( isset( $_GET[ 'category' ] ) ) {
	// 			$get_kategori = sanitize_text_field( $_GET[ 'category' ] );
	// 			$filter = $get_kategori;
	// 		}
	// 		if( isset( $_GET[ 'search' ] ) ) {
	// 			$get_search = sanitize_text_field( $_GET[ 'search' ] );
	// 		}
	// 		if( isset( $_GET[ 'genre' ] ) ) {
	// 			$get_genre = sanitize_text_field( $_GET[ 'genre' ] );
	// 			$filter = $get_genre;
	// 		}

	// 		$obj = null;
	// 		$option_limit_name = "";
	// 		if( $get_listfor == 'service' ){
	// 			$obj = new CBUS_Service_Model();
	// 		}

	// 		$attributes[ 'listfor' ] = $obj->iGet_Listfor();
	// 		$option_limit_name = $obj->iGet_LimitName();

	// 		update_option( $option_limit_name, $get_limit );

	// 		$attributes[ 'n-page' ] = $this->create_pagination( $obj, $get_limit, $get_search, $filter );

	// 		echo $this->get_html_template( 'pages', 'pagination' , $attributes, FALSE );

	// 	}
	// 	wp_die();
	// }

	// private function create_pagination( $obj, $limit, $search = "", $kategori = 0 ) {

	// 	$jumlah_data = $obj->CountData( $search, $kategori );

	// 	$jumlah_page = intval( $jumlah_data / $limit );
	// 	if( $jumlah_data % $limit > 0 ) $jumlah_page += 1;

	// 	return $jumlah_page;
	// }

	// public function retrieve_list(){
		
	// 	if( isset( $_GET[ 'listfor' ] ) && isset( $_GET[ 'page' ] ) && isset( $_GET[ 'limit' ] ) ) {
			
	// 		$n_get = count( $_GET );
	// 		$get_listfor = sanitize_text_field( $_GET[ 'listfor' ] );
	// 		$get_limit = sanitize_text_field( $_GET[ 'limit' ] );
	// 		$get_page = sanitize_text_field( $_GET[ 'page' ] );
	// 		$get_search = "";
	// 		$get_kategori = 0;
	// 		$get_genre = 0;
	// 		$filter = 0;

	// 		if( isset( $_GET[ 'category' ] ) ) {
	// 			$get_kategori = sanitize_text_field( $_GET[ 'category' ] );
	// 			$filter = $get_kategori;
	// 		}
	// 		if( isset( $_GET[ 'search' ] ) ) {
	// 			$get_search = sanitize_text_field( $_GET[ 'search' ] );
	// 		}
	// 		if( isset( $_GET[ 'genre' ] ) ) {
	// 			$get_genre = sanitize_text_field( $_GET[ 'genre' ] );
	// 			$filter = $get_genre;
	// 		}

	// 		$offset = ( $get_page - 1 ) * $get_limit;
	// 		$obj = null;
	// 		//$dir_obj = "";

	// 		if( $get_listfor == 'service' ) {
	// 			$obj = new CBUS_Service_Model();
	// 			//$dir_obj = "service";
	// 		}

	// 		$rows = $obj->DataList( $get_limit, $offset, $get_search, $filter );

	// 		$arrObj = array();

	// 		foreach( $rows as $row ){
	// 			if( $get_listfor == 'service' ){
	// 				$service = new CBUS_Service_Model();
	// 				$service->HasID( $row->service_id );
	// 				$arrObj['service'][] = $service;
	// 			}
	// 		}
	// 		// var_dump($arrObj['service']);
	// 		$this->get_html_template( 'pages' , 'cbus-service-list', $arrObj , false);
	// 	}
	// 	wp_die();
	// }

	// public function create_service() {
	// 	$result = array( 'status' => false, 'message' => '' );
	// 	$post_isset = isset( $_POST[ 'name' ] ) && isset( $_POST[ 'description' ] );

	// 	if( $post_isset ) {
	// 		$post_name = sanitize_text_field( $_POST[ 'name' ] );
	// 		$post_description = sanitize_text_field( $_POST[ 'description' ] );

	// 		$post_not_empty = ($post_name!="") && ($post_description!="");

	// 		if( $post_not_empty ) {
	// 			$service = new CBUS_Service_Model();
	// 			$service->SetName( $post_name );
	// 			$service->SetDescription( $post_description );

	// 			$result = $service->AddData();
	// 		}
	// 		else {
	// 			$result[ 'message' ] = 'parameter tidak valid!';
	// 		}
	// 	}
	// 	else {
	// 		$result[ 'message' ] = 'parameter tidak lengkap!';
	// 	}

	// 	echo wp_json_encode( $result );

	// 	wp_die();
	// }
	// public function update_service() {
	// 	$result = array( 'status' => false, 'message' => '' );
	// 	$post_isset = isset( $_POST[ 'service' ] ) && isset( $_POST[ 'name' ] ) && isset( $_POST[ 'description' ] ) ;
		
	// 	if( $post_isset ) {
	// 		$post_service_id = sanitize_text_field( $_POST[ 'service' ] );
	// 		$post_name = sanitize_text_field( $_POST[ 'name' ] );
	// 		$post_description = sanitize_text_field( $_POST[ 'description' ] );

	// 		$post_not_empty = ($post_service_id>0) && ($post_name!="") && ($post_description!="");

	// 		if( $post_not_empty ) {
				
	// 			$service = new CBUS_Service_Model();
	// 			$service->HasID( $post_service_id );

	// 			// compare data
	// 			$oldData = array(
	// 				$service->GetName(), // name 
	// 				$service->GetDescription(), // description
	// 				);
	// 			$newData = array(
	// 				$post_name, // name 
	// 				$post_description, // description
	// 				);

	// 			if ( $oldData !== $newData ) {
	// 				$service->SetName( $post_name );
	// 				$service->SetDescription( $post_description );
	// 				$result = $service->UpdateData();
	// 			}
	// 		}
	// 		else {
	// 			$result[ 'message' ] = 'parameter tidak valid!';
	// 		}
	// 	}
	// 	else {
	// 		$result[ 'message' ] = 'parameter tidak lengkap!';
	// 	}

	// 	echo wp_json_encode( $result );

	// 	wp_die();
	// }

}
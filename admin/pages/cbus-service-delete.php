<?php 
	$service = $attributes[ 'service' ];

	if( isset( $_POST[ 'submit-delete-service' ] ) ) {
		$result = $service->DeleteData();
		$message = "ERROR";
		if( $result[ 'status' ] )
			_e( "SUCCESS" );
	}
	else {

?>
<div class="form-delete-area">
	<form id="form-delete-service" method="post">
		<label>Yakin hapus <?php _e( $service->GetName() ) ?>?</label>
		<input type="hidden" value="<?php _e( $service->GetId() ); ?>" name="id-service" id="id-service">
		<button class="btn btn-danger" type="submit" id="btn-delete-service" name="submit-delete-service">YES</button>
	</form>
</div>
<?php } ?>
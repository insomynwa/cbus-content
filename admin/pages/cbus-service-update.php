<?php 
	$service = $attributes[ 'service' ]; 
?>
<h3>Service update</h3>
<div class="data-wrapper">
	<form class="form-horizontal" id="form-service">
		<?php if( isset( $attributes[ 'message' ] ) ) { ?><div class="form-group"><div class="col-sm-offset-2  col-sm-4 form-message"><p class="text-success"><?php _e( $attributes[ 'message' ] ); ?></p></div></div><?php } ?>
		<div class="form-group">
			<label class="col-sm-offset-2  col-sm-4 control-label form-message" for="message-service"></label>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="name-service">Name <strong>*</strong></label>
			<div class="col-sm-4">
				<input type="text" name="name-service" class="form-control" id="name-service" placeholder="name" required="required" value="<?php _e( $service->GetName() ) ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="description-service">Description</label>
			<div class="col-sm-4">
				<textarea name="description-service" class="form-control" id="description-service"><?php _e( $service->GetDescription() ) ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">
				<button class="form-control btn btn-success" type="submit" name="submit-service" id="submit-service"><span class="glyphicon glyphicon-save"></span> Save</button>
			</div>	
		</div>
	</form>
</div>
<div class="plugin-content-link">
	<!-- <button id="add-service" class="btn btn-primary" data-toggle="modal" data-target="#modal-form-service">
		<span class="glyphicon glyphicon-plus"></span> Add
	</button> -->
</div>

<script type="text/javascript">
jQuery(document).ready( function($) {

	$( "#form-service").submit( function(e) {
		e.preventDefault();
		
		var iName = $( "#name-service" ),
			iDes = $( "#description-service" ),
			not_empty = true;

		if( $.trim( iName.val() ) == '' ) {
			iName.addClass( 'req-input input-empty');
			iName.focus();
			not_empty = false;
		}
		if( $.trim( iDes.val() ) == '' ) {
			iDes.addClass( 'req-input input-empty');
			iDes.focus();
			not_empty = false;
		}

		if( not_empty ) {
			var data = {
				action: "UpdateService",
				service: <?php _e( $service->GetID() ) ?>,
				name: iName.val(),
				description: iDes.val(),
			};

			$.post(
				cbus_ajax.ajaxurl,
				data,
				function( response ) {
					var result = jQuery.parseJSON( response );
					if( result.status ) {
						$( "div.form-message").html( "<p class='text-success'>Success!</p>");
						//reset_form_service();
						location.href = "<?php echo admin_url('admin.php?page=cbus-services&action=update&service='); ?><?php _e($service->GetID()); ?>&status=success";
					}else{
						$( "div.form-message").html( "<p class='text-danger'>" + result.message + "</p>");
					}
				}
			);
		}else{
			$( "label.form-message").html( "<p class='text-danger'>Name and Description are required.</p>");
		}
	});

	function reset_form_service() {
		$( "#name-service" ).val( "" );
		$( "#description-service" ).val( "" );
	}
	
});
</script>
<h3>Create New Service</h3>
<div class="data-wrapper">
	<form class="form-horizontal" id="form-service">
		<?php if( isset( $attributes[ 'message' ] ) ) { ?><div class="form-group"><div class="col-sm-offset-2  col-sm-4 form-message"><p class="text-success"><?php _e( $attributes[ 'message' ] ); ?></p></div></div><?php } ?>
		<div class="form-group">
			<label class="col-sm-offset-2  col-sm-4 control-label form-message" for="message-service"></label>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="service-name">Service Name <strong>*</strong></label>
			<div class="col-sm-4">
				<input type="text" name="service-name" class="form-control" id="service-name" placeholder="service name" required="required">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="service-description">Description</label>
			<div class="col-sm-4">
				<textarea name="service-description" class="form-control" id="service-description"></textarea>
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
	<!-- <button id="add-person" class="btn btn-primary" data-toggle="modal" data-target="#modal-form-service">
		<span class="glyphicon glyphicon-plus"></span> Add
	</button> -->
</div>

<script type="text/javascript">
jQuery(document).ready( function($) {

	$( "#form-service").submit( function(e) {
		e.preventDefault();
		
		var iName = $( "#service-name" ),
			iDes = $( "#service-description" ),
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
				action: "CreateNewService",
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
						//reset_form_person();
						location.href = "<?php echo admin_url('admin.php?page=cbus-services&action=create-new&status=success'); ?>";
					}else{
						$( "div.form-message").html( "<p class='text-danger'>" + result.message + "</p>");
					}
				}
			);
		}else{
			$( "label.form-message").html( "<p class='text-danger'>Name and Description are required.</p>");
		}
	});

	function reset_form_person() {
		$( "#service-name" ).val( "" );
		$( "#service-description" ).val( "" );
	}
	
});
</script>
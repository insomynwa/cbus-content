<?php 
	$data = $attributes[ 'service' ];
?>
<?php if( sizeof( $data ) > 0 ): ?>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Service Name</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach( $data as $p ): ?>
			<tr>
				<td><?php _e( $p->GetName() ) ?></td>
				<td><a href="?page=cbus-services&detail=<?php _e( $p->GetID() ); ?>">Detail</a> | <a href="?page=cbus-services&action=update&service=<?php _e( $p->GetID() ); ?>">Edit</a> | <a href="?page=cbus-services&action=delete&service=<?php _e( $p->GetID() ); ?>">Delete</a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php endif; ?>
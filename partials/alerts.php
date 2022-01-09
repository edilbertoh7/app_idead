<?php if ($_GET[tipomsg] == 'info') { ?>
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">
			<span>&times;</span>
		</button>
		<?php echo $_GET[mensaje] ?>
	</div>
<?php } elseif ($_GET[tipomsg] == 'warning') {?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">
			<span>&times;</span>
		</button>
		<?php echo $_GET[mensaje] ?>
	</div>
<?php } ?>
	<!-- <div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">
			<span>&times;</span>
		</button>
		mensaje
	</div> -->

	<?php if (isset($_SESSION['success'])){ ?>
		<div class="alert alert-success">
			<p><?php 
					echo $_SESSION['success']; 
					unset($_SESSION['success']);
				?>
			</p>
		</div>
	<?php } ?>
	
	<?php if (isset($arrError) && count($arrError) > 0) {?>
		<div class="alert alert-danger">
		<?php foreach ($arrError as $strError){ ?>
			<p><?php echo $strError; ?></p>
		<?php }	?>
		</div>
	<?php } ?>	
	

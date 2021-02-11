<!-- Begin page content -->
<main role="main" class="container main-container">
	<div class="row">
		<div class="col-md-8">
			<h1 class="mt-5">Custom Header / Footer</h1>
			<p class="lead">
				<?php echo isset($msg) ? $msg : null; ?>
				
				<form method="post" action="<?php echo base_url('admin/custom-header-footer');?>" method="POST" class="form-horizontal" role="form">

					<div class="form-group">
						<label for="site_custom_header">Custom Header</label>
						<textarea class="form-control" name="site_custom_header" id="site_custom_header" rows="10"><?php echo $site->site_custom_header;?>	
						</textarea>
					</div>

					<div class="form-group">
						<label for="site_custom_footer">Custom Footer</label>
						<textarea class="form-control" name="site_custom_footer" id="site_custom_footer" rows="10"><?php echo $site->site_custom_footer;?>	
						</textarea>
					</div>
					<button type="submit" class="btn btn-success float-right">Update</button>
				</form>
			</p>
		</div>

	</div>
</main>

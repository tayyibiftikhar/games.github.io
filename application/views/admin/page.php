<!-- Begin page content -->
<main role="main" class="container main-container">
	<div class="row">
		<div class="col-md-8">
			<h1 class="mt-5">Page Settings</h1>
			<p class="lead">
				<?php echo isset($msg) ? $msg : null; ?>
				
				<form method="post" action="<?php echo base_url('admin/page');?>" method="POST" class="form-horizontal" role="form">

					<div class="form-group">
						<label for="site_contact">Contact Us</label>
						<textarea class="form-control" name="site_contact" id="site_contact" rows="10"><?php echo $site->site_contact;?>	
						</textarea>
					</div>

					<div class="form-group">
						<label for="site_about">About Us</label>
						<textarea class="form-control" name="site_about" id="site_about" rows="10"><?php echo $site->site_about;?>	
						</textarea>
					</div>

					<div class="form-group">
						<label for="site_privacy">Privacy Policy</label>
						<textarea class="form-control" name="site_privacy" id="site_privacy" rows="10"><?php echo $site->site_privacy;?>	
						</textarea>
					</div>

					<button type="submit" class="btn btn-success float-right">Update</button>
				</form>
			</p>
		</div>

	</div>
</main>

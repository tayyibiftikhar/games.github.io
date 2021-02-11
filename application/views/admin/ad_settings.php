<!-- Begin page content -->
<main role="main" class="container main-container">
	<div class="row">
		<div class="col-md-8">
			<h1 class="mt-5">Ad Settings</h1>
			<p class="lead">
				<?php echo isset($msg) ? $msg : null; ?>
				
				<form method="post" action="<?php echo base_url('admin/ad-settings');?>" method="POST" class="form-horizontal" role="form">

					<div class="form-group">
						<label for="site_ad_ver">320X100 ad</label>
						<textarea class="form-control" name="site_ad_ver" id="site_ad_ver" rows="10"><?php echo $site->site_ad_ver;?>	
						</textarea>
					</div>

					<div class="form-group">
						<label for="site_ad_100">Responsive Ad</label>
						<textarea class="form-control" name="site_ad_100" id="site_ad_100" rows="10"><?php echo $site->site_ad_100;?>	
						</textarea>
					</div>
					<button type="submit" class="btn btn-success float-right">Update</button>
				</form>
			</p>
		</div>

	</div>
</main>

<!-- Begin page content -->
<main role="main" class="container main-container">
	<div class="row">
		<div class="col-md-6">
			<h1 class="mt-5">Site Settings</h1>
			<p class="lead">
				<?php echo isset($msg) ? $msg : null; ?>
				
				<form method="post" action="<?php echo base_url('admin/site-settings');?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

					<div class="form-group">
						<label for="site_title">Site Title</label>
						<input type="text" class="form-control" name="site_title" id="site_title" placeholder="Enter site title" value="<?php echo $site->site_title;?>">
					</div>

					<div class="form-group">
						<label for="site_short_title">Site Short Title</label>
						<input type="text" class="form-control" name="site_short_title" id="site_short_title" placeholder="Enter short title" value="<?php echo $site->site_short_title;?>">
					</div>

					<div class="form-group">
						<label for="site_wishing_web">Wishing Website Url</label>
						<input type="text" class="form-control" name="site_wishing_web" id="site_wishing_web" placeholder="Enter using website url" value="<?php echo $site->site_wishing_web;?>">
					</div>

					<div class="form-group">
						<label for="site_description">Meta Description</label>
						<textarea class="form-control" name="site_description" id="site_description" rows="5" required="" spellcheck="true"><?php echo $site->site_description;?>	
						</textarea>
					</div>

					<div class="form-group">
						<div class="form-check">
							<label class="form-check-label">
								<?php 
									$chk = ($site->site_user_can_del == 0) ? " " : "checked";
								?>
								<input name="site_user_can_del" type="checkbox" class="form-check-input" value="<?php echo $site->site_user_can_del;?>" <?php echo $chk;?>>User can delete quiz url.
							</label>
						</div>
					</div>

					<div class="form-group">
						<label for="site_og_image">Select Og image</label>
						<input type="file" class="form-control" name="site_og_image" placeholder="select image">
						<span class="text-danger"> OG image must be 1200X1200 pixel in size</span>
					</div>
					
					<button type="submit" class="btn btn-success float-right">Update</button>
				</form>
			</p>
		</div>
		<div class="col-md-4">
			Site OG image
			<img class="img-thumbnail img-fluid mt-5" src="<?php echo base_url('assets/images/'.$site->site_og_image);?>">
		</div>
	</div>
</main>

<!-- Begin page content -->
<main role="main" class="container main-container">
	<div class="row">
		<div class="col-12 text-center">
			<img class="img-thumbnail img-fluid mt-5" src="<?php echo base_url('assets/images/logo.png');?>">
		</div>
		<div class="col-6">
			<h1 class="mt-5">Change Logo</h1>
			<p class="lead">
				<?php echo isset($msg) ? $msg : null; ?>
				
				<form method="post" action="<?php echo base_url('admin/change-logo');?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

					<div class="form-group">
						<label for="site_og_image">Select Logo</label>
						<input type="file" class="form-control" name="logo" placeholder="select image">
						<span class="text-danger"> Logo must be PNG format and 80X80 pixel in size</span>
					</div>
					
					<button type="submit" class="btn btn-success float-right">Update</button>
				</form>
			</p>
		</div>
		
	</div>
</main>

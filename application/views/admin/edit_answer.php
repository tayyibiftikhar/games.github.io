<!-- Begin page content -->
<main role="main" class="container main-container">
	<div class="row">
		<div class="col-md-8">
			<h1 class="mt-5">Update Answer</h1>
			<p class="lead">
				<?php echo isset($msg) ? $msg : null; ?>
				<form method="post" action="<?php echo base_url('admin/edit-answer/'.$ans->a_id);?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
					<div class="form-group">
						<label for="a_text">Title</label>
						<input type="text" class="form-control" name="a_text" id="a_text" placeholder="Enter Title" value="<?php echo $ans->a_text; ?>" required>
					</div>

					<div class="form-group">
						<label for="a_thumb">Select Image For Answer</label>
						<input type="file" class="form-control" name="a_thumb" placeholder="select image" required="true">
						<span class="text-danger"> Image must be 200X200 pixel in size</span>
					</div>
					<button type="submit" class="btn btn-success float-right">Update</button>
				</form>
			</p>
		</div>

		<div class="col-md-4">
			<img class="img-thumbnail img-fluid mt-5" src="<?php echo base_url('/upload/'.$ans->a_thumb);?>">
		</div>
	</div>
</main>

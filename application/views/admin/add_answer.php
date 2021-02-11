<!-- Begin page content -->
<main role="main" class="container main-container">
	<div class="row">
		<div class="col-md-8">
			<h1 class="mt-5">Add New Answer</h1>
			<p class="lead">
				You can add new answer for the below question. <strong class="text-danger">But If you want to add answer, keep in mind you can't delete it. You can only edit it. So be carefull. Don't add unwanted answer.</strong>
			</p>
			<h2 class="mt-5">Q - <?php echo $q->q_title;?></h2>
			<p class="lead">
				<?php echo isset($msg) ? $msg : null; ?>
				<form method="post" action="<?php echo base_url('admin/add-answer/'.$q->q_id);?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
					<div class="form-group">
						<label for="a_text">Answer</label>
						<input type="text" class="form-control" name="a_text" id="a_text" placeholder="Enter answer"  required>
					</div>

					<div class="form-group">
						<label for="a_thumb">Select Image For answer</label>
						<input type="file" class="form-control" name="a_thumb" placeholder="select image" required="true">
						<span class="text-danger"> Image must be 200X200 pixel in size</span>
					</div>
					<button type="submit" class="btn btn-success float-right">Add</button>
				</form>
			</p>
		</div>
	</div>
</main>

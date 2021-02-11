<!-- Begin page content -->
<main role="main" class="container main-container">
	<div class="row">
		<div class="col-md-8">
			<h1 class="mt-5">Edit Question</h1>
			<p class="lead">
				<?php echo isset($msg) ? $msg : null; ?>
				<form method="post" action="<?php echo base_url('admin/edit-question/'.$q->q_id);?>" method="POST" class="form-horizontal" role="form">
					<div class="form-group">
						<label for="q_title">Question</label>
						<input 
							type="text" 
							class="form-control" 
							name="q_title" 
							id="q_title" 
							placeholder="i.e 'If you win a lottery what will you buy'" 
							value="<?php echo $q->q_title ;?>" 
							required>
					</div>
					<button type="submit" class="btn btn-success float-right">Update</button>
				</form>
			</p>
		</div>
	</div>
</main>

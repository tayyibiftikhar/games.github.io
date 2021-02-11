<!-- Begin page content -->
<main role="main" class="container main-container">
	<div class="row">
		<div class="col-md-8">
			<h1 class="mt-5">Account settings</h1>
			<p class="lead">
				<?php echo isset($msg) ? $msg : null; ?>
				<form method="post" action="<?php echo base_url('admin/account');?>" method="POST" class="form-horizontal" role="form" autocomplete="off">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username" 
							placeholder="Enter new username">
					</div>
					
					
					<div class="form-group">
						<label for="username">Password</label>
						<input type="password" class="form-control" name="password" id="password" 
							placeholder="Enter new password">
					</div>
					<button type="submit" class="btn btn-success float-right">Update</button>
				</form>
			</p>
		</div>
	</div>
</main>

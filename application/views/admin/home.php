			<main role="main" class="container main-container">
				<div class="row">
					<div class="col-12">
						<?php 
							if($error){
								echo '
									<div class="alert alert-danger mt-5" role="alert">
										<h4 class="alert-heading">Alert!</h4>
										<p>
											<ul>'.$error.'</ul>
										</p>
									</div>
								';
							}
						?>
					</div>

					<div class="col-12">
						<div class="row">
							<div class="col-4">
								<div class="card text-center">
									<div class="card-body">
										<h5 class="card-title"><?php echo $stat->question;?></h5>
									</div>
									<div class="card-footer">
										Total Questions
									</div>
								</div>
							</div>

							<div class="col-4">
								<div class="card text-center">
									<div class="card-body">
										<h5 class="card-title"><?php echo $stat->quiz;?></h5>
									</div>
									<div class="card-footer">
										Total Quiz
									</div>
								</div>
							</div>

							<div class="col-4">
								<div class="card text-center">
									<div class="card-body">
										<h5 class="card-title"><?php echo $stat->views;?></h5>
									</div>
									<div class="card-footer">
										Total Quiz View
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12">
						<h1 class="mt-5">Quiz  List</h1>
						<table id="quizTable" class="table table-striped display" style="width:100%">
		                    <thead>
		                        <tr>
		                            <th>#</th>
		                            <th>Quiz Id</th>
		                            <th>Performer</th>
		                            <th>Views</th>
		                            <th>Option</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                       
		                    </tbody>
		                    <tfoot>
		                        <tr>
		                            <th>#</th>
		                            <th>Quiz Id</th>
		                            <th>Performer</th>
		                            <th>Views</th>
		                            <th>Option</th>
		                        </tr>
		                    </tfoot>
		                </table>
					</div>
				</div>
			</main>

			
						<!-- share div -->
						<div class="result">
							<!-- Start logo -->
							<div class="logo">
								<img src="<?php echo base_url('assets/images/logo.png');?>">
							</div> 

							<!-- Start logo name -->
							<div class="logo-name"><?php echo $site->site_short_title;?></div>
							
							<div class="custom-block">
								<div class="score-check"></div>
							</div>

							<!-- who know -->
							<div class="who-know">
								<h2>Who Knows <?php echo $qPerformer;?> Best?</h2>

								<table class="table table-striped table-bordered table-dark" id="point-table">
									<thead>
										<tr class="table-bg">
											<th>Name</th>
											<th>Score</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											foreach ($users as $user) {
												echo '
													<tr>
														<td>'.$user->c_name.'</td>
														<td>'.$user->c_score.'</td>
													</tr>
												';
											}

										?>
									</tbody>
								</table>
							</div>


							<a href="<?php echo base_url();?>" class="btn btn-success btn-lg">Create Your Own Quiz</a>
						</div>
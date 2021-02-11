		    <div class="adbanner">
				<?php echo $site->site_ad_100;?>
			</div>
			<div class="container h-100">
				<div class="row h-100 justify-content-center align-items-center">
					<div class="col-sm-12 col-md-6 col-lg-6 quiz-div">		
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
					</div>
				</div>

				<!-- Start ad -->
        		<div class="ad">
        			<?php echo $site->site_ad_ver;?>
        		</div>
			</div>
		<div class="adbanner">
			<?php echo $site->site_ad_100;?>
		</div>
		<div class="container h-100">
			<div class="row h-100 justify-content-center align-items-center">
				<div class="col-sm-12 col-md-6 col-lg-6 quiz-div">
					<!-- share div -->
					<div class="share-response">
						<!-- Start logo -->
						<div class="logo">
							<img src="<?php echo base_url('assets/images/logo.png');?>">
						</div> 
						<h2>Your Challenge is Ready</h2>
						<h3>Share this link with your friends</h3>
						<div>
							<span class="custom-input">
			<input type="text" value="<?php echo base_url('quiz/'.$question_id);?>" readonly="" id="share-link"/>
							</span>
						</div>
						<div>
							<a class="custBtn" id="copyBtn">Copy This Link</a><br>
							<a class="btn btn-success mt-3 wp"
								href="whatsapp://send?text=🤗 <?php echo $quiz->quiz_performer . ' '.trim($site->site_description).' '.base_url('quiz/'.$quiz->quiz_uid);?>"
							>
								<img src="<?php echo base_url('assets/images/wp.png');?>">Send to whatsapp
							</a>
						</div>

						<?php if($site->site_wishing_web){?>
						<div class="custom-block">
							👇👇👇👇👇👇👇👇👇👇👇👇<br/>
							👉<a href="<?php echo $site->site_wishing_web;?>" target="_blank">
								Touch this blue line and see magic
							</a>👈
							<br/>☝☝☝☝☝☝☝☝☝☝☝☝
						</div>
						<?php }?>

						<div class="custom-block">
							<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d510f600ce58cbc"></script>
			                <div class="addthis_inline_share_toolbox" 
			                	data-url="<?php echo base_url('quiz/'.$question_id);?>"
			                	data-title="<?php echo $qPerformer . ' - ' . $site->site_title;?>" 
			                	data-description="<?php echo $qPerformer . trim($site->site_description);?>"
			                	data-media="<?php echo base_url('assets/images/'.$site->site_og_image);?>"
			                ></div>
			            </div>

			            <div class="custom-block">
			            	<?php
			            	 if($site->site_user_can_del == 1){
			            	 	echo '<a href="'.base_url('hash/'.$quiz->quiz_hash).'">You can delete this quiz by clicking here</a>';
			            	 }
			            	?>
			            </div>
					</div>
					<!-- Start ad -->
	        		<div class="ad">
	        			<?php echo $site->site_ad_ver;?>
	        		</div>

					<div class="text-center">
						<!-- who know -->
						<div class="who-know">
							<h2>Who Knows you Best?</h2>

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
					</div>

				</div><!-- //end of quiz-div -->   
			</div>
		</div><!-- //end of main container -->
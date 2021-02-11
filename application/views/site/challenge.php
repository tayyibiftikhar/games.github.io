		<div class="container h-100">
			<div class="row h-100 justify-content-center align-items-center">
				<div class="col-sm-12 col-md-6 col-lg-6 quiz-div">

					<!-- Start logo -->
					<div class="logo">
						<img src="<?php echo base_url('assets/images/logo.png');?>">
					</div> 
					
					<!-- Start logo name -->
					<div class="logo-name"><?php echo $site->site_short_title;?></div>
					
					<!-- Start quiz div -->
					<div class="quiz-wrapper">
						
						<!-- Start count div -->
						<div class="countdown">
							<ul>
								<?php 
									for($i=1; $i<=$quiz->quiz_count; $i++){

										if($i==1){
											echo '<li class="active">'.$i.'</li>';
										}else{
											echo '<li>'.$i.'</li>';
										}
									}
								?>
							</ul>
						</div>

						<div class="custom-block text-center">
							(Which of the following options <?php echo $qPerformer;?> has chosen?)
						</div>
						<div class="question-wrapper">

							<?php
								$display ='';
								foreach ($quiz->questions as $q) {
									echo '
										<div class="question unans'.$display.'" id="'.$q->id.'">
											<h2 class="question-text">
												'.$q->question.'
											</h2>
											<div class="row">
									';
									foreach ($q->answer as $a) {
										echo '
											<div class="col-6 mb-3 qns" val="'.$a->a_id.'">
												<div class="custom-card">
													<div class="q-img">
														<img src="'.base_url('upload/'.$a->a_thumb).'">
													</div>
													<div class="custom-card-body">
														<h2 class="question-option">
														'.$a->a_text.'
														</h2>
													</div>
												</div>
											</div>
										';
									}

									echo '
											</div>
										</div>
									';
									$display = " d-none";
								}
							?>
							
						</div><!-- /End of question wrapper -->
					</div><!-- /End of quizwrapper -->

					<!-- processing div -->
					<div class="process">
						<div class="processing_container">
							<svg class="loader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
								<circle cx="170" cy="170" r="160" stroke-width="6.5"/>
								<circle cx="170" cy="170" r="135" stroke-width="6.5"/>
								<circle cx="170" cy="170" r="110" stroke-width="6.5"/>
								<circle cx="170" cy="170" r="85" stroke-width="6.5"/>
								<circle cx="170" cy="170" r="60" stroke-width="6.5"/>
							</svg>										
						</div>
						<h2>Please Wait</h2>
						<h3>We are submitting your request.</h3>
					</div>
				</div>  

				<!-- Start ad -->
        		<div class="ad">
        			<?php echo $site->site_ad_ver;?>
        		</div> 
			</div>
		</div><!-- //end of main container -->
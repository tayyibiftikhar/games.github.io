		<div class="container h-100">
			<div class="row h-100 justify-content-center align-items-center">
				<!-- Start question div -->
				<div class="col-sm-12 col-md-6 col-lg-4 align-items-center quiz-div">

					<!-- Start logo -->
					<div class="logo">
						<img src="<?php echo base_url('assets/images/logo.png');?>">
					</div> 
					
					<!-- Start logo name -->
					<div class="logo-name"><?php echo $site->site_short_title;?></div>
					
					<!-- Start quiz div -->
					<div class="custom-block quiz-wrapper">
						
						<!-- Start countdown -->
						<div class="countdown">

							<ul>
								<li class="active">1</li>
								<li>2</li>
								<li>3</li>
								<li>4</li>
								<li>5</li>
								<li>6</li>
								<li>7</li>
								<li>8</li>
								<li>9</li>
								<li>10</li>
								<li>11</li>
								<li>12</li>
								<li>13</li>
								<li>14</li>
								<li>15</li>
								<li>16</li>
								<li>17</li>
								<li>18</li>
								<li>19</li>
								<li>20</li>
							</ul>
						</div>
						
						<!-- Skip Button -->
						<div class="skipBtnWrapper">
							<a class="custBtn" id="skipBtn">Skip This Question</a>
						</div>

						<!-- question wrapper -->
						<div class="question-wrapper">
							<?php
								$display ='';
								foreach ($questions as $q) {
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

					<!-- Start process -->
					<div class="process">
						<div class="processing_container">
							<svg class="loader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
								<circle cx="170" cy="170" r="160" stroke-width="6.5"></circle>
								<circle cx="170" cy="170" r="135" stroke-width="6.5"></circle>
								<circle cx="170" cy="170" r="110" stroke-width="6.5"></circle>
								<circle cx="170" cy="170" r="85" stroke-width="6.5"></circle>
								<circle cx="170" cy="170" r="60" stroke-width="6.5"></circle>
							</svg>										
						</div>
						<h2>Please Wait</h2>
						<h3>We are submitting your request.</h3>
					</div>
				</div><!-- /End of question div -->   

				<!-- Start ad -->
        		<div class="ad">
        			<?php echo $site->site_ad_ver;?>
        		</div>
			</div>
		</div><!-- //end of main container -->
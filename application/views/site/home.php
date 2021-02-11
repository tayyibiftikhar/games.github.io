		<div class="container h-100">
			<div class="row h-100 justify-content-center align-items-center">
				
				<!-- Start home div -->
				<div class="col-sm-12 col-md-6 col-lg-4 custom-box">
					
					<!-- Start logo -->
					<div class="logo"><img src="<?php echo base_url('assets/images/logo.png');?>"></div> 
					<!-- Start top slogan -->
					<div class="top-slogan">Welcome To</div>
					<!-- Start logo name -->
					<div class="logo-name"><?php echo $site->site_short_title;?></div>
					
					<form method="post" action="<?php echo base_url();?>">
						<div div="custom-block">
							<span class="custom-input">
								<i>
									<img src="<?php echo base_url('assets/images/user.png');?>" alt="">
								</i>
								<input type="text" 
									placeholder="Enter your full name" 
									name="username" 
									required="true"
									value="<?php echo $performer;?>" 
									>
							</span>
						</div>
						
						
						<div class="custom-block">
							<button type="submit" class="custBtn">Submit</button>
						</div>
					</form>
				</div>
				
				<!-- Start ad -->
        		<div class="ad">
        			<?php echo $site->site_ad_ver;?>
        		</div>
			</div>
		</div>
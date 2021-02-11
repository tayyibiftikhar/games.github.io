		<div class="adbanner">
			<?php echo $site->site_ad_100;?>
		</div>
		<div class="container h-100">
			<div class="row h-100 justify-content-center align-items-center">
				
				<!-- Start home div -->
				<div class="col-sm-12 col-md-6 col-lg-4 custom-box">
					
					<!-- Start logo -->
					<div class="logo"><img src="<?php echo base_url('assets/images/logo.png');?>"></div> 
					
					<!-- Start logo name -->
					<div class="logo-name"><?php echo $site->site_short_title;?></div>

					<div class="custom-block">
						<img src="<?php echo base_url('assets/images/stop.png');?>">
					</div>

					<!-- delete quiz message -->
					<h2 class="deleted-quiz">
						The Quiz has been deleted by the owner. You can create your own by clicking the below button.
					</h2>
					<?php if($site->site_wishing_web){?>
					<div class="custom-block">
						👇👇👇👇👇👇👇👇👇👇👇👇<br/>
						👉<a href="<?php echo $site->site_wishing_web;?>" target="_blank">
							Touch this blue line and see magic
						</a>👈
						<br/>☝☝☝☝☝☝☝☝☝☝☝☝
					</div>
					<?php }?>
					
					<a href="<?php echo base_url();?>" class="btn btn-warning btn-lg mt-5">Create Your Own Quiz</a>
				</div>
				<!-- Start ad -->
        		<div class="ad">
        			<?php echo $site->site_ad_ver;?>
        		</div>
			</div>
		</div>
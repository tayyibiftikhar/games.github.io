 <!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<!-- font CSS -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		
		<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap4.min.css">

		<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/admin.css');?>">

		<title>Quiz - Admin Panel</title>
	</head>
	<body>
		<header>
			<!-- Fixed navbar -->
      		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
				<a class="navbar-brand" href="<?php echo base_url('admin');?>">Admin</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="<?php echo base_url('admin');?>">Home</span></a>
						</li>
						<!-- question -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								Question
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo base_url('admin/add-question');?>">Add New</a>
								<a class="dropdown-item" href="<?php echo base_url('admin/question');?>">View</a>
							</div>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="<?php echo base_url('admin/quiz');?>">Quiz</span></a>
						</li>

						<!-- settings -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								Settings
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo base_url('admin/site-settings');?>">Site Settings</a>
								<a class="dropdown-item" href="<?php echo base_url('admin/custom-header-footer');?>">Page Settings</a>
								<a class="dropdown-item" href="<?php echo base_url('admin/page');?>">Page</a>
								<a class="dropdown-item" href="<?php echo base_url('admin/ad-settings');?>">Ad Settings</a>
								<a class="dropdown-item" href="<?php echo base_url('admin/change-logo');?>">Change Logo</a>
								<a class="dropdown-item" href="<?php echo base_url('admin/account');?>">Account Settings</a>
							</div>
						</li>

						
					</ul>

					<ul class="navbar-nav ml-auto">
			            <li class="nav-item">
			                <a class="nav-link" href="<?php echo base_url('admin/logout');?>">Logout</a>
			            </li>
			        </ul>
				</div>

			</nav>
		</header>
		
		

		
		
		
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">

		<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png');?>">


		<?php 
			if(isset($qPerformer)){

				echo '
		<title>'.$qPerformer .' - ' .$site->site_title.'</title> 
		<meta name="description" content="'.$qPerformer .' '.$site->site_description.'">
        <meta property="og:title" content="'.$qPerformer .' - ' .$site->site_title.'" />
        <meta property="og:description" content="'.$qPerformer .' '.$site->site_description.'">
        <meta property="og:image" content="'.base_url('assets/images/'.$site->site_og_image).'">
				';
			}else{

				echo '
		<title>'.$site->site_title.'</title> 
		<meta name="description" content="'.$site->site_title.'">
        <meta property="og:title" content="'.$site->site_title.'" />
        <meta property="og:description" content="'.$site->site_title.'">
        <meta property="og:image" content="'.base_url($site->site_og_image).'">
				';
			}
		?>
		

		<!-- Custom header -->
		<?php echo $site->site_custom_header;?>

		<!--// End of Custom header -->
	</head>
	<body> 

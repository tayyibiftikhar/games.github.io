<?php
	error_reporting(1); 
	$db_config_path = '../application/config/database.php';

	if($_POST){

		// Load the classes and create the new objects
		require_once('include/core_class.php');
		require_once('include/db_class.php');
	
		$core = new Core();
		$db = new Database();


		// Validate the post data
		if($core->validate_post($_POST) == true)
		{
			//first check the connection
			if($db->check_connection($_POST) == false){
				$message = $core->show_message('error',"No connection to database");
			}
			else if ($db->db_install($_POST) == false) {
				$message = $core->show_message('error',"Sql file could not be imported!");
			} 
			else if ($core->write_config($_POST) == false) {
				$message = $core->show_message('error',"The database configuration file could not be written, please chmod application/config/database.php file to 777");
			}
			
			// If no errors, redirect to registration page
			if(!isset($message)) {

				$redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
				$redir .= "://".$_SERVER['HTTP_HOST'];
				$redir .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
				$redir = str_replace('install/','',$redir); 
				header( 'Location: ' . $redir . 'admin' ) ;
			}
		}
		else {
			$message = $core->show_message('error','Not all fields have been filled in correctly. The host, username, password, and database name are required.');
		}

	}

?>
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

		<style type="text/css">
			body, html{
				height: 100%;
			}
		</style>

		<title>Installer</title>
	</head>
	<body>
		<div class="container h-100">
			<div class="row h-100 justify-content-center align-items-center">
				<?php if(is_writable($db_config_path)){?>
				<form class="col-6" id="install_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					
					<h1 class="text-center mb-5">Installer Configaration</h1>
					
					<?php if(isset($message)) {echo '<div class="alert alert-danger" role="alert">' . $message . '</div>';}?>
					
					<div class="form-group">
						<label for="hostname">Host Name</label>
						<input type="text" class="form-control" id="hostname" name="hostname" placeholder="localhost" required>
					</div>
					
					<div class="form-group">
						<label for="dbname">Database Name</label>
						<input type="text" class="form-control" name="dbname" placeholder="enter database name" required>
					</div>
					
					<div class="form-group">
						<label for="username">User Name</label>
						<input type="text" class="form-control" name="username" placeholder="enter username" required>
					</div>
					
					<div class="form-group">
						<label for="dbpass">Database Password</label>
						<input type="password" class="form-control" name="dbpass" placeholder="enter database password">
					</div>
					
					<button type="submit" class="btn btn-primary float-right">Submit</button>
				</form>   
				<?php } else { ?>
      				<div class="alert alert-danger" role="alert">Please make the application/config/database.php file writable. <strong>Example</strong>:<br /><br /><code>chmod 777 application/config/database.php</code></div>
	  <?php } ?>
			</div>
		</div>

	</body>
</html>
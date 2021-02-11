<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <!-- Meta tag-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <!-- font CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
     
        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/admin/css/admin.css');?>" rel="stylesheet">
        <style>
            body, html {
                width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body>

        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <!-- start login form -->
                <div class="card mx-auto" style="width: 22rem;">
                    <div class="my-card-header card-header-success text-center">
                        <h4>Sign In</h4>
                    </div>
                    <div class="card-body p-3">
                        <!-- Form login -->
                        <form action="<?php echo base_url('admin/login'); ?>" method="post">
                            <!-- Input username -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" name="username" required="">
                            </div>

                            <!-- Input password -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="pasword" name="password" required="">
                            </div>
                            

                            <!-- if any error -->
                            <?php isset($response) ? $response : $response= null; echo $response;?>

                            <div class="text-center mt-4">
                                <button class="btn btn-success" type="submit">Login</button>
                            </div>
                        </form>
                        <!-- /Form login -->
                    </div>
                </div><!-- End login form -->
            </div>
        </div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- Custom JavaScript -->
        <script type="text/javascript" src="<?php echo base_url('assets/admin/js/admin.js');?>"></script>
    </body>

</html>


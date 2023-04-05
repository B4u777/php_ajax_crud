<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Crud</title>
    <link rel="icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/sweetalert.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>
    <body>
        <div class="container-fluid p-5">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Insert Data</h3>
                            <div class="list-button pull-right">
                                <a href="http://localhost/oop-crud/include/user-table.php" class="btn btn-success">List</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form id="signupForm" action=""  method="post" class="form-horizontal" enctype="multipart/form-data" >
                                <div class="form-group mb-2">
                                    <label for="email">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter email" >
                                </div>
                                <div class="form-group mb-2">
                                    <label for="email">Email<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="pwd">Password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="pwd" name="pwd"placeholder="Enter password">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="img">Image<span class="text-danger">*</span></label><br>
                                    <input type="file"  name="image" >
                                </div>
                                <div class="form-group mb-2">
                                    <label for="language">Languages<span class="text-danger">*</span></label><br>
                                    <div class="controls form-check">
                                        <fieldset>
                                            <label class="custom-control custom-checkbox">
                                                <input class="form-check-input" type="checkbox"  name="language" value="Hindi"> Hindi
                                            </label>
                                        </fieldset>
                                        <fieldset>
                                            <label class="custom-control custom-checkbox">
                                            <input class="form-check-input" type="checkbox" name="language" value="English"> English
                                            </label>
                                        </fieldset>
                                        <fieldset>
                                            <label class="custom-control custom-checkbox">
                                            <input class="form-check-input" type="checkbox" name="language" value="French"> French
                                            </label>
                                        </fieldset>
                                    </div>
                                    <span class="error ui red pointing label transition" id="errorCheck"></span>
                                    
                                </div>
                                <div class="form-group form-check mb-2">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember"> Remember me
                                    </label>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
        <script src="assets/js/additional-methods.js"></script>
        <script src="assets/js/sweetalert.min.js"></script>
        <script src="assets/js/app.js"></script> 
    </body>
</html>
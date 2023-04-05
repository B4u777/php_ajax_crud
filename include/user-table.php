<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="../assets/images/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css"> 
    <link rel="stylesheet" href="../assets/css/sweetalert.css">  
    <link rel="stylesheet" href="../assets/css/app.css"> 
</head>
<body>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Table With Full Features</h3>
                        <div class="list-button pull-right">
                            <a href="http://localhost/oop-crud/" class="btn btn-secondary">ADD USER</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="user_table" class="table table-bordered table-striped table-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Language</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="User_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Info</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                <form id="updateForm" action=""  class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" id="id" class="form-control" name="id">
                    <input type="hidden" clas="form-control" name="user_avatar" id="user_avatar">

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
                        <input type="file"  name="image" id ="image">
                    </div>
                    <div class="mt-2" id="avatar"></div>
                    <div class="form-group mb-2 mt-2">
                        <label for="language">Languages<span class="text-danger">*</span></label><br>
                        <div class="controls">
                            <fieldset>
                                <label class="custom-control custom-checkbox">
                                    <input class="form-check-input" type="checkbox"  id="language1" name="language" value="Hindi"> Hindi
                                </label>
                            </fieldset>
                            <fieldset>
                                <label class="custom-control custom-checkbox">
                                <input class="form-check-input" type="checkbox" id="language2" name="language" value="English"> English
                                </label>
                            </fieldset>
                            <fieldset>
                                <label class="custom-control custom-checkbox">
                                <input class="form-check-input" type="checkbox" id="language3" name="language" value="French"> French
                                </label>
                            </fieldset>
                        </div>
                        <span class="error ui red pointing label transition" id="errorCheck"></span>
                        
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/jquery.validate.min.js"></script>
    <script src="../assets/js/additional-methods.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/sweetalert.min.js"></script>
    <script src="../assets/js/user-table.js"></script>
</body>
</html>
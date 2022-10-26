<?php include '../main.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add data
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- ...Form Data -->
                                <form action="../../backend/inserCode.php" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group  mt-3">
                                            <input type="text" name="name" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="form-group  mt-3">
                                            <input type="text" name="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group  mt-3">
                                            <input type="text" name="number" class="form-control" placeholder="Number">
                                        </div>
                                        <div class="form-group  mt-3">
                                            <input type="password" name="pass" class="form-control" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
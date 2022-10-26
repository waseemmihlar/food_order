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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Update
                </button>

                <!-- Modal -->
                <div class="modal fade" id="editmodal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Customer Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../../backend/updateCode.php" method="POST">

                                    <div class="modal-body">
                                        <input type="hidden" name="up_id" id="up_id">
                                        <div class="form-group  mt-3">
                                            <input type="text" name="name" class="form-control" id="Name" placeholder="Name">
                                        </div>
                                        <div class="form-group  mt-3">
                                            <input type="text" name="email" class="form-control" id="Email" placeholder="Email">
                                        </div>
                                        <div class="form-group  mt-3">
                                            <input type="text" name="number" class="form-control" id="Number" placeholder="Number">
                                        </div>
                                        <div class="form-group  mt-3">
                                            <input type="password" name="pass" class="form-control" id="Password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" name="editData" class="btn btn-success ">Save Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    
    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#editmodal').modal('show'); //Bootstrap code

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#up_id').val(data[0]);
                $('#Name').val(data[1]);
                $('#Email').val(data[2]);
                $('#Number').val(data[3]);
                $('#Password').val(data[4]);
            });
        });
    </script>


</body>

</html>
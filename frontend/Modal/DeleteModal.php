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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fa fa-trash-o" aria-hidden="true"></i>
            Delete
        </button>
        <div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete Customer Details</h5>

                    </div>
                    <form action="../../backend/deleteCode.php" method="POST">
                        <div class="model-body">
                            <input type="hidden" name="delete_id" id="delete_id">
                            <h4>Do you want to Delete this Data?</h4>
                        </div>
                        <!-- Modal -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" name="deletebtn" class="btn btn-primary" ">Yes ! Delete it.</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
<script>
    $(document).ready(function() {
        $('.deleteBtn').on('click', function() {
            $('#deleteModel').modal('show'); //Bootstrap code

                       $tr = $(this).closest('tr');
                       var data = $tr.children(" td").map(function() { return $(this).text(); }).get(); console.log(data); $('#delete_id').val(data[0]); }); }); </script>

</html>
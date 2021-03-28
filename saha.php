<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>


</head>

<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container-fluid ">
                <h3 class="float-left mt-5 mb-5 ">รายงานการตรวจรับค่าติดตาม</h3>
                <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-add btn-lg mt-5 mb-5 float-right shadow-sm">
                    <i class="material-icons">add</i>เพิ่มข้อมูล
                </button>
                <div class="table-responsive mt-5">
                    <table id="test_data" class="table table-bordered  " style="width:100%">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>วันที่</th>
                                <th>รหัสลูกหนี้</th>
                                <th>ชื่อ</th>
                                <th>สกุล</th>
                                <th>ยอดจัด</th>
                                <th>คงเหลือ</th>
                                <th>ค่าติดตาม</th>
                                <th>ชื่อผู้ออกติดตาม</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- /#page-content-wrapper -->
        <div id="userModal" class="modal fade" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <form method="post" id="user_form" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-titles">บันทึกลูกหนี้</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                        <div class="modal-body">
                            <div class="form-row mt-2">
                                <div class="form-group col-6">
                                    <label>ชื่อ : </label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" />
                                </div>
                                <div class="form-group col-6">
                                    <label>สกุล : </label>
                                    <input type="text" name="Lastname" id="Lastname" class="form-control" />
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="form-group col-6">
                                    <label>รหัสลูกหนี้ :</label>
                                    <input type="text" name="code" id="code" class="form-control" />
                                </div>
                                <div class="form-group col-6">
                                    <label>ยอดจัด :</label>
                                    <input type="number"  name="Amount" id="Amount" class="form-control"  />
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="form-group col-6">
                                    <label>คงเหลือ :</label>
                                    <input type="number"  name="Balance" id="Balance" class="form-control" />
                                </div>
                                <div class="form-group col-6">
                                    <label>ค่าติดตาม :</label>
                                    <input type="number"  name="Track" id="Track" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label>ชื่อผู้ออกติดตาม :</label>
                                <input type="text" name="Fname" id="Fname" class="form-control" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="user_id" id="user_id" />
                            <input type="hidden" name="operation" id="operation" />
                            <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript -->
    <script src="saha.js"></script>
</body>

</html>
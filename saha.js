$(document).ready(function () {
    $('#add_button').click(function () {
        $('#user_form')[0].reset();
        $('.modal-titles').text("เพิ่มสมาชิก");
        $('#action').val("Add");
        $('#operation').val("Add");
        $('#user_uploaded_image').html('');
    });
    var dataTable = $('#test_data').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "list.php",
            type: "POST",
        },
        "columnDefs": [{
            "targets": [0, 3, 4],
            "orderable": false,

        }, ],

    });


    $(document).on('submit', '#user_form', function (event) {
        event.preventDefault();
        var LG_code = $('#code').val();
        var LG_firstname = $('#firstname').val();
        var LG_Lastname = $('#Lastname').val();
        var LG_Amount = $('#Amount').val();
        var LG_Balance = $('#Balance').val();
        var LG_Track = $('#Track').val();
        var LG_Fname = $('#Fname').val();

        if (LG_code != '' && LG_firstname != '' && LG_Lastname != '' && LG_Amount != '' && LG_Balance != '' && LG_Track != '' && LG_Fname != '') {
            $.ajax({
                url: "insertsaha.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    swal({
                        type: 'success',
                        title: "บันทึก",
                        text: data,
                        timer: 2000,
                        showCancelButton: false,
                        showConfirmButton: false
                    })
                    $('#user_form')[0].reset();
                    $('#userModal').modal('hide');
                    dataTable.ajax.reload();
                },

            });
        } else {
            if (LG_code == '') {
                swal("กรุณากรอก รหัสลูกหนี้", "กรุณากด ตกลง เพื่อทำการกรอกข้อมูล ", "warning");
            } else if (LG_firstname == '') {
                swal("กรุณากรอก ชื่อ", "กรุณากด ตกลง เพื่อทำการกรอกข้อมูล ", "warning");
            } else if (LG_Lastname == '') {
                swal("กรุณากรอก นามสกุล", "กรุณากด ตกลง เพื่อทำการกรอกข้อมูล ", "warning");
            } else if (LG_Amount == '') {
                swal("กรุณากรอก ยอดจัด", "กรุณากด ตกลง เพื่อทำการกรอกข้อมูล ", "warning");
            } else if (LG_Balance == '') {
                swal("กรุณากรอก คงเหลือ", "กรุณากด ตกลง เพื่อทำการกรอกข้อมูล ", "warning");
            } else if (LG_Track == '') {
                swal("กรุณากรอก ค่าติดตาม", "กรุณากด ตกลง เพื่อทำการกรอกข้อมูล ", "warning");
            }
        }
    });

    $(document).on('click', '.update', function () {
        var user_id = $(this).attr("Id");
        $.ajax({
            url: "updatesaha.php",
            method: "POST",
            data: {
                user_id: user_id
            },
            dataType: "json",
            success: function (data) {
                $('#userModal').modal('show');
                $('#code').val(data.code);
                $('#firstname').val(data.firstname);
                $('#Lastname').val(data.Lastname);
                $('#Amount').val(data.Amount);
                $('#Balance').val(data.Balance);
                $('#Track').val(data.Track);
                $('#Fname').val(data.Fname);
                $('.modal-titles').text("แก้ไขสมาชิก");
                $('#user_id').val(user_id);
                $('#action').val("Edit");
                $('#operation').val("Edit");
            }

        })

    });

    $(document).on('click', '.delete', function (e) {
        var user_id = $(this).attr("id");
        swal({
                title: "ลบ?",
                text: "ยืนยันการลบหรือไม่",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonColor: "#DD6B55",
                cancelButtonText: "ยกเลิก",
                confirmButtonText: "ยืนยัน",
                closeOnConfirm: false,
                closeOnCancel: false,
                customClass: "Custom_Cancel ",
            },
            function (isConfirm) {
                if (isConfirm) {

                    $.ajax({
                        url: "delete.php",
                        method: "POST",
                        data: {
                            user_id: user_id
                        },
                        success: function (data) {
                            swal({
                                type: 'success',
                                title: "ลบ",
                                text: data,
                                timer: 2000,
                                showCancelButton: false,
                                showConfirmButton: false
                            })
                            dataTable.ajax.reload();
                        }
                    })
                } else {
                    swal("ยกเลิกการลบ", "กด ตกลง เพื่อออกจากการยกเลิก", "error");

                }
            });
        e.preventDefault();
    });

});
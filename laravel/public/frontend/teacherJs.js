var teacher = teacher || {};

teacher.showAll = function () {

    $.ajax({
        url: "http://127.0.0.1:8000/admin/teacher/listgv",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#tbTeacher tbody').empty();
            $.each(data, function (i, v) {
                var image = (v.image != null && v.image != '') ? v.image : "/storage/images/unnamed.jpg";
                var gender = (v.gender == 1) ? "Nam" : "Nữ";
                $('#tbTeacher tbody').append(
                    `<tr>
                        <td>${i += 1}</td>
                        <td>${v.fullName}</td>
                        <td><img src="/storage/images/${image}" alt="image" id="imageProduct"
                                style="height:100px; width:100px">
                        </td>
                        <td>${gender}</td>
                        <td>${v.address}</td>
                        <td>${v.phone}</td>
                        <td>
                            <a href="javascript:;" type="button" class="btn btn-primary" onclick="teacher.get(${v.id})">
                                <i class="fas fa-pencil-alt" style="color: green"></i>
                            </a>
                            <a href="javascript:;" type="button" class="btn btn-primary"
                                onclick="teacher.deletee(${v.id})">
                                <i class="fa fa-times text-danger text"></i>
                            </a>
                            <a href="javascript:;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailteacher" onclick="teacher.show(${v.id})">
                                <i class="fas fa-external-link-alt" style="color: yellow"></i>
                            </a>
                        </td>
                    </tr>`
                )
            })
            $('#tbTeacher').DataTable();
        }
    });
}

teacher.show = function (id) {
    $.ajax({
        url: "http://127.0.0.1:8000/admin/teacher/show/" + id,
        type: "GET",
        dataType: "json",
    }).done(function (data) {
        $("#imageDiv").html("<img src=/storage/images/" + data['image'] + " style=width:100%>");
        $("#nameDiv").text("Họ và tên: " + data['fullName']);
        $("#DateOBDiv").text("Ngày sinh: " + data['dateOfBirth']);
        if (data['gender'] == 0) {
            $("#genderDiv").text("Giới tính: Nữ");
        } else {
            $("#genderDiv").text("Giới tính: Nam");
        }
        $("#phoneDiv").text("Số điện thoại: " + data['phone']);
        $("#nationDiv").text("Quốc gia: " + data['nation']);
        $("#specializeDiv").text("Chuyên ngành: " + data['specialize']);
        $("#addressDiv").text("Địa chỉ: " + data['address']);
        $("#emailDiv").text("Email: " + data['email']);
    });
}


teacher.resetShow = function () {
    $("#imageDiv").val('');
    $("#nameDiv").val('');
    $("#DateOBDiv").val('');
    $("#genderDiv").val('');
    $("#phoneDiv").val('');
    $("#nationDiv").val('');
    $("#specializeDiv").val('');
    $("#addressDiv").val('');
    $("#emailDiv").val('');
    $("#detailteacher").modal('hide');
}

teacher.openModal = function () {
    teacher.reset();
    $("#addEditTeacher").modal('show');
}

teacher.save = function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // if($('#frAddEditTeacher').valid()){
    if ($('#teacherId').val() == 0) {
        $.ajax({
            url: "http://127.0.0.1:8000/admin/teacher/create",
            method: 'POST',
            dataType: 'json',
            data: new FormData($("#frAddEditTeacher")[0]),
            contentType: false,
            processData: false,
            success: function (data) {
                $("#addEditTeacher").modal('hide');
                teacher.showAll();
                alertify.success('Thêm thành công');

            }
        });

    } else {
        var updateObj = {};
        updateObj.id = $('#teacherId').val();
        updateObj.fullName = $('#fullName').val();
        updateObj.dateOfBirth = $('#dateOfBirth').val();
        updateObj.gender = $('#gender').val();
        updateObj.nation = $('#nation').val();
        updateObj.phone = $('#phone').val();
        updateObj.email = $('#email').val();
        updateObj.address = $('#address').val();
        updateObj.faName = $('#faName').val();
        updateObj.faPhone = $('#faPhone').val();
        updateObj.moName = $('#moName').val();
        updateObj.moPhone = $('#moPhone').val();
        updateObj.specialize = $('#specialize').val();
        updateObj.image = $('#avatar').get(0).files;
        // updateObj.image =  $('#avatar').attr('src');



        $.ajax({
            url: `http://127.0.0.1:8000/admin/teacher/update/${updateObj.id}`,
            method: "POST",
            dataType: "json",
            contentType: "application/json",
            data: JSON.stringify(updateObj),
            success: function (data) {
                console.log(data);
                $("#addEditTeacher").modal('hide');
                teacher.showAll();
                alertify.success('Sửa thành công');
            }
        })
    }
    // }
}

teacher.get = function (id) {
    $.ajax({
        url: `http://127.0.0.1:8000/admin/teacher/show/${id}`,
        method: "GET",
        dataType: "json",
        success: function (data) {
            var avatar = (data.image != null && data.image != "") ? data.image : "/storage/images/nonamed.png";
            if (data != null) {
                $('#fullName').val(data.fullName);
                $('#dateOfBirth').val(data.dateOfBirth);
                $('#gender').val(data.gender);
                $('#nation').val(data.nation);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('#address').val(data.address);
                $('#faName').val(data.faName);
                $('#faPhone').val(data.faPhone);
                $('#moName').val(data.moName);
                $('#moPhone').val(data.moPhone);
                $('#specialize').val(data.specialize);
                $('#teacherId').val(data.id);
                $('#avatar').attr("src", "/storage/images/" + avatar);

                $("#addEditTeacher").find(".modal-title").text("Chỉnh sửa");
                $("#addEditTeacher").find(".btn-success").text("Cập nhật");
                $("#addEditTeacher").modal('show');
            }
        }
    })
}


teacher.reset = function () {
    $('#avatar').attr("src", "/storage/images/unnamed.jpg");
    $("#dateOfBirth").val('');
    $("#nation").val('');
    $("#phone").val('');
    $("#email").val('');
    $("#fullName").val('');
    $("#gender").val('');
    $("#faName").val('');
    $("#faPhone").val('');
    $("#moName").val('');
    $("#moPhone").val('');
    $("#address").val('');
    $("#specialize").val('');
    $('#addEditTeacher').find(".modal-title").text("Thêm mới giáo viên");
    $('#addEditTeacher').find(".btn-success").text("save");
}


teacher.deletee = function (id) {
    bootbox.confirm({
        title: "Remove employee?",
        message: "Bạn chắc chắn muốn xóa?",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> No'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Yes'
            }
        }, callback: function (result) {
            if (result) {
                $.ajax({
                    url: `http://127.0.0.1:8000/admin/teacher/delete/${id}`,
                    method: "GET",
                    dataType: "json",
                    success: function () {
                        alertify.success('Xóa thành công');
                        teacher.showAll();
                    }
                })
            }
        }
    })
}


teacher.uploadAvatar = function (element) {
    let img = element.files[0];
    let reader = new FileReader();
    reader.onloadend = function () {
        $("#avatar").attr("src", reader.result);
    }
    reader.readAsDataURL(img);
}

teacher.init = function () {
    teacher.showAll();
}

$(document).ready(function () {
    teacher.init();
});


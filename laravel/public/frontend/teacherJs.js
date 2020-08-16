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
                var active = (v.active == 1) ? "Còn làm" : "Đã nghỉ";
                $('#tbTeacher tbody').append(
                    `<tr>
                        <td>${i += 1}</td>
                        <td>${v.fullName}</td>
                        <td><img src="${image}" alt="image"
                                style="height:100px; width:100px">
                        </td>
                        <td>${gender}</td>
                        <td>${v.nameClass}</td>
                        <td id="active">${active}</td>
                        <td>
                            <a href="javascript:;" type="button" class="btn btn-primary" onclick="teacher.get(${v.id}), teacher.openModal(this)">
                                <i class="fas fa-pencil-alt" style="color: green"></i>
                            </a>
                            <a href="javascript:;" type="button" class="btn btn-primary"
                                onclick="teacher.deletee(${v.id})">
                                <i class="fa fa-times text-danger text"></i>
                            </a>
                            <a href="javascript:;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEditTeacher"
                                onclick="teacher.reset(), teacher.get(${v.id}), teacher.hidden()">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </td>
                    </tr>`
                )
            })
            $('#tbTeacher').DataTable();
        }
    });
}


teacher.openModal = function (element) {
    $('#save-change').show();
    if (element.innerHTML == 'Thêm mới') {
        teacher.reset();
        $('#divAction').hide();
        $('#teacherTitle').html("Thêm mới giáo viên");
        $('#save-change').html("save");
        $('#save-change').attr("onclick", "teacher.create()");
    } else {
        teacher.reset();
        $('#divAction').show();
        $('#teacherTitle').html("Chỉnh sửa giáo viên");
        $('#save-change').html("Chỉnh sửa");
        $('#save-change').attr("onclick", "teacher.update()");
    }

    $('#addEditTeacher').modal('show');
}

teacher.create = function () {
    $('#image64').val($('#avatar').attr('src'));
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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
        },
        error: function (data) {
            error = data.responseJSON.errors;
            $('#errorAddress').empty();
            $('#errorGender').empty();
            $('#errorDateOfBirth').empty();
            $('#errorEmail').empty();
            $('#errorPhone').empty();
            $('#errorFullName').empty();
            $('#errorClasse').empty();
            $('#errorSpecialize').empty();
            $('#errorNation').empty();
            $('#errorSalary').empty();
            $.each(error, function (i, v) {
                if (i == "nation") {
                    $('#errorNation').append(v[0]);
                } else if (i == "specialize") {
                    $('#errorSpecialize').append(v[0]);
                } else if (i == "classe") {
                    $('#errorClasse').append(v[0]);
                } else if (i == "fullName") {
                    $('#errorFullName').append(v[0]);
                } else if (i == "phone") {
                    $('#errorPhone').append(v[0]);
                } else if (i == "email") {
                    $('#errorEmail').append(v[0]);
                } else if (i == "dateOfBirth") {
                    $('#errorDateOfBirth').append(v[0]);
                } else if (i == "gender") {
                    $('#errorGender').append(v[0]);
                } else if (i == "address") {
                    $('#errorAddress').append(v[0]);
                } else if (i == "salary") {
                    $('#errorSalary').append(v[0]);
                }
            })
        }
    });
}

teacher.update = function () {
    var id = $('#id').val();
    $('#image64').val($('#avatar').attr('src'));
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: `http://127.0.0.1:8000/admin/teacher/update/${id}`,
        method: "POST",
        dataType: "json",
        data: new FormData($("#frAddEditTeacher")[0]),
        contentType: false,
        processData: false,
        success: function (data) {
            $("#addEditTeacher").modal('hide');
            teacher.showAll();
            alertify.success('Sửa thành công');
        },
        error: function (data) {
            error = data.responseJSON.errors;
            $('#errorAddress').empty();
            $('#errorGender').empty();
            $('#errorDateOfBirth').empty();
            $('#errorEmail').empty();
            $('#errorPhone').empty();
            $('#errorFullName').empty();
            $('#errorClasse').empty();
            $('#errorSpecialize').empty();
            $('#errorNation').empty();
            $('#errorSalary').empty();
            $.each(error, function (i, v) {
                if (i == "nation") {
                    $('#errorNation').append(v[0]);
                } else if (i == "specialize") {
                    $('#errorSpecialize').append(v[0]);
                } else if (i == "classe") {
                    $('#errorClasse').append(v[0]);
                } else if (i == "fullName") {
                    $('#errorFullName').append(v[0]);
                } else if (i == "phone") {
                    $('#errorPhone').append(v[0]);
                } else if (i == "email") {
                    $('#errorEmail').append(v[0]);
                } else if (i == "dateOfBirth") {
                    $('#errorDateOfBirth').append(v[0]);
                } else if (i == "gender") {
                    $('#errorGender').append(v[0]);
                } else if (i == "address") {
                    $('#errorAddress').append(v[0]);
                }else if (i == "salary") {
                    $('#errorSalary').append(v[0]);
                }
            })
        }
    })
}

teacher.get = function (id) {
    $.ajax({
        url: `http://127.0.0.1:8000/admin/teacher/show/${id}`,
        method: "GET",
        dataType: "json",
        success: function (data) {
            var avatar = (data.image != null && data.image != "") ? data.image : "/storage/images/unnamed.png";
            $('#fullName').val(data.fullName);
            $('#dateOfBirth').val(data.dateOfBirth);
            $('#gender').val(data.gender);
            $('#nation').val(data.nation);
            $('#phone').val(data.phone);
            $('#email').val(data.email);
            $('#address').val(data.address);
            $('#specialize').val(data.specialize);
            $('#action').val(data.active);
            $('#classe').val(data.classe_id);
            $('#salary').val(data.salary);
            $('#id').val(data.id);
            $('#avatar').attr("src", avatar);
        }
    })
}

teacher.hidden = function () {
    $('#save-change').hide();
}

teacher.reset = function () {
    $('#avatar').attr('src', '/storage/images/unnamed.jpg');
    $("#dateOfBirth").val('');
    $("#nation").val('');
    $("#phone").val('');
    $("#email").val('');
    $("#fullName").val('');
    $("#gender").val('');
    $("#address").val('');
    $("#salary").val('');
    $("#specialize").val('');
    $('#errorAddress').empty();
    $('#errorGender').empty();
    $('#errorDateOfBirth').empty();
    $('#errorEmail').empty();
    $('#errorPhone').empty();
    $('#errorFullName').empty();
    $('#errorClasse').empty();
    $('#errorSpecialize').empty();
    $('#errorNation').empty();
    $('#errorSalary').empty();
}


teacher.deletee = function (id) {
    bootbox.confirm({
        title: "Xóa danh sách giáo viên?",
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


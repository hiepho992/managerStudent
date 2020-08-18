var student = student || {};

student.show = function () {
    $.ajax({
        url: "http://quanlyhocvien-acb.herokuapp.com/admin/student/show",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#tbStudent tbody').empty();
            $.each(data, function (i, v) {
                var image = (v.image != null && v.image != '') ? v.image : "/storage/images/unnamed.jpg";
                var gender = (v.gender == 1) ? "Nam" : "Nữ";
                var active = (v.active == 1) ? "Còn học" : "Đã nghỉ";
                $('#tbStudent tbody').append(
                    `<tr>
                        <td>${i += 1}</td>
                        <td>${v.fullName}</td>
                        <td><img src="${image}" alt="image"
                                style="height:100px; width:100px">
                        </td>
                        <td>${gender}</td>
                        <td>${v.classe}</td>
                        <td id="active">${active}</td>
                        <td>
                            <a href="javascript:;" type="button" class="btn btn-primary" onclick="student.openModal(this), student.get(${v.id})">
                                <i class="fas fa-pencil-alt" style="color: green"></i>
                            </a>
                            <a href="javascript:;" type="button" class="btn btn-primary"
                                onclick="student.deletee(${v.id})">
                                <i class="fa fa-times text-danger text"></i>
                            </a>
                            <a href="javascript:;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEditStudent"
                                onclick="student.reset(), student.get(${v.id}), student.hidden()">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </td>
                    </tr>`
                )
            })
            $('#tbStudent').DataTable();
        }
    })
}

student.openModal = function (element) {
    $('#save-change').show();
    if (element.innerHTML == "Thêm mới") {
        student.reset();
        $('#divAction').hide();
        $('#studentTitle').html("Thêm mới học viên");
        $('#save-change').html("Save");
        $('#save-change').attr("onclick", "student.save()");
    } else {
        student.reset();
        $('#divAction').show();
        $('#studentTitle').html("Chỉnh sửa học viên");
        $('#save-change').html("Chỉnh sửa");
        $('#save-change').attr("onclick", "student.update()");
    }

    $('#addEditStudent').modal('show');
}

student.save = function () {
    $('#image64').val($('#avatar').attr('src'));
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "http://quanlyhocvien-acb.herokuapp.com/admin/student/create",
        method: 'POST',
        dataType: 'json',
        data: new FormData($("#frAddEditStudent")[0]),
        contentType: false,
        processData: false,
        success: function (data) {
            $("#addEditStudent").modal('hide');
            student.show();
            alertify.success('Thêm thành công');
        },
        error: function (data) {
            error = data.responseJSON.errors;
            $('#errorAddress').empty();
            $('#errorGender').empty();
            $('#errorDateOfBirth').empty();
            $('#errorDate_start').empty();
            $('#errorDate_end').empty();
            $('#errorEmail').empty();
            $('#errorPhone').empty();
            $('#errorFullName').empty();
            $('#errorClasse').empty();
            $('#errorSpecialize').empty();
            $('#errorNation').empty();
            $.each(error, function (i, v) {
                if (i == "nation") {
                    $('#errorNation').append(v[0]);
                } else if (i == "date_start") {
                    $('#errorDate_start').append(v[0]);
                } else if (i == "date_end") {
                    $('#errorDate_end').append(v[0]);
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
                }
            })

        }
    });
}

student.update = function () {
    var id = $('#id').val();
    $('#image64').val($('#avatar').attr('src'));
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: `http://quanlyhocvien-acb.herokuapp.com/admin/student/update/${id}`,
        method: "POST",
        dataType: "json",
        data: new FormData($("#frAddEditStudent")[0]),
        contentType: false,
        processData: false,
        success: function (data) {
            $("#addEditStudent").modal('hide');
            student.show();
            alertify.success('Sửa thành công');
        },
        error: function (data) {
            error = data.responseJSON.errors;
            $('#errorAddress').empty();
            $('#errorGender').empty();
            $('#errorDateOfBirth').empty();
            $('#errorDate_start').empty();
            $('#errorDate_end').empty();
            $('#errorEmail').empty();
            $('#errorPhone').empty();
            $('#errorFullName').empty();
            $('#errorClasse').empty();
            $('#errorSpecialize').empty();
            $('#errorNation').empty();
            $.each(error, function (i, v) {
                if (i == "nation") {
                    $('#errorNation').append(v[0]);
                } else if (i == "date_start") {
                    $('#errorDate_start').append(v[0]);
                } else if (i == "date_end") {
                    $('#errorDate_end').append(v[0]);
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
                }
            });
        }
    })
}

student.deletee = function (id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    bootbox.confirm({
        title: "Xóa danh sách học viên?",
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
                    url: `http://quanlyhocvien-acb.herokuapp.com/admin/student/delete/${id}`,
                    method: "DELETE",
                    dataType: "json",
                    success: function () {
                        alertify.success('Xóa thành công');
                        student.show();
                    }
                })
            }
        }
    })
}

student.get = function (id) {
    $.ajax({
        url: `http://quanlyhocvien-acb.herokuapp.com/admin/student/get/${id}`,
        method: "GET",
        dataType: "json",
        success: function (data) {
            var avatar = (data.image != null && data.image != "") ? data.image : "/storage/images/unnamed.jpg";
            $('#fullName').val(data.fullName);
            $('#dateOfBirth').val(data.dateOfBirth);
            $('#date_start').val(data.date_start);
            $('#date_end').val(data.date_end);
            $('#gender').val(data.gender);
            $('#nation').val(data.nation);
            $('#phone').val(data.phone);
            $('#email').val(data.email);
            $('#address').val(data.address);
            $('#action').val(data.active);
            $('#classe').val(data.classe_id);
            $('#id').val(data.id);
            $('#avatar').attr("src", avatar);
        }
    })
}

student.reset = function () {
    $('#avatar').attr('src', '/storage/images/unnamed.jpg')
    $('#nation').val('');
    $('#date_start').val('');
    $('#date_end').val('');
    $('#classe').val('');
    $('#fullName').val('');
    $('#phone').val('');
    $('#email').val('');
    $('#dateOfBirth').val('');
    $('#gender').val('');
    $('#address').val('');
    $('#errorAddress').empty();
    $('#errorGender').empty();
    $('#errorDateOfBirth').empty();
    $('#errorDate_start').empty();
    $('#errorDate_end').empty();
    $('#errorEmail').empty();
    $('#errorPhone').empty();
    $('#errorFullName').empty();
    $('#errorClasse').empty();
    $('#errorSpecialize').empty();
    $('#errorNation').empty();
}

student.uploadAvatar = function (element) {
    let image = element.files[0];
    let reader = new FileReader();
    reader.onloadend = function () {
        $("#avatar").attr("src", reader.result);
    }
    reader.readAsDataURL(image);
}

student.hidden = function () {
    $('#save-change').hide();
}

student.init = function () {
    student.show();
}

$(document).ready(function () {
    student.init();
})

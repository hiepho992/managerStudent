var classe = classe || {};
classe.show = function () {
    $.ajax({
        url: "http://quanlyhocvien-acb.herokuapp.com/admin/class/show",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#tbClasse tbody').empty();
            $.each(data, function (i, v) {
                $('#tbClasse tbody').append(
                    `<tr>
                    <td>${i += 1}</td>
                    <td><a href="javascript:;" onclick="classe.getStudent(${v.id})" data-toggle="modal" data-target="#showStudent">${v.name}</a></td>
                    <td>${v.date_start}</td>
                    <td>${v.date_end}</td>
                    <td>${v.class}</td>
                    <td>
                        <a href="javascript:;" type="button" class="btn btn-primary" onclick="classe.openModal(this), classe.get(${v.id})">
                            <i class="fas fa-pencil-alt" style="color: green"></i>
                        </a>
                        <a href="javascript:;" type="button" class="btn btn-primary"
                            onclick="classe.deletee(${v.id})">
                            <i class="fa fa-times text-danger text"></i>
                        </a>
                    </td>
                </tr>`
                )
            })
            $('#tbClasse').DataTable();
        }
    });
}

classe.create = function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "http://quanlyhocvien-acb.herokuapp.com/admin/class/create",
        method: "POST",
        dataType: "json",
        data: new FormData($('#frAddEditClass')[0]),
        contentType: false,
        processData: false,
        success: function (data) {
            $('#addEditClasse').modal('hide');
            classe.show();
            alertify.success('Thêm thành công');
        },
        error: function (data) {
            error = data.responseJSON.errors;
            $('#errorName').empty();
            $('#errorDate').empty();
            $('#errorDateEnd').empty();
            $('#errorSubject').empty();
            $.each(error, function (i, v) {
                if (i == "name") {
                    $('#errorName').append(v[0]);
                } else if (i == "date_start") {
                    $('#errorDate').append(v[0]);
                } else if (i == "date_end") {
                    $('#errorDateEnd').append(v[0]);
                } else {
                    $('#errorSubject').append(v[0]);
                }
            });
        }

    })
}

classe.update = function () {
    var id = $('#id').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: `http://quanlyhocvien-acb.herokuapp.com/admin/class/update/${id}`,
        method: "POST",
        data: new FormData($('#frAddEditClass')[0]),
        contentType: false,
        processData: false,
        success: function (data) {
            $('#addEditClasse').modal('hide');
            classe.show();
            alertify.success('Sửa thành công');
        },
        error: function (data) {
            error = data.responseJSON.errors;
            $('#errorName').empty();
            $('#errorDate').empty();
            $('#errorDateEnd').empty();
            $('#errorSubject').empty();
            $.each(error, function (i, v) {
                if (i == "name") {
                    $('#errorName').append(v[0]);
                } else if (i == "date_start") {
                    $('#errorDate').append(v[0]);
                } else if (i == "date_end") {
                    $('#errorDateEnd').append(v[0]);
                } else {
                    $('#errorSubject').append(v[0]);
                }
            });
        }

    });
}


classe.get = function (id) {
    $.ajax({
        url: `http://quanlyhocvien-acb.herokuapp.com/admin/class/edit/${id}`,
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#date_start').val(data.date_start);
            $('#date_end').val(data.date_end);
            $('#subject').val(data.subject_id);
        }

    })
}

classe.deletee = function(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    bootbox.confirm({
        title: "xóa lớp học?",
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
                    url: `http://quanlyhocvien-acb.herokuapp.com/admin/class/delete/${id}`,
                    method: "DELETE",
                    dataType: "json",
                    success: function () {
                        alertify.success('Xóa thành công');
                        classe.show();
                    }
                })
            }
        }
    })
}

classe.getStudent = function(id){
    $.ajax({
        url: `http://quanlyhocvien-acb.herokuapp.com/admin/class/getStudent/${id}`,
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#showStudent tbody').empty();
            $.each(data, function(i, v){
                var gender = (v.gender == 1) ? "Nam" : "Nữ";
                var active = (v.active == 1) ? "Còn học" : "Đã nghỉ";
                $('#showStudent tbody').append(
                    `<tr>
                        <td>${i += 1}</td>
                        <td>${v.fullName}</td>
                        <td><img src="${v.image}" alt="image"
                        style="height:50px; width:50px"></td>
                        <td>${gender}</td>
                        <td>${active}</td>
                    </tr>`
                )
            })
        }

    })
}

classe.reset = function () {
    $('#name').val('');
    $('#date_start').val('');
    $('#date_end').val('');
    $('#subject').val('');
}

classe.openModal = function (element) {
    if (element.innerHTML == 'Thêm mới') {
        classe.reset();
        $('#classTitle').html("Thêm mới lớp học");
        $('#save-change').html("save");
        $('#save-change').attr("onclick", "classe.create()");
    } else {
        classe.reset();
        $('#classTitle').html("Chỉnh sửa lớp học");
        $('#save-change').html("Chỉnh sửa");
        $('#save-change').attr("onclick", "classe.update()");
    }
    $('#addEditClasse').modal('show');
}

classe.init = function () {
    classe.show();
}

$(document).ready(function () {
    classe.init();
});

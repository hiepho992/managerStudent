var subject = subject || {};

subject.show = function () {
    $.ajax({
        url: "http://quanlyhocvien-acb.herokuapp.com/admin/subject/show",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#tbSubject tbody').empty();
            $.each(data, function (i, v) {
                $('#tbSubject tbody').append(
                    `<tr>
                    <td>${i += 1}</td>
                    <td>${v.name}</td>
                    <td>
                        <a href="javascript:;" type="button" class="btn btn-primary" onclick="subject.openModal(this), subject.get(${v.id})">
                            <i class="fas fa-pencil-alt" style="color: green"></i>
                        </a>
                        <a href="javascript:;" type="button" class="btn btn-primary"
                            onclick="subject.deletee(${v.id})">
                            <i class="fa fa-times text-danger text"></i>
                        </a>
                    </td>
                </tr>`
                )
            })
            $('#tbSubject').DataTable();
        }
    })
}

subject.create = function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "http://quanlyhocvien-acb.herokuapp.com/admin/subject/create",
        method: 'POST',
        dataType: 'json',
        data: new FormData($("#frAddEditSubject")[0]),
        contentType: false,
        processData: false,
        success: function (data) {
            $("#addEditSubject").modal('hide');
            subject.show();
            alertify.success('Thêm thành công');
        },
        error: function (data) {
            error = data.responseJSON.errors;
            $('#error').empty();
            $.each(error, function (i, v) {
                $('#error').append(v[0]);
            })
        }
    })
}

subject.update = function () {
    id = $('#id').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: `http://quanlyhocvien-acb.herokuapp.com/admin/subject/update/${id}`,
        method: "POST",
        data: new FormData($('#frAddEditSubject')[0]),
        contentType: false,
        processData: false,
        success: function (data) {
            $('#addEditSubject').modal('hide');
            subject.show();
            alertify.success('Sửa thành công');
        },
        error: function (data) {
            error = data.responseJSON.errors;
            $('#error').empty();
            $.each(error, function (i, v) {
                $('#error').append(v[0]);
            })
        }

    })

}

subject.get = function (id) {
    $.ajax({
        url: `http://quanlyhocvien-acb.herokuapp.com/admin/subject/edit/${id}`,
        method: "GET",
        dataType: "json",
        success: function (data) {
            $('#subName').val(data.name);
            $('#id').val(data.id);
        }
    })
}

subject.reset = function () {
    $('#subName').val('');
    $('#error').empty();
}

subject.openModal = function (element) {
    if (element.innerHTML == 'Thêm mới') {
        subject.reset();
        $('#subjectTitle').html("Thêm mới khóa học");
        $('#save-change').html("save");
        $('#save-change').attr("onclick", "subject.create()");
    } else {
        subject.reset();
        $('#subjectTitle').html("Chỉnh sửa khóa học");
        $('#save-change').html("Chỉnh sửa");
        $('#save-change').attr("onclick", "subject.update()");
    }

    $('#addEditSubject').modal('show');
}

subject.deletee = function(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    bootbox.confirm({
        title: "xóa khóa học?",
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
                    url: `http://quanlyhocvien-acb.herokuapp.com/admin/subject/delete/${id}`,
                    method: "DELETE",
                    dataType: "json",
                    success: function () {
                        alertify.success('Xóa thành công');
                        subject.show();
                    }
                })
            }
        }
    })
}

subject.init = function () {
    subject.show();
}

$(document).ready(function () {
    subject.init();
})

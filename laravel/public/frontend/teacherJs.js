var teacher = teacher || {};

teacher.showAll = function () {

    $.ajax({
        url: "http://127.0.0.1:8000/admin/teacher/listgv",
        method: "GET",
        dataType: "json",
        success: function (data) {
            console.log(data)
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
                            <a href="javascript:; type="button" class="btn btn-primary" onclick="teacher.show(${v.id})">
                                <i class="fas fa-external-link-alt" style="color: yellow"></i>
                            </a>
                        </td>
                    </tr>`
                )
            })
        }
    });
}

function show(id) {

    $.ajax({
        url: "http://127.0.0.1:8000/admin/teacher/show/" + id,
        type: "GET",
    }).done(function (data) {
        $("#imageDiv").html("<img src=/storage/images/" + data['image'] + " style=width:250px>");
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

teacher.uploadAvatar = function (element) {
    let img = element.files[0];
    let reader = new FileReader();
    reader.onloadend = function () {
        $("#avatar").attr("src", reader.result);
        $("#avatar").css("display", "block");
    }
    reader.readAsDataURL(img);
}

teacher.save = function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "http://127.0.0.1:8000/admin/teacher/create",
        type: "POST",
        data: new FormData($('#form_input')[0]),
        _token: '{{ csrf_token() }}',
        contentType: false,
        processData: false,
    }).done(function (data) {
        $("#addProduct").modal('hide');
        $("#loadtable").load(" #loadtable");
        alertify.success('Thêm thành công');
    });
}

function deletee(id) {
    $.ajax({
        url: "http://127.0.0.1:8000/admin/teacher/delete/" + id,
        type: "GET",
    }).done(function () {
        $("#loadtable").load(" #loadtable");
        alertify.success('Xóa thành công');
    });
}



function updateModelProduct(data) {
    let product = data.closest('tr').children;
    console.log(product);
    $('#name').val(product[1].innerText);
    $('#price').val(product[3].innerText);
    $('#information').val(product[4].innerText);
    $('#file').val(product[2].innerText);
    $('#idCustomer').val(data.closest('tr').dataset.id);
}

teacher.init = function () {
    teacher.showAll();
}

$(document).ready(function () {
    teacher.init();
});

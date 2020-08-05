@extends('admin.layouts.index')
@section('content')


    <section id="container">
        <!--header start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh sách giáo viên
                        </div>
                        <div class="row w3-res-tb">
                            <div class="col-sm-5 m-b-xs">
                                <select class="input-sm form-control w-sm inline v-middle">
                                    <option value="0">Bulk action</option>
                                    <option value="1">Delete selected</option>
                                    <option value="2">Bulk edit</option>
                                    <option value="3">Export</option>
                                </select>
                                <button class="btn btn-sm btn-default">Apply</button>
                            </div>

                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" class="input-sm form-control" placeholder="Search">
                                    <!-- Button trigger modal -->

                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct">
                                    Thêm mới
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive" id="loadtable">
                            <table class="table table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Hình Ảnh</th>
                                        <th>Giới tính</th>
                                        <th>Lớp</th>
                                        <th>Số điện thoại</th>
                                        <th>Thay đổi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($teachers as $key => $val)
                                        <tr class="d-flex align-items-center">
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $val['fullName'] }}</td>
                                            <td><img src="/storage/images/{{ $val['image'] }}" alt="image" id="imageProduct"
                                                    style="height:100px; width:100px">
                                            </td>
                                            @if ($val['gender'] == 1)
                                                <td>Nam</td>
                                            @else
                                                <td>Nữ</td>
                                            @endif
                                            <td>{{ $val['address'] }}</td>
                                            <td>{{ $val['phone'] }}</td>

                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#editProduct" onclick="updateModelProduct(this)">
                                                    <i class="fas fa-pencil-alt" style="color: green"></i>
                                                </button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="deleteProduct({{ $val['id'] }})">
                                                    <i class="fa fa-times text-danger text"></i>
                                                </button>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#detailProduct" onclick="show({{ $val['id'] }})">
                                                    <i class="fas fa-external-link-alt" style="color: yellow"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="text-center">Không có danh sách giáo viên</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>


                        <!-- addModal -->
                        <div class="container">
                            <div class="modal fade" id="addProduct" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Thêm mới giáo viên</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form enctype="multipart/form-data" id="form_input">
                                                <div class="form-row">
                                                    <div class="form-group col-md-5">
                                                        {{-- <div class="form-group">
                                                            <label for="inputFile">File ảnh</label>
                                                            <img src="/storage/images/unnamed.jpg" alt="" id="avatar"
                                                                style="height:200px; width:90%">
                                                            <input type="file" class="form-control-file" id="inputFile"
                                                                name="inputFile" onchange="uploadAvatar(this)">
                                                        </div> --}}
                                                        <div class="row form-group divUpload">
                                                            <span>Ảnh đại diện</span>
                                                            <label for="file-upload" class="custom-file-upload">
                                                                <img src="/storage/images/unnamed.jpg" alt="" id="blah"
                                                                style="width:200px; height:200px">
                                                            </label>
                                                            <input id="file-upload" type="file" onchange="readURL(this)" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="nation">Quốc tịch</label>
                                                            <input type="text" class="form-control" id="nation"
                                                                name="nation">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone">Số điện thoại</label>
                                                            <input type="number" class="form-control" id="phone"
                                                                name="phone">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-7">

                                                        <div class="form-group">
                                                            <label for="name">Tên</label>
                                                            <input type="text" class="form-control" id="name" name="name">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="specialize">Chuyên môn</label>
                                                            <input type="text" class="form-control" id="specialize"
                                                                name="specialize">
                                                        </div>
                                                        <div class="form-row form-group">
                                                            <div class="col-md-7">
                                                                <label for="dateOfBirth">Ngày sinh</label>
                                                                <input type="date" class="form-control" id="inputName"
                                                                    name="dateOfBirth">
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label for="">Giới tính</label>
                                                                <select class="custom-select form-control" name="gender">
                                                                    <option value="0">Nữ</option>
                                                                    <option value="1">Nam</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <p> Thông tin liên hệ</p>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="faName">Tên</label>
                                                                    <input type="text" class="form-control" id="faName"
                                                                        name="faName">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="faPhone">Số điện thoại</label>
                                                                    <input type="number" class="form-control" id="faPhone"
                                                                        name="faPhone">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="moName">Tên</label>
                                                                    <input type="email" class="form-control" id="moName"
                                                                        name="moName">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="moPhone">Số điện thoại</label>
                                                                    <input type="number" class="form-control" id="moPhone"
                                                                        name="moPhone">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address">Địa chỉ</label>
                                                            <textarea class="form-control" id="address" name="address"
                                                                rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"
                                                onclick="addProduct()">Thêm</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-sm-7 text-right text-center-xs">
                                    {{ $teachers->links() }}
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </section>
        </section>

        <!-- editModel -->
        {{-- <div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Sửa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" id="editForm_input">
                            <div class="form-layout">
                                <div class="div-left">
                                    <div class="form-group">
                                        <label for="editFile">File ảnh</label>
                                        <input type="file" class="form-control-file" id="editFile" name="editFile">
                                    </div>
                                    <div class="form-group">
                                        <label for="editDOB">Ngày sinh</label>
                                        <input type="date" class="form-control" id="editDOB" name="editDOB">
                                    </div>
                                    <label for="">Giới tính</label>
                                    <select class="custom-select" name="editGender">
                                        <option value="0">Nữ</option>
                                        <option value="1">Nam</option>
                                    </select>
                                    <div class="form-group">
                                        <label for="editNation">Quốc tịch</label>
                                        <input type="text" class="form-control" id="editNation" name="editNation">
                                    </div>
                                    <div class="form-group">
                                        <label for="editPhone">Số điện thoại</label>
                                        <input type="number" class="form-control" id="editPhone" name="editPhone">
                                    </div>
                                    <div class="form-group">
                                        <label for="editEmail">Email</label>
                                        <input type="email" class="form-control" id="editEmail" name="editEmail">
                                    </div>
                                </div>

                                <div class="div-right">

                                    <div class="form-group">
                                        <label for="editName">Tên</label>
                                        <input type="text" class="form-control" id="editName" name="editName">
                                    </div>
                                    <div class="form-group">
                                        <label for="editSpecialize">Chuyên môn</label>
                                        <input type="text" class="form-control" id="editSpecialize" name="editSpecialize">
                                    </div>
                                    <fieldset>
                                        <legend><small>Thông tin liên hệ</small></legend>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="editFaName">Tên</label>
                                                <input type="text" class="form-control" id="editFaName" name="editFaName">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="editFaPhone">Số điện thoại</label>
                                                <input type="number" class="form-control" id="editFaPhone"
                                                    name="editFaPhone">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="editMoName">Tên</label>
                                                <input type="email" class="form-control" id="editMoName" name="editMoName">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="editMoPhone">Số điện thoại</label>
                                                <input type="number" class="form-control" id="editMoPhone"
                                                    name="editMoPhone">
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="form-group">
                                        <label for="editAddress">Địa chỉ</label>
                                        <textarea class="form-control" id="editAddress" name="editAddress"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col"> <button type="button" class="btn btn-primary"
                                        onclick="addProduct()">Thêm</button></div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- modal-show --}}
        <div class="modal fade" id="detailProduct" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Thông tin giáo viên</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body d-flex">
                        <div class="div-flex">
                            <div class="colImage">
                                <span id="imageDiv"> </span>
                            </div>
                            <div class="colContent">
                                <p id="nameDiv">Họ và tên:</p>
                                <p id="DateOBDiv"></p>
                                <p id="genderDiv"></p>
                                <p id="phoneDiv"></p>
                                <p id="nationDiv"></p>
                                <p id="specializeDiv"></p>
                                <p id="addressDiv"></p>
                                <p id="emailDiv"></p>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--main content end-->
    </section>

    <script>
        function addProduct(data) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('teacher.create') }}",
                type: "POST",
                data: new FormData($('#form_input')[0]),
                _token: '{{ csrf_token() }}',
                contentType: false,
                processData: false,
            }).done(function(data) {
                $("#addProduct").modal('hide');
                $("#loadtable").load(" #loadtable");
                alertify.success('Thêm thành công');
            });
        }

        function deleteProduct(id) {
            $.ajax({
                url: "http://127.0.0.1:8000/admin/teacher/delete/" + id,
                type: "GET",
            }).done(function() {
                $("#loadtable").load(" #loadtable");
                alertify.success('Xóa thành công');
            });
        }

        function show(id) {

            $.ajax({
                url: "http://127.0.0.1:8000/admin/teacher/show/" + id,
                type: "GET",
            }).done(function(data) {
                console.log(data);
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

        function updateModelProduct(data) {
            let product = data.closest('tr').children;
            console.log(product);
            $('#name').val(product[1].innerText);
            $('#price').val(product[3].innerText);
            $('#information').val(product[4].innerText);
            $('#file').val(product[2].innerText);
            $('#idCustomer').val(data.closest('tr').dataset.id);
        }

    </script>
@endsection

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
                            <table class="table table-striped b-t b-light">
                                <thead>
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
                                                    data-target="#detailProduct">
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
                                <div class="modal-dialog">
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
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-group">
                                                            <label for="inputFile">File ảnh</label>
                                                            <input type="file" class="form-control-file" id="inputFile"
                                                                name="inputFile">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dateOfBirth">Ngày sinh</label>
                                                            <input type="date" class="form-control" id="inputName"
                                                                name="dateOfBirth">
                                                        </div>
                                                        <label for="Giới tính"></label>
                                                        <select class="custom-select" name="gender">
                                                            <option value="0">Nữ</option>
                                                            <option value="1">Nam</option>
                                                        </select>
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

                                                    <div class="col-md-4 mb-3">

                                                        <div class="form-group">
                                                            <label for="name">Tên</label>
                                                            <input type="text" class="form-control" id="name" name="name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="specialize">Chuyên môn</label>
                                                            <input type="text" class="form-control" id="specialize"
                                                                name="specialize">
                                                        </div>
                                                        <fieldset>
                                                            <legend>Thông tin liên hệ</legend>
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
                                                        </fieldset>

                                                        <div class="form-group">
                                                            <label for="address">Địa chỉ</label>
                                                            <textarea class="form-control" id="address" name="address"
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
        {{-- <div class="modal fade" id="editProduct" tabindex="-1" role="dialog"
            aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Thêm sản phẩm mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="price">Giá sản phẩm</label>
                                <input type="number" class="form-control" id="price" name="price">
                            </div>
                            <div class="form-group">
                                <label for="information">Thông tin sản phẩm</label>
                                <textarea class="form-control" id="information" name="information" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="fileName">Tên file ảnh</label>
                                {{-- <input type="text" class="form-control" id="fileName"
                                                name="inputFileName" placeholder="input filename"> --}}
                                            {{-- <input type="file" class="form-control-file" id="file" name="inputFile">
                                        </div>
                                        <input type="hidden" name="" id="idCustomer">
                                        <button type="button" class="btn btn-primary" onclick="editProduct()">Thêm</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}


                <div class="modal fade" id="detailProduct" tabindex="-1" role="dialog"
                aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Thông tin giáo viên</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex flex-row bd-highlight mb-3">
                                <div class="p-4 bd-highlight">Flex item 1</div>
                                <div class="p-8 bd-highlight">Flex item 2</div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

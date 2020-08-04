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


                        <!-- addModal -->
                        <div class="container-form">
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
                                            <form>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="file">Ảnh</label>
                                                        <input type="file" class="form-control" id="file" name="file"
                                                            required>
                                                        <span style="width:100px; height:100px">

                                                        </span>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <label for="name">Họ và tên</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="dateOfBirth">Ngày sinh</label>
                                                        <input type="date" class="form-control" id="dateOfBirth"
                                                            name="dateOfBirth" required>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <label for="validationDefault02">Chuyên môn</label>
                                                        <input type="text" class="form-control" id="validationDefault02"
                                                            value="Otto" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Giới tính</label>
                                                        <select class="custom-select">
                                                            <option value="0">Nữ</option>
                                                            <option value="1">Nam</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <label for="validationDefault04">Thông tin liên hệ</label>
                                                        <select class="custom-select" id="validationDefault04" required>
                                                            <option value="0">Nữ</option>
                                                            <option value="1">Nam</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="dateOfBirth">Quốc tịch</label>
                                                        <input type="date" class="form-control" id="dateOfBirth"
                                                            name="dateOfBirth" required>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <label for="validationDefault02">Thông tin liên hệ</label>
                                                        <input type="text" class="form-control" id="validationDefault02"
                                                            value="Otto" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="dateOfBirth">Số điện thoại:</label>
                                                        <input type="date" class="form-control" id="dateOfBirth"
                                                            name="dateOfBirth" required>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <label for="validationDefault02">Last name:</label>
                                                        <input type="text" class="form-control" id="validationDefault02"
                                                            value="Otto" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="dateOfBirth">Email:</label>
                                                        <input type="date" class="form-control" id="dateOfBirth"
                                                            name="dateOfBirth" required>
                                                    </div>
                                                    <div class="col-md-8 mb-3">
                                                        <label for="validationDefault02">Last name</label>
                                                        <input type="text" class="form-control" id="validationDefault02"
                                                            value="Otto" required>
                                                    </div>
                                                </div>
                                                {{-- <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationDefault03">City</label>
                                                        <input type="text" class="form-control" id="validationDefault03"
                                                            required>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="validationDefault04">State</label>
                                                        <select class="custom-select" id="validationDefault04" required>
                                                            <option selected disabled value="">Choose...</option>
                                                            <option>...</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="validationDefault05">Zip</label>
                                                        <input type="text" class="form-control" id="validationDefault05"
                                                            required>
                                                    </div>
                                                </div> --}}

                                                <button class="btn btn-primary" type="submit">Submit form</button>
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

                                <div class="col-sm-5 text-center">
                                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                                </div>
                                <div class="col-sm-7 text-right text-center-xs">
                                    <ul class="pagination pagination-sm m-t-none m-b-none">
                                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                                        <li><a href="">1</a></li>
                                        <li><a href="">2</a></li>
                                        <li><a href="">3</a></li>
                                        <li><a href="">4</a></li>
                                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </section>
        </section>

    </section>

@endsection

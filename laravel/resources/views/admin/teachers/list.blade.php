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
                            <div class="col-sm-3">
                                <a type="button" class="btn btn-primary" onclick="teacher.openModal()">
                                    Thêm mới
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive" id="loadtable">
                            <table class="table table-striped table-hover" id="tbTeacher">
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

                                </tbody>
                            </table>
                        </div>


                        <!-- addModal -->

                        <div class="modal fade" id="addEditTeacher" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới giáo viên</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="modalBody">
                                        <form enctype="multipart/form-data" id="frAddEditTeacher">
                                            @csrf
                                            <div class="form-row">
                                                <input hidden name="teacherId" id="teacherId" value="0">
                                                <div class="form-group col-md-5">

                                                    <div class="row form-group divUpload">
                                                        <label for="file-upload" class="custom-file-upload">
                                                            <img src="/storage/images/unnamed.jpg" alt="your image" id="avatar"
                                                                style="width:200px; height:200px">
                                                        </label>
                                                        <input id="file-upload" type="file"
                                                            onchange="teacher.uploadAvatar(this)" name="inputFile" accept="image/*"/>
                                                    </div>
                                                    <div>
                                                        <p class="text-center mt-3"> Thông tin liên hệ người thân</p>

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
                                                        <label for="nation">Quốc tịch</label>
                                                        <input type="text" class="form-control" id="nation" name="nation">
                                                        @error('nation')
                                                        <p style="color: red">{{$message}}</p>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="form-group col-md-7">

                                                    <div class="form-group">
                                                        <label for="name">Tên</label>
                                                        <input type="text" class="form-control" id="fullName" name="fullName">
                                                        @error('fullName')
                                                        <p style="color: red">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Số điện thoại</label>
                                                        <input type="number" class="form-control" id="phone" name="phone">
                                                        @error('phone')
                                                        <p style="color: red">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email">
                                                        @error('email')
                                                        <p style="color: red">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="specialize">Chuyên môn</label>
                                                        <input type="text" class="form-control" id="specialize"
                                                            name="specialize">
                                                            @error('specialize')
                                                            <p style="color: red">{{$message}}</p>
                                                            @enderror
                                                    </div>
                                                    <div class="form-row form-group">
                                                        <div class="col-md-7">
                                                            <label for="dateOfBirth">Ngày sinh</label>
                                                            <input type="date" class="form-control" id="dateOfBirth"
                                                                name="dateOfBirth">
                                                                @error('dateOfBirth')
                                                            <p style="color: red">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="">Giới tính</label>
                                                            <select class="custom-select form-control" name="gender"
                                                                id="gender">
                                                                <option value="0">Nữ</option>
                                                                <option value="1">Nam</option>
                                                            </select>
                                                            @error('gender')
                                                            <p style="color: red">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="address">Địa chỉ</label>
                                                        <textarea class="form-control" id="address" name="address"
                                                            rows="3"></textarea>
                                                            @error('address')
                                                            <p style="color: red">{{$message}}</p>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="javascript:;" type="button" class="btn btn-success"
                                            onclick="teacher.save()">Save</a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-sm-7 text-right text-center-xs">
                                    {{-- {{ $teachers->links() }}
                                    --}}
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </section>
        </section>


        {{-- modal-show --}}
        <div class="modal fade" id="detailteacher" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Thông tin giáo viên</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-5">
                                <div id="imageDiv"></div>
                            </div>
                            <div class="col-md-7">
                                <p id="nameDiv"></p>
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
                            <button type="button" class="btn btn-secondary" onclick="teacher.resetShow()">Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--main content end-->
    </section>


@endsection

@extends('admin.layouts.index')
@section('title', 'Danh sách giáo viên')
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
                                <a type="button" class="btn btn-primary" onclick="teacher.openModal(this)">Thêm mới</a>
                            </div>
                        </div>
                        <div class="table-responsive" id="loadtable">
                            <table class="table table-striped table-hover" id="tbTeacher">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Tên</th>
                                        <th class="text-center">Hình Ảnh</th>
                                        <th class="text-center">Giới tính</th>
                                        <th class="text-center">Lớp</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center">Thay đổi</th>
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
                                        <h5 class="modal-title" id="teacherTitle">Thêm mới giáo viên</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="modalBody">
                                        <form enctype="multipart/form-data" id="frAddEditTeacher">
                                            @csrf
                                            <div class="form-row">
                                                <input hidden name="id" id="id" value="0">
                                                <div class="form-group col-md-5">
                                                    <div class="row form-group divUpload">
                                                        <label for="file-upload" class="custom-file-upload">
                                                            <img src="/storage/images/unnamed.jpg" alt="ảnh" id="avatar"
                                                                style="width:200px; height:200px">
                                                        </label>
                                                        <input type="text" name="image64" hidden id="image64">
                                                        <input id="file-upload" type="file"
                                                            onchange="teacher.uploadAvatar(this)" name="inputFile"
                                                            accept="image/*" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nation">Quốc tịch</label>
                                                        <input type="text" class="form-control" id="nation" name="nation">
                                                        <div id="errorNation" style="color: red; font-size: 12px"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="specialize">Chuyên môn</label>
                                                        <input type="text" class="form-control" id="specialize"
                                                            name="specialize">
                                                        <div id="errorSpecialize" style="color: red; font-size: 12px"></div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <div class="form-group-prepend">
                                                            <label class="form-group-text" for="classe">Lớp học</label>
                                                        </div>
                                                        <select class="custom-select form-control" id="classe"
                                                            name="classe">
                                                            @forelse ($classe as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @empty
                                                                <p>Chưa có lớp học nào</p>
                                                            @endforelse
                                                        </select>
                                                        <div id="errorClasse" style="color: red; font-size: 12px"></div>
                                                    </div>
                                                    <div class="form-group mb-3" id="divAction">
                                                        <div class="form-group-prepend">
                                                            <label class="form-group-text" for="classe">Trạng thái</label>
                                                        </div>
                                                        <select class="custom-select form-control" id="action"
                                                            name="action">
                                                            <option value="0">Đã nghỉ</option>
                                                            <option value="1">Còn làm</option>
                                                        </select>
                                                        <div id="errorAction" style="color: red; font-size: 12px"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-7">
                                                    <div class="form-group">
                                                        <label for="name">Tên</label>
                                                        <input type="text" class="form-control" id="fullName"
                                                            name="fullName">
                                                        <div id="errorFullName" style="color: red; font-size: 12px"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Số điện thoại</label>
                                                        <input type="number" class="form-control" id="phone" name="phone">
                                                        <div id="errorPhone" style="color: red; font-size: 12px"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email">
                                                        <div id="errorEmail" style="color: red; font-size: 12px"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="salary">Lương</label>
                                                        <input type="number" class="form-control" id="salary"
                                                            name="salary">
                                                        <div id="errorSalary" style="color: red; font-size: 12px"></div>
                                                    </div>
                                                    <div class="form-row form-group">
                                                        <div class="col-md-7">
                                                            <label for="dateOfBirth">Ngày sinh</label>
                                                            <input type="date" class="form-control" id="dateOfBirth"
                                                                name="dateOfBirth">
                                                            <div id="errorDateOfBirth" style="color: red; font-size: 12px">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="">Giới tính</label>
                                                            <select class="custom-select form-control" name="gender"
                                                                id="gender">
                                                                <option value="0">Nữ</option>
                                                                <option value="1">Nam</option>
                                                            </select>
                                                            <div id="errorGender" style="color: red; font-size: 12px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address" class="mt-2">Địa chỉ</label>
                                                        <textarea class="form-control" id="address" name="address"
                                                            rows="3"></textarea>
                                                        <div id="errorAddress" style="color: red; font-size: 12px"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="javascript:;" type="button" class="btn btn-success" id="save-change"
                                            onclick="teacher.save()">Save</a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>
@endsection

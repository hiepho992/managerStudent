@extends('admin.layouts.index')
@section('title', 'Danh sách lớp học')
@section('content')


    <section id="container">
        <!--header start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh sách lớp học
                        </div>
                        <div class="row w3-res-tb">
                            <div class="col-sm-3">
                                <a type="button" class="btn btn-primary" onclick="classe.openModal(this)">Thêm mới</a>
                            </div>
                        </div>
                        <div class="table-responsive" id="loadtable">
                            <table class="table table-striped table-hover" id="tbClasse">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Tên lớp</th>
                                        <th class="text-center">Ngày bắt đầu</th>
                                        <th class="text-center">Ngày kết thúc</th>
                                        <th class="text-center">Khóa học</th>
                                        <th class="text-center">Thay đổi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>


                        <!-- addModal -->

                        <div class="modal fade" id="addEditClasse" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="classTitle">Thêm mới khóa học</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="frAddEditClass">
                                            @csrf
                                            <input hidden name="id" id="id">
                                            <div class="form-group">
                                                <label for="name">Tên</label>
                                                <input type="text" class="form-control" id="name" name="name">
                                                <div id="errorName" style="color: red; font-size: 12px"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="date_start">Ngày bắt đầu</label>
                                                <input type="date" class="form-control" id="date_start" name="date_start">
                                                <div id="errorDate" style="color: red; font-size: 12px"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="date_end">Ngày kết thúc </label>
                                                <input type="date" class="form-control" id="date_end" name="date_end">
                                                <div id="errorDateEnd" style="color: red; font-size: 12px"></div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="subject">Khóa học</label>
                                                </div>
                                                <select class="custom-select" id="subject" name="subject">
                                                    @forelse ($subject as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @empty
                                                        <p>Chưa có khóa học nào</p>
                                                    @endforelse
                                                </select>
                                                <div id="errorSubject" style="color: red; font-size: 12px"></div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="javascript:;" type="button" class="btn btn-success" id="save-change"
                                            onclick="classe.create()">Save</a>
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

        <!-- The Modal -->
        <div class="modal" id="showStudent">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Danh sách học viên</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <table class="table table-striped table-hover" id="showStudent">
                            <thead>
                                <th class="text-center">STT</th>
                                <th class="text-center" style="width: 200px;">Họ và tên</th>
                                <th class="text-justify">Ảnh</th>
                                <th class="text-justify">Giới tính</th>
                                <th class="text-justify">Tình trạng</th>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection

@extends('admin.layouts.index')
@section('title', 'Danh sách Khóa học')
@section('content')
    <section id="container">
        <!--header start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh sách khóa học
                        </div>
                        <div class="row w3-res-tb">
                            <div class="col-sm-3">
                                <a type="button" class="btn btn-primary" onclick="subject.openModal(this)">Thêm mới</a>
                            </div>
                        </div>
                        <div class="table-responsive" id="loadtable">
                            <table class="table table-striped table-hover" id="tbSubject">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên khóa học</th>
                                        <th>Thay đổi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>


                        <!-- addModal -->
                        <div class="modal fade" id="addEditSubject" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="subjectTitle">Thêm mới khóa học</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form  id="frAddEditSubject">
                                            @csrf
                                            <input hidden name="id" id="id">
                                                <div class="form-group">
                                                    <label for="subName">Tên</label>
                                                    <input type="text" class="subName" id="subName"
                                                        name="subName">
                                                    <div id="error" style="color: red; font-size: 12px"></div>
                                                </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="javascript:;" type="button" class="btn btn-success" id="save-change" onclick="subject.create()">
                                            Save
                                        </a>
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
        <!--main content end-->
    </section>
@endsection

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
                                        <th>Giá bán</th>
                                        <th>Thông tin sản phẩm</th>
                                        <th>Thay đổi</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>


                        <!-- addModal -->
                        <div class="modal fade" id="addProduct" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm mới</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" id="form_input">
                                            <div class="form-group">
                                                <label for="inputTitle">Product name</label>
                                                <input type="text" class="form-control" id="inputName" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPrice">Product price</label>
                                                <input type="number" class="form-control" id="inputPrice" name="price">

                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent">Product information</label>
                                                <textarea class="form-control" id="inputContent" name="information" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputFile">File Name</label>
                                                {{-- <input type="text" class="form-control" id="inputFileName"
                                                    name="inputFileName" placeholder="input filename"> --}}
                                                <input type="file" class="form-control-file" id="inputFile"
                                                    name="inputFile">
                                            </div>
                                            <button type="button" class="btn btn-primary"
                                                onclick="addProduct()">Thêm</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

        <!--main content end-->
    </section>

@endsection

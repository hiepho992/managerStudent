@extends('admin.layouts.index')
@section('content')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- //market-->
            <div class="market-updates">
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-2">
                        <div class="col-md-8 market-update-left">
                            <h4>Số lượng khóa học</h4>
                            <h3>{{ $subjectCount }}</h3>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-1">
                        <div class="col-md-8 market-update-left">
                            <h4>Số lượng lớp học</h4>
                            <h3>{{ $classeCount }}</h3>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-3">
                        <div class="col-md-8 market-update-left">
                            <h4>Số lượng giáo viên</h4>
                            <h3>{{ $countTeacher }}</h3>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-4">
                        <div class="col-md-8 market-update-left">
                            <h4>Số lượng học sinh</h4>
                            <h3>{{ $studentCount }}</h3>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <!-- //market-->
        </section>
    @endsection

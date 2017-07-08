@extends('Home.Layouts.master')
@section('content')
    <!-- Page content -->
    <div id="page-content">
        <!-- Validation Header -->
        <div class="content-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="header-section">
                        <h1>Form Validation</h1>
                    </div>
                </div>
                <div class="col-sm-6 hidden-xs">
                    <div class="header-section">
                        <ul class="breadcrumb breadcrumb-top">
                            <li>菜单管理</li>
                            <li>添加菜单</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- END Validation Header -->

        <!-- Form Validation Content -->
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                <!-- Form Validation Block -->
                <div class="block">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Form Validation Title -->
                    <div class="block-title">
                        <h2>添加菜单</h2>
                    </div>
                    <!-- END Form Validation Title -->

                    <!-- Form Validation Form -->
                    <form id="form-validation" action="{{asset('menu/add')}}" method="post" class="form-horizontal form-bordered">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="val-username">名称 <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="val-username" name="name" class="form-control" placeholder="名称" value="">
                            </div>
                        </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="example-chosen">分类</label>
                                <div class="col-md-5">
                                    <select id="example-chosen" name="parent_id" class="select-chosen" data-placeholder="选择菜单" style="width: 250px;">
                                        <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                        @foreach ($menus as $menu)
                                            <option value="{{$menu->id}}">
                                                {{$menu->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="val-email">标识 <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="val-email" name="mark" class="form-control" placeholder="链接地址标识" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="val-password">缩略图 <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                    <span class="btn btn-primary" id="myId">上传</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="val-confirm-password">链接地址 <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="url" class="form-control" placeholder="链接地址" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="val-suggestions">描述 <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <textarea id="val-suggestions" name="des" rows="7" class="form-control" placeholder="描述"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><a href="#modal-terms" data-toggle="modal">状态</a> <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <label class="switch switch-primary" for="val-terms">
                                    <input type="checkbox" checked="checked" id="val-terms" name="status" value="1">
                                    <span data-toggle="tooltip" title="开启"></span>
                                </label>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <div class="form-group form-actions">
                            <div class="col-md-8 col-md-offset-3">
                                <button type="submit" class="btn btn-effect-ripple btn-primary">提交</button>
                                <button type="reset" class="btn btn-effect-ripple btn-danger">返回</button>
                            </div>
                        </div>
                    </form>
                    <!-- END Form Validation Form -->
                    {{--<form action="{{asset('file/upload')}}"
                          class="dropzone"
                          id="my-awesome-dropzone"></form>--}}
                </div>
                <!-- END Form Validation Block -->
            </div>
        </div>
        <!-- END Form Validation Content -->
    </div>
    <!-- END Page Content -->

@endsection
@section('footer')
    @parent
    <script src="{{asset('js/vendor/dropzone.js')}}"></script>
    <script src="{{asset('js/vendor/chosen.js')}}"></script>
    <script>
        $("#myId").dropzone({ url: "http://localhost/laravelcms/public/file/upload" });
        // Initialize Chosen
        $('.select-chosen').chosen({width: "100%"});

    </script>
    @endsection

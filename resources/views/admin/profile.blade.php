@extends('admin.layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
@endsection
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="btn-close btn-close-white" data-dismiss="alert" aria-label="Close">×</button>
            {{ session('status') }}
        </div>
    @elseif(session('failed'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="btn-close btn-close-white" aria-label="Close">×</button>
            {{ session('failed') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- row -->
    <div class="row row-sm">


        <!-- Col -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 main-content-label">معلومات المشرف</div>
                    <form class="form-horizontal" action="{{ route('admin.update.profile') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf



                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> الاسم</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name"placeholder=" الاسم"
                                        value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> كلمة السر</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password" placeholder="كلمة السر">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> تاكيد كلمة السر</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder=" تاكيد كلمة السر">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 main-content-label">البيانات الشخصيه </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">الايميل<i></i></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="email" placeholder="الايميل"
                                        value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                        </div>

           
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">الصوره </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control " name="image">
                                </div>
                            </div>
                        </div>




                        <div class="card-footer text-left">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">حفظ البيانات </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Col -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection

@extends('admin.layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">

@section('title')
Edit Setting
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('lang.edit')}} </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> / {{ trans('lang.products')}}
                </span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<div class="card">
    <div class="card-body">
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

            <div class="pull-right">
            </div>

            <br>
            <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
               action="{{route('setting.update',$setting->id)}}"  method="post">
               @csrf
               {{ method_field('PUT') }}

                    <div class="parsley-input col-md-6" id="fnWrapper">
                        <label>phone</label>

                        <input class="form-control"
                        data-parsley-class-handler="#lnWrapper" name="phone" type="text" placeholder="phone"
                        value="{{$setting->phone}}">
                    </div>
                    <div class="parsley-input col-md-6" id="fnWrapper">
                        <label>address</label>

                        <input class="form-control"
                        data-parsley-class-handler="#lnWrapper" name="address" type="text" placeholder="address"
                        value="{{$setting->address}}">
                    </div>
                    <div class="parsley-input col-md-6" id="fnWrapper">
                        <label>Tw_link</label>

                        <input class="form-control"
                        data-parsley-class-handler="#lnWrapper" name="tw_link" type="text" placeholder="tw_link"
                        value="{{$setting->tw_link}}">
                    </div>
                    <br>

                    <div class="parsley-input col-md-6" id="fnWrapper">
                        <label>skype_link</label>

                        <input class="form-control"
                        data-parsley-class-handler="#lnWrapper" name="skype_link" type="text" placeholder="skype_link"
                        value="{{$setting->skype_link}}">
                    </div>
                    <br>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">

                    <label>Fb_link</label>
                        <input class="form-control"
                        data-parsley-class-handler="#lnWrapper" name="fb_link" type="text" placeholder="Fb_link"
                        value="{{$setting->fb_link}}">
                    </div>

                    <br>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label>whatsapp_link</label>

                        <input class="form-control"
                        data-parsley-class-handler="#lnWrapper" name="whatsapp_link" type="text" placeholder="whatsapp"
                        value="{{$setting->whatsapp_link}}">

                    </div>
                    <br>


                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label>Inst_link</label>

                        <input class="form-control"
                        data-parsley-class-handler="#lnWrapper" name="inst_link" type="text" placeholder="inst_link"
                        value="{{$setting->inst_link}}">
                    </div>
                    <br>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label>linkedin_link</label>

                        <input class="form-control"
                        data-parsley-class-handler="#lnWrapper" name="linkedin_link" type="text" placeholder="inst_link"
                        value="{{$setting->linkedin_link}}">
                    </div>
                    <br>

                    <br>


                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label>About us</label>
                        <textarea  rows="8" cols="60" class="form-control" data-parsley-class-handler="#lnWrapper"
                        name="about_us"  placeholder="About Us" >{{$setting->about_us}}</textarea>

                    </div>
                    <br>


                <div class="text-center">
                    <button class="btn btn-main-primary pd-x-20" type="submit">save</button>
                </div>

            </form>

    </div>

</div>



<!-- main-content closed -->
@endsection
@push('script')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<!--Internal  Form-elements js-->
<script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!--Internal Sumoselect js-->
<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
<!-- Internal TelephoneInput js-->
<script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>



@endpush

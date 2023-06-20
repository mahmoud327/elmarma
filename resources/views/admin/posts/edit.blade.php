@extends('admin.layouts.master')
@section('css')
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @if (App::getLocale() == 'en')
        <!--Internal  treeview -->
        <link href="{{ URL::asset('assets/plugins/treeview/treeview.css') }}" rel="stylesheet" type="text/css" />
    @else
        <!--Internal  treeview -->
        <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
    @endif
    <style>
        .SumoSelect>.CaptionCont {
            width: 60%;

        }

        .dropzone.dz-clickable {
            border: none;
        }

        .dropzone .dz-preview:not(.dz-processing) .dz-progress {
            display: none;
        }

        .dropzone .dz-preview .dz-details .dz-filename:not(:hover) span {
            display: none;
        }

        .dropzone .dz-preview .dz-details .dz-filename span,
        .dropzone .dz-preview .dz-details .dz-size span {
            display: none;

        }

        .SumoSelect>.optWrapper.multiple>.options li.opt span i,
        .SumoSelect .select-all>span i {
            position: absolute;
            margin: auto;
            top: 0;
            bottom: 0;
            width: 14px;
            height: 14px;
            border: 1px solid #e1e6f1;
            border-radius: 2px;
            background-color: #fff;
        }

        .SumoSelect>.optWrapper>.options li.opt label,
        .SumoSelect>.CaptionCont,
        .SumoSelect .select-all>label {
            padding-left: 40px;
        }


        .SumoSelect>.CaptionCont>span {
            color: #000
        }

        .SumoSelect.open>.optWrapper {
            width: 550px;
        }
    </style>



@section('title')
    Add news
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">@lang('lang.news')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
                /
            </span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('news.update', $new->id) }}" enctype="multipart/form-data" method="post">
                    @method('put')
                    @csrf
                    <div id="wizard1">
                        <section>
                            <div class="control-group form-group">
                                <label class="form-label">@lang('lang.title arabic')</label>
                                <input type="text" class="form-control required" name="ar[title]"
                                    value="{{ optional($new->translate('ar'))->title }}"required placeholder="Name">
                            </div>
                            <div class="control-group form-group">
                                <label class="form-label">@lang('lang.title English')</label>
                                <input type="text" class="form-control required" name="en[title]"placeholder="text "
                                    value="{{ optional($new->translate('en'))->title }}" required>
                            </div>

                            <div class="control-group form-group">
                                <label class="form-label">@lang('lang.select category')</label>
                                <select class="form-control" name="category_id" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($category->id == $new->category_id) selected @endif>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach


                                </select>
                            </div>

                            <div class="control-group form-group mb-0">
                                <label class="form-label">@lang('lang.desc english')</label>
                                <textarea type="text" class="form-control required" name="en[desc]" placeholder=@lang('lang.desc english') required>
                                 {{ $new->translate('en')->desc }}
                                  </textarea>
                            </div>
                            <div class="control-group form-group mb-0">
                                <label class="form-label">@lang('lang.desc arabic')</label>
                                <textarea type="text" class="form-control required" name="ar[desc]"placeholder=@lang('lang.desc arabic') required>
                                    {{ $new->translate('ar')->desc }}

                                  </textarea>
                            </div>
                            <div class="control-group form-group mb-0">
                                <label>@lang('lang.main image')</label>


                                <input type="file" class="form-control required" name="image" placeholder="image">
                            </div>
                            <br>
                            <br>

                            <div class="form-group col-md-7">
                                <h4 class="form-section"><i class="ft-home"></i> @lang('lang.upload image')</h4>

                                <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                    <div class="dz-message"> @lang('lang.upload image') </div>
                                </div>

                            </div>


                            <button type="submit" class="btn btn-info">@lang('lang.save')</button>
                        </section>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /row -->


<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection

@push('script')
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<!-- Internal Select2 js-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!--Internal Fileuploads js-->
<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
<!--Internal Fancy uploader js-->
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
<!--Internal  Form-elements js-->
<script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
<script src="{{ URL::asset('assets/js/select2.js') }}"></script>
<!--Internal Sumoselect js-->
<script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
<!-- Internal TelephoneInput js-->
<script src="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
<script>
    var file_name = '';
    var uploadedDocumentMap = {}
    Dropzone.options.dpzMultipleFiles = {
        paramName: "dzfile", // The name that will be used to transfer the file
        //autoProcessQueue: false,

        // MB
        clickable: true,
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
        dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
        dictCancelUpload: "الغاء الرفع ",
        dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
        dictRemoveFile: "حذف الصوره",

        dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        url: "{{ route('posts.images.store') }}", // Set the url
        success: function(file, response) {
            $('form').append('<input class="images" data-img="' + file.name +
                '"  type="hidden" name="document[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function(file) {

            $('.images').each(function(index) {

                var input = $(this);

                if (input.data('img') == file.name) {
                    file_name = input.val()
                    input.remove();
                }

            });


            var imgSrcValue = $('img[alt="' + file.name + '"]').prop('alt'); //get the src value

            $.ajax({

                url: "{{ URL::to('admin/news/delete/image') }}",
                type: "GET",
                dataType: "json",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: file.id,
                    file_name: file_name,
                }
            });
            var fmock;
            return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement) :
                void 0;
        },
        // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
        init: function(

        ) {

            @foreach ($new->medias()->get() as $file)

                var mock = {
                    name: '{{ $file->url }}',
                    id: '{{ $file->id }}'
                };
                this.emit('addedfile', mock);
                this.options.thumbnail.call(this, mock,
                    '{{ asset('uploads/posts/' . $file->url) }}');
            @endforeach
            this.on('sending', function(file, xhr, formData) {
                formData.append('id', '');
                file.id = '';
            });

            this.on('success', function(file, response) {
                file.id = response.id;
            });

        }

    }
</script>
@endpush

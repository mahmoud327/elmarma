@extends('admin.layouts.master')
@section('title')
    roles
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('lang.dashboard')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('lang.roles')</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
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


    <!-- row -->
    <div class="row">
        <!--div-->



        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    @can('اضافة صلاحية')
                        <a href="{{ route('roles.create') }}" class="modal-effect btn btn-sm btn-primary" style="color:white"><i
                                class="fas fa-plus"></i>&nbsp;@lang('lang.add role')</a>
                    @endcan

                    <br>
                    <br>




                </div>


                <!-- ////////////////////////modela for delete///////////// -->

                <!-- ////////////////////////modela for delete///////////// -->





                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap"
                            data-page-length='50'style="text-align: center">
                            <thead>
                                <tr>
                              
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">@lang('lang.name') </th>

                                    <th class="border-bottom-0">{{ trans('lang.action') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($roles as $role)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>

                                        <td>{{ $i }}</td>
                                        <td>{{ $role->name }} </td>
                                        <td>
                                            @can('عرض صلاحية')
                                                <a class="btn btn-success btn-sm"
                                                    href="{{ route('roles.show', $role->id) }}">عرض</a>
                                            @endcan

                                            @can('تعديل صلاحية')
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('roles.edit', $role->id) }}">تعديل</a>
                                            @endcan

                                            @can('حذف صلاحية')
                                                <a class="modal-effect btn btn-sm btn-danger"
                                                    data-role_id="{{ $role->id }}" data-effect="effect-scale"
                                                    data-toggle="modal" href="#modaldemo9{{ $role->id }}" title="delete"><i
                                                        class="las la-trash"></i></a>
                                            @endcan



                                        </td>
                                        @include('admin.roles.delate_modal', ['role' => $role])



                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>

    <!-- حذف الفاتورة -->


    <!-- ارشيف الفاتورة -->

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>


    {{-- <script>
    $(document).ready(function() {
  $('#search').on('change', function() {
     document.forms[myFormName].submit();
  });
});
</script> --}}

    <script>
        $(function() {
            $("#btn_delete_all").click(function() {
                var selected = new Array();
                $("#example1 input[type=checkbox]:checked").each(function() {
                    selected.push(this.value);

                });
                if (selected.length > 0) {
                    $('#delete_all').modal('show')
                    $('input[id="delete_all_id"]').val(selected);
                }
            });
        });
    </script>


    <script>
        function CheckAll(className, elem) {
            var elements = document.getElementsByClassName(className);
            var l = elements.length;
            if (elem.checked) {
                for (var i = 0; i < l; i++) {
                    elements[i].checked = true;
                }
            } else {
                for (var i = 0; i < l; i++) {
                    elements[i].checked = false;
                }
            }
        }
    </script>


@endsection

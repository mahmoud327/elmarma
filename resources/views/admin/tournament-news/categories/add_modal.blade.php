<div class="modal" id="modaldemo8">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo  mr-5" style="width:100%">
            <div class="modal-header">
                <h6 class="modal-title">Add New catgory</h6><button aria-label="Close" class="close" data-dismiss="modal"
                    type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                          <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="en[title]"  value="{{old('title')}}"  placeholder=" title english ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ar[title]"  value="{{old('title')}}"  placeholder=" title arabic ">
                                </div>



                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">تاكيد</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                </div>
                       </div>

                   </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Basic modal -->


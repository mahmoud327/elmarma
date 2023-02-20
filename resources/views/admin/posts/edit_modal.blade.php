<!-- edit -->
<div class="modal fade" id="exampleModal2{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:130%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form action="{{route('courses.update',$course->id)}}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                          <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title"  value="{{$course->title}}"  placeholder=" title ">
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" name="des"  rows="3" placeholder=" description">{{$course->des}}</textarea>
                                </div>

                                <div class="form-group">
                                    <input type="date" class="form-control" name="start_date"  value="{{$course->start_date}}"  placeholder="start_date">
                                </div>

                                <div class="form-group">
                                    <select class="from-control" name="category_id" >
                                        @foreach ($catgories as $category)
                                            <option value="{{$category->id}}">
                                                {{ $category->title}}
                                            </option>
                                        @endforeach


                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input class="custom-file-input" name="image" type="file" value="{{$course->image}}"> <label class="custom-file-label" for="customFile">Choose image</label>
                                    </div>
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

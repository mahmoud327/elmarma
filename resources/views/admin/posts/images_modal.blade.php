<div class="modal fade" id="images{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                @if ($product->organization()->exists())

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ trans('lang.orgniazation') }}</th>
                                <th scope="col">{{ trans('lang.image') }}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td>1</td>
                                <td>{{$product->organization()->first()->name}}</td>
                                @if($product->organization()->first()->media()->exists())

                                <td><img src="{{$product->organization()->first()->media()->first()->url }}" height="50px" width="50p"></td>
                                @else
                                <td></td>
                                @endif
                             </tr>


                            </tbody>
                        </table>
                    @endif


            </div>


        </div>
    </div>
</div>

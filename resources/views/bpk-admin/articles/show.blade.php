<div class="modal-dialog w-50">
    <div class="modal-content">
        <div class="modal-header py-2 rounded-0 bg-primary text-white">
            <h5 class="modal-title">{{__('View->')}} {{ $article->title }}</h5>
            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">  
            <table class="table table-responsive-sm ">
                <tbody>
                    <tr>
                        <th colspan="2" class="border-0">Article Detail </th>
                    </tr>

                    <tr>
                        <th width="200">Title</th>
                        <td>{{ $article->title }}</td>
                    </tr>

                    <tr>
                        <th>Date Created</th>
                        <td>{{ date_format($article->created_at, 'jS M Y') }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Sub Heading')}}</th>
                        <td> {{ $article->sub_heading }} </td>
                    </tr>

                    <tr>
                        <th>{{__('Short Description')}}</th>
                        <td> {{ $article->short_description }} </td>
                    </tr>

                    <tr>
                        <th>{{__('Meta Key')}}</th>
                        <td>  {{ $article->meta_key }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Meta Description')}}</th>
                        <td>{{ $article->meta_description }}</td>
                    </tr>

                    <tr>
                        <th colspan="2">{{__('Content:')}}</th>
                    </tr>

                    <tr>
                        <td colspan="2">{!! $article->content !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer py-2">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>          
        </div>
    </div>
</div>
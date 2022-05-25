<div class="modal-dialog w-50">
    <div class="modal-content">
        <div class="modal-header py-2 rounded-0 bg-primary text-white">
            <h5 class="modal-title">{{__('View ')}} {{ $page->title }}</h5>
            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">  
            <table class="table table-responsive-sm ">
                <tbody>
                    <tr>
                        <th colspan="2" class="border-0">Testimonial Detail </th>
                    </tr>

                    <tr>
                        <th width="200">Title</th>
                        <td>{{ $page->title }}</td>
                    </tr>

                    <tr>
                        <th>Date Created</th>
                        <td>{{ date_format($page->created_at, 'jS M Y') }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Sub Heading')}}</th>
                        <td> {{ $page->sub_heading }} </td>
                    </tr>

                    <tr>
                        <th>{{__('Short Description')}}</th>
                        <td> {{ $page->short_description }} </td>
                    </tr>

                    <tr>
                        <th>{{__('Meta Key')}}</th>
                        <td>  {{ $page->meta_key }}</td>
                    </tr>

                    <tr>
                        <th>{{__('Meta Description')}}</th>
                        <td>{{ $page->meta_description }}</td>
                    </tr>

                    <tr>
                        <th colspan="2">{{__('Content:')}}</th>
                    </tr>

                    <tr>
                        <td colspan="2">{!! $page->content !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer py-2">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>          
        </div>
    </div>
</div>
<table class="table table-striped">
    <thead>

        <tr>
            <th scope="col">Talent ID</th>

            @if (Request::input('tl_email') )
            <th scope="col">Type Email</th>
            @endif

            @if (Request::input('tl_name') )
            <th scope="col">Nama Talent</th>
            @endif

            @if (Request::input('tl_phone') )
            <th scope="col">Phone</th>
            @endif

            @if (Request::input('tl_email') )
            <th scope="col">Email</th>
            @endif

            @if (Request::input('tl_email_status') )
            <th scope="col">Email Status</th>
            @endif

            @if (Request::input('tl_desc') )
            <th scope="col">Details</th>
            @endif

            @if (Request::input('created_at') )
            <th scope="col">Created</th>
            @endif
        </tr>
    </thead>

    <tbody id="container">
        @foreach( $talent_logs as $tlogs)


        <tr>            
            <td>{{ $tlogs->tl_talent_id }}</td>
            
            @if (Request::input('tl_type') )
            <td>{{ $tlogs->tl_type }}</td>
            @endif
            
            @if (Request::input('tl_name') )
            <td>{{ $tlogs->tl_name }}</td>
            @endif
            

            @if (Request::input('tl_phone') )
            <td>{{$tlogs->tl_phone}}</td>
            @endif

            @if (Request::input('tl_email') )
            <td>{{$tlogs->tl_email}}</td>
            @endif

            @if (Request::input('tl_email_status') )
            <td>{{$tlogs->tl_email_status}}</td>
            @endif

            @if (Request::input('tl_desc') )
            <td>{{$tlogs->tl_desc}}</td>
            @endif

            <td>
                {{ \Carbon\Carbon::parse($tlogs->created_at)->format('D, d-m-Y H:i') }}<br>
                <span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="member date">
                    {{\Carbon\Carbon::createFromTimeStamp(strtotime($tlogs->created_at))->diffForHumans()}}</b>
                </span>
            </td>


            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{$talent_logs->links()}}
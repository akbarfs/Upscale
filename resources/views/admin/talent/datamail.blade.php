<table class="table table-striped">
    <thead>

        <tr>
            <th scope="col">Id</th>

			<th scope="col">Talent ID</th>
            
			<th scope="col">Type Email</th>

			<th scope="col">Nama Talent</th>
            
			<th scope="col">Phone</th>

			<th scope="col">Email</th>
            
			<th scope="col">Email Status</th>

			<th scope="col">Details</th>

			<th scope="col">Created</th>
        </tr>
    </thead>

    <tbody id="container">
        @foreach( $talent_logs as $tlogs)


        <tr>
            <td>{{ $tlogs->id }}</td>

            <td>{{ $tlogs->tl_talent_id }}</td>

            <td>{{ $tlogs->tl_type }}</td>

            <td>{{ $tlogs->tl_name }}</td>

            <td>{{$tlogs->tl_phone}}</td>

            <td>{{$tlogs->tl_email}}</td>

            <td>{{$tlogs->tl_email_status}}</td>

            <td>{{$tlogs->tl_desc}}</td>

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
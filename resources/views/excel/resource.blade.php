<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($resources as $resource)
            <tr>
                <td>{{ $resource->id }}</td>

                <td>{{ $resource->created_at }}</td>
                <td>{{ $resource->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($paths as $path)
            <tr>
                <td>{{ $path->id }}</td>

                <td>{{ $path->created_at }}</td>
                <td>{{ $path->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($files as $file)
            <tr>
                <td>{{ $file->id }}</td>

                <td>{{ $file->created_at }}</td>
                <td>{{ $file->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
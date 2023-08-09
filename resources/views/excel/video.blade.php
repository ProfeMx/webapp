<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($videos as $video)
            <tr>
                <td>{{ $video->id }}</td>

                <td>{{ $video->created_at }}</td>
                <td>{{ $video->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
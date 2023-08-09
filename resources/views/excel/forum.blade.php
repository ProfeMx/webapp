<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($forums as $forum)
            <tr>
                <td>{{ $forum->id }}</td>

                <td>{{ $forum->created_at }}</td>
                <td>{{ $forum->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
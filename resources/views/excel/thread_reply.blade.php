<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($thread_replies as $thread_reply)
            <tr>
                <td>{{ $thread_reply->id }}</td>

                <td>{{ $thread_reply->created_at }}</td>
                <td>{{ $thread_reply->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
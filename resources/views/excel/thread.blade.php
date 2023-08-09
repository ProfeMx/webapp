<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($threads as $thread)
            <tr>
                <td>{{ $thread->id }}</td>

                <td>{{ $thread->created_at }}</td>
                <td>{{ $thread->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
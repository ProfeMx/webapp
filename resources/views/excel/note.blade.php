<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($notes as $note)
            <tr>
                <td>{{ $note->id }}</td>

                <td>{{ $note->created_at }}</td>
                <td>{{ $note->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
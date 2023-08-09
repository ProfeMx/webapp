<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($attempts as $attempt)
            <tr>
                <td>{{ $attempt->id }}</td>

                <td>{{ $attempt->created_at }}</td>
                <td>{{ $attempt->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
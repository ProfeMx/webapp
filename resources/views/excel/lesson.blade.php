<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lessons as $lesson)
            <tr>
                <td>{{ $lesson->id }}</td>

                <td>{{ $lesson->created_at }}</td>
                <td>{{ $lesson->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
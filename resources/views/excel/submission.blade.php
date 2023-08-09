<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($submissions as $submission)
            <tr>
                <td>{{ $submission->id }}</td>

                <td>{{ $submission->created_at }}</td>
                <td>{{ $submission->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
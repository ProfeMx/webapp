<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($enrollments as $enrollment)
            <tr>
                <td>{{ $enrollment->id }}</td>

                <td>{{ $enrollment->created_at }}</td>
                <td>{{ $enrollment->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
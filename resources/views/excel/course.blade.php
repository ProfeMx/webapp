<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>

                <td>{{ $course->created_at }}</td>
                <td>{{ $course->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
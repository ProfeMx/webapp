<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($enrollment_logs as $enrollment_log)
            <tr>
                <td>{{ $enrollment_log->id }}</td>

                <td>{{ $enrollment_log->created_at }}</td>
                <td>{{ $enrollment_log->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
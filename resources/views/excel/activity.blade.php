<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $activity)
            <tr>
                <td>{{ $activity->id }}</td>

                <td>{{ $activity->created_at }}</td>
                <td>{{ $activity->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
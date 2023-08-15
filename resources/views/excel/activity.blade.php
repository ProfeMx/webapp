<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>type</th>
            <th>status</th>
            <th>weight</th>
            <th>order</th>
            <th>lesson_id</th>
            <th>activityable_id</th>
            <th>activityable_type</th>
            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $activity)
            <tr>
                <td>{{ $activity->id }}</td>
                <td>{{ $activity->name }}</td>
                <td>{{ $activity->type }}</td>
                <td>{{ $activity->status }}</td>
                <td>{{ $activity->weight }}</td>
                <td>{{ $activity->order }}</td>
                <td>{{ $activity->lesson_id }}</td>
                <td>{{ $activity->activityable_id }}</td>
                <td>{{ $activity->activityable_type }}</td>
                <td>{{ $activity->created_at }}</td>
                <td>{{ $activity->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($forum_subscriptions as $forum_subscription)
            <tr>
                <td>{{ $forum_subscription->id }}</td>

                <td>{{ $forum_subscription->created_at }}</td>
                <td>{{ $forum_subscription->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($forum_subscriptions as $forum_subscription)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $forum_subscription->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($thread_replies as $thread_reply)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $thread_reply->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
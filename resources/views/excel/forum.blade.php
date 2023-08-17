<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($forums as $forum)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $forum->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
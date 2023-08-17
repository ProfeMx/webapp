<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($threads as $thread)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $thread->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
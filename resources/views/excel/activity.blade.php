<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $activity)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $activity->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
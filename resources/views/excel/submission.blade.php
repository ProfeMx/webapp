<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($submissions as $submission)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $submission->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
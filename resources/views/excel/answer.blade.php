<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($answers as $answer)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $answer->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
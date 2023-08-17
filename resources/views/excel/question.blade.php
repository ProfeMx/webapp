<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($questions as $question)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $question->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
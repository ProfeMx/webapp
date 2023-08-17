<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($homework as $homework)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $homework->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
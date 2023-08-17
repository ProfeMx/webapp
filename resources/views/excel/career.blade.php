<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($careers as $career)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $career->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
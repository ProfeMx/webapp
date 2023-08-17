<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($attempts as $attempt)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $attempt->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
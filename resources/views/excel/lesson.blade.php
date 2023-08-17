<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($lessons as $lesson)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $lesson->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
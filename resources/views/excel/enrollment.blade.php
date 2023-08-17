<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($enrollments as $enrollment)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $enrollment->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
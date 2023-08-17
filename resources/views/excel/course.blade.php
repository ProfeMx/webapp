<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $course->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
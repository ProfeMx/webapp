<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($enrollment_logs as $enrollment_log)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $enrollment_log->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
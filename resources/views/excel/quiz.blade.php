<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($quizzes as $quiz)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $quiz->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
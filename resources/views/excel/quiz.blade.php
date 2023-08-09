<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($quizzes as $quiz)
            <tr>
                <td>{{ $quiz->id }}</td>

                <td>{{ $quiz->created_at }}</td>
                <td>{{ $quiz->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
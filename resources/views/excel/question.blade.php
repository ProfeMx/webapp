<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($questions as $question)
            <tr>
                <td>{{ $question->id }}</td>

                <td>{{ $question->created_at }}</td>
                <td>{{ $question->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
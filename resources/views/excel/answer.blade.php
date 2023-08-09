<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($answers as $answer)
            <tr>
                <td>{{ $answer->id }}</td>

                <td>{{ $answer->created_at }}</td>
                <td>{{ $answer->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
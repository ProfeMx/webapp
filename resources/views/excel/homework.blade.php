<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($homework as $homework)
            <tr>
                <td>{{ $homework->id }}</td>

                <td>{{ $homework->created_at }}</td>
                <td>{{ $homework->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
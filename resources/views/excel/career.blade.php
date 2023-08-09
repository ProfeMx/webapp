<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($careers as $career)
            <tr>
                <td>{{ $career->id }}</td>

                <td>{{ $career->created_at }}</td>
                <td>{{ $career->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
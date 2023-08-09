<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sections as $section)
            <tr>
                <td>{{ $section->id }}</td>

                <td>{{ $section->created_at }}</td>
                <td>{{ $section->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
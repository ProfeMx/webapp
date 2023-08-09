<table>
    <thead>
        <tr>
            <th>id</th>

            <th>created_at</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($certificates as $certificate)
            <tr>
                <td>{{ $certificate->id }}</td>

                <td>{{ $certificate->created_at }}</td>
                <td>{{ $certificate->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
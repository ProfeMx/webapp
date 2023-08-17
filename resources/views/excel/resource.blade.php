<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($resources as $resource)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $resource->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
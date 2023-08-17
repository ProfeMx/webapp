<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($paths as $path)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $path->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
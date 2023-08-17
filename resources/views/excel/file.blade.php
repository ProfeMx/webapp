<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($files as $file)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $file->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
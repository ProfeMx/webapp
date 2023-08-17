<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($sections as $section)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $section->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
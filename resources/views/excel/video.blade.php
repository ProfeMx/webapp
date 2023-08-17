<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($videos as $video)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $video->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
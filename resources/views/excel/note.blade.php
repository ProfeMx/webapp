<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($notes as $note)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $note->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
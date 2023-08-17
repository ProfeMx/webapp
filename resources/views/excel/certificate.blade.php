<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($certificates as $certificate)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $certificate->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
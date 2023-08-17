<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)

                <th>{{ $col }}</th>

            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                @foreach($exportCols as $col)

                    <td>{{ $user->$col }}</td>

                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 0.5rem;
    }
</style>

@php($r = Route::getRoutes())

<table>
    <thead>
        <tr>
            <th>Route</th>
            <th>Method</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($r as $v)
            @if (!Str::startsWith($v->uri, ['_', 'sanctum', 'api']))
                <tr>
                    <td>
                        <a href="{{ Str::start($v->uri(), '/') }}">
                            @if ($v->uri() === '/')
                                /home
                            @else
                                {{ Str::start($v->uri(), '/') }}
                            @endif
                        </a>
                    </td>
                    <td>{{ $v->methods()[0] }}</td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

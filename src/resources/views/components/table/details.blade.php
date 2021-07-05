<table class="table-responsive {{ $class ?? '' }}">
    <thead></thead>
    <tbody class="{{ $tbodyClass ?? '' }}">
    @foreach($properties as $key => $value)
        <tr class="{{ $trClass ?? '' }}">
            <th scope="row" class="{{ $thClass ?? '' }}">
                {{ is_numeric($key) ? \Illuminate\Support\Str::title($value) : $key }}
            </th>
            <td class="{{ $tdClass ?? '' }}">
                {{ $model->$value }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

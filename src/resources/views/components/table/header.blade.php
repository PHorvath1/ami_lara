<thead class="{{ $theadClass ?? '' }}">
<tr class="{{ $trClass ?? '' }}">
    @foreach($fields as $field)
        <th class="{{ $thClass ?? '' }}" scope="col">{{ $field }}</th>
    @endforeach
    <th class="{{ $thClass ?? '' }}" scope="col">Operations</th>
</tr>
</thead>

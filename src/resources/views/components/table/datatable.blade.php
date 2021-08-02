@php
    use App\Datatable\Button;
    use App\Datatable\Buttons\Collection;
    use App\Datatable\Datatable;
    $prefix = $prefix ?? '';
    $suffix = $suffix ?? '';
@endphp

<table class="{{ $class ?? '' }}" id="{{ $id ?? '' }}">
    <x-table.header :fields="$as" :operations="$operations ?? true" />
{{--    Note: In x-table.header there is a thead, tr, th. You can specify css class for each of them:--}}
{{--    <x-table.header --}}
{{--        theadClass="some-css-class"--}}
{{--        trClass="some-css-class"--}}
{{--        thClass="some-css-class"--}}
{{--        :fields="$as"--}}
{{--    />--}}
    <tbody>
    @foreach($for as $item)
        <tr>
            @foreach($as as $prop)
                <x-table.property :item="$item" :prop="$prop" />
            @endforeach
            @if($operations ?? true)
                @php /** @var \Illuminate\Database\Eloquent\Model $item */ @endphp
                    <x-table.operations :item="$item" :route="$prefix . $item->getTable() . $suffix" :view="$view ?? false" :edit="$edit ?? false" :delete="$delete ?? false" />
            @endisset
        </tr>
    @endforeach
    </tbody>
</table>

@isset($id)
     {!! Datatable::for($id)->reorderable()->withExports() !!}
@endisset

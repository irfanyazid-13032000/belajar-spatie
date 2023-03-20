@php $indent = isset($indent) ? $indent + 1 : 1 @endphp

<option value="{{$id ?? ''}}">{!! str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $indent) !!}{{$jabatan ?? ''}}</option>

@if(isset($children) && count($children) > 0)
    @foreach($children as $child)
        @include('partials.dropdown-recursive', ['jabatan' => $child['jabatan'], 'children' => $child['children'], 'indent' => $indent])
    @endforeach
@endif

<select>
    <option value="">Select</option>
    @foreach($data as $kakek)
        <option value="{{$kakek['id']}}">{{$kakek['jabatan']}}</option>
        @if(count($kakek['children']) > 0)
            @foreach($kakek['children'] as $ayah)
                @include('partials.dropdown-recursive', ['jabatan' => $ayah['jabatan'], 'children' => $ayah['children']])
            @endforeach
        @endif
    @endforeach
</select>

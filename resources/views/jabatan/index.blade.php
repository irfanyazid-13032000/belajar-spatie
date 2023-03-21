<select multiple class="select2" style="width:100%; background-color:green">
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
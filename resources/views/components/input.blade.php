<div class="form-group">
    <label for="">{{$label}}</label>
    <input type="{{$type}}"  name="{{$name}}"class="form-control border border success" id=""  aria-describedby="helpId" >
    <span class="text-danger">
        {{$demo}}
        {{-- @error('name')
            {{ $message }}
        @enderror --}}
    </span>
</div>
<div class="mb-3">
    <label for="" class="form-label">{{$label}}</label>
    <input
        type="{{$type}}"
        name="{{$name}}"
        id=""
        class="form-control"
        placeholder=""
        aria-describedby="helpId"
        value="{{$value}}"
       
    />
    {{-- <small id="helpId" class="text-danger">@error('name')
        {{$message}}
    @enderror</small> --}}
</div>
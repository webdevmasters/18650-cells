<div id="model_dropdown">
    <select name="model" class="form-select">
        @foreach($models as $id => $model)
            @if($loop->index===0)
                <option value="0">Choose model</option>
            @endif
            <option value="{{$model}}">{{$model}}</option>
        @endforeach
    </select>
</div>

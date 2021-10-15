<div class="mb-3">
    
    <div class="form-group">
        <label for="title">Başlık</label>
        <input type="text" class="form-control  is-invalid" id="title" name="title" aria-describedby="emailHelp" value="{{ old('title',optional($post ?? null)->title) }}">
        
        @error('title')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
        
    </div>
    
</div>
<div>
    <div class="form-group">
        <label for="content">İçerik</label>
        <textarea name="content" id="content" class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" required> {{ old('content',optional($post ?? null)->content) }}</textarea>
        @error('content')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-9">
        <div class="form-group">
            <label class="control-label">Título <span class="required"> * </span></label>
            {!! Form::text('title', isset($post) ? $post->title : null, ['class' => 'form-control', 'placeholder' => 'Digite o titulo', 'required']) !!}
        </div>
        <div class="form-group">
            <label class="control-label">Slug <span class="required"> * </span></label>
            {!! Form::text('slug', isset($post) ? $post->slug : null, ['class' => 'form-control', 'placeholder' => 'Digite o slug', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::textarea('content', isset($post) ? $post->content : null, ['class' => 'form-control cw-editor', 'placeholder' => '']) !!}
        </div>

        <div class="row">
            @if(isset($options))
                @foreach($options as $options)
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">{{ $options['label'] }}</label>
                            <x-option name="{{ $options['name'] }}" type="{{ $options['type'] }}"
                                      value="{{ isset($post) ? $post->options[$options['name']] : null }}"></x-option>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="row">
            @if(isset($files))
                @foreach($files as $file)
                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">{{ $file['label'] }}</label>
                            <x-file-input name="{{ $file['name'] }}" group="{{ $file['group'] }}" multiple="{{ $file['multiple'] }}"></x-file-input>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
    <div class="col-3">
        <div class="form-group">
            <label class="control-label">Seção <span class="required"> * </span></label>
            {!! Form::select('sections[]', $sections, isset($post) ? $post->sections->pluck('id') : null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <label class="control-label">Categoria <span class="required"> * </span></label>
            {!! Form::select('categories[]', $categories, isset($post) ? $post->categories->pluck('id') : null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <label class="control-label">Status <span class="required"> * </span></label>
            {!! Form::select('status', [1 => 'Ativado', 0 => 'Desativado'], isset($post) ? $post->status : null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <label class="control-label">Imagem <span class="required"> * </span></label>
            <x-file-input name="image" group="main"></x-file-input>
        </div>
        <div class="form-group">
            @if(isset($post) && isset($post->options['image']['file']))
                <img src="{{ asset('storage/' . $post->options['image']['file']) }}" class="img-fluid img-thumbnail">
            @endif
        </div>
    </div>
</div>
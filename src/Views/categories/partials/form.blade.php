<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label class="control-label">Nome da seção <span class="required"> * </span></label>
            {!! Form::text('name', isset($category) ? $category->name : null, ['class' => 'form-control', 'placeholder' => 'Digite o nome da seção', 'required']) !!}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label class="control-label">Slug da seção<span class="required"> * </span></label>
            {!! Form::text('slug', isset($category) ? $category->slug : null, ['class' => 'form-control', 'placeholder' => 'Digite o slug da seção', 'required']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label class="control-label">Status <span class="required"> * </span></label>
            {!! Form::select('status', [1 => 'Ativado', 0 => 'Desativado'], isset($category) ? $category->status : null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

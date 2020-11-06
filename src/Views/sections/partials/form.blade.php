<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label class="control-label">Nome da seção <span class="required"> * </span></label>
            {!! Form::text('name', isset($section) ? $section->name : null, ['class' => 'form-control', 'placeholder' => 'Digite o nome da seção', 'required']) !!}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label class="control-label">Slug da seção<span class="required"> * </span></label>
            {!! Form::text('slug', isset($section) ? $section->slug : null, ['class' => 'form-control', 'placeholder' => 'Digite o slug da seção', 'required']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label class="control-label">Status <span class="required"> * </span></label>
            {!! Form::select('status', [1 => 'Ativado', 0 => 'Desativado'], isset($section) ? $section->status : null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

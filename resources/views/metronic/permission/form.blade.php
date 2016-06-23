<div class="form-body">
    <div class="form-group @if($errors->has('name')) has-error @endif">
        <label for="name" class="control-label">Nama Permission</label>
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
        @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
    </div>
    <div class="form-group @if($errors->has('key')) has-error @endif">
        <label for="key" class="control-label">Key</label>
        {{--*/
            $opt = ['class' => 'form-control', 'id' => 'key'];
            if( isset($permission) ){
                $opt['readonly'] = 'readonly';
            }
        /*--}}
        {{ Form::text('key', null, $opt) }}
        @if($errors->has('key'))<span class="help-block">{{ $errors->first('key') }}</span>@endif
    </div>
</div>
<div class="form-actions">
    {{ Form::hidden('state', isset($permission) ? 'update' : 'create') }}
    <button type="submit" class="btn yellow btnSubmit">Simpan</button>
</div>

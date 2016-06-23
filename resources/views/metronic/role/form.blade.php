<div class="form-body">
    <div class="form-group @if($errors->has('name')) has-error @endif">
        <label for="name" class="control-label col-md-2">Nama Role</label>
        <div class="col-md-5">
            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
            @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
        </div>
    </div>
    <div class="form-group @if($errors->has('key')) has-error @endif">
        <label for="key" class="control-label col-md-2">Key</label>
        <div class="col-md-5">
            {{--*/
                $opts = ['class' => 'form-control', 'id' => 'key'];
                if( isset($role) ){
                    $opts += ['readonly' => 'readonly'];
                }
            /*--}}
            {{ Form::text('key', null, $opts) }}
            @if($errors->has('key'))<span class="help-block">{{ $errors->first('key') }}</span>@endif
        </div>
    </div>
    <div class="form-group">
        <label for="permissions" class="control-label col-md-2">Permission</label>
        {{--*/
            $Cpermissions = $permissions->groupBy('group_key');
        /*--}}
        <div class="col-md-10">
            @foreach($Cpermissions as $key => $Cpermission)
            <div class="row-fluid">
                <h4>{{ ucfirst(str_replace('_', ' ', $key)) }}</h4>
                {{--*/
                    $pageCount = ceil($Cpermission->count() / 4);
                /*--}}
                @for( $i = 0; $i<$pageCount; $i++ )
                {{--*/ $chunks = $Cpermission->forPage(($i+1), 4) /*--}}
                    @foreach($chunks as $chunk)
                    <div class="col-md-3" style="padding-left:0">
                        <div class="checkbox-list">
                            <label class="checkbox-inline">
                                {{ Form::checkbox('permissions[]', $chunk['id'], null, ['id' => 'permissions']) }} {{ $chunk['name'] }}
                            </label>
                        </div>
                    </div>
                    @endforeach
                @endfor
                <div style="clear:both;"></div>
            </div>
            <br />
            @endforeach
        </div>
    </div>
</div>
<div class="form-actions">
    <div class="col-md-offset-2 col-md-8">
        {{ Form::hidden('state', isset($role) ? 'update' : 'create') }}
        <button type="submit" class="btn yellow btnSubmit">Simpan Role</button>
    </div>
</div>

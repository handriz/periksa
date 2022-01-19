@extends('layouts.app')
@section('content')
<div class="container">
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.permission.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.izin.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nama_izin">{{ trans('cruds.permission.fields.title') }}</label>
                <input class="form-control {{ $errors->has('nama_izin') ? 'is-invalid' : '' }}" type="text" name="nama_izin"
                    id="nama_izin" autocomplete="off" value="{{ old('nama_izin', '') }}" required>
                @if($errors->has('nama_izin'))
                <div class="invalid-feedback">
                    {{ $errors->first('nama_izin') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
</div>


@endsection

@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.salary.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.salaries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="hodim_id">{{ trans('cruds.salary.fields.hodim') }}</label>
                <select class="form-control select2 {{ $errors->has('hodim') ? 'is-invalid' : '' }}" name="hodim_id" id="hodim_id" required>
                    @foreach($hodims as $id => $entry)
                        <option value="{{ $id }}" {{ old('hodim_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('hodim'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hodim') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.hodim_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salary">{{ trans('cruds.salary.fields.salary') }}</label>
                <input class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}" type="number" name="salary" id="salary" value="{{ old('salary', '') }}" step="1" required>
                @if($errors->has('salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.salary.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_2">{{ trans('cruds.salary.fields.date_2') }}</label>
                <input class="form-control date {{ $errors->has('date_2') ? 'is-invalid' : '' }}" type="text" name="date_2" id="date_2" value="{{ old('date_2') }}" required>
                @if($errors->has('date_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.date_2_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
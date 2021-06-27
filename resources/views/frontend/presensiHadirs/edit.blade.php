@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.presensiHadir.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.presensi-hadirs.update", [$presensiHadir->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="userid_id">{{ trans('cruds.presensiHadir.fields.userid') }}</label>
                            <select class="form-control select2" name="userid_id" id="userid_id">
                                @foreach($userids as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('userid_id') ? old('userid_id') : $presensiHadir->userid->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('userid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('userid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.presensiHadir.fields.userid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="checktime">{{ trans('cruds.presensiHadir.fields.checktime') }}</label>
                            <input class="form-control datetime" type="text" name="checktime" id="checktime" value="{{ old('checktime', $presensiHadir->checktime) }}">
                            @if($errors->has('checktime'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('checktime') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.presensiHadir.fields.checktime_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="image">{{ trans('cruds.presensiHadir.fields.image') }}</label>
                            <div class="needsclick dropzone" id="image-dropzone">
                            </div>
                            @if($errors->has('image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.presensiHadir.fields.image_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="koordinat">{{ trans('cruds.presensiHadir.fields.koordinat') }}</label>
                            <input class="form-control" type="text" name="koordinat" id="koordinat" value="{{ old('koordinat', $presensiHadir->koordinat) }}">
                            @if($errors->has('koordinat'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('koordinat') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.presensiHadir.fields.koordinat_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="work_code">{{ trans('cruds.presensiHadir.fields.work_code') }}</label>
                            <input class="form-control" type="text" name="work_code" id="work_code" value="{{ old('work_code', $presensiHadir->work_code) }}">
                            @if($errors->has('work_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('work_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.presensiHadir.fields.work_code_helper') }}</span>
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
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('frontend.presensi-hadirs.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($presensiHadir) && $presensiHadir->image)
      var file = {!! json_encode($presensiHadir->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection
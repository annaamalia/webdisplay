@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
                    <form id="formprogram" method="POST" action="{{ route('programinfo.store' , $id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label ">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus maxlength="50">

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label for="detail" class="col-md-2 col-form-label ">{{ __('Detail') }}</label>

                            <div class="col-md-6">
                                <textarea id="detail" name="detail" class="form-control{{ $errors->has('detail') ? ' is-invalid' : '' }}">{!! old('detail') !!}</textarea>
                                
                                @if ($errors->has('detail'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('detail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>                               
                            </div>
                        </div>
                    </form>
        </div>
    </div>
@endsection

@section('js')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    $( document ).ready(function() {
        var options = {
          filebrowserImageBrowseUrl: '/uploadfile?type=Images',
          filebrowserImageUploadUrl: '/uploadfile/upload?type=Images&_token={{csrf_token()}}',
          filebrowserBrowseUrl: '/uploadfile?type=Files',
          filebrowserUploadUrl: '/uploadfile/upload?type=Files&_token={{csrf_token()}}'
        };
       
        CKEDITOR.replace('detail', options);     
       
    });
</script>    
@endsection

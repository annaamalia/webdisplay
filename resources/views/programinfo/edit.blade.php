@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
                    <form id="formprogram" method="POST" action="{{ route('program.update', $program->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label ">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $program->title}}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="short_description" class="col-sm-2 col-form-label ">{{ __('Deskripsi Singkat') }}</label>

                            <div class="col-md-6">
                                <textarea id="short_description" required maxlength="140" name="short_description" class="form-control{{ $errors->has('short_description') ? ' is-invalid' : '' }}">{{ $program->short_description}}</textarea>

                                @if ($errors->has('short_description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('short_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detail" class="col-md-2 col-form-label ">{{ __('Detail') }}</label>

                            <div class="col-md-6">
                                <textarea id="detail" name="detail" class="form-control{{ $errors->has('detail') ? ' is-invalid' : '' }}">{!! $program->detail!!}</textarea>
                                
                                @if ($errors->has('detail'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('detail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>     
                        <div class="form-group row">
                            <label for="location" class="col-md-2 col-form-label ">{{ __('Location') }}</label>

                            <div class="col-md-6">
                            <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{$program->location}}" required>

                                @if ($errors->has('location'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="targetdonation" class="col-md-2 col-form-label ">{{ __('Target Donation') }}</label>

                            <div class="col-md-6">
                                <input id="targetdonation" type="text" class="form-control{{ $errors->has('targetdonation') ? ' is-invalid' : '' }}" name="targetdonation" value="{{$program->target_donation}}" required>

                                @if ($errors->has('targetdonation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('targetdonation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="jenis" class="col-md-2 col-form-label ">{{ __('Jenis') }}</label>    
                                <div class="col-md-6">
                                    <select id="jenis" type="text" class="form-control{{ $errors->has('jenis') ? ' is-invalid' : '' }}" name="jenis"   required>
                                        <option value="" disabled selected>Select your option</option>
                                        <option value="A" @if($program->category->jenis() == App\Models\Category::AMAL) selected @endif>Amal</option>
                                        <option value="Z" @if($program->category->jenis() == App\Models\Category::ZAKAT) selected @endif>Zakat</option>
                                    </select>
                                    @if ($errors->has('jenis'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('jenis') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="category" class="col-md-2 col-form-label ">{{ __('Category') }}</label>
                            <div class="col-md-6">
                            <select id="category" type="text" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" required>
                              
                            </select>
                            @if ($errors->has('category'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                            @endif
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="dateend" class="col-md-2 col-form-label ">{{ __('Date End') }}</label>

                            <div class="col-md-6">
                                <input id="dateend" type="date" class="form-control{{ $errors->has('dateend') ? ' is-invalid' : '' }}" name="dateend" value="{{$program->date_end}}" required>

                                @if ($errors->has('dateend'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dateend') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <h2>Gambar Cover</h2>
                        </div>
                        <div class="form-group row input-group col-md-6">
                            <span class="input-group-btn">
                              <a id="gambarcover" href="#" data-input="gambarcoveri" data-preview="gambarcoverh" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                              </a>
                            </span>
                            <input id="gambarcoveri" class="form-control" type="text" name="gambarcover" value="{{$program->gambar_cover}}">
                          </div>
                          <img id="gambarcoverh" style="margin-top:5px;max-height:100px;">
                          <div class="form-group row">
                                <h2>Gambar lainya</h2>
                            </div>
                            <div class="form-group row">
                                    <button id="tambahgmbr" class="btn btn-primary">
                                            Tambah Gambar
                                        </button> 
                            </div>
                            <div class="listgambar">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($program->images as $item)
                                @php
                                    $i++;
                                @endphp
                                    
                                
                                <div class="group-gambar">
                                    <div class="form-group row input-group col-md-6 group-gambar_{{$i}}" style="margin-top:10px;">
                                                <button class="btn btn-danger hapus-gambar">Hapus</button>
                                                <span class="input-group-btn">
                                                <a href="#" id="gambar_{{$i}}" data-input="gambari_{{$i}}" data-preview="gambarh_{{$i}}" class="gambarlfm btn btn-primary" >
                                                    <i class="fa fa-picture-o"></i> Choose
                                                  </a>
                                                </span>
                                            <input id="gambari_{{$i}}" class="form-control" type="text" name="gambar_{{$i}}" value="{!!$item->path!!}">
                                              </div>
                                            <img id="gambarh_{{$i}}" src="{{url($item->path)}}" style="margin-top:5px;max-height:100px;">
                                    </div>
                                    @endforeach
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
        $('#gambarcover').filemanager('image');
        CKEDITOR.replace('detail', options);        
        
        $('.listgambar').on('click', '.hapus-gambar',function(e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        })
        var jmlgambar = {{$program->jumlahGambar()}};
        $('#tambahgmbr').click(function(e){
            e.preventDefault();
            jmlgambar++;
            $('.listgambar').append(
                `
                <div class="group-gambar">
                <div class="form-group row input-group col-md-6 group-gambar_` + jmlgambar +`" style="margin-top:10px;">
                            <button class="btn btn-danger hapus-gambar">Hapus</button>
                            <span class="input-group-btn">
                              <a href="#" id="gambar_` + jmlgambar +`" data-input="gambari_` + jmlgambar +`" data-preview="gambarh_` + jmlgambar +`" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                              </a>
                            </span>
                            <input id="gambari_` + jmlgambar +`" class="form-control" type="text" name="gambar_` + jmlgambar +`">
                          </div>
                          <img id="gambarh_` + jmlgambar +`" style="margin-top:5px;max-height:100px;">
                </div>
                `
            );
            $('#gambar_' + jmlgambar).filemanager('image');
        });
        $('.gambarlfm').filemanager('image');
        
        var data = [
            @foreach($kategori as $item)
            {
                id: '{{$item->id}}',
                text: '{{$item->category_name}}',
            },    
            @endforeach        
        ];
        
        $('#jenis').change(function(e) {
           
            var item = data.filter(function(d) {
                return d.id.substr(0,1) == $('#jenis').val();
            });
            console.log(item);
            $("#category").select2().empty();
            $("#category").select2({
                data: item
            });


        });
        $('#jenis').trigger('change');
        $("#category").val('{{$program->idx_program_category_id}}').trigger('change');
        
    });
</script>    
@endsection

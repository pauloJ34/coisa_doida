@extends('layouts.templete')

@section('contend')


<div class="row justify-content-center">
    <div class="col-md-8"> 
        <div class="card">
            <div class="card-header"></div>

            <div class="card-body">

                <form method="GET" action="{{ route('search.doujinshi') }}">
                    @csrf
                    <input type="text" name="id" class="disabled" id="id-doujinshi-register">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name_doujinshi') is-invalid @enderror" name="name_doujinshi" value="{{ old('name_dojinshi') }}" required autocomplete="name_doujinshi" autofocus>
                            @error('name_doujinshi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    @if(isset($dou))
                    {{-- {{$dou}} --}}
                    @endif
                    <div class="row mb-3">
                        <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Release Year') }}</label>
                        <div class="col-md-6">
                            <input id="date" type="text" class="form-control @error('publish_date') is-invalid @enderror" name="publish_date" value="{{ old('publish_date') }}" autocomplete="date" autofocus>
                            @error('publish_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Search')}}
                            </button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>

    </div>
</div>
@if (isset($dou))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="d-flex ">
                                    <div class="me-auto p-2">
                                        {{__(isset($dou)? $dou->name_doujinshi: NULL)}}
                                    </div>

                                    <a href="doujinshi/{{__(isset($dou)? $dou->path_file: NULL)}}" class="btn btn-outline-success me-2">view</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
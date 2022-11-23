@extends('layouts.templete')

@section('contend')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                    @for ($i = 1; $i <= $doujinshi->chapter; $i++)
                        @for ($c = 0; $c < 10; $c++)
                                <img src="{{asset("storage/$doujinshi->path_file/cap-$i/img-$c.jpg")}}" alt="">
                        @endfor
                    @endfor
                    
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
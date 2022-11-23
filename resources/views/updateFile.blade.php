@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">{{__($doujinshi->name_doujinshi)}}</div>
            {{-- <img src="{{asset('storage/mangasabc-123/i16-23-14-2022-11-22637cf77286f34.jpg') }}" alt=""> --}}
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if(Session::get('success'))
                    <div class='alert alert-success'>
                        {{Session::get('success')}}
                    </div>
                @endif
                
                @if(Session::get('error'))
                    <div class='alert alert-danger'>
                        {{Session::get('erro')}}
                    </div>
                @endif

                <ul class="list-group">
                    @for ($i = 1; $i <= $doujinshi->chapter; $i++)
                        <li class="list-group-item">
                            <div class="d-flex ">
                                <div class="me-auto p-2">
                                    <span>Chapter-{{__($i)}}</span>
                                {{-- <img src="{{asset("storage/$doujinshi->path_file/cap-1/img-$i.jpg")}}" alt=""> --}}
                                </div>

                                <a href="doujinshi/{{__($doujinshi->path_file)}}" class="btn btn-outline-success me-2">view</a>
                                {{-- <button id="bt_edit" type='button' class="btn btn-outline-warning me-2">Edit</button>
                                <button id="bt_remove" type='button' class="btn btn-outline-danger">Remove</button> --}}
                            </div>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="button-float">
    <button id="add_chapter" type="button" class="btn btn-success">Add Chapter</button>
</div>

<div class="windows @if(!$errors->any()){{__('disabled')}}@endif">
    @include("layouts.registerChapter");
    <form method="POST" action="{{ route('updateFile.doujinshi') }}"  enctype="multipart/form-data">
        @csrf
    </form>
</div>
<script>
const bt_clicks = [document.querySelector('.shadows'),document.querySelector('#add_chapter')];
const windows_form = document.querySelector('.windows');
const msg_alert = document.querySelector('.alert')

for(bt of bt_clicks){
    bt.onclick= () =>{
        windows_form.classList.toggle('disabled');
    }
}

if(msg_alert)
    setTimeout(() => {
        msg_alert.remove();
    }, 5*1000);
</script>
@endsection
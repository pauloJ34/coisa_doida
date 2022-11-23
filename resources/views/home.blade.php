@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

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
                    @if($doujinshi)
                        @foreach ($doujinshi as $col)
                            <li class="list-group-item">
                                <div class="d-flex ">
                                    <div class="me-auto p-2">
                                        {{__($col->name_doujinshi)}}
                                    </div>

                                    <a href="{{route('updateFile.doujinshi')}}?id={{__($col->id)}}" class="btn btn-outline-success me-2">Add/Edit Chapter</a>
                                    <button id="bt_edit" type='button' class="btn btn-outline-warning me-2">Edit</button>
                                    <button id="bt_remove" type='button' class="btn btn-outline-danger">Remove</button>
                                </div>
                            </li>
                        @endforeach
                    @endif
                    
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- {{__($errors->any())}} --}}
<div class="windows @if(!$errors->any()){{__('disabled')}}@endif">
    @include("layouts.registerDoujinshi")
</div>
<div class="button-float">
    <button id="add_doujinshi" type="button" class="btn btn-success">Add Doujinshi</button>
</div>
<div class="windows-delete disabled">
    <div class="delete">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex p-2">
                    <span class="me-auto p-2">{{ __('Delete Doujinshi/mangá') }}</span>
                    <button type="button" class="btn btn-outline-danger" id="bt-close-windows-delete">X</button>
                </div>
    
                <div class="card-body">
                    <form method="POST" action="{{ route('remove.doujinshi') }}">
                        @csrf
                        <input type="text" name="type" id="type-doujinshi-remove" class="disabled">
                        <input type="text" name="id" id="id-doujinshi-remove" class="disabled">
                        <div class="row mb-0">
                            <div class="d-grid gap-2 mx-auto">
                                <button type='submit' class="btn btn-primary">
                                    {{__('Confirme Delete')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const bt_clicks = [document.querySelector('.shadows'),document.querySelector('#add_doujinshi')];
    const windows_form = document.querySelector('.windows');
    const windows_remove = document.querySelector('.windows-delete');
    const bt_close_windows_remove = document.querySelector('#bt-close-windows-delete');
    const msg_alert = document.querySelector('.alert')
    const windows_edit  = document.querySelectorAll('button#bt_edit')
    const bt_remove  = document.querySelectorAll('button#bt_remove')

    const query = <?= $doujinshi; ?> ; 
    for(bt_click of bt_clicks)
    {
        // console.log(bt_click)
        bt_click.onclick=()=>{
            const input_camp = document.querySelectorAll(".form-control");
            windows_form.classList.toggle('disabled');
            
            for(inputs of input_camp)
                inputs.value=null
        }
    }
    for(let num=0; num<windows_edit.length; num++)
    {

        windows_edit[num].onclick = (e) =>{
            document.querySelector('#id-doujinshi-register[name="id"]').value=query[num].id;
            document.querySelector(".form-control[name='name_doujinshi']").value=query[num].name_doujinshi;
            document.querySelector(".form-control[name='outher_name']").value=query[num].outher_name;
            document.querySelector(".form-control[name='author']").value=query[num].author;
            document.querySelector(".form-control[name='publish_date']").value=query[num].publish_date;
            document.querySelector(".form-control[name='sinopse']").value=query[num].sinopse;
            windows_form.classList.toggle('disabled');
        }
    }
    for(let num=0; num<bt_remove.length; num++)
    {
        // console.log(num)

        bt_remove[num].onclick = (e) =>{
            windows_remove.classList.remove('disabled');
            document.querySelector('#id-doujinshi-remove[name="id"]').value=query[num].id;
            document.querySelector('#type-doujinshi-remove[name="type"]').value="remove";
        }
    }

    bt_close_windows_remove.onclick = () =>{
        windows_remove.classList.add('disabled');
        document.querySelector('#id-doujinshi-remove[name="id"]').value=null;
        document.querySelector('#type-doujinshi-remove[name="type"]').value=null;
    }
    if(msg_alert)
    setTimeout(() => {
        msg_alert.remove();
    }, 5*1000);

</script>
@endsection

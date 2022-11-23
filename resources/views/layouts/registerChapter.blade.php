<i class="shadows"></i>
<div class="register">
    <div class="col">
        <div class="card">
            <div class="card-header">{{ __('Register Chapter') }}</div>

            <div class="card-body">
                <form method="post" action="{{ route('updateFileP.doujinshi') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <input type="hidden" name="id" value="{{__($doujinshi->id)}}">
                        <label for="num" class="col-md-4 col-form-label text-md-end">{{ __('Number Chapter') }}</label>
                        <div class="col-md-6">
                            <input id="num" type="number" class="form-control @error('num') is-invalid @enderror" name="num"  accept="image/*" multiple required>
                            @error('num')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <input type="hidden" name="id" value="{{__($doujinshi->id)}}">
                        <label for="arquives" class="col-md-4 col-form-label text-md-end">{{ __('Imagens Chapter') }}</label>
                        <div class="col-md-6">
                            <input id="arquives" type="file" class="form-control @error('arquives') is-invalid @enderror" name="arquives[]"  accept="image/*" multiple required>
                            @error('arquives')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0 ">
                        <div class="d-grid gap-2 col-8 mx-auto">
                        o site armazena todas as imagens, mas só poderá ver 10 imagens
                        </div>
                    </div>
                    <br>
                    <div class="row mb-0 ">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
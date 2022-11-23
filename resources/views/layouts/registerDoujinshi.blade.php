<i class="shadows"></i>
<div class="register">
    <div class="col">
        <div class="card">
            <div class="card-header">{{ __('Register Doujinshi/mangá') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('register.doujinshi') }}">
                    @csrf
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

                    <input type="hidden" name="id" id="id-doujinshi-register">
                    <div class="row mb-3">
                        <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>
                        <div class="col-md-6">
                            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('name_dojinshi') }}" autocomplete="name_doujinshi" autofocus>
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="subName" class="col-md-4 col-form-label text-md-end">{{ __('Other Name') }}</label>
                        <div class="col-md-6">
                            <input id="subName" type="text" class="form-control @error('outher_name') is-invalid @enderror" name="outher_name" value="{{ old('outher_name') }}" required autocomplete="outher_name" autofocus>
                            @error('outher_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="author" class="col-md-4 col-form-label text-md-end">{{ __('Author') }}</label>
                        <div class="col-md-6">
                            <input id="author" type="author" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" required autocomplete="author" autofocus>
                            @error('author')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Release Year') }}</label>
                        <div class="col-md-6">
                            <input id="date" type="text" class="form-control @error('publish_date') is-invalid @enderror" name="publish_date" value="{{ old('publish_date') }}" required autocomplete="date" autofocus>
                            @error('publish_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="row mb-3">
                        <label for="arquive" class="col-md-4 col-form-label text-md-end">{{ __('Arquives') }}</label>
                        <div class="col-md-6">
                            <input id="arquive" type="file" class="form-control" name="arquive[]" multiple>
                        </div>
                    </div> --}}

                    <div class="row mb-3">
                        <label for="sinopse" class="col-md-4 col-form-label text-md-end">{{ __('Sinopse') }}</label>
                        <div class="col-md-6">
                            <textarea id="sinopse" class="form-control" name="sinopse" rows="5" required >{{ old('sinopse')}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-0">
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
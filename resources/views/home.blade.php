@extends('main.layouts.app')

@section('title', 'Головна')

@section('mainContent')

    <div class="container">
        <form method="POST" action="#" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-lg-12 mb-2 w-50">
                <label><strong>Фаїл:</strong></label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file"
                               class="custom-file-input"
                               name="file">
                        <label class="custom-file-label" for="customFileLangHTML" data-browse="Browse">фаїл</label>
                        @error('file')
                        <div class="alert alert-danger mt-2">Введіть коректні дані файлу</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 pl-0 d-sm-flex">
                <div class="form-group pl-0">
                    <div class=" pl-0">
                        <button type="submit" class="btn btn-info px-5">Завантажити</button>
                    </div>
                </div>
            </div>
        </form>
    </div>



@endsection

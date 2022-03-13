@extends('main.layouts.app')

@section('title', 'Головна')

@section('mainContent')

    <div class="container">
        <form method="POST" action="{{route('main.load.catalog')}}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group col-lg-12 mb-2 w-50">
                <label><strong>Фаїл:</strong></label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file"
                               class="custom-file-input"
                               name="file">
                        <label class="custom-file-label" for="customFileLangHTML" data-browse="Browse">фаїл</label>
                    </div>
                </div>
                @error('file')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 pl-0 d-sm-flex">
                <div class="form-group pl-0">
                    <div class=" pl-0">
                        <button type="submit" class="btn btn-info px-5">Завантажити</button>
                    </div>
                </div>
            </div>
        </form>

        @isset($catalog)
            <div class="col-4">
                <ul>
                    <li>Початкова кількісь рядків у файлі - {{$catalog['start_count_rows']}}</li>
                    <Li>створено наступні таблиці:</Li>
                    <Li>Групи продуктів - {{$catalog['product_group_count']}}</Li>
                    <Li>Рубрики продуктів - {{$catalog['rubric_count']}}</Li>
                    <Li>Категорії продуктів - {{$catalog['product_category_count']}}</Li>
                    <Li>Бренд - {{$catalog['brand_count']}}</Li>
                    <Li>Унікальних продуктів відфільтровано - {{$catalog['unique_products_count']}}</Li>
                    <li>Продуктів занесено у базу  - {{$catalog['products_add_db_count']}}</li>
                </ul>
            </div>

        @endisset

    </div>



@endsection

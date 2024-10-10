@extends('layouts.app')
@section('title', 'Добавление объявления :: Мои объявления')
@section('content')
    <form action="{{ route('bb.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="txtTitle" class="form-label">Товар</label>
            <input name="title" id="txtTitle" class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="txtContent" class="form-label">Описание</label>
            <textarea name="content" id="txtContent" class="form-control @error('content') is-invalid @enderror"
                      row="3" value="{{ old('content') }}"></textarea>
            @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="txtPrice" class="form-label">Цена</label>
            <input name="price" id="txtPrice" class="form-control">
        </div>
        <input type="submit" class="btn btn-primary" value="Добавить">
    </form>
@endsection('content')

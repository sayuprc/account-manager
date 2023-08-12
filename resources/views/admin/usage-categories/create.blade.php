@extends('app.layout')

@section('title', '利用用途登録')

@section('content')
    <div>
        <div>
            <h1>利用用途登録</h1>
        </div>
        @if (session('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
        <form action="/admin/usage-categories" method="post">
            @csrf
            <div>
                @error('usage_category_name')
                    <span>{{ $message }}</span>
                @enderror
                <div>
                    <label>利用用途名</label>
                    <input type="text" name="usage_category_name" placeholder="">
                </div>
            </div>
            <div>
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
@endsection

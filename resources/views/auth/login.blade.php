@extends('app.layout')

@section('title', 'ログイン')

@section('content')
    <div>
        <div>
            <h1>ログイン</h1>
        </div>
        @if (session('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
        @error('message')
            <div>
                {{ $message }}
            </div>
        @enderror
        <form action="/login" method="post">
            @csrf
            <div>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
                <div>
                    <label for="email">メールアドレス</label>
                    <input id="email" type="text" name="email">
                </div>
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
                <div>
                    <label for="password">パスワード</label>
                    <input id="password" type="password" name="password">
                </div>
            </div>
            <div>
                <button type="submit">ログイン</button>
            </div>
        </form>
    </div>
@endsection

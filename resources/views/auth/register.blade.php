@extends('app.layout')

@section('title', 'ユーザー登録')

@section('content')
    <div>
        <div>
            <h1>ユーザー登録</h1>
        </div>
        @if (session('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
        <form action="/register" method="post">
            @csrf
            <div>
                @error('last_name')
                    <span>{{ $message }}</span>
                @enderror
                @error('first_name')
                    <span>{{ $message }}</span>
                @enderror
                <div>
                    <label>名前</label>
                    <input type="text" name="last_name" placeholder="姓">
                    <input type="text" name="first_name" placeholder="名">
                </div>
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
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
@endsection

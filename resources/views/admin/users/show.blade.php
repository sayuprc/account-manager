@extends('app.layout')

@section('title', 'ユーザー詳細')

@section('content')
    <div>
        @if (session('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
        <form action="/admin/users/{{ $user->user_id }}/edit" method="post">
            @csrf
            <div>
                @error('last_name')
                    <span>{{ $message }}</span>
                @enderror
                <div>
                    <label>姓</label>
                    <input type="text" name="last_name" value="{{ $user->last_name }}">
                </div>
                @error('first_name')
                    <span>{{ $message }}</span>
                @enderror
                <div>
                    <label>名</label>
                    <input type="text" name="first_name" value="{{ $user->first_name }}">
                </div>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
                <div>
                    <label for="email">メールアドレス</label>
                    <input id="email" type="text" name="email" value="{{ $user->email }}">
                </div>
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
                <div>
                    <label for="password">パスワード</label>
                    <input id="password" type="password" name="password">
                </div>
                <div>
                    @error('is_admin')
                        <span>{{ $message }}</span>
                    @enderror
                    <label for="is_admin">システム管理者</label>
                    @if ($user->user_id === Auth::user()->user_id)
                        {{-- ログインしているユーザーである場合、自分のadmin権限はいじれない --}}
                        <input id="is_admin" type="checkbox" disabled checked>
                    @else
                        <input id="is_admin" name="is_admin" type="checkbox" {{ $user->is_admin ? 'checked' : '' }}>
                    @endif
                </div>
                <div>
                    @error('is_active')
                        <span>{{ $message }}</span>
                    @enderror
                    <label for="is_active">ステータス</label>
                    @if ($user->user_id === Auth::user()->user_id)
                        {{-- ログインしているユーザーである場合、自分のステータスはいじれない --}}
                        <select disabled>
                            <option selected>有効</option>
                        </select>
                    @else
                        <select name="is_active">
                            <option {{ !$user->is_active ? 'selected' : '' }} value="0">無効</option>
                            <option {{ $user->is_active ? 'selected' : '' }} value="1">有効</option>
                        </select>
                    @endif

                </div>
            </div>
            <div>
                <button type="submit">更新</button>
            </div>
        </form>
    </div>
@endsection

@extends('app.layout')

@section('title', 'ユーザー一覧')

@section('content')
    @error('message')
        <span>{{ $message }}</span>
    @enderror
    <table>
        <thead>
            <tr>
                <th>メールアドレス</th>
                <th>姓</th>
                <th>名</th>
                <th>ステータス</th>
                <th>システム管理者</th>
                <th>作成日時</th>
                <th>更新日時</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->is_active ? '有効' : '無効' }}</td>
                    <td>{{ $user->is_admin ? 'はい' : 'いいえ' }}</td>
                    <td>{{ $user->created_at->format('Y/m/d H:i:s') }}</td>
                    <td>{{ $user->updated_at->format('Y/m/d H:i:s') }}</td>
                    <td><a href="/admin/users/{{ $user->user_id }}/edit">編集</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

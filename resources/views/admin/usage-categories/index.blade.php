@extends('app.layout')

@section('title', '利用用途一覧')

@section('content')
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    @error('message')
        <span>{{ $message }}</span>
    @enderror
    <table>
        <thead>
            <tr>
                <th>利用用途名称</th>
                <th>作成日時</th>
                <th>更新日時</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usageCategories as $usageCategory)
                <tr>
                    <td>
                        <a href="/admin/usage-categories/{{ $usageCategory->usage_category_id }}/edit">
                            {{ $usageCategory->usage_category_name }}
                        </a>
                    </td>
                    <td>{{ $usageCategory->created_at->format('Y/m/d H:i:s') }}</td>
                    <td>{{ $usageCategory->updated_at->format('Y/m/d H:i:s') }}</td>
                    <td>
                        <form action="/admin/usage-categories/{{ $usageCategory->usage_category_id }}/delete" method="POST">
                            @csrf
                            <input type="submit" value="削除">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

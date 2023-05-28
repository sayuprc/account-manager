<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>

<body>
    <header>
        @guest
            <a href="/login">ログイン</a>
            <a href="/register">登録</a>
        @else
            <form action="/logout" method="POST">
                @csrf
                <input type="submit" value="ログアウト">
            </form>
        @endguest
    </header>
    <section>
        @yield('content')
    </section>
</body>

</html>

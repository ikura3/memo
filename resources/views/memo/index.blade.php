<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メモアプリ</title>
</head>

<body>
    <div class="wrap">
        <h1>メモ一覧</h1>

        @if(session('success'))
            <div id="flash">
                <p>{{ session('success') }}</p>
            </div>

            <script>
                const message = document.getElementById('flash');
                setTimeout(function(){
                    message.style.display = 'none';
                }, 3000);
            </script>
        @endif

        <p class="create_btn"><a href="{{ route('memo.create') }}">メモを追加する</a></p>

        @foreach($memos as $memo)
            <ul>
                <li>{{ $memo->body }}</li>
                <p><a href="{{ route('memo.edit', $memo) }}">編集</a></p>
                
                <form action="{{ route('memo.destroy', $memo) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">削除</button>
                </form>
            </ul>
        @endforeach
    </div>


    <style>
        .wrap {
            width: 80%;
            background-color: #eeeeee;
            padding: 20px;
        }
        #flash {
            padding: 2px;
            background-color: #fce303;
        }
        .create_btn {
            padding: 3px 8px;
            background-color: #035491;
            font-weight: bold;
            width: 120px;
            text-align: center;
        }
        .create_btn a {
            color: #ffffff;
            text-decoration: none;
        }
    </style>
</body>
</html>
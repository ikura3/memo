<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メモを編集</title>
</head>

<body>
    <div class="wrap">
        <h1>メモを編集</h1>
        <form action="{{ route('memo.update', $memo) }}" method="post">
            @csrf
            @method('put')
            <textarea name="body" cols="40" rows="10" placeholder="ここにメモを入力する">{{ $memo->body }}</textarea>
            <button type="submit">編集する</button>
        </form>
    </div>

    <style>
        .wrap {
            width: 80%;
            background-color: #eeeeee;
            text-align: center;
            padding: 20px;
        }
    </style>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link rel="" href="{{ 'css/create.css' }}">
</head>
<body>
    
</body>


    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="">
            <label>タイトル</label>
            <input type="text" class="" placeholder="タイトルを入力して下さい" name="title">
        </div>
        <div class="">
            <label>内容</label>
            <textarea class="" placeholder="内容" rows="5" name="contents">
            </textarea>
        </div>
        <div class="">
            <label>画像ファイル</label>
            <input type="file" name="image_at">
        </div>

        <button type="submit" class="">作成</button>
    </form>
</body>

</html>

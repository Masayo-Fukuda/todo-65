<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
    
</body>
</html>
    {{-- サニタイジング防止 --}}
    <div class="form-group">
        <label>タイトル</label>
        <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title">
    </div>
    <div class="form-group">
        <label>内容</label>
        <textarea class="form-control" placeholder="内容" rows="5" name="body">
        </textarea>
    </div>
    <div class="form-group">
        <label>画像ファイル</label>
        <input type="file">
    </div>

    <button type="submit" class="btn btn-primary">作成</button>
</body>
</html>

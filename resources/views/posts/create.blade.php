<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Create a new post</title>
</head>
<body>
    <h1>Create a new post</h1>
    <form action='/posts' method='POST' enctype='multipart/form-data'>
        @csrf
        <div class='title'>
            <h2>Title</h2>
            <input type='text' name='post[title]' placeholder='タイトル' value='{{old('post.title')}}'/>
            <p class="title_error" style="color:red">{{ $errors->first('post.title') }}</p>
        </div>
        <div class='category'>
            <h2>Category</h2>
            <select name='post[category_id]'>
                @foreach($categories as $category)
                 <option value='{{$category->id}}'>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class='body'>
            <h2>Body</h2>
            <textarea name="post[body]" placeholder='本文を入力'>{{old('post.body')}}</textarea>
            <p class='body_error' style='color:red'>{{$errors->first('post.body')}}</p>
        </div>
        <div class='image'>
            <input type='file' name='image'>
        </div>
        <input type='submit' value='保存'/>
    </form>
    <div class='footer'>
        <a href='../'>戻る</a>
    </div>
</body>
</html>
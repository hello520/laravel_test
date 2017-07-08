<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>管理系统</title>

</head>
<body>
    <form action="{{url('file/upload')}}" method="post" enctype="multipart/form-data">
        <input type="file" name="aa">
        <input type="submit" value="提交">
    </form>
</body>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>批量导入</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="" rel="stylesheet">
</head>

<body>
</body>
<!-- <?php phpinfo(); ?> -->
<!-- php require_once(‘abc.php’); -->
	<form action="" method="post" enctype="multipart/form-data">
		<!-- <p>姓名：<input type="text" name="name" value="" placeholder="请输入姓名"/></p>
		<p>年龄：<input type="text" name="age" value="" placeholder="请输入年龄"/></p>
		<p>邮箱：<input type="text" name="email" value="" placeholder="请输入邮箱"/></p> -->
		<p>微信账单：<input type="file" name="uploadFile"/></p>
		{{csrf_field()}}
		<p><input type="submit" value="提交"/></p>
	</form>
</html>
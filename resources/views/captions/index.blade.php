<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gắn mô tả cho ảnh</title>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico" />
<meta name="theme-color" content="#444" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<style>
thead {color:green;}


table, th, td, tr {
  border: 1px solid black;
}
</style>
</head>

<body>
<header>
  <div class="margin">
      <div class="logo-outer">
        <!-- <a href="../index.php">
        <img src="../images/hust.png" style="height: 44px"/> -->
      </a>
     </div>
    </div>
</header>

<div id="main">
  <div class="margin">
    <h2 style="text-align: center; margin-top: 30px;">
      Gắn mô tả cho ảnh
    </h2>
    <div style="margin-top: 20px; text-align: center;">
      {{ $captions->links() }}
    </div>
    
    <table class="table">
      <thead>
        <tr>
          <th align="middle" width=5%>ID câu truy vấn</th>
          <th align="middle" width=5%>ID người</th>
          <th align="middle" width=60%>Câu truy vấn</th>
          <th align="middle" width=30%>Ảnh</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($captions as $caption)
          <tr>
            <td align="middle">{{ $caption->id }}</td>
            <td align="middle">{{ $caption->image->id }}</td>
            <td align="middle">{{ $caption->caption }}</td>
            <td align="middle"><img src="{{ '/data/imgs/'.$caption->image->file_path }}"></td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $captions->links() }}
  </div>
</body>
</html>

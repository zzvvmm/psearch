<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gắn mô tả cho ảnh</title>
<link href="{{asset('/css/css.css')}}" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="{{asset('/favicon.ico')}}" />
<meta name="theme-color" content="#444" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="{{asset('js/jquery.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="{{asset('js/bootstrap.min.js')}}" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<style>
thead {color:green;}
table, th, td, tr {
  border: 1px solid black;
}
.pagination {
  padding: 0;
  display: flex;
  justify-content: center;
}

.pagination li {
  display: block;
 }
</style>
</head>

<body>
<header>
  <div class="margin">
      <div class="logo-outer">
        <a href="{{ route('home')}}">
          <img src="{{asset('images/hust.png')}}" style="height: 70px"/>
        </a>
       </div>
    </div>
</header>

<div id="main">
  <div class="margin">
    <h2 style="text-align: center; margin-top: 30px; margin-bottom: 30px;">
      Tổng quan tiến độ
    </h2>
    <ul>
    <li>
    Tổng số câu truy vấn cần nhập: {{$caption_count}}
    </li>
    <li>
      Số câu truy vấn đã hoàn thành: {{$labeled_count}}
    </li>
    <li>
      Câu truy vấn có ID nhỏ nhất chưa được nhập: {{$first_not_labled}} (<a href="{{route('labels.index', ['page' => ceil($first_not_labled/20)])}}">Đi đến</a>)
    </li>
    <li>
      Câu truy vấn có ID lớn nhất đã được nhập: {{$last_labeled}} (<a href="{{route('labels.index', ['page' => ceil($last_labeled/20)])}}">Đi đến</a>)
    </li>
    <li>
      ID các ảnh bị thiếu:
      <ul>
        @foreach ($not_edited_images as $img)
          <li>
            {{$img}} (<a href="{{route('labels.index', ['page' => ceil($img/10)])}}">Đi đến</a>)
          </li>
        @endforeach
      </ul>
    </li>
    <li>
      Xuất và tải xuống file json (cần khoảng 2 phút để xử lý): <a href="{{route('download')}}">Tải xuống file</a>
    </li>
    </ul>
  </div>
  <footer style="position: fixed; bottom: 0;">
    <div class="margin">
      <div class="copyright">&copy;MICA 2020. All rights reserved.</div>
    </div>
  </footer>
  
</body>
</html>

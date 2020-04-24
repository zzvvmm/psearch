<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TÌM KIẾM NGƯỜI DỰA TRÊN MÔ TẢ NGÔN NGỮ TỰ NHIÊN</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="favicon.ico" />
<meta name="theme-color" content="#444" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
  .dropdown-menu {
   max-height:200px;/* you can change as you need it */
   overflow:auto;/* to get scroll */
}
</style>
</head>

<body>
  <header>
    <div class="margin">
        <div class="logo-outer">
          <a href="index.php">
          	<img src="images/hust.png" style="height: 44px"/>
          </a>
         </div>
      </div>
  </header>
  <div id="main">
    <div class="margin">

      <h3 style="text-align: center; margin-top: 30px;">
        HỆ THỐNG TÌM KIẾM NGƯỜI DỰA TRÊN MÔ TẢ NGÔN NGỮ TỰ NHIÊN
      </h3>
      <div style="margin-top: 40px;">
	      <form action="search.php" method="post">
	          <div class="inner-form">
	            <div class="input-field">
	              <div class="form-group">
	                <h5><label for="query">Bạn có thể tìm kiếm người bằng cách nhập câu mô tả người đó</label></h5>
	                <textarea class="form-control" id="query" name="query" required rows="3" placeholder="Vui lòng nhập câu mô tả. Ví dụ: Người đàn ông có mái tóc ngắn và mặc áo phông trắng, quần màu đen và đeo ba lô màu đen"></textarea>
	              </div>
	              <button type="submit" class="btn btn-info">Tìm kiếm</button>
	            </div>
	          </div>
	      </form>
    	</div>
      <div style="margin-top: 50px;">
      <div class="dropdown">
      <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Chọn câu truy vấn mẫu 
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach ($json_a[0]['captions'] as $cap)
            <a class="dropdown-item" href="show">{{$cap}}</a>
        @endforeach
        
        
      </div>
      </div>
    </div>
    	<div style="margin-top: 50px;">
    		<form>
				  <div class="form-group" style="margin-top: 20px;">
				    <h5><label for="upload">Hoặc bạn có thể tải ảnh lên để tìm người liên quan</label></h5>
				    <input type="file" class="form-control-file" id="upload">
				  </div>
				  <button type="submit" class="btn btn-info">Tìm kiếm</button>
				</form>
			</div>

      
		  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </div>

    <footer>
        <div class="margin">
          <div class="copyright">&copy;MICA 2020. All rights reserved.</div>
        </div>
      </footer>
  </div><!-- #main end -->
</body>
</html>

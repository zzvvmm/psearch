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
          <img src="{{asset('/images/hust.png')}}" style="height: 70px"/>
        </a>
       </div>
    </div>
</header>

<div id="main">
  <div class="margin">
    <h2 style="text-align: center; margin-top: 30px;">
      Gắn mô tả cho ảnh
    </h2>
    <h5 style="margin-top: 20px;">
      <a href="{{route('summary')}}">Tổng quan tiến độ</a>
    </h5>
    <div style="margin-top: 40px; text-align: center;">
      {{ $images->onEachSide(2)->links() }}
      <form  action="{{route('labels.index')}}">
        <div class="form-row">
          <div class="col-md-5 mb-1">

          </div>
          <div class="col-md-1 mb-1">
            <label for="page" class="sr-only">Số trang</label>
            <input type="text" class="form-control-plaintext is-valid" name="page" style="text-align: center; border-color: #117a8b; border-width: thin;" type="number" value="{{$images->currentPage()}}">
          </div>
          <div class="col-md-1 mb-1">
            <button type="submit" class="btn btn-primary mb-2" style="width: 70px;">Đến</button>

          </div>
          <div class="col-md-6 mb-2">

          </div>
        </div>
      </form>
    </div>
    <table>
      <thead>
        <tr>
          <th style="text-align: center;" width=5%>ID người</th>
          <th style="text-align: center;" width=5%>ID câu truy vấn</th>
          <th style="text-align: center;" width=65%>Câu truy vấn</th>
          <th style="text-align: center;" width=20%>Ảnh</th>
          <th style="text-align: center;" width=5%>ID ảnh</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($images as $image)
            @foreach ($image->captions as $key => $caption)
              <tr> 
                <td align="middle">{{ $image->user_id }}</td>
                <td align="middle">{{ $caption->id }}</td>
                <td align="middle">
                  @if ($caption->edited == true)
                    <textarea id="tarea_{{ $caption->id }}" class="form-control" rows="5" disabled="true" style="color: green;">{{ $caption->caption }}</textarea>
                  @else
                    <textarea id="tarea_{{ $caption->id }}" class="form-control" rows="5" disabled="true">{{ $caption->caption }}</textarea>
                  @endif
                  
                  <br>
                  <button id="edit_{{ $caption->id }}" type="button" data-caption="{{ $caption->caption }}" data-id="{{ $caption->id }}" onclick='editCaption("{{ $caption->id }}")' style="margin-top: -10px;margin-bottom: 7px;" class="btn btn-warning edit-caption">Sửa</button>
                  <button id="update_{{ $caption->id }}" type="button" data-caption="{{ $caption->caption }}" data-id="{{ $caption->id }}" onclick='updateCaption("{{ $caption->id }}")' style="margin-top: -10px; display: none; margin-bottom: 7px;" class="btn btn-success update-caption">Lưu</button>
                </td>
                @if ($key % 2 == 0)
                  <td rowspan="2" align="middle"><img height="300px" src="{{ asset('/data/imgs/'.$image->file_path) }}"></td>
                @endif
                @if ($key % 2 == 0)
                  <td rowspan="2" align="middle">{{ $image->id }}</td>
                @endif
              </tr>
            @endforeach
        @endforeach
      </tbody>
    </table>
    <div style="margin-top: 20px; text-align: center;">
      {{ $images->onEachSide(2)->links() }}
      <form  action="{{route('labels.index')}}">
        <div class="form-row">
          <div class="col-md-5 mb-1">

          </div>
          <div class="col-md-1 mb-1">
            <label for="page" class="sr-only">Số trang</label>
            <input type="text" class="form-control-plaintext is-valid" name="page" style="text-align: center; border-color: #117a8b; border-width: thin;" type="number" value="{{$images->currentPage()}}">
          </div>
          <div class="col-md-1 mb-1">
            <button type="submit" class="btn btn-primary mb-2" style="width: 70px;">Đến</button>

          </div>
          <div class="col-md-6 mb-2">

          </div>
        </div>
      </form>
    </div>
  </div>
  <footer id="#footer">
    <div class="margin">
      <div class="copyright">&copy;MICA 2020. All rights reserved.</div>
    </div>
  </footer>
  <script type="text/javascript">
    // $(".edit-caption").click(function(){
      
    // })
    // $(".update-caption").click(function(){
    //   debugger;
    //   var edit_id = $(this).data('id');
    //   var new_caption = $(this).data('caption');
    //   $("#edit_" + edit_id).prop("disabled", true);
    //   $(this).removeClass("btn-success").removeClass("update-caption").addClass("btn-warning").addClass("edit-caption");
    //   $(this).html("Sửa");
    //   $.ajax({
    //            type:'POST',
    //            url:'/captions/#{edit_id}',
    //            data: {
    //                  caption: new_caption,
    //               },
    //            success:function(data) {
    //               alert(data)
    //            }
    //         });
    // })
      function editCaption(id){ 
        // var edit_id = $(this).data('id');
        // var old_caption = $(this).data('caption');
        // $("#caption" + edit_id).prop("disabled", false);
        $("#tarea_" + id).prop("disabled", false);
        $("#edit_" + id).hide()
        $("#update_" + id).show()
      }
      function updateCaption(id){ 
        var new_caption = $("#tarea_" + id).val();
        
        $.ajax({
               type:'PATCH',
               url:'captions/'+id,
               data: {
                     caption: new_caption,
                  },
               success:function(data) {
                  $("#tarea_" + id).css("color", "green")
                  $("#update_" + id).hide()
                  $("#edit_" + id).show()
                  $("#tarea_" + id).prop("disabled", true);
               }
            });
      }
  </script>
</body>
</html>

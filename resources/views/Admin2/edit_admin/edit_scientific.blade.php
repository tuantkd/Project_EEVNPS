@include('Admin2.header')


  <style type="text/css" media="screen">
    #pannel{
      border: 1px solid gray;
      border-radius: 3px;
    }
    h4{
      color: #2F4F4F;
    }
    
  </style>

  {{-- container --}}
  <div class="container">
    
      <div class="row">
      
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="pannel"><br>
      <h2 align="center">Cập nhật tài liệu thông tin bài báo khoa học:</h2><br>

      <div class="panel panel-default">
        <div class="panel-body">


          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <form action="update_scientific_admin{!! $scientific->id !!}" method="post"
          enctype="multipart/form-data">

            {!! csrf_field() !!}
            {!! method_field('PUT') !!}

            <div class="form-group">
                <h4>Tiêu đề:</h4>
                <input type="text" class="form-control"
                value="{!! $scientific->title_file !!}" name="txt_tieude_tailieu">
            </div>

            <div class="form-group">
                <h4>Nội dung tóm tắt:</h4>
                <textarea class="form-control" rows="3" name="txt_tomtat_tailieu">{!! $scientific->content !!}
                </textarea>
            </div>
            
            <div class="form-group">
              <h4>Thể loại: Thông tin $ bài báo khoa học</h4>
              <input type="hidden" class="form-control" style="width: 50%;" value="3" 
              name="txt_loai_tailieu">
            </div>
            
            <div class="form-group">
              <h4>Tác giả:</h4>
                <input type="text" class="form-control" style="width: 50%;"
                value="{!! $scientific->author !!}" name="txt_tacgia_tailieu">
            </div>

            <div class="form-group">
              <h4>Năm xuất bản:</h4>
                <input type="text" class="form-control" style="width: 50%;"
                value="{!! $scientific->publish !!}" name="txt_xuatban_tailieu">
            </div>

            <div class="form-group">
                <h4>Nguồn:</h4>
                <input type="text" class="form-control" style="width: 50%;"
                value="{!! $scientific->source !!}" name="txt_nguon_tailieu">
            </div>
            <hr>

            <div class="form-group">
                <h4>Chọn tệp upload file:</h4>
                <div class="form-group">
                  <input type="file" value="{!! $scientific->file_name !!}" name="file_tailieu" id="file"/>
                </div>
            </div>

            <div class="form-group">
                <h4>Chọn tệp ảnh bìa tài liệu:</h4>
                <div class="form-group">
                  <input type="file" value="{!! $scientific->file_cover_image !!}" name="cover_image_tailieu" id="cover_image"/>
                </div>
            </div>
            
            
            @if(Auth::check())
              <input type="hidden" name="txt_user" value="{!! Auth::user()->id !!}">
            @endif

            <br>
        
              <div class="text-right">
                <button type="submit" class="btn btn-primary">
                CẬP NHẬT
                </button>
            </div>
          </form>
          

          <br>

          
          <!--script kiểm tra file upload tài liệu-->
           <script type="text/javascript">
            var uploadField = document.getElementById("file");
              uploadField.onchange = function() {
                  if(this.files[0].size > 2097152){
                     alert("Kích thước file bắt buộc nhỏ hơn 2M. Vui lòng chọn lại!");
                     this.value = "";
                  };
              };
           </script>
           <!--script kiểm tra file upload tài liệu-->


           <!--script size ảnh bìa tài liệu-->
               <script type="text/javascript">
                var uploadField = document.getElementById("cover_image");
                  uploadField.onchange = function() {
                      if(this.files[0].size > 1097152){
                         alert("Kích thước hình ảnh nhỏ hơn 1M!");
                         this.value = "";
                      };
                  };
               </script>
            <!--script size ảnh bìa tài liệu-->


        </div>
        {{-- end_panel-body --}}
      </div>
      {{-- end_panel panel-default --}}

    </div>
    {{-- end_col1 --}}
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>

  </div>
  {{-- end_container --}}



@include('Admin2.footer')

@include('Admin2.header')

  {{-- container --}}
  <div class="container">


      <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <div class="panel panel-primary"
          style="border: 1px solid gray; border-radius: 3px;">

              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
              @endif <br>


                <div class="panel-body">

                    <form action="{{ route('post_banner') }}"
                    enctype="multipart/form-data" method="POST" style="margin: 10px;">

                      {{ csrf_field() }}

                        <h2 align="center">Thêm banner web:</h2><br>

                        <div class="form-group">
                          <h4>Tiêu đề banner:</h4>
                          <input type="text" name="txt_tieude" class="form-control">
                        </div>

                        @if(Auth::check())
                          <input type="hidden" name="txt_user"
                          value="{!! Auth::user()->id !!}">
                        @endif
                        
                        <div class="form-group">
                          <input type="file" name="file" id="banner"/>
                        </div>
                        
                        <div class="text-right">
                          <button type="submit" class="btn btn-primary bottom-left">
                            <i class="fas fa-plus-square"></i> Thêm</button>
                        </div>
                        
                    </form>

                </div><br>
                {{-- panel-body --}}
               

                <!--script size ảnh-->
                 <script type="text/javascript">
                  var uploadField = document.getElementById("banner");
                  uploadField.onchange = function() {
                      if(this.files[0].size > 2097152){
                        alert("Kích thước hình ảnh bắt buộc nhỏ hơn 2M và khung nhìn 1002x200 pixel.");
                        this.value = "";
                      };
                  };
                 </script>
                <!--script size ảnh-->



          </div>
          {{-- panel panel-primary --}}

        </div>
        {{-- end_col2--}}
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
      </div>
      {{-- end_row --}}

	</div>
  {{-- end_container --}}

@include('Admin2.footer')

@include('Admin2.header')

  <style type="text/css" media="screen">
    #card-header{
      background-color: #87CEEB;
    }

    h3{
      color: #006400;
    }
  </style>

  {{-- container --}}
  <div class="container">
    
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- DataTables Example -->

        <div class="text-right">
          <a class="btn btn-success" href="{!! URL::to('get_add_embed_video') !!}"
          role="button">
            <i class="fab fa-youtube"></i>&nbsp;
            Nhúng video mới từ youtube
          </a>
        </div><br>

        <!-- Navbar Search -->
        <h4>Tìm kiếm video:</h4>
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"
        method="GET" action="{{ route('view_embed_video_admin') }}">
          {{ csrf_field() }}

          <div class="input-group">
            <input type="text" class="form-control" name="txt_timkiem" 
            placeholder="Nhập từ khóa tìm ...">

            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>

          </div><br>
        </form>
        <!-- Navbar Search -->
        

        @if(session()->has('message'))
            <div class="alert alert-success" style="width: 30%;" align="center">
                <strong>{{ session()->get('message') }}</strong>
            </div>
        @endif

        <div class="card mb-3">
          <div class="card-header" id="card-header">
            <h4><i class="fab fa-youtube"></i>&nbsp;Video đã duyệt</h4>
          </div>

          <div class="card-body" id="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tiêu đề</th>
                      <th>Nguồn</th>
                      <th>Thành viên</th>
                      <th>Video youtube</th>
                      <th>Ngày tạo</th>
                      <th>Ngày cập nhật</th>
                      <th colspan="2">Tùy chọn</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php $i=1; ?>
                    @if (isset($data_video))
                    @foreach($data_video as $video)

                    @php($users = DB::table('users')
                    ->where('id', $video->id_user_fk)->get())

                    <tr>
                      <td><strong><?php echo $i++; ?></strong></td>
                      <td>{!! $video->title_file !!}</td>
                      <td>{!! $video->source !!}</td>

                      @foreach($users as $user)
                        <td>{!! $user->name !!}</td>
                      @endforeach
                      
                      <td>
                        <div class="embed-responsive embed-responsive-16by9">
                          {!! $video->code_iframe_youtb !!}
                        </div>
                      </td>

                      <td>
                        {!! date("d-m-Y", strtotime($video->created_at)) !!}
                      </td>

                      <td>
                        {!! date("d-m-Y", strtotime($video->updated_at)) !!}
                      </td>
                      
                      <td>
                        <a class="btn btn-success" data-toggle="tooltip" title="Chỉnh sửa"
                        href="get_edit_video_admin{!! $video->id !!}" role="button">
                          <i class="far fa-edit"></i>
                        </a>
                      </td>

                      <td>
                        <a class="btn btn-danger" data-toggle="tooltip" title="Xóa"
                        href="get_delete_video_admin{!! $video->id !!}"
                        onclick="return xacnhanxoa('Bạn có chắc chắn xóa không?')" role="button"> 
                          <i class="far fa-trash-alt"></i>
                        </a>
                      </td>

                    </tr>

                    @endforeach
                    @endif

                    <!--XÁC NHẬN XÓA-->
                    <script type="text/javascript">
                      function xacnhanxoa(msg){
                        if(window.confirm(msg)){
                          return true;
                        }
                        return false;
                      }
                    </script>
                    <!--XÁC NHẬN XÓA-->

                    <!--Hiện thông tin-->
                    <script>
                      $(document).ready(function(){
                        $('[data-toggle="tooltip"]').tooltip();   
                      });
                    </script>
                    <!--Hiện thông tin-->

                  </tbody>
                </table>
              </div><br>


              @if (isset($data_video))
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <nav>
                      <ul class="pagination justify-content-end"> 
                          {{ $data_video->links('vendor.pagination.bootstrap-4') }}
                      </ul>
                    </nav>
                  </div>
                </div>
              @endif

          </div>
          <!-- end-card-body -->
    
        </div>
        {{-- end_col --}}
      </div>
      {{-- end_row1 --}}


	</div>
  {{-- end_container --}}

@include('Admin2.footer')
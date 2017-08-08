<!-- page content -->
        <div class="right_col" role="main" style="min-height: 600px">
          <div class="">           

            <div class="clearfix"></div>

            <div class="row">              
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Danh sách trang<!--<small>Users</small>--></h2>
                    <ul class="nav navbar-rigth panel_toolbox" style="min-width: auto;">
                      <li><button class="btn btn-primary" id="btn_new">Thêm mới</button></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                    
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-6">
                      </div>
                      <div class="col-sm-6">
                        
                        <div class="dataTables_filter" style="margin-bottom: 10px">
                        <label style="margin: 5px 5px 0px 0;">Tìm</label>
                          <input type="search" id="table_search" class="form-control input-sm" style="float: right;width: 88%">
                          </div>                        
                        </div>
                    </div>
          
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <div class="row">
                      <div class="col-sm-12">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Tên Trang</th>
                          <!-- <th>Hiển ở trang chủ</th> -->
                          <th>Hiện</th>
                          <th>Sửa</th>
                          <th>Xóa</th>                        
                        </tr>
                      </thead>
                      <tbody id="fbody">
                      {%for key,item in pages%}
                        <tr>
                          <td>{{key+1}}</td> 
                          <td id="name_{{item['page_id']}}">{{item['page_name']}}</td>                          
                          <td>                            
                            <span class="fa {%if item['del_flg'] == 1%}fa-square-o{%else%}fa-check-square{%endif%}" style="font-size: 16px;"></span>                            
                          </td>
                          <td>
                            <a class="btn btn-warning btn-xs btn_edit" href="{{url.get('page/edit/')}}{{item['page_id']}}">Sửa</a>
                          </td>
                          <td>
                            <button class="btn btn btn-danger btn-xs btn_delete" id="del_{{item['page_id']}}">Xóa</button>
                          </td>
                        </tr>
                      {%endfor%}                        
                      </tbody>
                    </table>
                    
                    </div>
          </div>
          
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        
        </div>
        <!-- /page content -->
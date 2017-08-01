<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      {{ stylesheet_link('template1/css/bootstrap.min.css') }}
      {{ stylesheet_link('template1/css/style.css') }}
      {{ stylesheet_link('template1/css/icon-font-awesome.css') }}
      {{ javascript_include('template1/js/jquery.min.js') }}
      {{ javascript_include('template1/js/bootstrap.min.js') }}
        
   </head>
   <body>
      <div class="row">
         <div class="container" id="header">
            <div class="row" >
               <div class="col-md-4 col-sm-4 col-xs-6">
                  <img src="{{url.get('template1/images/logo.png')}}" />  
               </div>
               
               <div class="col-md-8 col-sm-8 col-xs-6">
                  <ul class="dang-tin-icon">
                     <li><span class="fa fa-pencil"></span><a href="{{url.get('dang-tin')}}">Đăng tin miễn phí</a></li>
                     <li><span class="fa fa-pencil-square-o"></span><a href="{{url.get('dang-ky')}}">Đăng ký</a></li>
                     <li><span class="fa fa-users"></span><a href="{{url.get('dang-nhap')}}">Đăng nhập</a></li>
                  </ul>
               </div>        
            </div> 
         </div>
      </div>  
      <div class="row background_menu">
         <div class="container" id="header">            
            <div class="menu_top">
               <ul class="dropDownMenu">
                  {{ elements.getMenu() }}
               </ul>
            </div>
         </div>
      </div>
       {{ content() }}
      <div class="row background_menu">
         <div class="container" id="menu_footer">            
            <div class="menu_top">
               <ul class="dropDownMenu">
                  <li><a href="{{url.get('')}}">Tin tức</a></li>
                  <li><a href="{{url.get('')}}">Bất động sản toàn quốc</a></li>
                  <li><a href="{{url.get('')}}">Thông tin thị trường</a></li>
                  <li><a href="{{url.get('')}}">Tin tức pháp luật</a></li>
                  <li><a href="{{url.get('')}}">Chính sách mới</a></li>
                  <li><a href="{{url.get('')}}">Thông tin quy hoạch</a></li>
                  <li><a href="{{url.get('')}}">Tin dự án</a></li>
                  <li><a href="{{url.get('')}}">Tin đầu tư trong nước</a></li>
                  <li><a href="{{url.get('')}}">Thị trường BĐS thế giới</a></li>
               </ul>
            </div>
         </div>
      </div>
      <div class="row" id="footer">
         <div class="container" >
            <div class="col-md-6" id="footer_col_1">
               <p><strong>CÔNG TY CỔ PHẦN DỊCH VỤ PHÁT TRIỂN NHÀ ĐẤT HÀ NỘI</strong></p>
               <p><strong>Địa chỉ:</strong> Tầng 7, tòa nhà BIGOFFICE 152  Vũ Phạm Hàm , Phường Yên Hòa , Quận Cầu Giấy, Hà Nội</p>
               <p><strong>Hotline:</strong> 0981 003 881</p>
               <p><strong>Email:</strong> datxanhmienbac@gmail.com</p>
            </div>
           
         </div>
      </div>
   </body>
</html>
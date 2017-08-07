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
      {{ partial('includes/footer') }}
   </body>
</html>
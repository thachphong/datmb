{{ partial('includes/search') }}
<div class="row">
   <div class="container" id="content">            
      <div class="col-md-8 col-sm-12 col-xs-12 margin_top">
         <div class="row margin_top pn_background pn_border post_pn" >
            <div class="post_head">
               <h1>{{post_name}}</h1> 
               <div class="khuvuc"><label><i class="fa fa-map-marker2"></i>Khu vực: <a>{{ctg_name}} tại {{m_ward_name}} - {{m_district_name}} - {{m_provin_name}}</a></label></div> 
               <div class="khuvuc">
                  Giá: <span class="postprice">{{price}} {{m_unit_name}}   </span>
                  Diện tích: <span class="postprice">{{acreage}} m2</span>
               </div>
            </div>
            <hr class="line" />
            <div class="post_body">
               <h3 class="post_body_title">Thông tin mô tả</h3>
               <div>
                  {{content|nl2br}}
               </div>
            </div>
            <hr class="line" />
            <div class="post_tab">
               <a href="javascript:void(0)" class="tab_item active"><i class="fa fa-picture-o"></i>Hình ảnh(1)</a>
               <a href="javascript:void(0)" class="tab_item"><i class="fa fa-map-marker3"></i>Bản đồ</a>
            </div>
            <div class="tab_item_detail" id="tab_detail_1">
               <div>
                  <ul class="bxslider" >
                     {%for img in imglist%}
                        <li><img src="{{url.get('')}}{{img.img_path}}"></li>
                     {%endfor%}
                  </ul>
               </div>               
               <div class="imgscroll" id="bx-pager">                  
                  <ul>
                     {%for key,img in imglist%}
                     <li><a data-slide-index="{{key}}"><img src="{{url.get('')}}{{img.img_path}}"></a></li>
                     {%endfor%}                  
                  </ul>                 
               </div>
            </div>
            <div class="tab_item_detail" id="tab_detail_2">
               <div id="map" style="width:100%;height:400px;"></div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <h3 class="post_body_title">Đặc điểm bất động sản</h3>
               <table class="other_detail">
                  <tr>
                     <td>Mã số</td>
                     <td>{{post_id}}</td>
                  </tr>
                  <tr>
                     <td>Loại tin rao</td>
                     <td>{{ctg_name}}</td>
                  </tr>
                  <tr>
                     <td>ngày đăng tin</td>
                     <td>{{start_date}}</td>
                  </tr>
                  <tr>
                     <td>Ngày hết hạn</td>
                     <td>{{end_date}}</td>
                  </tr>
                  <tr>
                     <td>Hướng nhà</td>
                     <td>{{m_directional_name}}</td>
                  </tr>
                  <tr>
                     <td>Số phòng</td>
                     <td>{{room_num}}</td>
                  </tr>
                  <tr>
                     <td>Số toilet</td>
                     <td>{{toilet_num}}</td>
                  </tr>
               </table>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <h3 class="post_body_title">Thông tin liên hệ</h3>
               <table class="other_detail">
                  <tr>
                     <td>Tên liên lạc</td>
                     <td>{{full_name}}</td>
                  </tr>
                  <tr>
                     <td>Địa chỉ</td>
                     <td>{{contract_address}}</td>
                  </tr>
                  <tr>
                     <td>Điện thoại</td>
                     <td>{{phone}}</td>
                  </tr>
                  <tr>
                     <td>Di động</td>
                     <td>{{mobie}}</td>
                  </tr>
                  <tr>
                     <td>Email</td>
                     <td>{{email}}</td>
                  </tr>
               </table>
            </div>
         </div> 
         
            
      </div>
      {{ partial('includes/right') }}
   </div>
</div>
{{ stylesheet_link('template1/css/jquery.bxslider.css') }}
{{ javascript_include('template1/js/jquery.bxslider.min.js') }}

<script type="text/javascript">
$(document).ready(function() {
   var map_api_key ='AIzaSyAbkqq1po0p6Z1rnpQSSlO4x32JrdnedY0';
   $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager'
        ,auto:true
   });
   $(document).off('click','.tab_item');
   $(document).on('click','.tab_item',function(){
      $('.tab_item').removeClass('active');
      $(this).addClass('active');
   });

});
   function initMap() {
        var myLatLng = {lat: -25.363, lng: 131.044};

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          scrollwheel: false,
          zoom: 8
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          position: myLatLng,
          title: 'Hello World!'
        });
      }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbkqq1po0p6Z1rnpQSSlO4x32JrdnedY0&callback=initMap"  async defer></script>
{{ partial('includes/search') }}
<div class="row">
   <div class="container" id="content">            
      <div class="col-md-8 col-sm-12 col-xs-12">
         <div class="row margin_top" >
            <div class="pn_title">
               <span class="bg_icon" style="padding: 6px 4px 4px 2px;"><i class="fa fa-list"></i></span>
               <h1>TIN RAO MỚI</h1>
            </div>
            <div class="new_list">
               {%for item in newlist%}
                  <div class="row margin_top pn_background pn_border">
                     <div class="col-md-3 col-sm-3 col-xs-12 post_img">
                        <img src="{{url.get(item['img_path'])}}" class="img_newlist">
                     </div>
                     <div class="col-md-9 col-sm-9 col-xs-12">
                        <a href="{{url.get(item['post_no'])}}{{item['post_id']}}" class="post_title">{{item['post_name']}}</a>
                        <div class="icon_post"><label><i class="fa fa-usd"></i>Giá<span>: </span></label><strong>{{item['price']}} {{item['m_unit_name']}}</strong></div>
                        <div class="icon_post"><label><i class="fa fa-university"></i>Diện tích<span>: </span></label>{{item['acreage']}} m2</div>
                        <div class="icon_post"><label><i class="fa fa-map-marker"></i>Vị trí<span>: </span></label>
                        {{item['m_district_name']}} - {{item['m_provin_name']}}</div>
                        <span class="post_date">{{item['start_date']}}</span>
                     </div>
                  </div>
               {%endfor%}
            </div>
         </div>        
      </div>
      <div class="col-md-4 col-sm-12 col-xs-12">
         <div class="row margin_top">
            <div class="pn_title">
               <span class="bg_icon" style="padding: 6px 4px 4px 2px;"><i class="fa fa-list"></i></span>
               <h3>Tin đặc biệt</h3>
            </div>
            <div class="viplist">
               {%for item in newlist%}
                  <div class="vipitem pn_background">
                     <img src="{{url.get(item['img_path'])}}">
                     <div >
                        <a href="{{url.get(item['post_no'])}}{{item['post_id']}}">{{item['post_name']}}</a>
                        <div style="text-align:right">
                        <span><strong>{{item['price']}}</strong> {{item['m_unit_name']}}</span>
                        </div>
                     </div>
                  </div>
               {%endfor%}
            </div>
         </div>
         <div class="row margin_top">
            <div class="pn_title">
               <span class="bg_icon" style="padding: 6px 4px 4px 2px;"><i class="fa fa-list"></i></span>
               <h3>Tin xem nhiều</h3>
            </div>
            <div>
            </div>
         </div>
         <div class="row margin_top">
            <div class="pn_title">
               <span class="bg_icon" style="padding: 6px 4px 4px 2px;"><i class="fa fa-list"></i></span>
               <h3>Dự án nổi bật</h3>
            </div>
            <div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="col-md-4 col-sm-12 col-xs-12 margin_top">
         <div class="row margin_top">
            <div class="pn_title">
               <span class="bg_icon" style="padding: 6px 4px 4px 2px;"><i class="fa fa-list"></i></span>
               <h3>Tin đặc biệt</h3>
            </div>
            <div class="viplist">
               {%for item in viplist%}
                  <div class="vipitem pn_background pn_border">
                     <img src="{{url.get('crop/50x50/')}}{{item['img_path']}}">
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
            
            <div class="newsboxrow pn_background pn_border">
               <div class="colbox ">
                     <ul class="boxright">
                     {%for key,item in xemnhieu%}
                           <li> <i class="fa fa-circle"></i><a href="{{url.get('tim-tuc/')}}{{item['news_no']}}_{{item['news_id']}}">{{item['news_name']}}</a></li>
                           {%if key < (xemnhieu|length -1 )%}
                              <hr class="row_line" />
                           {%endif%}
                     {%endfor%}
                     </ul>
               </div>
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
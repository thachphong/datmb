<section class="main">
	<div class="container">
        <div class="row">
            <div class="col-lg-9 col-sm-9 col-xs-12 money-posts">
                <div class="news-posts">
                    <div class="row">
                        <div class="col-lg-7 col-sm-6 col-xs-6">
                            <ul class="left">
                            {% for key,item in newtab if key <4 %}
                            	<li>
                                <a class="bold" href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">
                                {% if key == '0' %}
                                    <img style ="width:482px; height:305px" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_482x340 wp-post-image" alt="{{item.caption}}"/> {{item.caption}}</a>
                                    <p>{{item.des}}</p>
                                {% else %}
                                	<img style="width:170px; height:122px" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_170x122 wp-post-image" alt="{{item.caption}}"/>{{item.caption}}"</a> 		    
                                		
                                {% endif %}
                                </li>
                            {% endfor %}
                                        
                            </ul>
                        </div>
                        <div class="col-lg-5 col-sm-6 col-xs-6">
                            <ul class="right">
                            {% for key,item in newtab if key >=4 %}
	                        	<li>
	                        		<a href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">
	                                    <img style="width:75px; height:60px" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_75x60 wp-post-image" alt="{{item.caption}}"/></a>
	                                <div class="info-post">
                                        <a class="bold" href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">{{item.caption}}</a>
                                        <span class="date timepost" data-time="">{{elements.formatdate(item.add_date,item.add_time)}}</span>
                                	</div>
	                                
	                            </li>
	                        {% endfor %}
                        	</ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 hidden-xs ads-top-right">
                <div id="text-17" class="widget_text">			
                	<div class="textwidget">
                		<a href="http://bloglamme.com/tro-thanh-cong-tac-vien-cua-blog-lam-me/" target="_blank">
                		<img style="display:block;" <img style="display:block;" src="http://bloglamme.com/wp-content/uploads/2016/02/tuyen-ctv.png" border="0px" width="348px" height="150px;">
                			
                	</div>
				</div>
				<div id="text-13" class="widget_text">			
					<div class="textwidget"><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_34251.ads"></script></div>
				</div>          
			</div>
        </div>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="popular-posts">
                            <div class="subcat">
                                <div class="title_active">
                                    <i class="fa fa-child"></i> <a href="" title="Thế giới">Thế giới</a>                                </div>
                            </div>
                            <div id="owl-popular" class="owl-carousel">
                            	{% for key,item in data1 %}
	                        	<div class="item">
	                        		<h3>
	                        		<a class="bold" href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">
	                                    <img class="owl-lazy" data-src="{{url.get('images/'~item.filename)}}" alt="{{item.caption}}" title="{{item.caption}}"/>{{item.caption}}</a>
	                                
	                                </h3>
	                            </div>
	                        	{% endfor %}
                                    
                            </div>
                        </div>
                    </div>
                </div>
        <div class="row">
            <div class="main-content">
                                                <div class="col-lg-9 col-sm-9 main-left">
                            <div class="row">
                                <div class="col-lg-8 col-sm-8 posts-left">
                                    <div id="eweb_post_by_cate_6-3" class="item-cate item-cate-4">            
                                    	<div class="subcat">
							                <div class="title_active">
							                    <i class="fa fa-fa fa-book"></i>  
							                    <h2><a href="/xa-hoi/" title="Xã hội">Xã hội</a></h2>                		
							                </div>
							            </div>
				            <div class="list-posts list-posts-4">
				                <ul>
				                {% for key,item in data2 %}
				                	<li>
				                		<a href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">  
				                        <img style="width:75px; height:60px" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_75x60 wp-post-image" alt="{{item.caption}}"/></a>
				                        <a class="bold" href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">{{item.caption}}</a>
				                	</li>
				                {% endfor%}
						    	</ul>
				            </div>
        						</div>		
        <div id="eweb_post_by_cate_7-2" class="item-cate item-cate-5">            
        	<div class="subcat">
                <div class="title_active">
                    <i class="fa fa-"></i>  <h2><a href="/suc-khoe/" title="Sức khỏe">Sức khỏe</a></h2>                
                </div>
            </div>
            <div class="list-posts list-posts-5">
                <ul>
                				{% for key,item in data3 %}
				                	<li>
				                		<a href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">  
				                        <img style="width:170px; height:122px" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_170x122 wp-post-image" alt="{{item.caption}}"/></a>
				                        <a class="bold" href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">{{item.caption}}</a>
				                	</li>
				        		{% endfor%}
		    		                </ul>
            </div>
        </div>		<div id="eweb_post_by_cate_4-9" class="item-cate item73">            
        				<div class="subcat">
                			<div class="title_active">
	                    		<i class="fa fa-fa fa-child"></i>  
	                    		<h2><a href="http://bloglamme.com/cham-soc-be/" title="An ninh - Xã hội">An ninh - Xã hội</a></h2>
                    		</div>
                			<ul>
                	        </ul>
            			</div>
            			<div class="list-posts list-posts-2">            			
                			<ul>
                			{% for key,item in data4 %}
				                	<li>
				                	{%if key=='0'%}
				                		<a class="bold" href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">  
				                        <img style="width:543px; height:305px" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_259x186 wp-post-image" alt="{{item.caption}}"/>{{item.caption}}</a>
				                        <p>{{item.des}} ...</p>
				                    {%else%}
				                    	<a class="bold" href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">  
				                        <img style="width:75px; height:60px" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_75x60 wp-post-image" alt="{{item.caption}}"/>{{item.caption}}</a>
				                    {%endif%}
				                	</li>
				        	{% endfor%}
                    		</ul>
            			</div>
        </div>		
        <div id="eweb_post_by_cate_5-3" class="item-cate ">
            <div class="subcat">
                <div class="title_active">
                    <i class="fa fa-fa fa-trophy"></i>  
                    <h2><a href="khoa-hoc-cong-nghe/" title="Khoa học - công nghệ">Khoa học - công nghệ</a></h2>
                </div>
                <!--<ul>
                	<li><a href="tu-van-cho-con/" title="Tư vấn cho con">Tư vấn cho con</a></li>
                	<li><a href="tu-van-cho-me/" title="Tư vấn cho mẹ">Tư vấn cho mẹ</a></li>                
                </ul>-->
            </div>
            <div class="list-posts list-posts-3">
                <ul>
                				{% for key,item in data5 %}
				                	<li>
				                		<a class="bold" href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">  
				                        <img style="width:170px; height:122px" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_170x122 wp-post-image" alt="{{item.caption}}"/>{{item.caption}}</a>
				                	</li>
				        		{% endfor%}
                	                    
		    		                </ul>
            </div>
        </div>		
        <div id="eweb_post_by_cate_4-6" class="item-cate item73">            
        	<div class="subcat">
                <div class="title_active">
                    <i class="fa fa-"></i>  <h2><a href="http://bloglamme.com/vao-bep/" title="Tình yêu - giới tính">Tình yêu - giới tính</a></h2>                		</div>
                <!--<ul> sub menu
                	<li><a href="/vao-bep/dinh-duong-cho-con/" title="Dinh dưỡng cho con">Dinh dưỡng cho con</a></li>
                	<li><a href="/vao-bep/mon-ngon/" title="Món ngon">Món ngon</a></li>                
                </ul>-->
            </div>
            <div class="list-posts list-posts-2">
                <ul>
                {% for key,item in data6 %}
                	<li>
                		<a class="bold" href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">
                		{% if key=='0' %}
                        	<img width="650" height="480" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_259x186 wp-post-image" alt="{{item.caption}}"/>{{item.caption}}</a>
                        <p>{{item.des}}</p>
                        {% else %}
                        	<img width="75" height="60" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_75x60 wp-post-image" alt="{{item.caption}}"/>{{item.caption}}</a>
                        {% endif%}
                	</li>
                {% endfor%}                	
                </ul>
            </div>
        </div>		
        <div id="eweb_post_by_cate_5-2" class="item-cate ">            
        	<div class="subcat">
                <div class="title_active">
                    <i class="fa fa-"></i>  <h2><a href="http://bloglamme.com/gia-dinh/" title="Tâm sự">Tâm sự</a></h2>           			</div>
                <!--<ul>
                	<li><a href="/gia-dinh/goc-vo-chong/" title="Góc vợ chồng">Góc vợ chồng</a></li>
                	<li><a href="gia-dinh/tam-su/" title="Tâm sự">Tâm sự</a></li><li><a href="http://bloglamme.com/gia-dinh/viet-cho-con/" title="Viết cho con">Viết cho con</a></li>                
                </ul>-->
            </div>
            <div class="list-posts list-posts-3">
                <ul>
                {% for key,item in data7 %}
                	<li>
                		<a class="bold" href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">  
                        <img style="width:170px; height:122px" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_259x186 wp-post-image" alt="{{item.caption}}"/>{{item.caption}}</a>
                	</li>
                {% endfor%}         
		    	</ul>
            </div>
        </div>                                
    </div>
                                <div class="col-lg-4 col-sm-4 posts-right">
                                    		<div class="tabsview">
	        <div id="tabs">
	            <ul>
	                <li><a href="#tabs-1"><i class="fa fa-rocket"></i> Đọc Nhiều</a></li>
	                <li><a href="#tabs-2"><i class="fa fa-eye"></i> Mớt Nhất</a></li>
	            </ul>
	            <div id="tabs-1">
	                <div class="list-posts">
		                <ul>
		                	{{ elements.getTopPost() }}	
		                </ul>			                   
		            </div>
	            </div>
	            <div id="tabs-2">
	                <div class="list-posts">
		                <ul>
		                	{{ elements.getNewPost() }}	
		                </ul>
		            </div>
	            </div>
	        </div>
	        <script>
	        jQuery(function() {
	             jQuery( "#tabs" ).tabs();
	        });
	        </script>
	    </div>
        		<div id="eweb_post_by_cate_3-3" class="item-cate-2 item-cate-3 item-cate">            <div class="subcat-2"><span>	            <a href="http://bloglamme.com/song-khoe/" title="">
	            	<i class="fa fa-"></i> Show-biz	            </a>
            </span></div>            <div class="list-posts">
                <ul>
                	                    <!--{-{ elements.getMidlePost() }-}-->
                {% for key,item in midle3 %}
                	<li>
				<a class="bold" href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">
                <img width="247" height="158" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_247x158 wp-post-image" alt="{{item.caption}}"/>{{item.caption}}</a>
			    </li>
				{% endfor %}  
                </ul>
            </div>

        </div><div id="text-15" class="widget_text item-cate">			
        <div class="textwidget">
        <!--quang cao tai day <script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_34237.ads"></script>-->
        </div>
		</div>                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 main-right">
                            <div id="text-19" class="widget_text item-cate">			
                            <div class="textwidget">
                            <!-- thaycode -->
                            <!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-2923659153088133" data-ad-slot="6027411801" data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>--></div>
		</div>		
		<div id="eweb_post_by_cate_2-9" class="item-cate-2 item-cate">            
			<div class="subcat-2">
				<span><a href="/mang-xa-hoi/" title="Mạng xã hội"><i class="fa fa-fa fa-graduation-cap"></i>Mạng xã hội</a></span>
			</div>            
			<div class="list-posts">
                <ul>
                {% for key,item in right1 %}
                            	<li>
                                <a class="bold" href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">{{item.caption}}
                                {% if key == '0' %}
                                	
                                    <img width="650" height="480" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_482x340 wp-post-image" alt="{{item.caption}}"/> </a>
                                    <p>{{item.des}}</p>
                                {% else %}
                                	</a>
                                {% endif %}
                                </li>
                {% endfor %}        
                </ul>
            </div>
        </div>
        <div id="" class="item-cate-2 item-cate">            
			<div class="subcat-2">
				<span><a href="/mang-xa-hoi/" title="Chuyện lạ"><i class="fa fa-fa fa-graduation-cap"></i>Chuyện lạ</a></span>
			</div>            
			<div class="list-posts">
                <ul>
                {% for key,item in right2 %}
                            	<li>
                                <a class="bold" href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">{{item.caption}}
                                {% if key == '0' %}
                                	
                                    <img width="650" height="480" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_482x340 wp-post-image" alt="{{item.caption}}"/> </a>
                                    <p>{{item.des}}</p>
                                {% else %}
                                	</a>
                                {% endif %}
                                </li>
                {% endfor %}        
                </ul>
            </div>
        </div>				
        <!--<div id="eweb_post_by_cate_2-2" class="item-cate-2 item-cate">            
        	<div class="subcat-2"><span><a href="http://bloglamme.com/me-sanh-dieu/" title=""><i class="fa fa-"></i> Mẹ sành điệu</a></span></div>            <div class="list-posts">
                <ul>
                	                    <li>
                        <a class="bold" href="http://bloglamme.com/6-cach-de-so-huu-mot-doi-chan-quyen-ru/" title="6 cách để sở hữu một đôi chân quyến rũ">
                            6 cách để sở hữu một đôi chân quyến rũ                            <img width="600" height="450" src="http://bloglamme.com/wp-content/uploads/2016/04/tamchan.jpg" class="attachment-thumb_301x216 wp-post-image" alt="tamchan"/>                        </a>
                        <p>Đôi chân đẹp và láng mịn như nhung có phải là điều bạn mong muốn sở hữu? Mọi người chắc hẳn ai cũng th�[...]</p>
                    </li>
                    		    		                    <li>
                        <a class="bold" href="http://bloglamme.com/mat-na-my-pham-giup-da-ban-cang-min/" title="Mặt nạ mỹ phẩm &#8211; giúp da bạn căng mịn">Mặt nạ mỹ phẩm &#8211; giúp da bạn căng mịn</a>                       
                    </li>
                    		    		                    <li>
                        <a class="bold" href="http://bloglamme.com/tri-mun-dau-den-voi-cac-loai-hoa-qua/" title="Trị mụn đầu đen với các loại hoa quả">Trị mụn đầu đen với các loại hoa quả</a>
                        
                    </li>
                    		    		                    <li>
                        <a class="bold" href="http://bloglamme.com/tac-dung-cua-dau-dua-cho-ba-bau/" title="Tác dụng của dầu dừa cho bà bầu ?">Tác dụng của dầu dừa cho bà bầu ?</a>
                        
                    </li>
                    		    		                    <li>
                        <a class="bold" href="http://bloglamme.com/meo-hay-khong-chi-danh-cho-phai-dep/" title="12 Mẹo làm đẹp hay không chỉ dành cho các nàng">12 Mẹo làm đẹp hay không chỉ dành cho các nàng</a>
                        
                    </li>
                    		    		                    <li>
                        <a class="bold" href="http://bloglamme.com/meo-duong-toc-bang-chuoi-chi-phi-thap-hieu-qua-cao/" title="Mẹo dưỡng tóc bằng chuối: chi phí thấp, hiệu quả cao">Mẹo dưỡng tóc bằng chuối: chi phí thấp, hiệu quả cao</a>
                        
                    </li>
                    		    		                </ul>
            </div>
        </div>	-->	
        <!--<div id="eweb_post_by_cate_2-8" class="item-cate-2 item-cate">            <div class="subcat-2"><span><a href="http://bloglamme.com/suc-khoe-gia-dinh/" title=""><i class="fa fa-"></i> Sức khỏe gia đình</a></span></div>            <div class="list-posts">
                <ul>
                	                    <li>
                        <a class="bold" href="http://bloglamme.com/cay-thuoc-chua-benh-ve-gan-ke-ca-ung-thu-thoi-ky-cuoi/" title="Cây thuốc chữa bệnh về gan, kể cả ung thư thời kỳ cuối">
                            Cây thuốc chữa bệnh về gan, kể cả ung thư thời kỳ cuối                            <img width="500" height="833" src="http://bloglamme.com/wp-content/uploads/2016/05/blog-lam-me.jpg" class="attachment-thumb_301x216 wp-post-image" alt="blog lam me"/>                        </a>
                        <p>Đây là 1 bài thuốc chữa bệnh gan và ung thư của độc giả chia sẻ nhưng chưa được kiểm chứng, thông tin chưa [...]</p>
                    </li>
                    		    		                    <li>
                        <a class="bold" href="http://bloglamme.com/nuoc-che-phong-va-chua-benh-tim-mach/" title="Nước chè phòng và chữa bệnh tim mạch">Nước chè phòng và chữa bệnh tim mạch</a>
                        
                    </li>
                    		    		                    <li>
                        <a class="bold" href="http://bloglamme.com/canh-bao-viet-nam-dung-thu-2-ve-ti-le-mac-benh-ung-thu/" title="[Cảnh báo]: Việt Nam đứng thứ 2 về tỉ lệ mắc bệnh ung thư">[Cảnh báo]: Việt Nam đứng thứ 2 về tỉ lệ mắc bệnh ung thư</a>
                        
                    </li>
                    		    		                    <li>
                        <a class="bold" href="http://bloglamme.com/nhung-dieu-toi-te-nhat-se-xay-ra-neu-ban-nhin-an-sang-thuong-xuyen/" title="Những điều tồi tệ nhất sẽ xảy ra nếu bạn nhịn ăn sáng thường xuyên">Những điều tồi tệ nhất sẽ xảy ra nếu bạn nhịn ăn sáng thường xuyên</a>
                        
                    </li>
                    		    		                    <li>
                        <a class="bold" href="http://bloglamme.com/bung-phang-li-nho-loai-nuoc-ep-nay/" title="Bụng phẳng lì nhờ loại nước ép này !">Bụng phẳng lì nhờ loại nước ép này !</a>
                        
                    </li>
                    		    		                    <li>
                        <a class="bold" href="http://bloglamme.com/loi-ich-cua-rau-xanh-doi-voi-suc-khoe-ma-ban-chua-he-biet/" title="Lợi ích của rau xanh đối với sức khỏe mà bạn chưa hề biết">Lợi ích của rau xanh đối với sức khỏe mà bạn chưa hề biết</a>
                        
                    </li>
                    		    		                </ul>
            </div>
        </div>-->                       </div>
                                            </div>
                </div>
    </div>
</section>
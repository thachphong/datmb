   
		<section class="main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-9 col-xs-12" style="border-right: 1px solid #D9D9D9;">
                        <div class="breadcrumb">
                                                    </div>
                        <div id="text-21" class="widget_text">			<div class="textwidget"><a href="http://sallyspa.com.vn/sach-mun-het-tham-yen-tam-lang-min-nho-te-bao-goc-mts.html" target="_blank"><img style="display:block;" <img style="display:block;" src="http://bloglamme.com/wp-content/uploads/2016/04/sally-300x250.gif" border="0px" width="370px" height="250px;"></div>
		</div>                        <header class="entry-header">
                            <div class="entry-meta">
                                <h1 class="cat-links">{{title}}</h1>
                            </div>
                        </header><!-- .entry-header -->
                        <section class="category-area">
                            <div class="site-category" role="main">
                                <div class="list_category list">
                                    <ul class="feature-posts-cate">
                                    {% for key,item in datatop %}
		                                {% if key == '0' %}
		                                	<li class="item-big">
		                                	<a href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">
		                                    <img style ="width:508px; height:283px" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_482x340 wp-post-image" alt="{{item.caption}}"/></a>
		                                    <h2><a href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">{{item.caption}}</a></h2>
		                                    <p>{{item.des}}</p>
		                                {% else %}
		                                	<li class="item-small">
		                                		<a href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">
		                                		<img style="width:75px; height:60px" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_75x60 wp-post-image" alt="{{item.caption}}"/></a> 		    
		                                		<h2><a href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">{{item.caption}}</a></h2>
		                                {% endif %}
		                                </li>
		                            {% endfor %}
                                    </ul>
                                    <ul>
                                    {% for key,item in datadetail %}
                                    	<li>
                                    		<h3><a href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">{{item.caption}}</a></h3>
                                    		<div class="com_share">
										        <i class="fa fa-calendar"></i>{{elements.formatdate(item.add_date,item.add_time)}}       
										        <!--<i class="fa fa-user"></i> 
										        <a class="author" href="/author/aseanfriends/">aseanfriends</a>-->
										        <i class="fa fa-comments"></i> 0    
									        </div>
									        <a href="{{url.get('n/'~item.id~'/'~item.caption_url)}}" title="{{item.caption}}">
		                                		<img style="width:170px; height:122px" src="{{url.get('images/'~item.filename)}}" class="attachment-thumb_170x122 wp-post-image" alt="{{item.caption}}"/></a>
		                                	<div class="info-post">{{item.des}}</div>
		                                	<!--<div class=dong-su-kien>        
		                                		<div>
            										<i class="fa fa-caret-right"></i>
            										<a href="luon-buon-ngu-canh-bao-benh-gi/" class="product-title" title="Luôn buồn ngủ cảnh báo bệnh gì?">Luôn buồn ngủ cảnh báo bệnh gì?</a>
        										</div>
									            <div>
									            	<i class="fa fa-caret-right"></i>
									            	<a href="" class="product-title" title="Mách mẹ chọn các thực phẩm chống sởi cho bé">Mách mẹ chọn các thực phẩm chống sởi cho bé</a>
									        	</div>
    										</div>-->
                                    	</li>	
                                    {% endfor %}
                                    </ul>
                                    <nav class="navigation paging-navigation" role="navigation">
                                        <div class='wp-pagenavi'>
                                        {%if totalpage >0 %}
											<span class='pages'>Page {{page}} of {{totalpage}}</span>
											{%if page > 1%}
												<a class="previouspostslink" rel="prev" href="{{url.get('tag/'~page_no~'/'~(page-1))}}">«</a>
												{%endif%}
											{%for rowpage in 1..totalpage %}
												{%if rowpage == page%}
													<span class='current'>{{page}}</span>
												{%else%}
													<a class="page larger" href="{{url.get('tag/'~page_no~'/'~rowpage)}}">{{rowpage}}</a>
												{%endif%}
											{%endfor%}
											{%if page < totalpage%}
											<a class="nextpostslink" rel="next" href="{{url.get('tag/'~page_no~'/'~(page+1))}}">»</a>
											{%endif%}
										{%endif%}
										</div>                                    
									</nav><!-- .navigation -->
                                </div>
                                <!-- #secondary -->
                            </div><!-- #content -->
                        </section><!-- #primary -->
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div id="text-22" class="widget_text item-cate">			
                        	<div class="textwidget"><a href="http://sallyspa.com.vn/sach-mun-het-tham-yen-tam-lang-min-nho-te-bao-goc-mts.html" target="_blank"><img style="display:block;" <img style="display:block;" src="http://bloglamme.com/wp-content/uploads/2016/04/300x250.gif" border="0px" width="370px" height="250px;"></div>
						</div>
						<div id="text-23" class="widget_text item-cate">			
							<div class="textwidget"><a href="http://sallyspa.com.vn/sach-mun-het-tham-yen-tam-lang-min-nho-te-bao-goc-mts.html" target="_blank"><img style="display:block;" <img style="display:block;" src="http://bloglamme.com/wp-content/uploads/2016/04/sally-300x250.gif" border="0px" width="370px" height="250px;"></div>
						</div>                   
					</div>
                </div>
            </div>
        </section><!-- .main -->


        
<section class="main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-9 col-xs-12">
                        <div class="row">
                            <div class="col-lg-8 col-sm-8 col-xs-12">
                                <div class="breadcrumb">
                                                                    </div>
                                <header class="entry-header">
                                    <h1 class="cat-links">{{post.caption}} </h1>
                                </header><!-- .entry-header -->
                                <div class="post-content">
                                    <div id="date_share" class="shareheard">
                                        <div class="date">
                                            <i class="fa fa-calendar"></i>
                                            <span>{{elements.formatdate(post.add_date,post.add_time)}} </span>
                                            <!--<span class="drash_share">|</span>-->
                                            <!--<i class="fa fa-user"></i> <a class="author" href="/author/aseanfriends/">aseanfriends</a>-->
                                        </div>
                                        <div id="block_share">
                                            <a class="btn_facebook" rel="nofollow" href="javascript:;" title="Chia sẻ bài viết lên facebook"><i class="fa fa-facebook-official"></i></a>
                                            <a class="btn_twitter" rel="nofollow" href="javascript:;" id="twitter" title="Chia sẻ bài viết lên twitter"><i class="fa fa-twitter-square"></i></a>
                                            <a class="btn_google" rel="nofollow" href="javascript:;" title="Chia sẻ bài viết lên google+"><i class="fa fa-google-plus-square"></i></a>
                                        </div>
                                    </div>
                                    <div class=dong-su-kien></div>                                    
                                    <div class="entry-content">
                                        <!-- AddThis Sharing Buttons above -->
                                        <p style="text-align: justify;">{{post.des}}</p>
                                        <div class="rpbt_shortcode">

											<ul>
											{% for relitem in relation_old %}												
												<li><a href="{{url.get('n/'~ relitem.id~'/'~relitem.caption_url)}}" title="{{relitem.caption}}">{{relitem.caption}}</a></li>
											{% endfor %}
			
											</ul>
										</div> 
										{{post.content}}

<script data-cfasync="false" type="text/javascript">
var addthis_config = {"data_track_clickback":true,"ui_atversion":300,"ignore_server_config":true};
var addthis_share = {};
</script>
                <!-- AddThis Settings Begin -->
                <!--<script data-cfasync="false" type="text/javascript">
                    var addthis_product = "wpp-5.3.2";
                    var wp_product_version = "wpp-5.3.2";
                    var wp_blog_version = "4.3.4";
                    var addthis_plugin_info = {"info_status":"enabled","cms_name":"WordPress","cms_version":"4.3.4","plugin_name":"Share Buttons by AddThis","plugin_version":"5.3.2","anonymous_profile_id":"wp-30e0e1f2f39b8a3f0dd0db3a5f806f78","plugin_mode":"WordPress","select_prefs":{"addthis_per_post_enabled":true,"addthis_above_enabled":false,"addthis_below_enabled":true,"addthis_sidebar_enabled":true,"addthis_mobile_toolbar_enabled":true,"addthis_above_showon_home":false,"addthis_above_showon_posts":true,"addthis_above_showon_pages":false,"addthis_above_showon_archives":false,"addthis_above_showon_categories":false,"addthis_above_showon_excerpts":false,"addthis_below_showon_home":false,"addthis_below_showon_posts":true,"addthis_below_showon_pages":false,"addthis_below_showon_archives":false,"addthis_below_showon_categories":false,"addthis_below_showon_excerpts":false,"addthis_sidebar_showon_home":false,"addthis_sidebar_showon_posts":true,"addthis_sidebar_showon_pages":false,"addthis_sidebar_showon_archives":false,"addthis_sidebar_showon_categories":false,"addthis_mobile_toolbar_showon_home":false,"addthis_mobile_toolbar_showon_posts":true,"addthis_mobile_toolbar_showon_pages":false,"addthis_mobile_toolbar_showon_archives":false,"addthis_mobile_toolbar_showon_categories":false,"sharing_enabled_on_post_via_metabox":true},"page_info":{"template":"posts","post_type":""}};
                    if (typeof(addthis_config) == "undefined") {
                        var addthis_config = {"data_track_clickback":true,"ui_atversion":300,"ignore_server_config":true};
                    }
                    if (typeof(addthis_share) == "undefined") {
                        var addthis_share = {};
                    }
                    if (typeof(addthis_layers) == "undefined") {
                        var addthis_layers = {"share":{"theme":"transparent","position":"left","numPreferredServices":5,"mobile":false},"sharedock":{"counts":true,"position":"bottom","numPreferredServices":5}};
                    }
                </script>-->
                <!--<script data-cfasync="false" type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=wp-30e0e1f2f39b8a3f0dd0db3a5f806f78 " async="async">
                </script>-->
                <script data-cfasync="false" type="text/javascript">
                    (function() {
                        var at_interval = setInterval(function () {
                            if(window.addthis) {
                                clearInterval(at_interval);
                                addthis.layers(addthis_layers);
                            }
                        },1000)
                    }());
                </script>
                <!-- AddThis Sharing Buttons below --><div class="addthis_toolbox addthis_default_style" addthis:url='http://bloglamme.com/cay-thuoc-chua-benh-ve-gan-ke-ca-ung-thu-thoi-ky-cuoi/' addthis:title='Cây thuốc chữa bệnh về gan, kể cả ung thư thời kỳ cuối'><a class="addthis_button_facebook_like"></a><a class="addthis_button_tweet"></a><a class="addthis_button_pinterest_pinit"></a><a class="addthis_button_google_plusone" g:plusone:size="medium"></a><a class="addthis_counter addthis_pill_style"></a></div>                                        <!--<div id="text-24" class="widget_text">			<div class="textwidget"><center> <script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_34249.ads"></script> </center></div>
		</div>-->                                        <div class="entry-meta">
                                            <span class="tag"><i class="fa fa-tags"></i> Từ khóa:</span>
                                            <span class="tag-links">
                                            {% for tagItem in tags %}												
												{{ link_to("tag/" ~ tagItem.tag_no, tagItem.tag_name) }}
											{% endfor %}
                                            </span>
<center> <!--<hr>-->
<!--<table style="background-color: #ffe4c4;width:550px;font-size:14px;line-height:20px;margin-bottom:10px;padding:5px" border="1">
  <tbody>
    <tr>
      <td style="padding:5px">
        <p style="text-align:justify">
          <table> <h3 style="font-size:20px;color:blue;">Gửi những chia sẻ của bạn đến với Blog Làm Mẹ ?</h3>
Mời bạn đọc cùng đóng góp, viết tin bài, chia sẻ mẹo vặt, những món ăn ngon cùng chúng tôi.Thông điệp của bạn sẽ được chúng tôi biên tập & đăng tải trên website này! gửi về hộp thư <a href="mailto:bl.com@gmail.com" style="color:#ad0303">bloglamme.com@gmail.com</a> Gửi và bạn sẽ nhận được nhật bút ! cảm ơn !</center> </table>
        </p>
      </td>
    </tr>
  </tbody>
</table> --></center>
                                                                                    </div>
                                        <hr>
                                        <div class="article-fb-comments">
                                            <div class="title">Ý kiến bạn đọc</div>
                                            <div id="fb-root"></div>
                                            <script>(function(d, s, id) {
                                              var js, fjs = d.getElementsByTagName(s)[0];
                                              if (d.getElementById(id)) return;
                                              js = d.createElement(s); js.id = id;
                                              js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=807407399380069";
                                              fjs.parentNode.insertBefore(js, fjs);
                                            }(document, 'script', 'facebook-jssdk'));</script>
                                            <div class="fb-comments" data-href="{{url.get('n/'~ post.id~'/'~post.caption_url)}}" data-width="100%" data-numposts="1" data-colorscheme="light"></div>
                                                                                    </div>
                                        <div class="post-related">
                                            <div class="subcat-2">
                                                <span>Bài viết cùng chuyên mục</span>
                                            </div>
                                            <div class="related-posts">
                                                <div class="row">
                                                {% for relnew in relation_new %}																								<div class="col-lg-4 col-sm-4 col-xs-4">
                                                		<a class="bold" href="{{url.get('n/'~relnew.id~'/'~relnew.caption_url)}}" title="{{relnew.caption}}">
                                                		<img style=" width:170px; height:122px" src="{{url.get('images/'~relnew.filename)}}" class="attachment-thumb_170x122 wp-post-image" alt="{{relnew.caption}}"/>{{relnew.caption}}                                      									</a>
                                                	</div>												
												{% endfor %}                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .post-content -->
                            </div>
                          {{ partial('includes/midle') }}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                     {{ partial('includes/right') }}
                    </div>
                </div>
            </div>
        </section><!-- .main -->
<!--左侧文章目录-->
<span id="categoryId" class="hidden"><?php echo $this->params['categoryId'] ?></span>
<span id="tagId" class="hidden"><?php echo $this->params['tagId'] ?></span>

<div id="news-left" class="col-xs-12 col-sm-7 col-sm-offset-1">
    <div id="news-pic-round" class="hidden-xs">

    </div>

    <?php
    $newsMains=$this->params['newsMain'];

    $color = Array('pink','green','blue','red','orange','yellow');

    function chooseColor($oldColor){
        $color = Array('pink','green','blue','red','orange','yellow');
        $newColor = $color[array_rand($color)];
        return $newColor!=$oldColor ? $newColor : chooseColor($oldColor);
    }

    $oldColor = 'pink';
    foreach($newsMains as $newsMain){
        $tags = '';
        $tagsNoColor = '';
        $tagArr = $newsMain['news_tag'];
        foreach($tagArr as $tag){
            foreach($tag as $str){
                $oldColor =chooseColor($oldColor);
                $tagsNoColor = $tagsNoColor.'<a class="news-tags" href="index.php?r=site/index&tagName='.$str.'">'.$str.'</a>';
            //    $tags = $tags.'<a class="small button '.$oldColor.'" style="margin-right:0.6vw;" href="index.php?r=site/index&tagName='.$str.'">'.$str.'</a>';
            }
        }

        if(!$this->params['isMobile']){          //判断是否是移动端
            $summary = $newsMain['news_summary'];
        }else{
            $summary = $newsMain['news_sump'];
        }
        $user='';
        if($newsMain['news_author']){
            $user ='<span class="hidden-xs"><i class="glyphicon glyphicon-user" ></i>'.$newsMain['news_author'].'</span>';
        }
        if(''!=$tagsNoColor){
            $tags ='<span class="hidden-xs"><i class="glyphicon glyphicon-tags"></i>'.$tagsNoColor.'</span>';
        }
        $comment = '';
        if(0!=$newsMain['comment_count']){
            $comment = '<span class="hidden-xs" style="float:right"><i class="glyphicon glyphicon-comment"></i>'.$newsMain['comment_count'].'</span>';
        }


        echo '<div class="news-main col-xs-12 col-md-12" >
                    <div class="col-xs-3 col-sm-3 col-md-3 pic-parent">
                        <a href="index.php?r=site/content&news_id='.$newsMain['news_id'].'"><img src="'.$newsMain['news_pic'].'" class="img-thumbnail new-pic"/></a>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 news-content">
                        <a class="news-title" href="index.php?r=site/content&news_id='.$newsMain['news_id'].'">'.$newsMain['news_title'].'</a>
                        <p class="news-excerpt">'.$summary.'</p>
                        <p class="news-info">
                            '.$user.'
                            '.$tags.'
                            <span class="hidden-xs"><i class="glyphicon glyphicon-time" ></i>'.date("Y-m-d", strtotime($newsMain['news_date'])).'</span>
                            <span class="item-view hidden-xs"><i class="glyphicon glyphicon-eye-open"></i>'.$newsMain['browse_count'].'</span>
                            '.$comment.'
                        </p>
                    </div>
              </div>';

    }
    ?>
</div>

<script type="application/javascript">
    var page = {
        isBottom:false,
        categoryId:0,
        tagId:0,
        lastId:0,
        isMobile:false,
        Init:function(){        //解析url
            var url = $(".news-title:last").attr("href");
            var str = url.split('=');
            var addr = str[0]+'='+str[1]+'=';
            this.categoryId=$('#categoryId').text();
            this.tagId=$('#tagId').text();
            this.lastId=str[2];
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                this.isMobile = true;
            }
        },
        ChangeTagColor:function(oldColor){
            var color = ['pink','green','blue','red','orange','yellow'];
            var newColor = color[Math.floor(Math.random()*color.length)];
            return newColor!=oldColor ? newColor : this.ChangeTagColor(oldColor);
        },
        LoadData:function(){
            $.ajax({
                url: "index.php?r=site/more",
                data: {
                    lastId:page.lastId,
                    categoryId:page.categoryId,
                    tagId:page.tagId
                },
                type: "get",
                dataType: "json",
                error:function(){alert('请求失败！')},
                success: function (data) {
                    if(page.isBottom){
                        $('#loading').remove();
                        return;
                    }
                    if(!data.length&&!page.isBottom){
                        $('#loading').remove();
                        var over = '<div class="col-xs-12 col-md-12" style="height: 4vh;background-color: #ffffff;text-align: center;margin: 3vh 0;font-style:italic;font-size: large"><a href="#top">文章加载完毕,点击回到顶部</a></div>';
                        $('#news-left').append(over);
                        page.isBottom =true;
                        return;
                    }
                    var oldColor = 'pink';
                    $.each(data, function (newsIndex, news) {
                        page.lastId = news.news_id;
                        var tags ='';
                        var tagArr = news.news_tag;
                        for(var i=0;i<tagArr.length;i++){
                            oldColor = page.ChangeTagColor(oldColor);
//                            $tagsNoColor = $tagsNoColor.'<a class="news-tags" href="index.php?r=site/index&tagName='+tagArr[i].tag_name+'">'+tagArr[i].tag_name+'</a>';
                            tags += '<a class="news-tags" href="index.php?r=site/index&tagName='+tagArr[i].tag_name+'">'+tagArr[i].tag_name+'</a>';
//                            tags += '<a class="small button '+oldColor+'" style="margin-right:0.6vw;" href="index.php?r=site/index&tagName='+tagArr[i].tag_name+'">'+tagArr[i].tag_name+'</a>';
                        }
                        var summary;
                        if(page.isMobile){
                            summary = news.news_sump;
                        }else{
                            summary = news.news_summary;
                        }
                        if(''!=tags){
                            tags ='<span class="hidden-xs"><i class="glyphicon glyphicon-tags"></i>'+tags+'</span>';
                        }
                        var user='';
                        if(news.news_author){
                            user ='<span class="hidden-xs"><i class="glyphicon glyphicon-user" ></i>'+news.news_author+'</span>';
                        }

                        var bot = '<p class="news-info">'
                        +user
                        +tags
                        +'<span class="hidden-xs"><i class="glyphicon glyphicon-time" ></i>'+news.news_date+'</span>'
                        +'<span class="item-view hidden-xs"><i class="glyphicon glyphicon-eye-open"></i>'+news.browse_count+'</span>'
                        +'</p>';

                        var html = '<div class="news-main col-xs-12 col-md-12" >'
                            +'<div class="col-xs-3 col-sm-3 col-md-3 pic-parent">'
                            +'<a href="index.php?r=site/content&news_id='+news.news_id+'"><img src="'+news.news_pic+'" class="img-thumbnail new-pic"/></a>'
                            + '</div>'
                            +'<div class="col-xs-9 col-sm-9 col-md-9 news-content">'
                            +'<a class="news-title" href="index.php?r=site/content&news_id='+news.news_id+'">'+news.news_title+'</a>'
                            +'<p class="news-excerpt">'+summary+'</p>'
                            +bot
                            +'</div>'
                            +'</div>';
                        $('#loading').remove();
                        $('#news-left').append(html);
                        if(news.length<10&&!page.isBottom){
                            var over = '<div class="col-xs-12 col-md-12" style="height: 4vh;background-color: #ffffff;text-align: center;margin: 3vh 0;font-style:italic;font-size: large"><a href="#top">文章加载完毕,点击回到顶部</a></div>';
                            $('#news-left').append(over);
                            page.isBottom =true;
                        }
                    });
                }
            });
        }
    }
    page.Init();
    $(window).scroll(function() {
        //当内容滚动到底部时加载新的内容
        if ($(this).scrollTop() + $(window).height() + 20 >= $(document).height() && $(this).scrollTop() > 20&&!page.isBottom) {
            $('#news-left').append("<img src='img/loading.gif' class='img-thumbnail' id='loading'/>");
            page.LoadData();
        }
    });

//var share = '<div class="jiathis_style">'
//                + '<a class="jiathis_button_qzone">QQ空间</a>'
//                + '<a class="jiathis_button_tsina">新浪微博</a>'
//                + '<a class="jiathis_button_tqq">腾讯微博</a>'
//                + '<a class="jiathis_button_weixin">微信</a>'
//                + '<a href="http://www.jiathis.com/share?uid=2086212" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>'
//                + '<a class="jiathis_counter_style"></a>'
//                +' </div>';
</script>

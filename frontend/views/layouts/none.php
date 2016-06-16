<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
 <meta charset="<?= Yii::$app->charset ?>">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <?= Html::csrfMetaTags() ?>
 <title><?= Html::encode($this->title) ?></title>
 <?php $this->head() ?>

 <style type="text/css">
  #main{
   margin-top: 20px;
   /*border: solid red;*/
   background-color: #EBEBEB;
  }
  #news-left{
   /*border: solid cadetblue thin;*/
  }
  #news-right{
   /*border-left: solid darkseagreen thin;*/
   margin-left:10px;
   padding-left: 20px;
  }
  .news-title a{color:black;}
  .news-title a:link { text-decoration: none;}
  .news-title a:active { text-decoration:blue}
  .news-title a:hover { text-decoration:underline;color: #01A5EC}
  /*.news-title a:visited { text-decoration: none;color: green}*/

  .news-right a{color: #333333;}
  .news-right a:link { text-decoration: none;}
  .news-right a:active { text-decoration:blue}
  .news-right a:hover { text-decoration:underline;color: #01A5EC}


  .news-main{
   /*height: 200px;*/
   background-color: #ffffff;
   margin: 15px 0px;
   /*border: solid red thin;*/
  }
  .news-title{
   margin-top: 0px;
   line-height: 20px;
   font-size: 18px;
   font-weight: bold;
  }
  .news-excerpt p{
   color: #666666;
  }
  .news-excerpt{
   line-height: 20px;
   font-size: 14px;
  }
  .right-elem{
   background-color: #ffffff;
  }
  #head-nav{
   margin:0 auto;
  }
  .new-pic{
   margin-top: 10px;
   margin-bottom: 8px;
  }
  #head-img img{
   display: block;
   margin: 5px auto;
  }
  .news-right{
   margin-left: 20px;
   padding-bottom: 5px;
  }

 </style>

</head>
<body>
<?php $this->beginBody() ?>

<!-- 分类导航 -->
<div class="navbar navbar-inverse" role="navigation" id="head-nav" >
 <div class="navbar-header col-md-offset-1">
  　<!-- .navbar-toggle样式用于toggle收缩的内容，即nav-collapse collapse样式所在元素 -->
  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-responsive-collapse">
   <span class="sr-only">Toggle Navigation</span>
   <span class="icon-bar"></span>
   <span class="icon-bar"></span>
   <span class="icon-bar"></span>
  </button>
  <!-- 确保无论是宽屏还是窄屏，navbar-brand都显示 -->
  <a href="##" class="navbar-brand ">白马公社</a>
 </div>

 <!-- 屏幕宽度小于768px时，div.navbar-responsive-collapse容器里的内容都会隐藏，显示icon-bar图标，当点击icon-bar图标时，再展开。屏幕大于768px时，默认显示。 -->
 <div class="collapse navbar-collapse navbar-responsive-collapse">
  <ul class="nav navbar-nav nav-pills">、

<?php
$category=$this->params['category'];

$categoryName = $category['category_name'];
$categoryId = $category['category_id'];
$order=0;
$parentId=0;
$childIdArr=array();

foreach($categoryName as $name=>$childName){
  $orderId=0;
   foreach ($categoryId as $id=>$ChildId) {
    $parentId = $id;
    $childIdArr=$ChildId;
    if ($order == $orderId) break;
    $orderId++;
   }
 if(empty($childName)){
  echo '<li><a href="##">'.$name.$parentId.'</a></li>';
 }else {
 echo '<li class="dropdown"><a href="##" data-toggle="dropdown" class="dropdown-toggle">'.$name.$parentId.'<span class="caret"></span></a>' .
     '<ul class="dropdown-menu">';
for($i=0;$i<sizeof($childName);$i++){
 echo '<li><a href="##">'.$childName[$i].$childIdArr[$i].'</a></li>';
}
  echo '</ul></li>';
 }
  $order++;
 }
?>

  </ul>

 </div>

</div>

<!--主要内容-->
<div class="container col-sm-12" id="main">

 <div class="row">

  <!--左侧文章目录-->
  <div class="col-sm-12 col-md-7 col-md-offset-1">

  </div>


  <!--右侧热点文章-->
  <div class="hidden-xs  visible-md-block visible-lg-block col-md-3 col-lg-3" id="news-right">

   <br />
   <div class="right-elem">
    <ul class="nav nav-tabs" role="tablist" id="myTab">
     热门文章<br/>
     <li class="active"><a href="#views" role="tab" data-toggle="tab">热览</a></li>
     <li><a href="#comments" role="tab" data-toggle="tab">热评</a></li>
     <li><a href="#rands" role="tab" data-toggle="tab">随机</a></li>
    </ul>

    <div class="tab-content news-right">
     <div class="tab-pane active" id="views">
      <?php
      $hotViews=$this->params['hotView'];
      foreach($hotViews as $hotView){
       echo '<a href="'.$hotView->news_id.'"><h5>'.$hotView->news_title.'</h5></a>';
      }
      ?>

     </div>

     <div class="tab-pane" id="comments">
      <?php
      $hotComments=$this->params['hotComment'];
      foreach($hotComments as $hotComment){
       echo '<a href="'.$hotComment->news_id.'"><h5>'.$hotComment->news_title.'</h5></a>';
      }
      ?>
      <a href="#"><h5>第1篇标题</h5></a>
     </div>

     <div class="tab-pane" id="rands">
      <?php
      $rands=$this->params['rands'];
      foreach($rands as $rand){
       echo '<a href="'.$rand->news_id.'"><h5>'.$rand->news_title.'</h5></a>';
      }
      ?>

     </div>
    </div>
   </div>
  </div>
 </div>

</div>

<footer class="footer"></footer>

 <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <script type="text/javascript" src="js/bootstrap.min.js"></script>

<?= yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
The controller ID is: <?php

?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
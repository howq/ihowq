<?php

namespace common\models;

use Yii;
use yii\helpers\Json;
/**
 * This is the model class for table "news".
 *
 * @property string $news_id
 * @property string $news_title
 * @property string $news_sump
 * @property string $news_summary
 * @property string $news_pic
 * @property string $news_content
 * @property string $news_author
 * @property string $news_editor
 * @property string $news_source
 * @property string $news_url
 * @property string $news_date
 * @property string $news_status
 * @property string $news_password
 * @property string $comment_status
 * @property integer $comment_count
 * @property integer $browse_count
 * @property integer $news_category
 *
 * @property Category $newsCategory
 * @property Tagnews[] $tagnews
 */
class News extends \yii\db\ActiveRecord
{

    const NEWSNUM = 10;     //每回加载10条文章
    const NEWSEDIT = 50;

    public function getNewsMaxId(){
        $sql = 'SELECT news_id FROM news ORDER BY news_id DESC LIMIT 1';
        $news = News::findBySql($sql)->all();
        return $news[0]['news_id'];
    }

    //获取10条新闻（Phone:标题+图片+摘要 PC:图片+标题+作者+来源+时间+摘要+分享+评论+浏览）
    public function getNewsIndex(){
        $sql = 'SELECT * FROM news
                ORDER BY news_id DESC LIMIT '.self::NEWSNUM;
        $news = News::findBySql($sql)->all();
        return $news;
    }

    //获取10条新闻
    public function getNews($currNewsId){
        $sql = 'SELECT * FROM news
                WHERE news_id<'.$currNewsId.' ORDER BY news_id DESC LIMIT '.self::NEWSNUM;
        $news = News::findBySql($sql)->all();
        return $news;
    }

    public function getNewsEdit(){
        $sql = 'SELECT news_id,news_title,news_author,news_category,news_editor,news_date FROM news
                ORDER BY news_id DESC LIMIT '.self::NEWSEDIT;
        $news = News::findBySql($sql)->all();
        $newsNow = Json::encode($news);
        $news = Json::decode($newsNow);

        for($i=0;$i<count($news);$i++ ){
            if($news[$i]['news_category']!=null){
                $cateName = Category::findBySql('SELECT category_name FROM category WHERE category_id='.$news[$i]['news_category'])->all();
//                $news[$i] = array_merge($news[$i],$cateName);
                $news[$i]['news_category'] = $cateName[0]['category_name'];
            }
        }
        return $news;
    }

    //获取热门浏览文章
    public function getHotView(){
        $sql = 'SELECT news_id,news_title,browse_count FROM news ORDER BY browse_count DESC LIMIT '.self::NEWSNUM;
        $news = News::findBySql($sql)->all();
        return $news;
    }

    //获取热门评论文章
    public function getHotComment(){
        $sql = 'SELECT news_id,news_title,browse_count FROM news ORDER BY comment_count DESC LIMIT '.self::NEWSNUM;
        $news = News::findBySql($sql)->all();
        return $news;
    }

    //随机文章
    public function getRands(){
        //最大文章id小于NEWSNUM 则直接查找文章
        $sql = 'SELECT news_id FROM news ORDER BY news_id DESC LIMIT 1';
        $news = News::findBySql($sql)->all();
        if(0==count($news)){
            return array();
        }
        $maxId = $news[0]['news_id'];

        if($maxId<=self::NEWSNUM){
            $sql = 'SELECT news_id,news_title FROM news ORDER BY news_id DESC LIMIT '.$maxId;
            $news = News::findBySql($sql)->all();
            return $news;
        }

        //生成随机数数组
//        $tmp=array();
//        while(count($tmp)<self::NEWSNUM){
//            $tmp[]=mt_rand(1,$maxId);
//            $tmp=array_unique($tmp);
//        }
        $tmp = $this->unique_rand(1,$maxId,self::NEWSNUM);

        //查找随机文章
        $news = array();
        foreach($tmp as $key){
            $sql = 'SELECT news_id,news_title,browse_count FROM news WHERE news_id='.$key;
            $new = News::findBySql($sql)->all();
            $news = array_merge($new,$news);
        }
        return $news;
    }

    //获取文章正文
    public function getNewsContent($news_id){
        $sql = 'SELECT * FROM news WHERE news_id='.$news_id;
        $news = News::findBySql($sql)->all();

        if($news[0]['news_category']!=null){
            $cateName = Category::findBySql('SELECT category_name FROM category WHERE category_id='.$news[0]['news_category'])->all();
            $news = array_merge($news,$cateName);
        }
        return $news;
    }

    public function getCategory()
    {
        //同样第一个参数指定关联的子表模型类名
        //
        return $this->hasOne(Category::className(), ['category_id' => 'news_id']);
    }


    public function getNewsByTagId($Tag_id,$maxId){
//        $sql = 'SELECT news_id,news_pic,news_title,news_summary,browse_count,comment_count FROM news
//                WHERE news_catelogry='.$Tag_id.' AND news_id<'.$maxId.' ORDER BY news_id DESC LIMIT '.self::NEWSNUM;
//        $news = News::findBySql($sql)->all();
//        return $news;
    }

    private function unique_rand($min, $max, $num) {
        $count = 0;
        $return = array();
        while ($count < $num) {
            $return[] = mt_rand($min, $max);
            $return = array_flip(array_flip($return));
            $count = count($return);
        }
        shuffle($return);
        return $return;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_title', 'news_content'], 'required'],
            [['news_content'], 'string'],
            [['news_date'], 'safe'],
            [['comment_count', 'browse_count', 'news_category'], 'integer'],
            [['news_title'], 'string', 'max' => 40],
            [['news_sump'], 'string', 'max' => 80],
            [['news_summary'], 'string', 'max' => 120],
            [['news_pic'], 'string', 'max' => 100],
            [['news_author', 'news_status', 'news_password', 'comment_status'], 'string', 'max' => 20],
            [['news_editor', 'news_source'], 'string', 'max' => 10],
            [['news_url'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'News ID',
            'news_title' => 'News Title',
            'news_sump' => 'News Sump',
            'news_summary' => 'News Summary',
            'news_pic' => 'News Pic',
            'news_content' => 'News Content',
            'news_author' => 'News Author',
            'news_editor' => 'News Editor',
            'news_source' => 'News Source',
            'news_url' => 'News Url',
            'news_date' => 'News Date',
            'news_status' => 'News Status',
            'news_password' => 'News Password',
            'comment_status' => 'Comment Status',
            'comment_count' => 'Comment Count',
            'browse_count' => 'Browse Count',
            'news_category' => 'News Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'news_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagnews()
    {
        return $this->hasMany(Tagnews::className(), ['news_id' => 'news_id']);
    }

    public function getTag($newsId)
    {
        $sql = 'SELECT tag_name FROM news,tag,tagnews
                WHERE news.news_id=tagnews.news_id AND tagnews.tag_id=tag.tag_id AND news.news_id='.$newsId.' ORDER BY tag.tag_id';
        $tags = Tag::findBySql($sql)->all();
        return $tags;
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property integer $tag_id
 * @property string $tag_name
 *
 * @property Tagnews[] $tagnews
 */
class Tag extends \yii\db\ActiveRecord
{
    const NEWSNUM = 10;     //每回加载10条文章
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_name'], 'required'],
            [['tag_name'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tag_id' => 'Tag ID',
            'tag_name' => 'Tag Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagnews($newsId)
    {
        return $this->hasMany(Tagnews::className(), ['tag_id' => 'tag_id'])->where(['news_id'=>$newsId]);
    }

    public function getTag(){
        $sql = "SELECT * FROM tag";
        $tag = Tag::findBySql($sql)->all();
        return $tag;
    }

    public function getTagId($tagName){
        $sql = "SELECT tag_id FROM tag
                 WHERE tag_name='".$tagName."'";
        $tag = Tag::findBySql($sql)->all();
        if(!count($tag)){
            return null;
        }else{
            return $tag[0]['tag_id'];
        }

    }
    public function getTagMaxId(){
        $sql = 'SELECT tag_id FROM tag ORDER BY tag_id DESC LIMIT 1';
        $tag = Tag::findBySql($sql)->all();
        if(!count($tag)){
            return null;
        }else{
            return $tag[0]['tag_id'];
        }
    }

    public function getNewsByTagId($tagId,$maxId){
        $sql = 'SELECT news.news_id,news_pic,news_title,news_summary,browse_count,comment_count FROM news,tagnews,tag
                 WHERE news.news_id=tagnews.news_id AND tagnews.tag_id=tag.tag_id AND tag.tag_id='.$tagId.' AND news.news_id<'.$maxId.' ORDER BY news.news_id DESC LIMIT '.self::NEWSNUM;
        $news = News::findBySql($sql)->all();
        return $news;
    }
}

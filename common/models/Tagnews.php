<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tagnews".
 *
 * @property string $tag_news_id
 * @property string $news_id
 * @property integer $tag_id
 *
 * @property News $news
 * @property Tag $tag
 */
class Tagnews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tagnews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'tag_id'], 'required'],
            [['news_id', 'tag_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tag_news_id' => 'Tag News ID',
            'news_id' => 'News ID',
            'tag_id' => 'Tag ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['news_id' => 'news_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['tag_id' => 'tag_id']);
    }
}

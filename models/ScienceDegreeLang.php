<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "science_degree_lang".
 *
 * @property int $id
 * @property int $science_degree_id
 * @property string $name
 * @property string $language
 * @property int $created_at
 * @property int $updated_at
 *
 * @property DoctorScienceDegree $scienceDegree
 */
class ScienceDegreeLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'science_degree_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['science_degree_id', 'name', 'language'], 'required'],
            [['science_degree_id', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['language'], 'string', 'max' => 6],
            [['science_degree_id'], 'exist', 'skipOnError' => true, 'targetClass' => DoctorScienceDegree::className(), 'targetAttribute' => ['science_degree_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'science_degree_id' => Yii::t('app', 'Science Degree ID'),
            'name' => Yii::t('app', 'Name'),
            'language' => Yii::t('app', 'Language'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScienceDegree()
    {
        return $this->hasOne(DoctorScienceDegree::className(), ['id' => 'science_degree_id']);
    }
}

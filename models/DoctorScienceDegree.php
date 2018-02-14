<?php

namespace app\models;

use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualQuery;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "doctor_science_degree".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Request[] $requests
 */
class DoctorScienceDegree extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor_science_degree';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            'ml' => [
                'class' => MultilingualBehavior::className(),
                'languages' => [
                    'ru' => 'Russian',
                    'en-US' => 'English',
                ],
                'languageField' => 'language',
                'langClassName' => SpecialtyLang::className(),
                'defaultLanguage' => 'ru',
                'langForeignKey' => 'specialty_id',
                'tableName' => "{{%specialty_lang}}",
                'attributes' => [
                    'name',
                ]
            ],
        ];
    }

    public function scenarios()
    {
        return [
            'admin-update' => ['name', 'name_en'],
            'admin-create' => ['name', 'name_en'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название'),
            'name_en' => Yii::t('app', 'Название (EN)'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['doctor_science_degree_id' => 'id']);
    }

    /**
     * @return MultilingualQuery
     */
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }
}

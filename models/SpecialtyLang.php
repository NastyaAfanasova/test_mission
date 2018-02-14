<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "specialty_lang".
 *
 * @property int $id
 * @property int $specialty_id
 * @property string $name
 * @property string $language
 * @property int $created_at
 * @property int $updated_at
 *
 * @property DoctorSpecialty $specialty
 */
class SpecialtyLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'specialty_lang';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['specialty_id', 'name', 'language'], 'required'],
            [['specialty_id', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['language'], 'string', 'max' => 6],
            [['specialty_id'], 'exist', 'skipOnError' => true, 'targetClass' => DoctorSpecialty::className(), 'targetAttribute' => ['specialty_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'specialty_id' => Yii::t('app', 'Specialty ID'),
            'name' => Yii::t('app', 'Name'),
            'nalanguageme' => Yii::t('app', 'Language'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialty()
    {
        return $this->hasOne(DoctorSpecialty::className(), ['id' => 'specialty_id']);
    }
}

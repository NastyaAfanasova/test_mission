<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $middle_name
 * @property string $email
 * @property string $description
 * @property string $date
 * @property int $doctor_specialty_id
 * @property int $doctor_science_degree_id
 * @property int $paid
 * @property int $created_at
 *
 * @property DoctorScienceDegree $doctorScienceDegree
 * @property DoctorSpecialty $doctorSpecialty
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
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

    public function scenarios()
    {
        return [
            'api-create' => [
                'name', 'surname', 'middle_name', 'email', 'description', 'date',
                'doctor_specialty_id', 'doctor_science_degree_id',
            ],
            'admin-update' => ['paid'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'middle_name', 'email', 'description', 'date'], 'required'],
            [['date'], 'safe'],
            ['date', 'compare', 'compareValue' => date('m/d/Y'), 'operator' => '>', 'message'=>'Дата должна быть больше текущей'],
            [['doctor_specialty_id', 'doctor_science_degree_id', 'created_at'], 'integer'],
            [['name', 'surname', 'middle_name', 'email'], 'string', 'max' => 32],
            [['description'], 'string', 'max' => 255],
            [['paid'], 'string', 'max' => 1],
            [['doctor_science_degree_id'], 'exist', 'skipOnError' => true, 'targetClass' => DoctorScienceDegree::className(), 'targetAttribute' => ['doctor_science_degree_id' => 'id']],
            [['doctor_specialty_id'], 'exist', 'skipOnError' => true, 'targetClass' => DoctorSpecialty::className(), 'targetAttribute' => ['doctor_specialty_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'middle_name' => 'Отчество',
            'email' => 'Email',
            'description' => 'Описание проблемы',
            'date' => 'Желаемая дата приема',
            'doctor_specialty_id' => 'Doctor Specialty ID',
            'doctor_science_degree_id' => 'Doctor Science Degree ID',
            'paid' => 'Заявка оплачена',
            'created_at' => 'Дата создания заявки',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorScienceDegree()
    {
        return $this->hasOne(DoctorScienceDegree::className(), ['id' => 'doctor_science_degree_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorSpecialty()
    {
        return $this->hasOne(DoctorSpecialty::className(), ['id' => 'doctor_specialty_id']);
    }
}

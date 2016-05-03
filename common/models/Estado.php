<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property integer $idestado
 * @property string $nombre
 *
 * @property Testimonio[] $testimonios
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idestado', 'nombre'], 'required'],
            [['idestado'], 'integer'],
            [['nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idestado' => 'Idestado',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestimonios()
    {
        return $this->hasMany(Testimonio::className(), ['estado_idestado' => 'idestado']);
    }
}

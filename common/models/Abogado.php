<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "abogado".
 *
 * @property integer $idabogado
 * @property string $nombres
 * @property string $apellidos
 * @property string $contacto
 * @property integer $estado_idestado
 *
 * @property Estado $estadoIdestado
 * @property AbogadoServicio[] $abogadoServicios
 */
class Abogado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'abogado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombres', 'apellidos', 'estado_idestado'], 'required'],
            [['estado_idestado'], 'integer'],
            [['nombres', 'apellidos', 'contacto'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idabogado' => 'Idabogado',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'contacto' => 'Contacto',
            'estado_idestado' => 'Estado Idestado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoIdestado()
    {
        return $this->hasOne(Estado::className(), ['idestado' => 'estado_idestado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbogadoServicios()
    {
        return $this->hasMany(AbogadoServicio::className(), ['abogado_idabogado' => 'idabogado']);
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $idcliente
 * @property string $nombre
 * @property string $descripcion
 * @property integer $estado_idestado
 *
 * @property Estado $estadoIdestado
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'estado_idestado'], 'required'],
            [['estado_idestado'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 140]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcliente' => 'Idcliente',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
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
}

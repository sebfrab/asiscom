<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "testimonio".
 *
 * @property integer $idtestimonio
 * @property string $persona
 * @property string $cargo
 * @property string $testimonio
 * @property string $testimoniocol
 * @property integer $estado_idestado
 *
 * @property Estado $estadoIdestado
 */
class Testimonio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'testimonio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persona', 'estado_idestado'], 'required'],
            [['testimonio'], 'string'],
            [['estado_idestado'], 'integer'],
            [['persona'], 'string', 'max' => 120],
            [['cargo', 'testimoniocol'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtestimonio' => 'Idtestimonio',
            'persona' => 'Persona',
            'cargo' => 'Cargo',
            'testimonio' => 'Testimonio',
            'testimoniocol' => 'Testimoniocol',
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

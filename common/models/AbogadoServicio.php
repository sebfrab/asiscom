<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "abogado_servicio".
 *
 * @property integer $idabogado_servicio
 * @property integer $abogado_idabogado
 * @property integer $servicio_idservicio
 *
 * @property Abogado $abogado
 * @property Servicio $servicio
 */
class AbogadoServicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'abogado_servicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['abogado_idabogado', 'servicio_idservicio'], 'required'],
            [['abogado_idabogado', 'servicio_idservicio'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idabogado_servicio' => 'Idabogado Servicio',
            'abogado_idabogado' => 'Abogado Idabogado',
            'servicio_idservicio' => 'Servicio Idservicio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbogado()
    {
        return $this->hasOne(Abogado::className(), ['idabogado' => 'abogado_idabogado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicio()
    {
        return $this->hasOne(Servicio::className(), ['idservicio' => 'servicio_idservicio']);
    }
}

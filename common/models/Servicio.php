<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "servicio".
 *
 * @property integer $idservicio
 * @property string $nombre
 * @property string $descripcion
 * @property string $resumen
 * @property string $image
 * @property integer $destacado
 */
class Servicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'resumen', 'image'], 'required'],
            [['descripcion'], 'string'],
            [['destacado'], 'integer'],
            [['nombre', 'image'], 'string', 'max' => 45],
            [['resumen'], 'string', 'max' => 120]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idservicio' => 'Idservicio',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'resumen' => 'Resumen',
            'image' => 'Image',
            'destacado' => 'Destacado',
        ];
    }
}

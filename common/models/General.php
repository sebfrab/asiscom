<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "general".
 *
 * @property integer $idgeneral
 * @property string $nombre
 * @property string $dato
 */
class General extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'general';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['dato'], 'string'],
            [['nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idgeneral' => 'Idgeneral',
            'nombre' => 'Nombre',
            'dato' => 'Dato',
        ];
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->dato = str_replace("<p>","", $this->dato);
            $this->dato = str_replace("</p>","", $this->dato);
            
            $this->dato = str_replace("/n","<br/>", $this->dato);
        }
        return true;
    }
}

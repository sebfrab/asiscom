<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\helpers\Json;
use Imagine\Image\Box;
use Imagine\Image\Point;

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
    public $image;
    public $crop_info;
    
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
            [['descripcion'], 'string', 'max' => 140],
            [
                'image', 
                'file', 
                'extensions' => ['jpg', 'jpeg', 'png', 'gif'],
                'mimeTypes' => ['image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'],
                'on' => 'create'
            ],
            ['crop_info', 'safe'],
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
    
    public function urlImagen(){
        if(file_exists('../../frontend/web/images/cliente/'.$this->idcliente.'.jpg')){
            return Yii::$app->params['front'].'/images/cliente/'.$this->idcliente.'.jpg';
        }else{
            return Yii::$app->params['front'].'/images/cliente/default.jpg';
        }
    }
    
    public function afterSave($insert, $changedAttributes)
    {
        
        $cropSettings = [
            [
                'width' => 150,
                'height' => 150,
            ],
        ];
        
        if($this->crop_info != ""){
        
            $image = Image::getImagine()->open($this->image->tempName);

            // rendering information about crop of ONE option 
            $cropInfo = Json::decode($this->crop_info);
            $cropInfo = $cropInfo[0];
            $cropInfo['dw'] = (int)$cropInfo['dw']; //new width image
            $cropInfo['dh'] = (int)$cropInfo['dh']; //new height image
            $cropInfo['x'] = abs($cropInfo['x']); //begin position of frame crop by X
            $cropInfo['y'] = abs($cropInfo['y']); //begin position of frame crop by Y

            $oldImages = FileHelper::findFiles(Yii::getAlias('../../frontend/web/images/cliente'), [
                'only' => [
                    $this->idcliente . '.*',
                    'thumb_' . $this->idcliente . '.*',
                ], 
            ]);
            for ($j = 0; $j != count($oldImages); $j++) {
                @unlink($oldImages[$j]);
            }

            //saving thumbnail
            $newSizeThumb = new Box($cropInfo['dw'], $cropInfo['dh']);
            $cropSizeThumb = new Box($cropSettings[0]['width'], $cropSettings[0]['height']); //frame size of crop
            $cropPointThumb = new Point($cropInfo['x'], $cropInfo['y']);
            $pathThumbImage = Yii::getAlias('../../frontend/web/images/cliente') . '/' . $this->idcliente . '.jpg';  

            $image->copy()
                ->resize($newSizeThumb)
                ->crop($cropPointThumb, $cropSizeThumb)
                ->save($pathThumbImage, ['quality' => 100]);
        }    
    }
}

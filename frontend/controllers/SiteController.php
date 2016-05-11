<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Servicio;
use common\models\Testimonio;
use common\models\Cliente;
use common\models\General;
use common\models\Abogado;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        $servicios = Servicio::find()->where(['destacado'=>1])->all();
        $testimonio = Testimonio::find()->
                where(['estado_idestado' => 1])->
                orderBy(['rand()' => SORT_DESC])->
                limit(1)->
                one();
        
        $clientes = Cliente::find()->
                where(['estado_idestado' => 1])->
                orderBy(['rand()' => SORT_DESC])->
                limit(4)->
                all();
        
        $nuestro_estudio = General::find()->
                where(['idgeneral' => 6])->
                one();
        
        $model = new ContactForm();

        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Gracias por contactarnos. '
                        . 'Nosotros responderemos a la mayor brevedad posible.');
            } else {
                Yii::$app->session->setFlash('error', 'Se ha producido un error '
                        . 'al realizar el envío de correo electrónico.');
            }

            $this->redirect(Yii::$app->urlManager->createUrl(["site/index","#"=>"contacto"]));
        } else {
            return $this->render('index', [
                'servicios' => $servicios,
                'testimonio' => $testimonio,
                'clientes' => $clientes,
                'model' => $model,
                'nuestro_estudio' => $nuestro_estudio,
            ]);
        }
        
        
    }
 
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Gracias por contactarnos. '
                        . 'Nosotros responderemos a la mayor brevedad posible.');
            } else {
                Yii::$app->session->setFlash('error', 'Se ha producido un error '
                        . 'al realizar el envío de correo electrónico.');
            }

            $this->redirect(Yii::$app->urlManager->createUrl(["site/index","#"=>"contacto"]));
        } else {
            return $this->render('contacto', [
                'model' => $model,
            ]);
        }
    }

    
    public function actionAbout()
    {
        $mision = General::find()->
                where(['idgeneral' => 4])->
                one();
        
        $vision = General::find()->
                where(['idgeneral' => 5])->
                one();
        
        $nuestro_estudio = General::find()->
                where(['idgeneral' => 6])->
                one();
        
        return $this->render('about',[
            'mision' => $mision,
            'vision' => $vision,
            'nuestro_estudio' => $nuestro_estudio,
        ]);
    }

    public function actionAbogados()
    {
        $abogados = Abogado::find()->
                where(['estado_idestado' => 1])->
                all();
        return $this->render('abogados',[
            'abogados' => $abogados
        ]);
    }
    
    public function actionAreas()
    {
        $servicio = Servicio::find()->
                all();
        return $this->render('areas',[
            'areas' => $servicio
        ]);
    }

}

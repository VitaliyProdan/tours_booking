<?php

namespace app\controllers;

use app\models\Booking;
use Yii;
use yii\data\ActiveDataProvider;
use app\models\Tour;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * CustomFieldController implements the CRUD actions for CustomField model.
 */
class BookingController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view'],
                'rules' => [
                    [
                        //'actions' => ['index, view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    /**
     * Creates a new Tour model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $tour = $this->findTour($id);
        if (!empty($_POST)) {
            $booking = new Booking(['tour_id' => $tour->id]);
            $fields = ArrayHelper::map($tour->customFields, 'id', 'name');
            $result = [];
            foreach($_POST['CustomField'] as $key=> $field_value){
                if (!array_key_exists($key, $fields)){continue;}
                $result[] = ['field' => $fields[$key], 'value' => $field_value, 'key' => $key];
            }
            $booking->result = json_encode($result);
            if ($booking->save()) {
                \Yii::$app->getSession()->setFlash('success', 'Thanks for booking our tour. We will contact you soon.');
                return $this->redirect(['tour/view', 'id' => $booking->tour_id]);
            }
        }
        return $this->render('create', [
            'tour' => $tour,
        ]);
    }

    /**
     * Lists all Booking models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Booking::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Booking model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }



    /**
     * Finds the Tour model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tour the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findTour($id)
    {
        if (($model = Tour::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * Finds the Tour model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tour the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Booking::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
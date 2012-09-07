<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		if(!Yii::app()->user->checkAccess('admin'))
		{
			throw new CHttpException(403,'You are not authorized to perform this action');
		}
		$this->render('index');
	}

}
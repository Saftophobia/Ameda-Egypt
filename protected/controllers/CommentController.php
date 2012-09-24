<?php

class CommentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	private $_thread=null;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			'threadContext + create,admin',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		if(User::model()->findByPk(Yii::app()->user->id)->locked)
		{
			throw new CHttpException(403,'You Are Locked Due To Offensive Action');
		}
		if(!$this->_thread->locked)
		{
		$model=new Comment;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['content']))
		{
			$model->content=$_POST['content'];
			$model->user_id=Yii::app()->user->id;
			$model->thread_id=$this->_thread->id;
			$model->created_at=new CDbExpression('Now()');
			$this->_thread->updated_at=$model->created_at;
			if($model->save())
			{
				$this->_thread->save();
				$user=User::model()->findByPk($model->user_id);
				        echo CJSON::encode(array(
										'content'=>$model->content,
										'created_at'=>Comment::model()->findByPk($model->id)->created_at,
										'first_name'=>$user->first_name,
										'last_name'=>$user->last_name,
										'username'=>$user->username,
										'email'=>$user->email,
										'date_joined'=>$user->date_joined,
										'id'=>$user->id,
										'image'=>$user->getFileUrl('normal'),
										));
			
			}
	
				
		}
	}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		if(!Yii::app()->user->checkAccess('admin'))
		{
			throw new CHttpException(403,'You are not authorized to perform this action.');
		}
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Comment']))
		{
			$model->attributes=$_POST['Comment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(!Yii::app()->user->checkAccess('admin'))
		{
			throw new CHttpException(403,'You are not authorized to perform this action.');
		}
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if(!Yii::app()->user->checkAccess('admin'))
		{
			throw new CHttpException(403,'You are not authorized to perform this action.');
		}
		$model=new Comment('search');
		$model->unsetAttributes();  // clear any default values
		$model->thread_id=$this->_thread->id;
		if(isset($_GET['Comment']))
			$model->attributes=$_GET['Comment'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Comment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function filterThreadContext($filterChain)
	{
		$threadId=null;
		if(isset($_GET['tid']))
		{
			$threadId=$_GET['tid'];
		}
		else
		{
			if(isset($_POST[tid]))
			{
				$threadId=$_POST['tid'];
			}
		}
		$this->loadThread($threadId);
		$filterChain->run();
	}

	protected function loadThread($thread_id)
	{
		if($this->_thread === null)
		{
			$this->_thread=Thread::model()->findByPk($thread_id);
			if($this->_thread===null)
			{
				throw new CHttpException(404,'The requested thread does not exist.');
			}
		}

		return $this->_thread;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

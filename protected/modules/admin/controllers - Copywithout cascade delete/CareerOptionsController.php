<<<<<<< HEAD
<?php

class CareerOptionsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/admin';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','admin','delete','DynamicCareer','createNew','adminView'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','DynamicCareer'),
				'expression' =>"Yii::app()->user->userType ==  'admin'",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','DynamicCareer'),
				'users'=>array('admin'),
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
		$model=new CareerOptions;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CareerOptions']))
		{
			$model->attributes=$_POST['CareerOptions'];
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/career_options/';
			if (!empty($_FILES['CareerOptions']['name']['image'])) {
				$tempFile = $_FILES['CareerOptions']['tmp_name']['image'];
				$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile = $targetPath.'/'.$_FILES['CareerOptions']['name']['image'];
				$pat = $targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath = $pat;
				$newName = time();
				$img = Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/career_options/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_options/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_options/small/');
				 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
			}
			
			
			if($model->save()){	
				if(!empty($_POST['CareerOptions']['subjects']))
				foreach($_POST['CareerOptions']['subjects'] as $subject=>$val){
					if($val){
						$modl						=	new CareerOptionsHasSubjects;
						$modl->subjects_id			=	$subject;
						$modl->career_options_id	=	$model->id;
						$modl->subject_type 		=	$_POST['subjects'][$subject];
						$modl->save();
					}
				}
				if(!empty($_POST['CareerOptions']['streams']))
				foreach($_POST['CareerOptions']['streams'] as $subject=>$val){
					if($val){
						$modl						=	new CareerOptionsHasStream;
						$modl->career_options_id	=	$model->id;
						$modl->stream_id			=	$subject;
						$modl->add_date				=	date('Y-m-d H:i:s');
						$modl->status				=	1;
						$modl->published			=	1;
						$modl->save();
					}
				}
				$this->redirect(array('adminView','id'=>$model->career_id));
			}
				
		}
		$subjectList	=	array();
		foreach($model->careerOptionsHasSubjects as $sub)
			$subjectList[]	=	$sub->subjects_id;
		
		$streams	=	array();
		foreach($model->streamHasCareer as $sub)
			$streams[]	=	$sub->stream_id;	
			
			
			
		$this->render('create',array('model'=>$model,'subjectList'=>$subjectList,'streams'=>$streams));
	}
	
	public function actionCreateNew($id)
	{
		$model=new CareerOptions;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CareerOptions']))
		{
			$model->attributes=$_POST['CareerOptions'];
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/career_options/';
			if (!empty($_FILES['CareerOptions']['name']['image'])) {
				$tempFile = $_FILES['CareerOptions']['tmp_name']['image'];
				$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile = $targetPath.'/'.$_FILES['CareerOptions']['name']['image'];
				$pat = $targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath = $pat;
				$newName = time();
				$img = Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/career_options/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_options/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_options/small/');
				 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
			}
			if($model->save()){
				
				if(!empty($_POST['CareerOptions']['subjects']))
				foreach($_POST['CareerOptions']['subjects'] as $subject=>$val){
					if($val){
						$modl						=	new CareerOptionsHasSubjects;
						$modl->subjects_id			=	$subject;
						$modl->career_options_id	=	$model->id;
						$modl->subject_type 		=	$_POST['subjects'][$subject];
						$modl->save();
					}
				}
				if(!empty($_POST['CareerOptions']['streams']))
				foreach($_POST['CareerOptions']['streams'] as $subject=>$val){
					if($val){
						$modl						=	new CareerOptionsHasStream;
						$modl->career_options_id	=	$model->id;
						$modl->stream_id			=	$subject;
						$modl->add_date				=	date('Y-m-d H:i:s');
						$modl->status				=	1;
						$modl->published			=	1;
						$modl->save();
					}
				}
				
				
				
				$this->redirect(array('adminView','id'=>$model->career_id));
			}
		}
		$subjectList	=	array();
		foreach($model->careerOptionsHasSubjects as $sub)
			$subjectList[]	=	$sub->subjects_id;
		
		$streams	=	array();
		foreach($model->careerOptionsHasStreams as $sub)
			$streams[]	=	$sub->stream_id;
			
		$this->render('form',array('model'=>$model,'subjectList'=>$subjectList,'streams'=>$streams,'id'=>$id));
	}
	
	public function actionAdminView($id)
	{
		$model=new CareerOptions('search');
		$model->unsetAttributes();  // clear any default values
		$model->career_id	=	$id;
		
		if(isset($_GET['CareerOptions']))
			$model->attributes=$_GET['CareerOptions'];

		$this->render('admin',array('model'=>$model,'id'=>$id));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CareerOptions']))
		{
			$model->attributes=$_POST['CareerOptions'];
			$model->modification_date=date('Y-m-d H:i:s');
			$targetFolder1 = rtrim($_SERVER['DOCUMENT_ROOT'],'/').Yii::app()->request->baseUrl.'/uploads/career_options/';
					$targetFolder = Yii::app()->request->baseUrl.'/uploads/career_options/';
				if (!empty($_FILES['CareerOptions']['name']['image'])) {
					$tempFile = $_FILES['CareerOptions']['tmp_name']['image'];
					$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
					$targetFile = $targetPath.'/'.$_FILES['CareerOptions']['name']['image'];
					$pat = $targetFile;
					move_uploaded_file($tempFile,$targetFile);
					$absoPath = $pat;
					$newName = time();
					$img = Yii::app()->imagemod->load($pat);
					# ORIGINAL
					$img->file_max_size = 5000000; // 5 MB
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_options/original/');
					$img->processed;
					#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_options/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_options/small/');
					
					 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
				if($_POST['CareerOptions']['oldImage']!=''){
					@unlink($targetFolder1.'original/'.$_POST['CareerOptions']['oldImage']);
					@unlink($targetFolder1.'large/'.$_POST['CareerOptions']['oldImage']);
					@unlink($targetFolder1.'small/'.$_POST['CareerOptions']['oldImage']);
				}
			}
			else
				$model->image	=	$_POST['CareerOptions']['oldImage'];
			
			if($model->save()){
				CareerOptionsHasSubjects::model()->deleteAllByAttributes(array('career_options_id'=>$model->id));
				if(!empty($_POST['CareerOptions']['subjects']))
				foreach($_POST['CareerOptions']['subjects'] as $subject=>$val){
					if($val){
						$modl						=	new CareerOptionsHasSubjects;
						$modl->subjects_id			=	$subject;
						$modl->career_options_id	=	$model->id;
						$modl->subject_type 		=	$_POST['subjects'][$subject];
						$modl->save();
					}
				}
				
				CareerOptionsHasStream::model()->deleteAllByAttributes(array('career_options_id'=>$model->id));
				if(!empty($_POST['CareerOptions']['streams']))
				foreach($_POST['CareerOptions']['streams'] as $subject=>$val){
					if($val){
						$modl1						=	new CareerOptionsHasStream;
						$modl1->career_options_id	=	$model->id;
						$modl1->stream_id			=	$subject;
						$modl1->add_date				=	date('Y-m-d H:i:s');
						$modl1->status				=	1;
						$modl1->published			=	1;
						$modl1->save();						
					}
				}
				
				
				
				
				$this->redirect(array('adminView','id'=>$model->career_id));//$this->redirect(array('view','id'=>$model->id));
			}
		}

		$subjectList	=	array();
		foreach($model->careerOptionsHasSubjects as $sub)
			$subjectList[]	=	$sub->subjects_id;
		
		$streams	=	array();
		foreach($model->careerOptionsHasStreams as $sub)
			$streams[]	=	$sub->stream_id;	
		
		$this->render('update',array('model'=>$model,'subjectList'=>$subjectList,'streams'=>$streams));
		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CareerOptions');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CareerOptions('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CareerOptions']))
			$model->attributes=$_GET['CareerOptions'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CareerOptions the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CareerOptions::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CareerOptions $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='career-options-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionDynamicCareer()
	{	 
		$getId = '';
		if(!empty($_POST['CareerOptions']['career_categories_id'])) 
			$getId	 = $_POST['CareerOptions']['career_categories_id'];
			$data	=	Career::model()->findAll('career_categories_id =:parent_id',array(':parent_id'=>(int) $getId));
			$data	=	CHtml::listData($data,'id','title');
			echo '<option value="0">Please Select</option>';
			foreach($data as $value=>$name){
				echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
				
			}
		die;

			 
	}	
}
=======
<?php

class CareerOptionsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/admin';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','admin','delete','DynamicCareer','createNew','adminView'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','DynamicCareer'),
				'expression' =>"Yii::app()->user->userType ==  'admin'",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','DynamicCareer'),
				'users'=>array('admin'),
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
		$model=new CareerOptions;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CareerOptions']))
		{
			$model->attributes=$_POST['CareerOptions'];
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/career_options/';
			if (!empty($_FILES['CareerOptions']['name']['image'])) {
				$tempFile = $_FILES['CareerOptions']['tmp_name']['image'];
				$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile = $targetPath.'/'.$_FILES['CareerOptions']['name']['image'];
				$pat = $targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath = $pat;
				$newName = time();
				$img = Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/career_options/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_options/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_options/small/');
				 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
			}
			
			
			if($model->save()){	
				if(!empty($_POST['CareerOptions']['subjects']))
				foreach($_POST['CareerOptions']['subjects'] as $subject=>$val){
					if($val){
						$modl						=	new CareerOptionsHasSubjects;
						$modl->subjects_id			=	$subject;
						$modl->career_options_id	=	$model->id;
						$modl->subject_type 		=	$_POST['subjects'][$subject];
						$modl->save();
					}
				}
				if(!empty($_POST['CareerOptions']['streams']))
				foreach($_POST['CareerOptions']['streams'] as $subject=>$val){
					if($val){
						$modl						=	new CareerOptionsHasStream;
						$modl->career_options_id	=	$model->id;
						$modl->stream_id			=	$subject;
						$modl->add_date				=	date('Y-m-d H:i:s');
						$modl->status				=	1;
						$modl->published			=	1;
						$modl->save();
					}
				}
				$this->redirect(array('adminView','id'=>$model->career_id));
			}
				
		}
		$subjectList	=	array();
		foreach($model->careerOptionsHasSubjects as $sub)
			$subjectList[]	=	$sub->subjects_id;
		
		$streams	=	array();
		foreach($model->streamHasCareer as $sub)
			$streams[]	=	$sub->stream_id;	
			
			
			
		$this->render('create',array('model'=>$model,'subjectList'=>$subjectList,'streams'=>$streams));
	}
	
	public function actionCreateNew($id)
	{
		$model=new CareerOptions;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CareerOptions']))
		{
			$model->attributes=$_POST['CareerOptions'];
			$targetFolder = Yii::app()->request->baseUrl.'/uploads/career_options/';
			if (!empty($_FILES['CareerOptions']['name']['image'])) {
				$tempFile = $_FILES['CareerOptions']['tmp_name']['image'];
				$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
				$targetFile = $targetPath.'/'.$_FILES['CareerOptions']['name']['image'];
				$pat = $targetFile;
				move_uploaded_file($tempFile,$targetFile);
				$absoPath = $pat;
				$newName = time();
				$img = Yii::app()->imagemod->load($pat);
				# ORIGINAL
				$img->file_max_size = 5000000; // 5 MB
				$img->file_new_name_body = $newName;
				$img->process('uploads/career_options/original/');
				$img->processed;
				#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_options/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_options/small/');
				 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
			}
			if($model->save()){
				
				if(!empty($_POST['CareerOptions']['subjects']))
				foreach($_POST['CareerOptions']['subjects'] as $subject=>$val){
					if($val){
						$modl						=	new CareerOptionsHasSubjects;
						$modl->subjects_id			=	$subject;
						$modl->career_options_id	=	$model->id;
						$modl->subject_type 		=	$_POST['subjects'][$subject];
						$modl->save();
					}
				}
				if(!empty($_POST['CareerOptions']['streams']))
				foreach($_POST['CareerOptions']['streams'] as $subject=>$val){
					if($val){
						$modl						=	new CareerOptionsHasStream;
						$modl->career_options_id	=	$model->id;
						$modl->stream_id			=	$subject;
						$modl->add_date				=	date('Y-m-d H:i:s');
						$modl->status				=	1;
						$modl->published			=	1;
						$modl->save();
					}
				}
				
				
				
				$this->redirect(array('adminView','id'=>$model->career_id));
			}
		}
		$subjectList	=	array();
		foreach($model->careerOptionsHasSubjects as $sub)
			$subjectList[]	=	$sub->subjects_id;
		
		$streams	=	array();
		foreach($model->careerOptionsHasStreams as $sub)
			$streams[]	=	$sub->stream_id;
			
		$this->render('form',array('model'=>$model,'subjectList'=>$subjectList,'streams'=>$streams,'id'=>$id));
	}
	
	public function actionAdminView($id)
	{
		$model=new CareerOptions('search');
		$model->unsetAttributes();  // clear any default values
		$model->career_id	=	$id;
		
		if(isset($_GET['CareerOptions']))
			$model->attributes=$_GET['CareerOptions'];

		$this->render('admin',array('model'=>$model,'id'=>$id));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CareerOptions']))
		{
			$model->attributes=$_POST['CareerOptions'];
			$model->modification_date=date('Y-m-d H:i:s');
			$targetFolder1 = rtrim($_SERVER['DOCUMENT_ROOT'],'/').Yii::app()->request->baseUrl.'/uploads/career_options/';
					$targetFolder = Yii::app()->request->baseUrl.'/uploads/career_options/';
				if (!empty($_FILES['CareerOptions']['name']['image'])) {
					$tempFile = $_FILES['CareerOptions']['tmp_name']['image'];
					$targetPath	=	$_SERVER['DOCUMENT_ROOT'].$targetFolder;
					$targetFile = $targetPath.'/'.$_FILES['CareerOptions']['name']['image'];
					$pat = $targetFile;
					move_uploaded_file($tempFile,$targetFile);
					$absoPath = $pat;
					$newName = time();
					$img = Yii::app()->imagemod->load($pat);
					# ORIGINAL
					$img->file_max_size = 5000000; // 5 MB
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_options/original/');
					$img->processed;
					#IF ORIGINAL IMAGE NOT LARGER THAN 5MB PROCESS WILL TRUE 	
				if ($img->processed) {
					#THUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 304;
					$img->image_x           = 304;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_options/large/');
					
					#STHUMB Image
					$img->image_resize      = true;
					$img->image_y         	= 115;
					$img->image_x           = 265;
					$img->file_new_name_body = $newName;
					$img->process('uploads/career_options/small/');
					
					 
					$fileName	=	$img->file_dst_name;
					$img->clean();
	
				}
				$model->image	=	$fileName;
				if($_POST['CareerOptions']['oldImage']!=''){
					@unlink($targetFolder1.'original/'.$_POST['CareerOptions']['oldImage']);
					@unlink($targetFolder1.'large/'.$_POST['CareerOptions']['oldImage']);
					@unlink($targetFolder1.'small/'.$_POST['CareerOptions']['oldImage']);
				}
			}
			else
				$model->image	=	$_POST['CareerOptions']['oldImage'];
			
			if($model->save()){
				CareerOptionsHasSubjects::model()->deleteAllByAttributes(array('career_options_id'=>$model->id));
				if(!empty($_POST['CareerOptions']['subjects']))
				foreach($_POST['CareerOptions']['subjects'] as $subject=>$val){
					if($val){
						$modl						=	new CareerOptionsHasSubjects;
						$modl->subjects_id			=	$subject;
						$modl->career_options_id	=	$model->id;
						$modl->subject_type 		=	$_POST['subjects'][$subject];
						$modl->save();
					}
				}
				
				CareerOptionsHasStream::model()->deleteAllByAttributes(array('career_options_id'=>$model->id));
				if(!empty($_POST['CareerOptions']['streams']))
				foreach($_POST['CareerOptions']['streams'] as $subject=>$val){
					if($val){
						$modl1						=	new CareerOptionsHasStream;
						$modl1->career_options_id	=	$model->id;
						$modl1->stream_id			=	$subject;
						$modl1->add_date				=	date('Y-m-d H:i:s');
						$modl1->status				=	1;
						$modl1->published			=	1;
						$modl1->save();						
					}
				}
				
				
				
				
				$this->redirect(array('adminView','id'=>$model->career_id));//$this->redirect(array('view','id'=>$model->id));
			}
		}

		$subjectList	=	array();
		foreach($model->careerOptionsHasSubjects as $sub)
			$subjectList[]	=	$sub->subjects_id;
		
		$streams	=	array();
		foreach($model->careerOptionsHasStreams as $sub)
			$streams[]	=	$sub->stream_id;	
		
		$this->render('update',array('model'=>$model,'subjectList'=>$subjectList,'streams'=>$streams));
		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CareerOptions');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CareerOptions('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CareerOptions']))
			$model->attributes=$_GET['CareerOptions'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CareerOptions the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CareerOptions::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CareerOptions $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='career-options-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionDynamicCareer()
	{	 
		$getId = '';
		if(!empty($_POST['CareerOptions']['career_categories_id'])) 
			$getId	 = $_POST['CareerOptions']['career_categories_id'];
			$data	=	Career::model()->findAll('career_categories_id =:parent_id',array(':parent_id'=>(int) $getId));
			$data	=	CHtml::listData($data,'id','title');
			echo '<option value="0">Please Select</option>';
			foreach($data as $value=>$name){
				echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
				
			}
		die;

			 
	}	
}
>>>>>>> 83cb3943f11d952557ac2d471d879ed15a76ac0c

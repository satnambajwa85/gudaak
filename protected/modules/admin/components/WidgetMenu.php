<?php
class WidgetMenu extends CWidget
{
   public $visible=true;
 
   public function init()
   {
       if($this->visible)
       {

       }
   }

   public function run()
   {
       if($this->visible)
       {
           $this->renderContent();
       }
   }  
   protected function renderContent()
   	{	
 
		$countries 			=	Countries::model()->countByAttributes(array('status'=>1));
		$states 			=	States::model()->countByAttributes(array('status'=>1));
		$user 				=	UserLogin::model()->countByAttributes(array('status'=>1));
		$cities 			=	Cities::model()->countByAttributes(array('status'=>1));
		$courses 			=	Courses::model()->countByAttributes(array('status'=>1));
		$affiliations 		=	Affiliations::model()->countByAttributes(array('status'=>1));
		$interests	 		=	Interests::model()->countByAttributes(array('status'=>1));
		$orient_categories=	OrientCategories::model()->countByAttributes(array('status'=>1));
		$orientItems	 	=	OrientItems::model()->countByAttributes(array('status'=>1));
		$questions	 		=	Questions::model()->countByAttributes(array('status'=>1));
		$questionOptions	=	QuestionOptions::model()->countByAttributes(array('status'=>1));
		$reports			=	UserReports::model()->countByAttributes(array('status'=>1));
		$stream				=	Stream::model()->countByAttributes(array('status'=>1));
		$testReports		=	TestReports::model()->countByAttributes(array('status'=>1));
		$siteSetting		=	SiteSetting::model()->countByAttributes(array('status'=>1));
		$userlogin			=	Userlogin::model()->countByAttributes(array('status'=>1));
		$userlogin			=	Userlogin::model()->countByAttributes(array('status'=>1));
		$userRole			=	UserRole::model()->countByAttributes(array('status'=>1));
		$userProfiles		=	UserProfiles::model()->countByAttributes(array('status'=>1));
		$slider				=	Slider::model()->countByAttributes(array('status'=>1,'published'=>1));
		$class1	=	'badge-important';
		$class2	=	'badge-info';
		$c		=	$countries;
		$s		=	$states;
		$ci		=	$cities;
		$aff	=	$affiliations;
		$cour	=	$courses;
		$inter	=	$interests;
		$or		=	$orient_categories;
		$orI	=	$orientItems;
		$que	=	$questions;
		$queO	=	$questionOptions;
		$re		=	$reports;
		$stre	=	$stream;
		$testRe	=	$testReports;
		$sett	=	$siteSetting;
		$login	=	$userlogin;
		$role	=	$userRole;
		$uPro	=	$userProfiles;
		if(!empty($c)){
			$result	=	$class2;
		}
		if(empty($c)){
			$result =  	$class1;
		}
		if(!empty($cour)){
			$resultCour	=	$class2;
		}
		if(empty($cour)){
			$resultCour =  	$class1;
		}
		if(!empty($s)){
			$Sresult	=	$class2;
		}
		if(empty($s)){
			$Sresult =  	$class1;
		}
		if(!empty($ci)){
			$Ciresult	=	$class2;
		}
		if(empty($ci)){
			$Ciresult =  	$class1;
		}
		if(!empty($aff)){
			$affResult	=	$class2;
		}
		if(empty($aff)){
			$affResult =  	$class1;
		}
		if(!empty($inter)){
			$interResult	=	$class2;
		}
		if(empty($inter)){
			$interResult =  	$class1;
		}
		if(!empty($or)){
			$orResult	=	$class2;
		}
		if(empty($or)){
			$orResult =  	$class1;
		}
		if(!empty($orI)){
			$orIResult	=	$class2;
		}
		if(empty($orI)){
			$orIResult =  	$class1;
		}
		if(!empty($que)){
			$queResult	=	$class2;
		}
		if(empty($que)){
			$queResult =  	$class1;
		}
		if(!empty($queO)){
			$queOResult	=	$class2;
		}
		if(empty($queO)){
			$queOResult =  	$class1;
		}
		if(!empty($re)){
			$reResult	=	$class2;
		}
		if(empty($re)){
			$reResult =  	$class1;
		}
		if(!empty($stre)){
			$streResult	=	$class2;
		}
		if(empty($stre)){
			$streResult =  	$class1;
		}
		if(!empty($testRe)){
			$testResult	=	$class2;
		}
		if(empty($testRe)){
			$testResult =  	$class1;
		}
		if(!empty($sett)){
			$settResult	=	$class2;
		}
		if(empty($sett)){
			$settResult =  	$class1;
		}
		if(!empty($login)){
			$loginResult	=	$class2;
		}
		if(empty($login)){
			$loginResult =  	$class1;
		}
		if(!empty($role)){
			$roleResult	=	$class2;
		}
		if(empty($role)){
			$roleResult =  	$class1;
		}
		if(!empty($uPro)){
			$uProResult	=	$class2;
		}
		if(empty($uPro)){
			$uProResult =  	$class1;
		}
		$this->render('widgetMenu',array('countries'=>$countries,'states'=>$states,'user'=>$user,'cities'=>$cities,
									'courses'=>$courses,'affiliations'=>$affiliations,'interests'=>$interests,
									'orient_categories'=>$orient_categories,'orientItems'=>$orientItems,
									'questions'=>$questions,'questionOptions'=>$questionOptions,'reports'=>$reports,
									'stream'=>$stream,'testReports'=>$testReports,'siteSetting'=>$siteSetting,
									'userlogin'=>$userlogin,'userRole'=>$userRole,'userProfiles'=>$userProfiles,
									'result'=>$result,'resultCour'=>$resultCour,'uProResult'=>$uProResult,'roleResult'=>$roleResult,
									'loginResult'=>$loginResult,'settResult'=>$settResult,'testResult'=>$testResult,
									'streResult'=>$streResult,'reResult'=>$reResult,'queOResult'=>$queOResult,'queResult'=>$queResult,
									'orIResult'=>$orIResult,'orResult'=>$orResult,'interResult'=>$interResult,'affResult'=>$affResult,
									'Sresult'=>$Sresult,'Ciresult'=>$Ciresult,'slider'=>$slider));
	}  

} 	
 
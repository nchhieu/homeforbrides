<?php
class Search extends CWidget{	
	public function run(){
		//$PostCat = PostCat::model()->findAll(array('select'=>'cat_id,cat_name',
		//									 'condition'=>' topic_id=1 AND cat_status="Show"',
		//									 'order'=>' cat_order '));
		$Tags = Tags::model()->findAll();
		$this->render('Search',array('Tags'=>$Tags));
	}	
}
?>

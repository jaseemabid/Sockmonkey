<?php
	include_once 'class.participant.php';
	include_once 'class.registration.php';
	include_once 'class.accommodation.php';
	function participantSearch($arg){
		return participant::search($arg);
	}
	function participantConfirm($tid){
		$p = new participant($tid);
		$p->updateStatus("Y");
		registration::confirmEventParticipation($tid);
	}

	function participantEvents($tid){
		$r = registration::participantEvents($tid);
		return $r;
	}

	function genTathvaId(){
		$obj=new participant();
		$temp=$obj->getLastId();
		$temp=$temp+3001;
		$str='TAT'."$temp";
		return $str;
	}
	

#	dereg function used to dereg a user from accommodation.
#	this function returns a true value when updated successfully else returns a false value

	function deReg($tatid){
		$y=0;
		$obj=new participant($tatid);
		$obj1=new accommodation($obj->getAccomCaptain());
		$x=$obj1->getDereg();
		if($x=='Y')
			$y=$obj->updateStatus('D');
		return $y;
	}
?>

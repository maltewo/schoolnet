<?php

include_once 'db.php';

const cInsertExercise = "INSERT INTO EXERCISES (TITLE, TEXT, OWNER, GROUP) VALUES (%s, %s, %s, %s)";
const cDeleteExercise = "DELETE * FROM EXERCISES WHERE ID=%s";

function createExercise($pTitle, $pText, $pGroup) {
	
	dbQuery(cInsertExercise, $pTitle, $pText, $_SESSION["username"], $pGroup);
}

function deleteExercise($exerciseId) {
	$lResponse = dbQuery("SELECT OWNER FROM EXERCISES WHERE ID=%s", $exerciseId)->fetch_assoc();
	$lOwner = $lResponse[0];
	
	if ($_SESSION["username"] == $lOwner) {
		dbQuery(cDeleteExercise, $exerciseId);
	}
}

function getExerciseById($exerciseId) {
	$lResponse = dbQuery("SELECT * FROM EXERCISES WHERE ID=%s", $exerciseId)->fetch_assoc();
	
	$lId = $exerciseId;
	$lTitle = $lResponse["TITLE"];
	$lText = $lResponse["TEXT"];
	$lOwner = $lResponse["OWNER"];
	$lGroup = $lResponse["GROUP"];
	
	if ($_SESSION["username"] == $lOwner || $_SESSION["group"] == $lGroup) {
		$lAnswers;
		if ($_SESSION["username"] == $lOwner) {
			$lAnswers = dbQuery("SELECT ID FROM ANSWERS WHERE GROUP=%s", $lGroup)->fetch_assoc();
		} else {
			$lAnswers = dbQuery("SELECT ID FROM ANSWERS WHERE OWNER=%s", $lOwner)->fetch_assoc();
		}
		
		return new Exercise($lId, $lTitle, $lText, $lOwner, $lGroup, $lAnswers);
		
	}
	return false;
}

class Exercise {
	
	public $Id;
	public $Title;
	public $Text;
	public $Owner;
	public $Group;
	public $Answers;

	function Exercise($pId, $pTitle, $pText, $pOwner, $pGroup, $pAnswers) {
		$this->Id = $pId;
		$this->Title = $pTitle;
		$this->Text = $pText;
		$this->Group = $pGroup;
		$this->Owner = $pOwner;
		$this->Answers = $pAnswers;
	}
}
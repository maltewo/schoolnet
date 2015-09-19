<?php

include_once 'db.php';

const cInsertExercise = "INSERT INTO EXERCISES (TITLE, TEXT, OWNER, `GROUP`) VALUES ('%s', '%s', '%s', '%s')";
const cDeleteExercise = "DELETE * FROM EXERCISES WHERE ID='%s'";

function createExercise($pTitle, $pText, $pGroup) {
	
	dbQuery(cInsertExercise, $pTitle, $pText, $_SESSION["username"], $pGroup);
}

function getExercises() {
	
	if ($_SESSION["accountType"] == "student") {
		return dbQuery("SELECT ID FROM EXERCISES WHERE `GROUP`='%s'", $_SESSION["group"]);
	} else {
		return dbQuery("SELECT ID FROM EXERCISES WHERE OWNER='%s'", $_SESSION["username"]);
	}
}

function getAnswersByExerciseId($pId) {
	
	if ($_SESSION["accountType"] == "teacher") {
		return dbQuery("SELECT ID FROM ANSWERS WHERE EXERCISE = '%s'", $pId);
		
	}
	return null;
}

function deleteExercise($exerciseId) {
	$lResponse = dbQuery("SELECT OWNER FROM EXERCISES WHERE ID='%s'", $exerciseId)->fetch_assoc();
	$lOwner = $lResponse[0];
	
	if ($_SESSION["username"] == $lOwner) {
		dbQuery(cDeleteExercise, $exerciseId);
	}
}

function addAnswer($pText) {
	dbQuery("INSERT INTO ANSWERS (TEXT, OWNER) VALUES ('%s', '%s')", $pText, $_SESSION["username"]);
}

function getExerciseById($exerciseId) {
	$lResponse = dbQuery("SELECT * FROM EXERCISES WHERE ID='%s'", $exerciseId)->fetch_assoc();
	
	$lId = $exerciseId;
	$lTitle = $lResponse["TITLE"];
	$lText = $lResponse["TEXT"];
	$lOwner = $lResponse["OWNER"];
	$lGroup = $lResponse["GROUP"];
	
	if ($_SESSION["username"] == $lOwner || $_SESSION["group"] == $lGroup) {
		$lAnswers;
		if ($_SESSION["username"] == $lOwner) {
			$lAnswers = dbQuery("SELECT ID FROM ANSWERS WHERE `GROUP`='%s'", $lGroup)->fetch_assoc();
		} else {
			$lAnswers = dbQuery("SELECT ID FROM ANSWERS WHERE OWNER='%s'", $lOwner)->fetch_assoc();
		}
		
		return new Exercise($lId, $lTitle, $lText, $lOwner, $lGroup, $lAnswers);
		
	}
	return null;
}

function getAnswerById($pId) {
	
	$lResponse = dbQuery("SELECT * FROM ANSWERS WHERE ID='%s'", $pId);
	if ($_SESSION["username"] == $lResponse["OWNER"]) {
		return new Answer($pId, $lResponse["TEXT"], $lResponse["OWNER"]);
	}
	return null;
}

function getStudentsWithAnswer($pAufgabenId) {
	
	$lResponse = dbQuery("SELECT OWNER FROM ANSWERS WHERE EXERCISE='%s'", $pAufgabenId)->fetch_assoc();
	return $lResponse;
}

class Answer {
	
	public $mId;
	public $mText;
	public $mOwner;
	
	function Answer($pId, $pText, $pOwner) {
		
		$this->mId = $pId;
		$this->mText = $pText;
		$this->mOwner = $pOwner;
	}
}

class Exercise {
	
	public $mId;
	public $mTitle;
	public $mText;
	public $mOwner;
	public $mGroup;
	public $mAnswers;

	function Exercise($pId, $pTitle, $pText, $pOwner, $pGroup, $pAnswers) {
		$this->mId = $pId;
		$this->mTitle = $pTitle;
		$this->mText = $pText;
		$this->mGroup = $pGroup;
		$this->mOwner = $pOwner;
		$this->mAnswers = $pAnswers;
	}
}
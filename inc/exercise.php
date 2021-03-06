<?php

include_once 'db.php';

const cInsertExercise = "INSERT INTO EXERCISES (TITLE, TEXT, OWNER, `GROUP`) VALUES ('%s', '%s', '%s', '%s')";
const cDeleteExercise = "DELETE FROM EXERCISES WHERE ID=%s";

function createExercise($pTitle, $pText, $pGroup) {
	if ($_SESSION["role"] == 2 || $_SESSION["role"] == 3) {
		dbQuery(cInsertExercise, $pTitle, $pText, getUserId(), $pGroup);
	}
}

function getExercises() {
	
	if ($_SESSION["role"] == "4") {
		
		$lResponse = dbQuery("SELECT ID FROM EXERCISES WHERE `GROUP`='%s'", $_SESSION["group"]);
		return $lResponse;
	} else if ($_SESSION["role"] == "3") {
		return dbQuery("SELECT ID FROM EXERCISES WHERE OWNER='%s'", getUserId());
	} else if ($_SESSION["role"] == "2") {
		return dbQuery("SELECT ID FROM EXERCISES");
	}
	return null;
}

function getGroups() {
	
	return dbQuery("SELECT * FROM GROUPS ORDER BY `GROUP`");
}

function getAnswersByExerciseId($pId) {
	
	if ($_SESSION["role"] == "3" || $_SESSION["role"] == "2") {
		return dbQuery("SELECT ID FROM ANSWERS WHERE EXERCISE = '%s'", $pId);
		
	} else if ($_SESSION["role"] == 4) {
		
		return dbQuery("SELECT ID FROM ANSWERS WHERE EXERCISE = '%s' AND OWNER = '%s'", $pId, getUserId());
	}
	return null;
}

function deleteExercise($exerciseId) {
	$lResponse = dbQuery("SELECT OWNER FROM EXERCISES WHERE ID=%s", $exerciseId)->fetch_assoc();
	$lOwner = $lResponse["OWNER"];
	
	if (getUserId() == $lOwner || $_SESSION["role"] == 2) {
		dbQuery(cDeleteExercise, $exerciseId);
	}
}

function addAnswer($pText, $pExercise) {
	dbQuery("INSERT INTO ANSWERS (`TEXT`, OWNER, EXERCISE, `GROUP`) VALUES ('%s', %s, %s, %s)", $pText, getUserId(), $pExercise, $_SESSION["group"]);
}

function updateAnswer($pText, $pExercise) {
	
	dbQuery("UPDATE ANSWERS SET TEXT='%s' WHERE EXERCISE='%s' AND OWNER='%s'", $pText, $pExercise, getUserId());
}

function getExerciseById($exerciseId) {
	$lResponse = dbQuery("SELECT * FROM EXERCISES WHERE ID=%s", $exerciseId)->fetch_assoc();
	
	$lId = $exerciseId;
	$lTitle = $lResponse["TITLE"];
	$lText = $lResponse["TEXT"];
	$lOwner = $lResponse["OWNER"];
	$lGroup = $lResponse["GROUP"];
	
	if (getUserId() == $lOwner || $_SESSION["group"] == $lGroup) {
		$lAnswers;
		if (getUserId() == $lOwner) {
			$lAnswers = dbQuery("SELECT ID FROM ANSWERS WHERE `GROUP`='%s' AND EXERCISE='%s'", $lGroup, $lId);
		} else {
			$lAnswers = dbQuery("SELECT ID FROM ANSWERS WHERE OWNER='%s' AND EXERCISE='%s'", $lOwner, $lId);
		}
		
		return new Exercise($lId, $lTitle, $lText, $lOwner, $lGroup, $lAnswers);
		
	}
	return null;
}

function getUserById($pId) {
	$lResponse = dbQuery("SELECT USERNAME FROM USERS WHERE ID='%s'", $pId)->fetch_assoc();
	return $lResponse["USERNAME"];
}

function getAnswerById($pId) {
	$lResponse = dbQuery("SELECT * FROM ANSWERS WHERE ID='%s'", $pId)->fetch_assoc();
	if (getUserId() == $lResponse["OWNER"] || $_SESSION["role"] == 2 || $_SESSION["role"] == 3) {
		return new Answer($pId, $lResponse["TEXT"], $lResponse["OWNER"]);
	}
	return null;
}

function getUserId() {
	$lResponse = dbQuery("SELECT ID FROM USERS WHERE USERNAME='%s'", $_SESSION["username"])->fetch_assoc();
	return $lResponse["ID"];
}

function getStudentsWithAnswer($pAufgabenId) {
	
	$lResponse = dbQuery("SELECT OWNER FROM ANSWERS WHERE EXERCISE='%s'", $pAufgabenId);
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
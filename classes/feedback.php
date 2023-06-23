<?php
class Feedback {
  private $feedbackID;
  private $sessionID;
  private $isStudent;
  private $isProfessor;

  public function __construct($feedbackID, $sessionID, $isStudent, $isProfessor) {
    $this->feedbackID = $feedbackID;
    $this->sessionID = $sessionID;
    $this->isStudent = $isStudent;
    $this->isProfessor = $isProfessor;
  }

  public function addFeedback($feedback) {         //NOT USED TILL NOW
    DB::insert('feedback', [
      'session_id' => $feedback->getSessionID(),
      'is_student' => $feedback->getIsStudent(),
      'is_professor' => $feedback->getIsProfessor(),
    ]);
  }

  public function removeFeedback($feedbackID) {    //NOT USED TILL NOW
    DB::query("DELETE FROM feedback WHERE feedback_id = %i", $feedbackID);
  }

  // Getters and Setters

  public function getFeedbackID() {
    return $this->feedbackID;
  }

  public function setFeedbackID($feedbackID) {
    $this->feedbackID = $feedbackID;
  }

  public function getSessionID() {
    return $this->sessionID;
  }

  public function setSessionID($sessionID) {
    $this->sessionID = $sessionID;
  }

  public function getIsStudent() {
    return $this->isStudent;
  }

  public function setIsStudent($isStudent) {
    $this->isStudent = $isStudent;
  }

  public function getIsProfessor() {
    return $this->isProfessor;
  }

  public function setIsProfessor($isProfessor) {
    $this->isProfessor = $isProfessor;
  }
}
?>

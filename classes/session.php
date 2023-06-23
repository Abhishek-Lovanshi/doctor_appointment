<?php
class Session {
  private $sessionID;
  private $studentID;
  private $counselorID;
  private $date;
  private $duration;

  public function __construct($sessionID, $studentID, $counselorID, $date, $duration) {
    $this->sessionID = $sessionID;
    $this->studentID = $studentID;
    $this->counselorID = $counselorID;
    $this->date = $date;
    $this->duration = $duration;
  }

  public function startSession() {
    DB::insert('sessions', [
      'student_id' => $this->getStudentID(),
      'counselor_id' => $this->getCounselorID(),
      'start_time' => date("Y-m-d H:i:s"),
    ]);
  }

  public function endSession() {
    DB::query("UPDATE sessions SET end_time = %s WHERE session_id = %i", date("Y-m-d H:i:s"), $this->getSessionID());
  }

  // Getters and Setters

  public function getSessionID() {
    return $this->sessionID;
  }

  public function setSessionID($sessionID) {
    $this->sessionID = $sessionID;
  }

  public function getStudentID() {
    return $this->studentID;
  }

  public function setStudentID($studentID) {
    $this->studentID = $studentID;
  }

  public function getCounselorID() {
    return $this->counselorID;
  }

  public function setCounselorID($counselorID) {
    $this->counselorID = $counselorID;
  }

  public function getDate() {
    return $this->date;
  }

  public function setDate($date) {
    $this->date = $date;
  }

  public function getDuration() {
    return $this->duration;
  }

  public function setDuration($duration) {
    $this->duration = $duration;
  }
}

?>

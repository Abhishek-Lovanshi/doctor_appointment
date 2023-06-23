<?php
class Student extends User {
  private $sessionHistory;
  
  public function __construct($UID, $name, $email, $password, $phone) {
    parent::__construct($UID, $name, $email, $password, $phone);
    $this->sessionHistory = array();
  }
  
  public function bookSession($sessionID) {
    // Code to book a session
    $this->sessionHistory[] = array(
      "sessionID" => $sessionID,
      "status" => "booked"
    );
  }
  
  public function paySession($sessionID) {
    // Code to pay for a session
    foreach ($this->sessionHistory as &$session) {
      if ($session["sessionID"] == $sessionID) {
        $session["status"] = "paid";
        break;
      }
    }
  }
  
  public function cancelSession($sessionID) {
    // Code to cancel a session
    foreach ($this->sessionHistory as &$session) {
      if ($session["sessionID"] == $sessionID) {
        $session["status"] = "cancelled";
        break;
      }
    }
  }
  
  public function getFeedback($sessionID) {
    // Code to get feedback for a session
    // Assuming feedback is stored in a database
    $feedback = DB::query("SELECT feedback FROM sessions WHERE session_id = %i", $sessionID);
    return $feedback;
  }
  
  public function getSessionHistory() {
    return $this->sessionHistory;
  }
}

?>

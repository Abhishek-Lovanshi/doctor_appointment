<?php
class Counselor extends User {
  private $expertise;

  public function __construct($UID, $name, $email, $password, $phone, $expertise) {
    parent::__construct($UID, $name, $email, $password, $phone);
    $this->expertise = $expertise;
  }

  public function checkSlotAvailability($date) {
    $slots = DB::query("SELECT * FROM counselor_schedule WHERE counselor_id = %i AND date = %s", $this->getUID(), $date);
    return $slots;
  }

  public function cancelSession($sessionID) {
    DB::query("UPDATE sessions SET status = 'cancelled' WHERE session_id = %i AND counselor_id = %i", $sessionID, $this->getUID());
  }

  public function getFeedback($sessionID) {
    // Code to get feedback for a session
    // Assuming feedback is stored in a database
    $feedback = DB::query("SELECT feedback FROM sessions WHERE session_id = %i AND counselor_id = %i", $sessionID, $this->getUID());
    return $feedback;
  }

  public function getSessionHistory() {
    // Code to get session history
    // Assuming session data is stored in a database
    $sessions = DB::query("SELECT * FROM sessions WHERE counselor_id = %i", $this->getUID());
    return $sessions;
  }

  // Getters and Setters

  public function getExpertise() {
    return $this->expertise;
  }

  public function setExpertise($expertise) {
    $this->expertise = $expertise;
  }
}
?>

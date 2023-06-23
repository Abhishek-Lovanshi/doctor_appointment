<?php
include("../connection.php");
class Admin {
  private $adminID;
  private $UID;
  private $password;

  public function __construct($adminID, $UID, $password) {
    $this->adminID = $adminID;
    $this->UID = $UID;
    $this->password = $password;
  }

  public function addUser($user) {
    DB::insert('users', [
      'uid' => $user->getUID(),
      'name' => $user->getName(),
      'email' => $user->getEmail(),
      'password' => $user->getPassword(),
      'phone' => $user->getPhone(),
      'user_type' => 'student', 
    ]);
  }

  public function deleteUser($userID) {
    DB::query("DELETE FROM users WHERE uid = %i", $userID);
  }

  public function createSession($session) {
    DB::insert('sessions', [
      'student_id' => $session->getStudentID(),
      'counselor_id' => $session->getCounselorID(),
      'date' => $session->getDate(),
      'start_time' => $session->getStartTime(),
      'end_time' => $session->getEndTime(),
      'status' => 'booked', 
    ]);
  }

  public function cancelSession($sessionID) {
    DB::query("UPDATE sessions SET status = 'cancelled' WHERE session_id = %i", $sessionID);
  }

  // Getters and Setters

  public function getAdminID() {
    return $this->adminID;
  }

  public function setAdminID($adminID) {
    $this->adminID = $adminID;
  }

  public function getUID() {
    return $this->UID;
  }

  public function setUID($UID) {
    $this->UID = $UID;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }
}

?>
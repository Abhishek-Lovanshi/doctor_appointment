<?php
class Payment {
  private $paymentID;
  private $sessionID;
  private $amount;
  private $isRefunded;

  public function __construct($paymentID, $sessionID, $amount, $isRefunded) {
    $this->paymentID = $paymentID;
    $this->sessionID = $sessionID;
    $this->amount = $amount;
    $this->isRefunded = $isRefunded;
  }

  public function refund() {
    // Code to refund the payment
    $this->isRefunded = true;
    // Assuming payment data is stored in a database
    DB::query("UPDATE payments SET is_refunded = %i WHERE payment_id = %i", 1, $this->getPaymentID());
  }

  // Getters and Setters

  public function getPaymentID() {
    return $this->paymentID;
  }

  public function setPaymentID($paymentID) {
    $this->paymentID = $paymentID;
  }

  public function getSessionID() {
    return $this->sessionID;
  }

  public function setSessionID($sessionID) {
    $this->sessionID = $sessionID;
  }

  public function getAmount() {
    return $this->amount;
  }

  public function setAmount($amount) {
    $this->amount = $amount;
  }

  public function isRefunded() {
    return $this->isRefunded;
  }

  public function setRefunded($isRefunded) {
    $this->isRefunded = $isRefunded;
  }
}
?>

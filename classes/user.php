<?php
class User{
    private string $UID;
    private string $name;
    private string $email;
    private string $password;
    private string $phone;
    
    public function __construct(string $UID, string $name, string $email, string $password, string $phone) {
        $this->UID = $UID;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
    }
    
    public function getUID(): string {
        return $this->UID;
    }
    
    public function setUID(string $UID): void {
        $this->UID = $UID;
    }
    
    public function getName(): string {
        return $this->name;
    }
    
    public function setName(string $name): void {
        $this->name = $name;
    }
    
    public function getEmail(): string {
        return $this->email;
    }
    
    public function setEmail(string $email): void {
        $this->email = $email;
    }
    
    public function getPassword(): string {
        return $this->password;
    }
    
    public function setPassword(string $password): void {
        $this->password = $password;
    }
    
    public function getPhone(): string {
        return $this->phone;
    }
    
    public function setPhone(string $phone): void {
        $this->phone = $phone;
    }
    
    public function signUp() {

        $sql = "INSERT INTO users (UID, name, email, password, phone) VALUES ('$this->UID', '$this->name', '$this->email', '$this->password', '$this->phone')";
 
        $result = mysqli_query($dbConnection, $sql);
 
        if($result) {
            echo "User account created successfully";
        } else {
            echo "Error creating user account: " . mysqli_error($dbConnection);
        }
    }
    
    public function login() {
        $sql = "SELECT * FROM users WHERE email = '$this->email' AND password = '$this->password'";
        $result = mysqli_query($dbConnection, $sql);
        if(mysqli_num_rows($result) > 0) {
            echo "Login successful";
        } else {
            echo "Invalid email or password";
        }
    }
    
    public function logout() {

        session_start();
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit;
    }
    
    public function updateProfile() {
 
        $sql = "UPDATE users SET name = '$this->name', email = '$this->email', password = '$this->password', phone = '$this->phone' WHERE UID = '$this->UID'";
        
        $result = mysqli_query($dbConnection, $sql);
        
        if($result) {
            echo "User profile updated successfully";
        } else {
            echo "Error updating user profile: " . mysqli_error($dbConnection);
        }
    }
}

?>
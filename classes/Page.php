<?php 
class Page {
    private $mysqli;
    private $username;

    public function __construct($mysqli, $username) {
        $this->mysqli = $mysqli;
        $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->user = $result->fetch_array(); 
    }

    public function username() {
        return $this->user['username'];
    }

    public function joinDate() {
        $joined = $this->user['joinDate'];
        echo date("d/m/y", $joinDate);
    }

    public function lastSeen() {
        $lastseen = $this->user['lastSeen'];
        echo date("d/m/y", $lastSeen);
    }

    public function bio() {
        return $this->user['bio'];
    }
}
?>

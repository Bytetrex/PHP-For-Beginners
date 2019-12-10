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

    public function joined() {
        $joined = $this->user['joined'];
        echo date("d/m/y", $joined);
    }

    public function lastseen() {
        $lastseen = $this->user['lastseen'];
        echo date("d/m/y", $lastseen);
    }

    public function description() {
        return $this->user['description'];
    }
}
?>
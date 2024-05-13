<?php


$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$database = 'clothingstoredb';


$conn = new mysqli($host, $dbusername, $dbpassword, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

class UserModel {
    private $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function usernameExists($username) {
        $stmt = $this->dbConnection->prepare("SELECT id FROM User WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function createUser($username, $email , $password) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->dbConnection->prepare("INSERT INTO User (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $passwordHash);
        $result = $stmt->execute();
        return $result;
    }

    public function updateProfile($userId, $username, $password, $email) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->dbConnection->prepare("UPDATE User SET username = ?, password = ?, email = ? WHERE id = ?");
        $stmt->bind_param("sssi", $username, $passwordHash, $email, $userId);
        $result = $stmt->execute();
        return $result;
    }

   
    public function verifyCurrentPassword($username, $currentPassword) {
        $stmt = $this->dbConnection->prepare("SELECT password FROM User WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return password_verify($currentPassword, $row['password']);
        }
        return false;
    }


    public function updatePassword($userId, $newPassword) {
        $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->dbConnection->prepare("UPDATE User SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $passwordHash, $userId);
        $result = $stmt->execute();
        return $result;
    }

    public function forgotPassword($email) {
        $stmt = $this->dbConnection->prepare("SELECT * FROM User WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            //   password reset link or reset password
            //  password reset logic
            return "Password reset instructions sent to your email.";
        } else {
            
            return "Email not found.";
        }
    }


    
}

class TransactionHistoryModel {
    private $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }


    public function getTransactionHistory() {
        $stmt = $this->dbConnection->prepare("SELECT * FROM transaction_history ORDER BY time DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        $transactions = [];
        while ($row = $result->fetch_assoc()) {
            array_push($transactions, $row);
        }
        return $transactions;
    }

    public function getTotalTransactions() {
        $stmt = $this->dbConnection->prepare("SELECT COUNT(id) FROM transaction_history");
        $stmt->execute();
        $result = $stmt->get_result();
        $totalTransactions = 0;
        while ($row = $result->fetch_assoc()) {
            $totalTransactions = $row['COUNT(id)'];
        }
        return $totalTransactions;
    }

}

class SellerModel {
    private $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }


    public function getPendingSellers() {
        $stmt = $this->dbConnection->prepare("SELECT * FROM seller WHERE status = 'Pending'");
        $stmt->execute();
        $result = $stmt->get_result();
        $sellers = [];
        while ($row = $result->fetch_assoc()) {
            array_push($sellers, $row);
        }
        return $sellers;
    }
    
    public function approveSeller($id) {
        $stmt = $this->dbConnection->prepare("UPDATE seller SET status = 'Approved' WHERE id = ?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        return $result;
    }
    
    public function rejectSeller($id) {
        $stmt = $this->dbConnection->prepare("UPDATE seller SET status = 'Rejected' WHERE id = ?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        return $result;
    }

    public function getTopSellers() {
        $stmt = $this->dbConnection->prepare("SELECT * FROM seller ORDER BY totalSales DESC LIMIT 5");
        $stmt->execute();
        $result = $stmt->get_result();
        $sellers = [];
        while ($row = $result->fetch_assoc()) {
            array_push($sellers, $row);
        }
        return $sellers;
    }

    public function getTotalSellers() {
        $stmt = $this->dbConnection->prepare("SELECT COUNT(id) FROM seller");
        $stmt->execute();
        $result = $stmt->get_result();
        $totalSellers = 0;
        while ($row = $result->fetch_assoc()) {
            $totalSellers = $row['COUNT(id)'];
        }
        return $totalSellers;
    }
    
    
    
}

class ProductModel {
    private $dbConnection;
    
    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    
    public function getTotalProductPrice() {
        $stmt = $this->dbConnection->prepare("SELECT SUM(price) FROM product");
        $stmt->execute();
        $result = $stmt->get_result();
        $totalPrice = 0;
        while ($row = $result->fetch_assoc()) {
            $totalPrice = $row['SUM(price)'];
        }
        return $totalPrice;
    }
    
    public function getTotalProducts() {
        $stmt = $this->dbConnection->prepare("SELECT COUNT(id) FROM product");
        $stmt->execute();
        $result = $stmt->get_result();
        $totalProducts = 0;
        while ($row = $result->fetch_assoc()) {
            $totalProducts = $row['COUNT(id)'];
        }
        return $totalProducts;
    }

    public function getPendingProducts() {
        $stmt = $this->dbConnection->prepare("SELECT * FROM product WHERE status = 'Pending'");
        $stmt->execute();
        $result = $stmt->get_result();
        $products = [];
        while ($row = $result->fetch_assoc()) {
            array_push($products, $row);
        }
        return $products;
    }


    public function approveProduct($id) {
        $stmt = $this->dbConnection->prepare("UPDATE product SET status = 'Approved' WHERE id = ?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        return $result;
    }
    
    public function rejectProduct($id) {
        $stmt = $this->dbConnection->prepare("UPDATE product SET status = 'Rejected' WHERE id = ?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        return $result;
    }


    
}



?>

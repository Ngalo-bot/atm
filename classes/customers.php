<?php 


class Customer {

    private $db;
  
    public function __construct($db) {
      $this->db=$db;
      
    }
  
    public function createCustomer($name, $surname,$email, $phone,$comment,$pin,$account_num) {
      $sql = "INSERT INTO customers (name,surname, email, phone,pin,account_number,comment) VALUES (?, ?, ?,?, ?, ?,?)";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param("sssssss", $name,$surname, $email, $phone,$pin,$account_num,$comment); 

  
      if ($stmt->execute()) {
        echo "New customer made".$this->db->insert_id;
        return $this->db->insert_id; // Return the newly inserted customer ID
        
      } else {
        echo "New customer fialed".$this->db->insert_id;
        return false; // Indicate failure (consider error handling)
        
      }
    }
  
    public function getCustomerById($id) {
      $sql = "SELECT * FROM customers WHERE id = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param("s", $id); // Bind parameter for security
  
      $stmt->execute();
      $result = $stmt->get_result();
  
      if ($result->num_rows === 1) {
        return $result->fetch_assoc(); // Return customer data as an associative array
      } else {
        return false; // Indicate customer not found
      }
    }
  
    public function updateCustomer($name,$surname, $email, $phone,$pin, $id) {
      $sql = "UPDATE customers SET name = ?,surname=?, email = ?, phone = ?,pin=? WHERE account_number = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param("ssssss", $name,$surname, $email, $phone, $pin,$id); // Bind parameters for security
      $update=$stmt->execute();

      if ($update) {
        return "win"; // Indicate successful update
      } else {
        return "somthing else......"; // Indicate failure (consider error handling)
      }
    }
  
    public function deleteCustomer($id) {
      $sql = "DELETE FROM customers WHERE id = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param("i", $id); // Bind parameter for security
  
      if ($stmt->execute()) {
        return true; // Indicate successful deletion
      } else {
        return false; // Indicate failure (consider error handling)
      }
    }

    public function loginCustomer($pin){
      $stmt=$this->db->prepare("SELECT * FROM cust");

    }

    public function generate_account_number($length = 10) {
      $digits = '0123456789';
      $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
      $all_chars = $digits . $letters;
    
      $account_number = '';
      for ($i = 0; $i < $length; $i++) {
        $account_number .= $all_chars[rand(0, strlen($all_chars) - 1)];
      }
    
      return $account_number;
    }
  }


  
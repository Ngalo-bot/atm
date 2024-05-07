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
      $stmt->bind_param("i", $id); // Bind parameter for security
  
      $stmt->execute();
      $result = $stmt->get_result();
  
      if ($result->num_rows === 1) {
        return $result->fetch_assoc(); // Return customer data as an associative array
      } else {
        return false; // Indicate customer not found
      }
    }
  
    public function updateCustomer($id, $name, $email, $phone) {
      $sql = "UPDATE customers SET name = ?, email = ?, phone = ? WHERE id = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param("sssi", $name, $email, $phone, $id); // Bind parameters for security
  
      if ($stmt->execute()) {
        return true; // Indicate successful update
      } else {
        return false; // Indicate failure (consider error handling)
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
  }
  
<?php
/** Base model */
class Model extends Database{
    protected $db ;
    function __construct(){
        $this->db = new Database();
    }
 
    public function getAll($table) {
        $query = "SELECT * FROM $table";
        echo ('<pre>');
        print_r($this->db->query($query)->fetchAll(PDO::FETCH_ASSOC));
        echo ('</pre>');
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    // public function getById($table, $id) {
    //     $query = "SELECT * FROM {$table} WHERE id = :id";
    //     $stmt = $this->db->prepare($query);
    //     $stmt->bindParam(':id', $id);
    //     $stmt->execute();
    //     return $stmt->fetch();
    // }

    // public function insert($table, $data) {
    //     $columns = implode(", ", array_keys($data));
    //     $values = ":" . implode(", :", array_keys($data));
    //     $query = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
        
    //     $stmt = $this->db->prepare($query);
    //     foreach ($data as $key => $value) {
    //         $stmt->bindValue(":{$key}", $value);
    //     }
        
    //     return $stmt->execute();
    // }

    // public function update($table, $data, $id) {
    //     $fields = '';
    //     foreach ($data as $key => $value) {
    //         $fields .= "{$key} = :{$key}, ";
    //     }
    //     $fields = rtrim($fields, ', ');
    //     $query = "UPDATE {$table} SET {$fields} WHERE id = :id";

    //     $stmt = $this->db->prepare($query);
    //     foreach ($data as $key => $value) {
    //         $stmt->bindValue(":{$key}", $value);
    //     }
    //     $stmt->bindValue(":id", $id);

    //     return $stmt->execute();
    // }

    // public function delete($table, $id) {
    //     $query = "DELETE FROM {$table} WHERE id = :id";
    //     $stmt = $this->db->prepare($query);
    //     $stmt->bindParam(':id', $id);
    //     return $stmt->execute();
    // }
}
?>
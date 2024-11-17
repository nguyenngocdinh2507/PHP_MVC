<?php
/** Base model */
class Model extends Database{
    protected $db ;
    function __construct(){
        $this->db = new Database();
    }
 
    public function getAll($table, $orderBy = '') {
        $query = "SELECT * FROM $table " . $orderBy;
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    //Select by data in table
    public function getByData($table, $data) {
        echo ('</pre>');
        $condition = '';
        foreach ($data as $key => $value) {
            $condition .= $key . ' = ' . '"'.$value.'" and ';
        }
        //Cắt and cuối
        $condition = substr($condition, 0, -4);
        
        $query = "SELECT * FROM $table WHERE $condition ";
        return $this->db->query($query)->fetch();
        
    }

    public function getById($table, $id) {
        $query = "SELECT * FROM {$table} WHERE {$table}_id = $id";
        return $this->db->query($query)->fetch();
    }

    public function insert($table, $data) {
        return $this->db->insert($table, $data);
    }

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
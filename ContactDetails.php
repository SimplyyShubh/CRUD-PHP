<?php
include_once "Connection.php";

class ContactDetails extends Connection
{

    private $table = 'contact_details';

    //inserting a row to the Table
    public  function insertRow($data)
    {
        $conn = $this->connection;

        //Escape String according to the connection present and store NULL if not present.
        $name = isset($data['name']) ? $conn->real_escape_string($data['name']) : NULL;
        $email = isset($data['email']) ? $conn->real_escape_string($data['email']) : NULL;
        $phone = isset($data['phone']) ? $conn->real_escape_string($data['phone']) : NULL;

        $sql = "INSERT INTO $this->table (full_name, email, phone)
                VALUES ('$name' , '$email' , '$phone')";

        //if Insert is successfull return success along with inserted row id
        if ($conn->query($sql)) {
            $id = $conn->insert_id ;
            return ["Success" => "Successfully entered $name with id: $id "] ;
        } else {
            $data = [   'error' => $conn->error ] ;
            return $data;
        }
    }

    //Editing a row in the Table
    public function edit($data, $id)
    {
    }

    //Get a single row from the Table
    public function getRow($id)
    {
    }

    //get All the rows till the limit
    public function getRows($limit = 10)
    {
    }

    //Delete a row providing the id 
    public function deleteRow($id)
    {
    }
}

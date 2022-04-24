<?php

namespace MercuryHolidays\models;

class  Hotel {
private $conn;
private $table = 'hotels';

//hotel properties
public $min_budget;
public $max_budget;
public $room_no;


public function __construct($db)
{
$this->conn = $db;
}

public function search(){
  
   $this->min_budget =  htmlspecialchars(strip_tags($this->min_budget));
   $this->max_budget =  htmlspecialchars(strip_tags($this->max_budget));
   $this->room_no = htmlspecialchars(strip_tags($this->room_no));
     //runs when required room is greater than 1
     if($this->room_no > 1){
     $query = 'SELECT  * FROM '.$this->table.'
     WHERE per_room_price >= :min_budget AND per_room_price <= :max_budget AND available = 1 AND floor IN 
     (SELECT floor FROM '.$this->table.' WHERE available = 1 group by floor HAVING count(available) > 1)';
     
     }else{
     $query = 'SELECT  * FROM '.$this->table.'
     WHERE per_room_price >= :min_budget AND per_room_price <= :max_budget AND available =1 ';
     }

    
    //prepare statements
     $statement = $this->conn->prepare($query);
     $statement->bindParam(':min_budget', $this->min_budget);
     $statement->bindParam(':max_budget', $this->max_budget);
     $statement->execute();
     return $statement;
    }
}
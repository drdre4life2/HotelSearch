<?php

namespace MercuryHolidays\Search;

use MercuryHolidays\config\Database;
use MercuryHolidays\models\Hotel;


class Searcher
{
    public function add(array $property): void
    {
   
    }

    public function search(int $roomsRequired, $minimum, $maximum): array
    {

         $database = new Database;
        $db = $database->connect();
        $hotel = new Hotel($db);
        $hotel->min_budget = $minimum;
        $hotel->max_budget = $maximum;
        $hotel->room_no = $roomsRequired;
       
        $this->add($);
        $result = $hotel->search();
        $num = $result->rowCount();

        if ($num > 0) {
            $hotel_arr = [];
            $hotel_arr['data'] = array();
            while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
                extract($row);
                $hotel_item = [
                    'name' => $name,
                    'available' => $available,
                    'room_no' => $room_no,
                    'floor' => $floor,
                    'per_room_price' => $per_room_price,
                ];
                array_push($hotel_arr['data'], $hotel_item);
            }

            return $hotel_arr;
        }

       // throw new \Exception('Method not implemented');
    }
}


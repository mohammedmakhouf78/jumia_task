<?php
namespace Database;

class Customer
{
    public function get_phone($phone)
    {
        $code = explode("(",$phone)[1];
        $code = explode(")",$code);
        return $code[1];
    }

    public function get_state($phone)
    {
        $code = $this->get_country_code($phone);
        $phone = $this->get_phone($phone);
        switch($code)
        {
            case "237":
                return preg_match("/[2368]\d{7,8}/",$phone);
            case "251":
                return preg_match("/[1-59]\d{8}/",$phone);
            case "212":
                return preg_match("/[5-9]\d{8}/",$phone);
            case "258":
                return preg_match("/[28]\d{7,8}/",$phone);
            case "256":
                return preg_match("/\d{9}/",$phone);
            default:
                return false;
        }
    }

    function get_country($phone)
    {
        $code = $this->get_country_code($phone);
        switch($code)
        {
            case "237":
                return "Cameroon";
            case "251":
                return "Ethiopia";
            case "212":
                return "Morocco";
            case "258":
                return "Mozambique";
            case "256":
                return "Uganda";
            default:
                return "error";
        }
    }

    public function get_country_code($phone)
    {
        $code = explode("(",$phone)[1];
        $code = explode(")",$code);
        return $code[0];
    }

    public function makeAllData($data)
    {
        $newData = [];
        foreach($data as $index => $item)
        {
            $newData[$index]['country'] = $this->get_country($item['phone']);
            $newData[$index]['state'] = $this->get_state($item['phone']);
            $newData[$index]['code'] = $this->get_country_code($item['phone']);
            $newData[$index]['phone'] = $this->get_phone($item['phone']);
        }
        return $newData;
    }

    public function getAllCountries($data)
    {
        $countries = [];
        foreach($data as $item)
        {
            $countries []= $item['country'];
        }
        return array_unique($countries);
    }

    public function getDataByCountry($data,$country)
    {
        $x = [];
        foreach($data as $item)
        {
            if($item['country'] == $country)
            {
                $x []= $item;
            }
        }
        return $x;
    }

    public function getDataByState($data,$state)
    {
        $x = [];
        foreach($data as $item)
        {
            if($item['state'] == $state)
            {
                $x []= $item;
            }
        }
        return $x;
    }
}
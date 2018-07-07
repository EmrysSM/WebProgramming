<?php
class ArrayList
{

    private $list = array();


    public function Add($obj)
    {
        array_push($this->list, $obj);
    }



    public function Remove($key)
    {
        if (array_key_exists($key, $this->list)) {
            unset($this->list[$key]);
        }
    }

//    public function removeLast($obj)
//    {
//        if (array_key_exists($key, $this->list)) {
//            unset($this->list[$key]);
//        }
//    }

public function shuffle(){
        return shuffle($this->list);
}

    public function Size()
    {
        return count($this->list);
    }

    public function toArray(){
        return $this->list;
    }

    public function IsEmpty()
    {
        return empty($this->list);
    }

    public function Get($key)
    {
        if (array_key_exists($key, $this->list)) {
            return $this->list[$key];
        } else {
            return NULL;
        }
    }
}
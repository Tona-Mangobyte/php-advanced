<?php

namespace Magic;

class SimpleClass
{
    protected $values = array();

    public function __get( $key )
    {
        return $this->values[ $key ];
    }

    public function __set($key, $value)
    {
        $method = 'set'.ucfirst($key);
        if(is_callable(array($this, $method))){  //use setters setMethod() to set value for this values[key];
            $this->$method($value); //execute the setter function
        }else{
            $this->values[$key] = $value;
        }
    }

    public function __toString(): string
    {
        return $this->values;
    }


}
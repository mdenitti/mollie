<?php

class Sandwich {

    public $type;
    public $topping;

    public $total = 0;

    public function __construct($type,$topping) {
    $this->type = $type;
    $this->topping = $topping;
    }

    public function calculate() {
        $topping = 0;
        // clear the total... for consecutive use... we need to send the right amount to mollie!
        $this->total = 0;
        foreach($this->topping as $topping) {
            $this->total = $this->total + $topping;
        }
        //return $this->total + $this->type;
        return strval(number_format($this->total + $this->type, 2));
    }

    public function whatType() {
        if ($this->type == 4) {
            return "Smos (€4)";
        }
        if ($this->type == 5) {
            return "Martino (€5)";
        }
        if ($this->type == 6) {
            return "Vegan (€6)";
        }
    }

    public function whatTopping() {
        $newArray = [];
        $topping = 0;
        foreach($this->topping as $topping) {
            if ($topping == 1) {
                array_push($newArray,'Mayo (€1)');
            }
            if ($topping == 2) {
                array_push($newArray,'Cocktail (€2)');
            }
            if ($topping == 3) {
                array_push($newArray,'Salad (€3)');
            }
        }
    return $newArray;
    }

}
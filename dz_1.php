<?php
class Animal {
    protected $name;
    protected $speed;
    private $properties = [];
    public function __construct($name, $speed)
    {
        $this->name = $name;
        $this->speed = $speed;
    }
    public function __set($key, $value)
    {
        $this->properties[$key] = $value;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->properties)) {
           return $this->properties[$name];
        } else {
            return 'Такого свойства нет';
        }

    }
}
class Mammals extends Animal {
    protected $family;

    public function set_family($family) {
        $this->family = $family;
    }

    protected function run($family) {
        if($this->family == $family){
            return $this->speed;
        }else{
            return null;
        }
    }
}
class Cat extends Mammals {

    public function getInfo(){
        echo "Меня зовут: " . $this->name ." семейство: " . $this->family ." у меня: " . $this->leg . " лапы." .
            " Могу бежать со скоростью:" . parent::run($this->family) . "<br>";
    }

}
class Hamster extends Mammals {
    public function getInfo(){
        echo "Меня зовут: " . $this->name ." семейство: " . $this->family ." у меня: " . $this->leg . " лапы." .
           " Могу бежать со скоростью:" . parent::run($this->family) . "<br>";

    }
}

$cat1 = new Cat('Рыжик', 48);
$cat1->set_family('кошачьи');
$cat1->leg = 4;

echo $cat1->getInfo();

$hamster = new Hamster('Хвостик', 3);
$hamster->set_family('хомяковые');
$hamster->leg = 4;
echo $hamster->getInfo();

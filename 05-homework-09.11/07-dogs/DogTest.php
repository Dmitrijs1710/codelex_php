<?php
class DogTest {
    public array $dogs;

    public function Start(){
        $this->dogs[] = new Dog('Max', 'male');
        $this->dogs[] = new Dog('Rocky', 'male');
        $this->dogs[] = new Dog('Sparky', 'male');
        $this->dogs[] = new Dog('Buster', 'male');
        $this->dogs[] = new Dog('Sam', 'male');
        $this->dogs[] = new Dog('Lady', 'female');
        $this->dogs[] = new Dog('Molly', 'female');
        $this->dogs[] = new Dog('Coco', 'female');
        $this->dogs[0]->setFather($this->dogs[1]);
        $this->dogs[0]->setMother($this->dogs[5]);
        $this->dogs[7]->setMother($this->dogs[6]);
        $this->dogs[7]->setFather($this->dogs[3]);
        $this->dogs[1]->setFather($this->dogs[4]);
        $this->dogs[1]->setMother($this->dogs[6]);
        $this->dogs[3]->setMother($this->dogs[5]);
        $this->dogs[3]->setFather($this->dogs[2]);

        foreach($this->dogs as $dog){
            echo "Dog: " . $dog->getName() . ", " . $dog->getGender() . PHP_EOL;
        }

        foreach($this->dogs as $dog)
        {
            echo "Dog: " . $dog->getName() . ", " ;
            echo 'Father: ' . $dog->fathersName(). ', Mother: ';
            if(is_null($dog->getMother()))
            {
                echo 'unknown' . PHP_EOL;
            } else {
                echo $dog->getMother()->getName() . PHP_EOL;
            }
        }

        echo $this->dogs[7]->fathersName() .PHP_EOL;
        echo $this->dogs[2]->fathersName() .PHP_EOL;

        echo $this->dogs[7]->hasSameMotherAs($this->dogs[1]) ? 'true' . PHP_EOL : 'false' . PHP_EOL;
        echo $this->dogs[0]->hasSameMotherAs($this->dogs[1]) ? 'true' . PHP_EOL : 'false' . PHP_EOL;
        echo $this->dogs[0]->hasSameMotherAs($this->dogs[3]) ? 'true' . PHP_EOL : 'false' . PHP_EOL;
    }
}

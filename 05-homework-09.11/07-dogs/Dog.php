<?php
    class Dog{
        private string $name ;
        private string $gender;
        private ?Dog $mother;
        private ?Dog $father;
        public function __construct(string $name,string $gender,Dog $father=null,Dog $mother=null)
        {
            $this->name = $name;
            $this->gender = $gender;
            $this->father = $father;
            $this->mother = $mother;

        }
        public function fathersName() :string{
            return $this->father->name ?? "unknown";
        }
        public function hasSameMotherAs(Dog $otherDog):bool{
            if(!null===$this->getMother() && !null===$otherDog->getMother()){
                return false;
            }
            return $this->getMother()->getName()===$otherDog->getMother()->getName();
        }


        /**
         * @return string
         */
        public function getGender(): string
        {
            return $this->gender;
        }

        /**
         * @return Dog
         */
        public function getMother(): ?Dog
        {
            return $this->mother;
        }

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * @param Dog $father
         */
        public function setFather(Dog $father): void
        {
            $this->father = $father;
        }

        /**
         * @param Dog $mother
         */
        public function setMother(Dog $mother): void
        {
            $this->mother = $mother;
        }
    }


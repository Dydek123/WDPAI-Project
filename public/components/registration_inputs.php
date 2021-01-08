<?php
    class Input{
        private $icon;
        private $header;
        private $name;
        private $type;

        public function __construct(string $icon, string $header, string $name, string $type)
        {
            $this->icon = $icon;
            $this->header = $header;
            $this->name = $name;
            $this->type = $type;
        }

        public function getIcon(): string
        {
            return $this->icon;
        }

        public function getHeader(): string
        {
            return $this->header;
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function getType(): string
        {
            return $this->type;
        }
    }

    class InputList extends Input{
        private $inputList =[4];

        private $iconList = ['user', 'envelope', 'lock', 'lock'];
        private $headers = ['Imię i nazwisko', 'E-mail', 'Hasło', 'Powtórz hasło'];
        private $names = ['name', 'email', 'password', 'repeat-password'];
        private $types = ['text', 'email' , 'password' ,'password'];

        public function __construct()
        {
            for ($i = 0; $i < 4; $i++) {
                $this->inputList[$i] = new Input(
                    $this->iconList[$i],
                    $this->headers[$i],
                    $this->names[$i],
                    $this->types[$i]
                );
            }

        }


        public function getInputList(): array
        {
            return $this->inputList;
        }


    }

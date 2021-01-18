<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>php-opp-dipendenti</title>
    <!-- creare 3 classi per rappresentare la seguente realta':
    - persona
    - dipendente
    - boss
    cercare inoltre di sciegliere alcune variabili di istanza (max 3 o 4 per classe) che possono avere senso in questa realta' e decidere le relazione di parantela (chi estende chi);
    per ogni classe definire eventuale classe padre, variabili di istanza, costruttore, proprieta' e toString;
    instanziando le varie classi provare a stampare cercando di ottenere un log sensato -->
  </head>
  <body>

    <?php

      class Person {
        private $name;
        private $surname;
        private $age;
        private $gender;
        public function __construct($name, $surname, $age, $gender)
        {
          $this -> setName($name);
          $this -> setSurname($surname);
          $this -> setAge($age);
          $this -> setGender($gender);
        }

        // name
        public function getName()
        {
          return $this -> name;
        }
        public function setName($name)
        {
          $this -> name = $name;
        }

        // surname
        public function getSurname()
        {
          return $this -> surname;
        }
        public function setSurname($surname)
        {
          $this -> surname = $surname;
        }

        // age
        public function getAge()
        {
          return $this -> age;
        }
        public function setAge($age)
        {
          $this -> age = $age;
        }

        // gender
        public function getGender()
        {
          return $this -> gender;
        }
        public function setGender($gender)
        {
          $this -> gender = $gender;
        }

        public function __toString()
        {
          return
          'name: ' . $this -> getName() . '<br>'
          . 'surname: ' . $this -> getSurname() . '<br>'
          . 'age: ' . $this -> getAge() . '<br>'
          . 'gender: ' . $this -> getGender();
        }
      }

      // Dipendente è figlio dell'oggetto Persona
      class Employee extends Person {
        //variabili d'istanza del dipendente
        private $idEmp;
        private $CF;
        private $iban;
        private $tasks;
        public function __construct($name, $surname, $age, $gender,
        $idEmp, $CF, $iban, $tasks) {
          parent::__construct($name, $surname, $age, $gender);
          $this -> setIdEmp($idEmp);
          $this -> setCF($CF);
          $this -> setIban($iban);
          $this -> setTasks($tasks);
        }
        public function getIdEmp(){
          return $this -> idEmp;
        }
        public function setIdEmp($idEmp) {
          $this -> idEmp = $idEmp;
        }

        public function getCF(){
          return $this -> CF;
        }
        public function setCF($CF) {
          $this -> CF = $CF;
        }

        public function getIban(){
          return $this -> iban;
        }
        public function setIban($iban) {
          $this -> iban = $iban;
        }

        public function getTasks(){
          return $this -> tasks;
        }
        public function setTasks($tasks) {
          $this -> tasks = $tasks;
        }

        public function __toString() {
          return parent::__toString() . '<br>'
            . 'IdEmp: ' . $this -> getIdEmp() . '<br>'
            . 'CF: ' . $this -> getCF() . '<br>'
            . 'Iban: ' . $this -> getIban() . '<br>'
            . 'Tasks: ' . $this -> getTasks();
        }
      }
      // Dipendente è figlio dell'oggetto Persona
      class Boss extends Person {
        //variabili d'istanza del dipendente
        private $p_iva;
        private $capitale;
        public function __construct($name, $surname, $age, $gender,
        $p_iva, $capitale) {
          parent::__construct($name, $surname, $age, $gender);
          $this -> setP_iva($p_iva);
          $this -> setCF($capitale);
        }
        public function getP_iva(){
          return $this -> p_iva;
        }
        public function setP_iva($p_iva) {
          $this -> p_iva = $p_iva;
        }

        public function getCapitale(){
          return $this -> capitale;
        }
        public function setCF($capitale) {
          $this -> capitale = $capitale;
        }

        public function __toString() {
          return parent::__toString() . '<br>'
            . 'partita IVA: ' . $this -> getP_iva() . '<br>'
            . 'Capitale Monetario: ' . $this -> getCapitale();
        }
      }



      // stampe
      $persona = new Person("Marco", "Polello", 26, "maschio");
      $dipendente = new Employee("Marco", "Polello", 26, "maschio", 4, "PLLMRC94D29D325Q", "0934209348ASVFJ", "Junior web developer");
      $boss = new Boss("Matteo", "Martignon", 52, "maschio", "KJA34234JNCA", "3'800'500 €");
      // var_dump($persona);
      echo "Persona: <br><br>" . $persona;
      echo "<hr>";
      echo "Dipendente: <br>" . $dipendente;
      echo "<hr>";
      echo "Boss: <br>" . $boss;
    ?>

  </body>
</html>

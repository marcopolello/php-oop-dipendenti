<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <style media="screen">
      body{
        display: flex;
        justify-content: space-between;
      }
      div{
        max-width: 33%;
      }
    </style>

    <?php

      class Person {
        private $name;
        private $lastname;
        private $dateOfBirth;
        protected $securyLvl;
        public function __construct($name, $lastname, $dateOfBirth, $securyLvl) {
            $this -> setName($name);
            $this -> setLastname($lastname);
            $this -> setDateOfBirth($dateOfBirth);
            $this -> setSecuryLvl($securyLvl);
        }
        public function getName() {
            return $this -> name;
        }
        public function setName($name) {
          if (strlen($name) <= 3) {
            $e = new AtLeast3Name('at least 3 characters');
            throw $e;
          } else {
            $this -> name = $name;
          }
        }
        public function getLastname() {
            return $this -> lastname;
        }
        public function setLastname($lastname) {
          if (strlen($lastname) <= 3) {
            $e = new AtLeast3Lastname('at least 3 characters');
            throw $e;
          } else {
            $this -> lastname = $lastname;
          }
        }
        public function getFullname() {
            return $this -> getName() . ' ' . $this -> getLastname();
        }
        public function getDateOfBirth() {
            return $this -> dateOfBirth;
        }
        public function setDateOfBirth($dateOfBirth) {
            $this -> dateOfBirth = $dateOfBirth;
        }
        public function getSecuryLvl() {
            return $this -> securyLvl;
        }
        public function setSecuryLvl($securyLvl) {
            $this -> securyLvl = $securyLvl;
        }
        public function __toString() {
            return
                'name: ' . $this -> getName() . '<br>'
                . 'lastname: ' . $this -> getLastname() . '<br>'
                . 'dateOfBirth: ' . $this -> getDateOfBirth() . '<br>'
                . 'securyLvl: ' . $this -> getSecuryLvl() . '<br>';
        }
      }
      // VERSIONE 1
      class Employee extends Person {
        protected $ral;
        private $mainTask;
        private $idCode;
        private $dateOfHiring;
        public function __construct($name, $lastname, $dateOfBirth, $securyLvl,
                                    $ral, $mainTask, $idCode, $dateOfHiring) {
            parent::__construct($name, $lastname, $dateOfBirth, $securyLvl);
            $this -> setRal($ral);
            $this -> setMainTask($mainTask);
            $this -> setIdCode($idCode);
            $this -> setDateOfHiring($dateOfHiring);
        }
        public function getRal() {
            return $this -> $ral;
        }
        public function setRal($ral) {
          if (($ral>0 && $ral<=10000)) {
            $this -> ral = $ral;
          } else {
            $ral = "<b>error, unacceptable value</b>";
          }
        }
        public function getMainTask() {
            return $this -> $mainTask;
        }
        public function setMainTask($mainTask) {
            $this -> mainTask = $mainTask;
        }
        public function getIdCode() {
            return $this -> $idCode;
        }
        public function setIdCode($idCode) {
            $this -> idCode = $idCode;
        }
        public function getDateOfHiring() {
            return $this -> $dateOfHiring;
        }
        public function setDateOfHiring($dateOfHiring) {
            $this -> dateOfHiring = $dateOfHiring;
        }
        public function setSecuryLvl($securyLvl) {
            if ($securyLvl>0 && $securyLvl<=5) {
              $this -> securyLvl = $securyLvl;
            } else {
              $this -> securyLvl = "<b>Warning, <br> wrong security level</b>";
            }
        }
        public function __toString() {
            return parent::__toString() . '<br>'
                . 'ral: ' . $this -> ral . '<br>'
                . 'mainTask: ' . $this -> mainTask . '<br>'
                . 'idCode: ' . $this -> idCode . '<br>'
                . 'dateOfHiring: ' . $this -> dateOfHiring . '<br>';
        }
      }
      class Boss extends Employee {
        private $profit;
        private $vacancy;
        private $sector;
        private $employees;
        public function __construct($name, $lastname, $dateOfBirth, $securyLvl,
                                    $ral, $mainTask, $idCode, $dateOfHiring,
                                    $profit, $vacancy, $sector, $employees = []) {
            parent::__construct($name, $lastname, $dateOfBirth, $securyLvl,
                                $ral, $mainTask, $idCode, $dateOfHiring);
            $this -> setProfit($profit);
            $this -> setVacancy($vacancy);
            $this -> setSector($sector);
            $this -> setEmployees($employees);
        }
        public function getProfit() {
            return $this -> profit;
        }
        public function setProfit($profit) {
            $this -> profit = $profit;
        }
        public function getVacancy() {
            return $this -> vacancy;
        }
        public function setVacancy($vacancy) {
            $this -> vacancy = $vacancy;
        }
        public function getSector() {
            return $this -> sector;
        }
        public function setSector($sector) {
            $this -> sector = $sector;
        }
        public function getEmployees() {
            return $this -> employees;
        }
        public function setEmployees($employees) {
          if (empty($employees) || !isset($employees)) {
            throw new Exception("there aren't employees");
          } else {
            $this -> employees = $employees;
          }
        }
        public function setSecuryLvl($securyLvl) {
            if ($securyLvl>5 && $securyLvl<=10) {
              $this -> securyLvl = $securyLvl;
            } else {
              $this -> securyLvl = "<b>Warning, <br> wrong security level</b>";
            }
        }
        public function setRal($ral) {
          if (($ral>10000 && $ral<=100000)) {
            $this -> ral = $ral;
          } else {
            $this -> ral = "<b>error, unacceptable value</b>";
          }
        }
        public function __toString() {
            return parent::__toString() . '<br>'
                    . 'profit: ' . $this -> getProfit() . '<br>'
                    . 'vacancy: ' . $this -> getVacancy() . '<br>'
                    . 'sector: ' . $this -> getSector() . '<br>'
                    . 'employees:<br>' . $this -> getEmpsStr() . '<br>';
        }
        private function getEmpsStr() {
            $str = '';
            for ($x=0;$x<count($this -> getEmployees());$x++) {
                $emp = $this -> getEmployees()[$x];
                $fullname = $emp -> getName() . ' ' . $emp -> getLastname();
                $str .= ($x + 1) . ': ' . $fullname . '<br>';
            }
            return $str;
        }
      }
      // eccezioni
      class AtLeast3Name extends Exception {}
      class AtLeast3Lastname extends Exception {}

      // ISTANZE E STAMPE
      try {
        $person1 = new Person(
            'Marco',
            'Polello',
            '29-04-1994',
            '0',
        );
        echo '<div> PERSON1:<br>' . $person1 . '<br><br> </div>';
        $emp1 = new Employee(
            'Davide',
            'Ferronato',
            '06-06-1993',
            '8',
            '6000',
            'Operaio',
            '14',
            '14-05-2015',
        );
        echo '<div>EMPLOYEE1:<br>' . $emp1 . '<br><br></div>';
        $boss1 = new Boss(
            'Matteo',
            'noneeee',
            '01-01-1960',
            '10',
            '200000',
            'Dirigente',
            '0001',
            'NULL',
            '50000',
            '(b)vacancy',
            'Cuoio e Tessuti',
            [$emp1]
        );
        echo '<div>BOSS1:<br>' . $boss1 . '<br><br></div>';
      } catch (AtLeast3Name | AtLeast3Lastname  $e) {
        echo "Error: Name/Lastname are not valid!<br>"
            . "At Least 3 characters are accepted<br>"
            . "please check<br>";
      } catch (Exception $e) {
        // var_dump($e); dd(); message protected = there aren't employees
        echo "non ci sono dipendenti";
      }

    ?>

  </body>
</html>

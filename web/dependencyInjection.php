<?php
class Motor {
    private $sonido = "run run run run...";
	public function __construct(){}
	public function arranca($fail = TRUE) {
        if ($fail)
            return $this->sonido;
            else {
                return "cuff,cuff..";
            }
    }
    public function setSonido($sonido){
        $this->sonido=$sonido;
    }
}

class MotorDiesel extends Motor {
	public function __construct() {}
}
class MotorBiodiesel extends Motor {
	public function __construct() {}
}
class Carro {
	private $motor;
	public function __construct(Motor $motor) {
		$this->motor = $motor;
		// echo $this->motor->arranca();
    }

    public function encender($sonido=NULL){
        if ($sonido);
            $this->motor->setSonido($sonido);

        return $this->motor;
    }
    
}
$motorDiesel = new MotorDiesel();
$motorBiodiesel = new MotorBiodiesel();
$carroDiesel = new Carro($motorDiesel);
$carroHipster = new Carro($motorBiodiesel);

echo $carroHipster->encender("rummmmm")->arranca(FALSE);

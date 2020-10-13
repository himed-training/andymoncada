<?php
class Fecha{
	private $fecha;

	public function __construct($fecha)
    {
        $this->fecha = $fecha;
    }

	public function fechaSlash(){
		return substr_count($this->fecha, '/');
	}

	public function fechaLongitud(){
		return strlen($this->fecha);
	}

	public function cantidadNumeros($i){
		$texto = explode('/', $this->fecha);		
		if (is_numeric($texto[$i])){
			return strlen($texto[$i]);
		}
		return 0;
	}

	/* public function validarDia(){
		$texto = explode('/', $this->fecha);		
		if (is_numeric($texto[0]) && $texto[0]<=31){
			return 1;
		}
		return 0;
	}

	public function validarMes(){
		$texto = explode('/', $this->fecha);		
		if (is_numeric($texto[1]) && $texto[0]<=12){
			return 1;
		}
		return 0;
	} */

	public function obtenerNumero($i){
		$texto = explode('/', $this->fecha);		
		if (is_numeric($texto[$i])){
			return $texto[$i];
		}
		return 0;
	}

	public function esBisiesto(){
		//Un año es bisiesto si es divisible entre 4, excepto aquellos divisibles entre 100 pero no entre 400.
		$texto = explode('/', $this->fecha);		
		if (is_numeric($texto[2])){
			return ( ($texto[2]%4 == 0 && $texto[2]%100 != 0) || $texto[2]%400 == 0 );
		}
		return false;
	}

	public function valoresMayoresCero(){
		$texto = explode('/', $this->fecha);		
		foreach ($texto as $value) {
			if (!is_numeric($value) || $value==0){
				return false;
			}
		}
		return true;
	}

	public function validarDiaDelMes(){
		$texto = explode('/', $this->fecha);
		foreach ($texto as $value) {
			if (!is_numeric($value)){
				return false;
			}
		}
		return checkdate($texto[1],$texto[0],$texto[2]);
	}
}
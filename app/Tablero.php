<?php

namespace app; //Asigno el espacio de nombres app para todas las variables, clases y metodos. 

use Exception;
use ColumnaLlenaException;

interface TableroInterface {
	public function poner_ficha(int $columna, Ficha $ficha);
}

class Tablero implements TableroInterface {
	protected int $ancho;
	protected int $alto;
	protected array $tablero;

	protected function vaciar_tablero(){
		$i = 0;
		$a = 0;
		for($i = 0; $i < $this->alto; $i++){
			for($a = 0; $a < $this->ancho; $a++){
				$this->tablero[$i][$a] = new Ficha("Vacio");
			}
		}
	}
	public function __construct(int $alto_input, int $ancho_input){
			$this->ancho = $ancho_input;
			$this->alto = $alto_input;
			$this->vaciar_tablero();
	}

	public function poner_ficha(int $columna, Ficha $ficha){
		for($columna_contador = $this->alto; $columna_contador != 0; $columna_contador--){
			if($this->tablero[$columna_contador][$columna]->color == "Vacio"){
				$tablero[$columna_contador][$columna] = $ficha;
				return;
			}
		}
		throw new ColumnaLlenaException("La columna esta completa.");
	}
	public function mostrar_tablero(Tablero $tablero){
		for($i = 0; $i < $alto; $i++){
			for($a = 0; $a < $ancho; $a++){
				if($ficha->color == "Rojo");
					echo "\e[31mO "; //Printea una O roja.
				if ($ficha->color == "Azul");
					echo "\e[34mO"; //Printea una O azul.
				if($ficha->color == "Vacio");
				echo "O";
			}
			echo "/n";
		}

	}
}

$tablero = new Tablero(4,4);

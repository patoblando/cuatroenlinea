<?php

namespace App; //Asigno el espacio de nombres app para todas las variables, clases y metodos.

use Exception;
use ColumnaLlenaException;

interface TableroInterf {
	public function poner_ficha(int $columna, Ficha $ficha);
}

class Tablero {
	protected int $ancho;
	protected int $alto;
	protected array $tablero;

	protected function vaciar_tablero(){
		for($i = 0; $i < $alto; $i++){
			for($a = 0; $a < $ancho; $a++){
				$this->tablero[i][a] = new Ficha("Vacio");
			}
		}
	}
	public function __construct(int $alto_input, int $ancho_input){
			$this->ancho = $ancho_input;
			$this->alto = $alto_input;
			vaciar_tablero();
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
}

<?php

namespace App; //Asigno el espacio de nombres app para todas las variables, clases y metodos. 
include "Ficha.php";

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
		for($columna_contador = $this->alto - 1; $columna_contador >= 0; $columna_contador--){
			if($this->tablero[$columna_contador][$columna]->color == "Vacio"){
				$this->tablero[$columna_contador][$columna] = $ficha;
				return;
			}
		}
		throw new ColumnaLlenaException("La columna esta completa.");
	}
	public function mostrar_tablero(){
		for($i = 0; $i < $this->alto; $i++){
			for($a = 0; $a < $this->ancho; $a++){
				//echo $this->tablero[$i][$a]->color; echo " ";
				if($this->tablero[$i][$a]->color == "Rojo")
					echo "\e[47;31mO\e[0m "; //Printea una O roja.
				if ($this->tablero[$i][$a]->color == "Azul")
					echo "\e[47;34mO\e[0m "; //Printea una O azul.
				if($this->tablero[$i][$a]->color == "Vacio")
				echo "O ";
			}
			echo "\n";
		}

	}
}

$tablero = new Tablero(4, 4);

$tablero->poner_ficha(1, new Ficha("Azul"));
$tablero->mostrar_tablero();
echo "\n";
$tablero->poner_ficha(1, new Ficha("Azul"));
$tablero->mostrar_tablero();
echo "\n";
$tablero->poner_ficha(1, new Ficha("Azul"));
$tablero->mostrar_tablero();
echo "\n";

$tablero->poner_ficha(1, new Ficha("Rojo"));
$tablero->mostrar_tablero();
echo "\n";

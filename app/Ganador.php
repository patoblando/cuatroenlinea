<?php

namespace App; //Asigno el espacio de nombres app para todas las variables, clases y metodos.

interface GanadorInterface {

}

class Ganador implements GanadorInterface {
	protected bool $ganadorBandera = True;
	protected string $ganador = 'Empate';

	//La idea es hacer una funcion recursiva que chequee 3 veces si una ficha
	//esta en contacto con otra de su mismo color en una direccion inicial
	private function chequeo_linea(Tablero $tablero, $direc_x, $direc_y, $x, $y, $iteracion){
		$ficha = $tablero->tablero[$x][$y];
		$fichaSig = $tablero->tablero[$direc_x][$direc_y];

	}

	public function chequeo_juego_ganado(Tablero $tablero, Int $x, Int $y){
		//Quiero fijarme si la ficha esta en contacto con alguna otra
		//tanto diagonalmente como en sus extremos.
		$ficha = $tablero->tablero[$x][$y];

		$fichaNO = $tablero->tablero[$x - 1][$y + 1];
		$fichaN  = $tablero->tablero[$x][$y + 1];
		$fichaNE = $tablero->tablero[$x + 1][$y + 1] ;
		$fichaE  = $tablero->tablero[$x + 1][$y];
		$fichaSE = $tablero->tablero[$x + 1][$y - 1];
		$fichaS  = $tablero->tablero[$x][$y - 1];
		$fichaSO = $tablero->tablero[$x - 1][$y - 1];
		$fichaO  = $tablero->tablero[$x - 1][$y];

		if($ficha->color == $fichaNO->color)
			chequeoLinea($tablero->tablero, $x - 1, $y + 1, $x, $y, 3);

		if($ficha->color == $fichaN->color)
			chequeoLinea($tablero->tablero, $x, $y + 1, $x, $y, 3);

		if($ficha->color == $fichaNE->color)
			chequeoLinea($tablero->tablero, $x + 1, $y + 1, $x, $y, 3);

		if($ficha->color == $fichaE->color)
			chequeoLinea($tablero->tablero, $x + 1, $y, $x, $y, 3);

		if($ficha->color == $fichaSE->color)
			chequeoLinea($tablero->tablero, $x + 1, $y - 1, $x, $y, 3);

		if($ficha->color == $fichaS->color)
			chequeoLinea($tablero->tablero, $x, $y - 1, $x, $y, 3);

		if($ficha->color == $fichaSO->color)
			chequeoLinea($tablero->tablero, $x - 1, $y - 1, $x, $y, 3);

		if($ficha->color == $fichaO->color)
			chequeoLinea($tablero->tablero, $x - 1, $y, $x, $y, 3);

	}
}
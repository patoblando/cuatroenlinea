<?php

namespace App; //Asigno el espacio de nombres app para todas las variables, clases y metodos.

interface GanadorInterface {

}

class Ganador implements GanadorInterface {
	protected bool $ganador_bandera = False;
	protected string $ganador = 'Empate';

	//La idea es hacer una funcion recursiva que chequee 3 veces si una ficha
	//esta en contacto con otra de su mismo color en una direccion inicial

	//TODO: Implementar la funcion direccion al codigo.

	private function direccion(String $direccion, $x, $y){
		$direcciones = array(
			'NO' => [$x - 1, $y + 1],
			'N'  => [$x, $y + 1],
			'NE' => [$x + 1, $y + 1],
			'E'  => [$x + 1, $y],
			'SE' => [$x + 1, $y - 1],
			'S'  => [$x, $y - 1],
			'SO' => [$x - 1, $y - 1],
			'O'  => [$x - 1, $y]
		);
		return $direcciones($direccion);
	}

	private function chequeo_linea(Tablero $tablero, $x, $y, $iteracion){
		if($iteracion == 0){
			$this->ganador_bandera = True;
			$this->ganador = '';
			return;
		}
		$ficha = $tablero->tablero[$x][$y];
		$ficha_sig = $tablero->tablero[$direc_x][$direc_y];

		if($ficha->color == $ficha_sig->color)
			chequeo_linea($tablero, $direc_x, $direc_y, $x, $y, $iteracion - 1);
		else return;
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
			chequeoLinea($tablero->tablero, $x - 1, $y + 1, 3);

		if($ficha->color == $fichaN->color)
			chequeoLinea($tablero->tablero, $x, $y + 1, 3);

		if($ficha->color == $fichaNE->color)
			chequeoLinea($tablero->tablero, $x + 1, $y + 1, 3);

		if($ficha->color == $fichaE->color)
			chequeoLinea($tablero->tablero, $x + 1, $y, 3);

		if($ficha->color == $fichaSE->color)
			chequeoLinea($tablero->tablero, $x + 1, $y - 1, 3);

		if($ficha->color == $fichaS->color)
			chequeoLinea($tablero->tablero, $x, $y - 1, 3);

		if($ficha->color == $fichaSO->color)
			chequeoLinea($tablero->tablero, $x - 1, $y - 1, 3);

		if($ficha->color == $fichaO->color)
			chequeoLinea($tablero->tablero, $x - 1, $y, 3);

	}
}
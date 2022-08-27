<?php

namespace app; //Asigno el espacio de nombres app para todas las variables, clases y metodos.

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

	private function chequeo_linea(Tablero $tablero, $x, $y, $iteracion, $contador, $direccion){
		$direcciones = direccion($direccion);
		if($iteracion == 0){
			return $contador;
		}
		$ficha = $tablero->tablero[$x][$y];

		if($ficha->color == $ficha_sig->color)
			chequeo_linea($tablero, $direciones[0], $direciones[1], $iteracion - 1, $contador + 1, $direccion);
		else return $contador;
	}


	public function chequeo_juego_ganado(Tablero $tablero, Int $x, Int $y, Ficha $ficha){
		//Quiero fijarme si la ficha esta en contacto con alguna otra
		//tanto diagonalmente como en sus extremos.
		$secuencia = 0;
		
		$ficha = $tablero->tablero[$x][$y];
		
		$fichaNO = $tablero->tablero[$x - 1][$y + 1];
		$fichaN  = $tablero->tablero[$x][$y + 1];
		$fichaNE = $tablero->tablero[$x + 1][$y + 1] ;
		$fichaE  = $tablero->tablero[$x + 1][$y];
		$fichaSE = $tablero->tablero[$x + 1][$y - 1];
		$fichaS  = $tablero->tablero[$x][$y - 1];
		$fichaSO = $tablero->tablero[$x - 1][$y - 1];
		$fichaO  = $tablero->tablero[$x - 1][$y];

		$secuencia_NO_SE = 0;
		$secuencia_N_S   = 0;
		$secuencia_NE_SO = 0;
		$secuencia_E_O   = 0;

		if($ficha->color == $fichaNO->color)
			$secuencia_NO_SE += chequeoLinea($tablero->tablero, $x - 1, $y + 1, 3, 0, 'NO');

		if($ficha->color == $fichaN->color)
			$secuencia_N_S += chequeoLinea($tablero->tablero, $x, $y + 1, 3, 0, 'N');

		if($ficha->color == $fichaNE->color)
			$secuencia_NO_SE += chequeoLinea($tablero->tablero, $x + 1, $y + 1, 3, 0, 'NE');

		if($ficha->color == $fichaE->color)
			$secuencia_E_O += chequeoLinea($tablero->tablero, $x + 1, $y, 3, 0, 'E');

		if($ficha->color == $fichaSE->color)
			$secuencia_NO_SE += chequeoLinea($tablero->tablero, $x + 1, $y - 1, 3, 0, 'SE');

		if($ficha->color == $fichaS->color)
			$secuencia_N_S += chequeoLinea($tablero->tablero, $x, $y - 1, 3, 0, 'S');

		if($ficha->color == $fichaSO->color)
			$secuencia_NO_SE += chequeoLinea($tablero->tablero, $x - 1, $y - 1, 3, 0, 'SO');

		if($ficha->color == $fichaO->color)
			$secuencia_E_O += chequeoLinea($tablero->tablero, $x - 1, $y, 3, 0, 'O');

		if($secuencia_NO_SE == 4 or
		   $secuencia_N_S   == 4 or
		   $secuencia_NE_SO == 4 or
		   $secuencia_E_O   == 4){
			$this->ganador = $ficha->color;
			$this->ganador_bandera = True;
		}

	}
}
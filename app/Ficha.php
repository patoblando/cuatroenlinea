<?php

namespace App; //Asigno el espacio de nombres app para todas las variables, clases y metodos.

interface FichaInterface {
	public function return_color(); // Devuelve el color de la ficha
}

class Ficha implements FichaInterface {
	protected $color;

	public function __construct(String $color_ficha){
		$this->color = $color_ficha;
	}

	public function return_color(){
		return $this->color;
	}
}

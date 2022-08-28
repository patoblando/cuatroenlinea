<?php

namespace App; //Asigno el espacio de nombres app para todas las variables, clases y metodos.

class Ficha {
	public readonly String $color;

	public function __construct(String $color_ficha){
		$this->color = $color_ficha;
	}

}

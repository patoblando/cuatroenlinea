<?php

namespace app; //Asigno el espacio de nombres app para todas las variables, clases y metodos.

class Ficha implements FichaInterface {
	public readonly $color = "Vacio";

	public function __construct(String $color_ficha){
		$this->color = $color_ficha;
	}

}

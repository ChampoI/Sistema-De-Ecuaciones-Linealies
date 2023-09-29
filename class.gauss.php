<?php
class Gauss {

	private $filas;
	private $columnas;
	private $matriz;

	/**
	 * Constructor. Establace la matriz a resolver, obtiene numero de filas y columnas.
	 * @param array matriz
	 * @return void
	 */
	public function __construct($m){

		$this->matriz = $m;		
		$this->filas = count($m);
		$this->columnas = count($m['1']);		
	}

	/**
	 * Obtiene la solución de la matriz por el método de Gauss
	 * @param void
	 * @return void
	 */
	public function getGaussSolution(){		
		
		for($x = 1; $x <= $this->filas; $x++){
			$pivote = $this->matriz[$x][$x];
			for($i = $x; $i <= $this->filas; $i++ ){
				for($j = $x; $j <= $this->columnas; $j++ ){
					if($i == $x) {
						$this->matriz[$i][$j] /= $pivote;
						continue;
					} elseif($j == $x && $i != $x){
						$aux = $this->matriz[$i][$j] * (-1);
					}
					$this->matriz[$i][$j] =	$this->matriz[$x][$j] * $aux + $this->matriz[$i][$j];
				}
			}
		}
		for($x = 4; $x > 0; $x--){
			$pivote = $this->matriz[$x][$x];
			for($i = $x-1; $i > 0; $i-- ){
				for($j = $x; $j <= $this->columnas; $j++ ){
					if($j == $x){
						$aux = $this->matriz[$i][$j] * (-1);
					}
					$this->matriz[$i][$j] =	$this->matriz[$x][$j] * $aux + $this->matriz[$i][$j];
				}
			}
		}

		//Mostrar los valores de las variables    
        for($i=1; $i<=$this->filas; $i++)
        {
            echo "X".($i)." = {$this->matriz[$i][$this->columnas]} <br>";            
        }  
	}

	/**
	 * Imprime la matriz en una tabla
	 * @param void
	 * @return void
	 */
	private function mostrarMatriz(){
		
		
		for($i = 1; $i <= $this->filas; $i++ ){
			
			for($j = 1; $j <= $this->columnas; $j++ ){
				
				echo round($this->matriz[$i][$j],2)." ";							
			}	
			echo ' <br>';	
				
		}
		
	}
}
?> 

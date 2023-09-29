<?php

class Seidel{

    private $matriz;
    private $error;
    private $filas;
	private $columnas;
    private $iter=0;

    /**
	 * Constructor. Establace la matriz a resolver, obtiene numero de filas y columnas.
	 * @param array matriz
	 * @return void
	 */
	public function __construct($m, $e){

        $this->errorE   = $e;
        $this->matriz   = array_values(array_map('array_values',$m));
        $this->filas    = count($m);
        $this->columnas = count($m['1']);
	}

    /**
    * Obtiene la solución de la matriz por el método de Gauss Seidel
    * @param void
    * @return void
    */
    public function getSeidelSolution(){

        $x = [];
        $b = [];
        for ($i=0; $i <  $this->filas; $i++) { 
            
            $x[$i]  = 1;
            $errorA[$i] = 100;
            $b[$i] = $this->matriz[$i][$this->columnas-1];           
        }

        $temp = [];        
        for ($i=0; $i <  $this->filas; $i++) {     

            
            for ($j=0; $j < $this->filas; $j++)
            {
                
                $temp[$i][$j] = $this->matriz[$i][$j];
            }
        }

        $this->matriz = $temp;
        
        if(!$this->convergencia()){

            echo "la matriz no converge";
            return;
        }
        
            
        while ($a < 10) {

            for ($j=0; $j < $this->filas; $j++) { 

                $d = $b[$j];
                
                $temp = 0;
                # to calculate respective xi, yi, zi
                for ($i=0; $i < $this->filas; $i++) { 

                    if($j != $i){

                        $d -= $this->matriz[$j][$i] * $x[$i];
                    }

                    //validando division por cero                    
                    if( $this->matriz[$j][$j] == 0 )
                    {
                        $x[$j] = 0;
                    }else{

                        $temp = ($d / $this->matriz[$j][$j]);
                    }                         
                   
                    $x[$j] = round($temp, 6);
                }
                $errorA[$j] = abs(($x[$j] - $temp) / $x[$j])*100;
            }
            
            $e = 0;
            for ($j=0; $j < $this->filas; $j++) {                
                

                $e += $errorA[$j]; 
            }
            $e = $e/$this->filas;
            
            
            if($this->errorE <= $e )
            {
                break ;
            }
            $a++;
        }

        //Mostrar los valores de las variables    
        for($i=0; $i<$this->filas; $i++)
        {
            echo "X".($i+1)." = $x[$i] <br>";            
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

    private function convergencia(){

        $converge = true;
        
        
        for($i = 0; $i <= $this->filas; $i++ ){
			
			for($j = 1; $j <= $this->filas; $j++ ){
                
                if(abs($this->matriz[0][$j]) >= abs($this->matriz[0][0]))
                {
                    $converge = false;
                    break 2;
                }

            }            
        }
        
        if(!$converge){
           
            $temp2 = [];
            $temp1[] =  $this->matriz[0];
            
            for($i = 1; $i < $this->filas; $i++ ){

                $temp2[] = $this->matriz[$i];                
            }           

            $this->matriz = array_merge($temp2,$temp1 );
            $this->iter++;

            if($this->iter === $this->filas){
                return false;
            }

            $this->convergencia();            
        }        

        return $converge;
    }
}
?>
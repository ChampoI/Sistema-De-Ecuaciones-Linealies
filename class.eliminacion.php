<?php

class Eliminacion{

	private $matriz;
    private $orden;

	/**
	 * Constructor. Establace la matriz a resolver, obtiene numero de filas y columnas.
	 * @param array matriz
	 * @return void
	 */
	public function __construct($m){
        
		$this->matriz = $m;		
		$this->orden = count($m); 
        $this->filas = count($m);
		$this->columnas = count($m['1']);	
	}

    public function getEliminationSolution()
    {
       
        $this->matriz = array_values(array_map('array_values',$this->matriz));
        $this->orden = count($this->matriz); 
                
        //Orden de la matriz
        $orden=count($this->matriz); 
        
        //Recorrer la matriz 
        for($j=0;$j<=$orden;$j++)
        {

            for($i=0; $i<=($orden-1); $i++)
            {
                if($i>$j)
                {
                    //Divir los elementos de la matriz
                    $division=$this->matriz[$i][$j]/$this->matriz[$j][$j];
                    for($k=0;$k<=$orden;$k++)
                    {
                        //Obterner el nuevo valor para los elementos en la diagonal inferior
                        $this->matriz[$i][$k]=$this->matriz[$i][$k]-$division*$this->matriz[$j][$k];
                        
                    }
                    
                }

                
            }  
            
        }
        
        //Recorrer la matriz
        for($i=$orden-1;$i>=0;$i--)
        {
            $suma=0;
            for($j=$i+1;$j<=$orden-1;$j++)
            {
                $suma=$suma+$this->matriz[$i][$j]*$x[$j];
            }
            //Obtener los valores de las variables
            $x[$i]=($this->matriz[$i][$orden]-$suma)/$this->matriz[$i][$i];
        }
        
        //Mostrar los valores de las variables    
        for($i=0; $i<=$orden-1; $i++)
        {
            echo "X".($i+1)." = $x[$i] <br>";
            
        }        
    }

    //Eliminación Gaussiana
    //Función para mostrar la matriz
    private function mostrarMatriz()
    {
		for($i = 0; $i <= ($this->orden-1); $i++ ){
			
			for($j = 0; $j <= $this->orden; $j++ ){
				
				echo round($this->matriz[$i][$j],2)." ";							
			}	
			echo ' <br>';	
				
		}
	}
}    
   

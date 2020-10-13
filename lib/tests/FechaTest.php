<?php
use PHPUnit\Framework\TestCase;
require "./src/Fecha.php";

final class FechaTest extends TestCase{
	private $valor;
	
	public function testFechaSlash()
    {
    	$fec = new Fecha('01/01/2000');
        $this->assertEquals(            
            $fec->fechaSlash(), 2
        );
    }

    public function testlongitudTexto()
    {
    	$fec = new Fecha('01/01/2000');
        $this->assertEquals(            
            $fec->fechaLongitud(), 10
        );
    }

    public function testNumerosDia()
    {
        $fec = new Fecha('01/01/2000');
        $this->assertEquals(            
            $fec->cantidadNumeros(0), 2
        );        
    }    

    public function testNumerosMes()
    {
        $fec = new Fecha('01/01/2000');
        $this->assertEquals(            
            $fec->cantidadNumeros(1), 2
        );        
    }

    public function testNumerosAnio()
    {
        $fec = new Fecha('01/01/2000');
        $this->assertEquals(            
            $fec->cantidadNumeros(2), 4
        );        
    }

    public function testValidarDia()
    {
        $fec = new Fecha('01/01/2000');
        /* $this->assertEquals(            
            $fec->validarDia(), 1
        ); */
        $this->assertLessThanOrEqual(
            31, $fec->obtenerNumero(0)
        ); 
    }

    public function testValidarMes()
    {
        $fec = new Fecha('01/01/2000');
       /*  $this->assertEquals(            
            $fec->validarMes(), 1
        ); */
        $this->assertLessThanOrEqual(
            12, $fec->obtenerNumero(1)
        );     
    }

    public function testAnioBisiesto()
    {
        $fec = new Fecha('01/01/2000');
        $this->assertTrue( $fec->esBisiesto() );      
    }

    public function testValorMayorCero()
    {
        $fec = new Fecha('01/01/2000');
        $this->assertTrue( $fec->valoresMayoresCero() );      
    }

    public function testDiaDelMes()
    {
        $fec = new Fecha('01/01/2000');
        $this->assertTrue( $fec->validarDiaDelMes() );      
    }

    public function testNumerosySlash()
    {
        //$fec = new Fecha($valor);
        $this->assertRegExp(
            "/[0-9]|\//" , '01/01/2000'
        );     
    }
}
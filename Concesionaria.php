<?php
class Concesionaria{
    private $denominacion;
    private $direccion;
    private $colecClientes;
    private $colecVehiculos;
    private $colecVentas;

	public function __construct($denominacion, $direccion, $colecClientes, $colecVehiculos, $colecVentas) {

		$this->denominacion = $denominacion;
		$this->direccion = $direccion;
		$this->colecClientes = $colecClientes;
		$this->colecVehiculos = $colecVehiculos;
		$this->colecVentas = $colecVentas;
	}

	public function getDenominacion() {
		return $this->denominacion;
	}

	public function setDenominacion($denom) {
		$this->denominacion = $denom;
	}

	public function getDireccion() {
		return $this->direccion;
	}

	public function setDireccion($direc) {
		$this->direccion = $direc;
	}

	public function getColecClientes() {
		return $this->colecClientes;
	}

	public function setColecClientes($colClientes) {
		$this->colecClientes = $colClientes;
	}

	public function getColecVehiculos() {
		return $this->colecVehiculos;
	}

	public function setColecVehiculos($colVehiculos) {
		$this->colecVehiculos = $colVehiculos;
	}

	public function getColecVentas() {
		return $this->colecVentas;
	}

	public function setColecVentas($colVentas) {
		$this->colecVentas = $colVentas;
	}

    public function retornarVehiculo($codeVehiculo){
        $vehEncontrado = null;
        $cont = 0;
        $cantVehiculos = count($this->getColecVehiculos());

        while ($cont < $cantVehiculos && $vehEncontrado === null){
            $vehiculos = $this->getColecVehiculos()[$cont];
            if ($vehiculos->getCodigo() == $codeVehiculo){
                $vehEncontrado = $vehiculos;
            }
            $cont++;
        }
        return $vehEncontrado;

    }

    public function registrarVenta($colCodeVehi, $objCliente){
        $objVenta = new Venta(null, date('Y'), $objCliente, [], 0);
        
        foreach ($colCodeVehi as $codeVehi){
            $objVehiCode = $this->retornarVehiculo($codeVehi);
            if($objVehiCode !== null && $objVehiCode->getActiva() && $objCliente->getEstado()){
                $objVenta->incorporarVehiculo($objVehiCode);
            }
        }
        $coleccionVentas = $this->getColecVentas();
        array_push($coleccionVentas,$objVenta);
        $this->setColecVentas($coleccionVentas);

        return $objVenta->getPrecioFinal();
    }

    public function retornarVentasXCliente($tipo,$numDoc){
        $ventasCliente = []; //arreglo para almacenar las ventas del cliente
        $ventas = $this->getColecVentas();
        foreach ($ventas as $venta) {
            $clienteVenta = $venta->getColClientes();
            if ($clienteVenta->getTipoDoc() === $tipo &&  $clienteVenta->getNroDoc() === $numDoc ) {
                //Si el cliente tiene todos esos datos buscados almacenamos la venta.
                $ventasCliente[] = $venta;
            }
        }
        return $ventasCliente;
    }

    public function listadoClientes()
    {
        $col = $this->getColecClientes();
        $contador = count($col);
        $listado = "";

        for ($i = 0; $i < $contador; $i++) {
            $clientes = $col[$i];
            $listado .= $clientes . "\n";
        }
        return $listado;
    }

    public function listadoVehiculos()
    {
        $col = $this->getColecVehiculos();
        $contador = count($col);
        $listado = "";

        for ($i = 0; $i < $contador; $i++) {
            $motos = $col[$i];
            $listado .= $motos . "\n";
        }
        return $listado;
    }

    public function listadoVentas()
    {
        $col = $this->getColecVentas();
        $contador = count($col);
        $listado = "";

        for ($i = 0; $i < $contador; $i++) {
            foreach ($col[$i] as $venta) {
                $listado .= $venta . "\n";
            }
        }
        return $listado;
    }

    public function listadoVentasCliente($cliente)
    {
        $ventasCliente = $this->retornarVentasXCliente($cliente->getTipoDoc(), $cliente->getNroDoc()); // obtengo los datos acá invocando al metodo retornar. No puedo usar los get fuera de la clase entonces hago la funcion aca. Concateno
        $listado = null;

        if ($ventasCliente != null) {
            $listado = "";
            foreach ($ventasCliente as $venta) {
                $listado .= $venta . "\n";
            }
        }
        return $listado;
    }


    public function __toString(){
        $msj = "\nDatos Empresa:\n";
        $msj .= "Denominación: " . $this->getDenominacion() . "\n";
        $msj .= "Direccion: " . $this->getDireccion() . "\n";
        $msj .= "Lista Clientes: " . $this->listadoClientes() . "\n";
        $msj .= "Lista de Vehiculos: " . $this->listadoVehiculos() . "\n";
        $msj .= "Lista de Ventas: " . $this->listadoVentas();
        return $msj;
    }

}
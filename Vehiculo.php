<?php
class Vehiculo{
    private $codigo;
    private $costo;
    private $anioFabric;
    private $descripcion;
    private $porcIncAnual;
    private $activa;

	public function __construct($codigo, $costo, $anioFabric, $descripcion, $porcIncAnual, $activa) {

		$this->codigo = $codigo;
		$this->costo = $costo;
		$this->anioFabric = $anioFabric;
		$this->descripcion = $descripcion;
		$this->porcIncAnual = $porcIncAnual;
		$this->activa = $activa;
	}

	public function getCodigo() {
		return $this->codigo;
	}

	public function setCodigo($code) {
		$this->codigo = $code;
	}

	public function getCosto() {
		return $this->costo;
	}

	public function setCosto($precio) {
		$this->costo = $precio;
	}

	public function getAnioFabric() {
		return $this->anioFabric;
	}

	public function setAnioFabric($anio) {
		$this->anioFabric = $anio;
	}

	public function getDescripcion() {
		return $this->descripcion;
	}

	public function setDescripcion($desc) {
		$this->descripcion = $desc;
	}

	public function getPorcIncAnual() {
		return $this->porcIncAnual;
	}

	public function setPorcIncAnual($porc) {
		$this->porcIncAnual = $porc;
	}

	public function getActiva() {
		return $this->activa;
	}

	public function setActiva($act) {
		$this->activa = $act;
	}

    public function darPrecioVenta(){
        $precioVenta = -1;
        if($this->getActiva()){
            $anioAct = date('Y');
            $compra = $this->getCosto();
            $restaAnios = $anioAct - $this->getAnioFabric();
            $precioVenta = $compra + $compra * ($restaAnios * $this->getPorcIncAnual() / 100);
            return $precioVenta;
        }
    }

    public function __toString(){
        $estado = "";
        if($this->getActiva()){
            $estado = "Activa";
        } else {
            $estado = "Inactiva";
        }

        return "Codigo del vehículo: " . $this->getCodigo() . 
        "\nCosto: " . $this->getCosto() . 
        "\nAño de fabricación: " . $this->getAnioFabric() . 
        "\nDescripción: " . $this->getDescripcion() . 
        "\nPorcentaje Incremento Anual: " . $this->getPorcIncAnual() . 
        "\nEstado del vehículo: " . $estado;
    }

}
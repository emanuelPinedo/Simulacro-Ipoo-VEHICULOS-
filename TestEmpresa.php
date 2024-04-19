<?php
include 'Cliente.php';
include 'Concesionaria.php';
include 'Vehiculo.php';
include 'Venta.php';
//Punto 1
$objCliente1 = new Cliente("Joaquin", "Cordini", false, "DNI", 777);
$objCliente2 = new Cliente("Benjamin", "Zacariaz", true, "DNI", 258);
//Punto2
$objVehiculo1 = new Vehiculo(11,50000,2020,"Volkswagen Polo POLO TRENDLINE",85,true);
$objVehiculo2 = new Vehiculo(12,10000,2021,"RAM 1500 Laramie",70,true);
$objVehiculo3 = new Vehiculo(13,10000,2021,"Jeep Renegade 1.8 Sport",55,true);
//Punto 4 (no hay punto 3 XD)
$objEmpresa = new Concesionaria("Alta Gama", "Av Argenetina 123",[$objCliente1, $objCliente2],[$objVehiculo1, $objVehiculo2, $objVehiculo3],[]);

echo "--------------------------------------------\n";

//Punto 5
$colCodeVehi1 = [11,12,13];
$resultado1 = $objEmpresa->registrarVenta($colCodeVehi1, $objCliente2);
echo "Resultado de la primera venta: " . $resultado1 . "\n";

echo "--------------------------------------------\n";

// punto 6:
$colCodeVehi2 = [0];
$resultado2 = $objEmpresa->registrarVenta($colCodeVehi2, $objCliente2);
echo "Resultado de la segunda venta: " . $resultado2 . "\n";

echo "--------------------------------------------\n";

// punto 7:
$colCodeVehi3 = [2];
$resultado3 = $objEmpresa->registrarVenta($colCodeVehi3, $objCliente2);
echo "Resultado de la tercera venta: " . $resultado3 . "\n";

echo "--------------------------------------------\n";

echo "Ventas del cliente:\n";
// punto 8:
$resultadoVentasCliente1 = $objEmpresa->listadoVentasCliente($objCliente1);

echo $objCliente1;

if ($resultadoVentasCliente1 != null) {
    echo $resultadoVentasCliente1;
} else {
    echo "\n﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀\n";
    echo "No se encontraron compras para el cliente\n";
}

echo "--------------------------------------------\n";

// punto 9:
$resultadoVentasCliente2 = $objEmpresa->listadoVentasCliente($objCliente2);

if ($resultadoVentasCliente2 != null) {
    echo $resultadoVentasCliente2;
} else {
    echo "﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀\n";
    echo "No se encontraron compras para el cliente\n";
}

echo "--------------------------------------------\n";

// punto 10:
echo $objEmpresa;
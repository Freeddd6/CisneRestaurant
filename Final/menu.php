<!DOCTYPE html>

	<head>
    <title>Cisne</title>
    <style>
             body {
            background: url(IMGs/fondoM.png) ;
    background-position: center;
    background-size: cover;
    width: 100%;
    height: 100%;
        }
.nav{
    display: flex;
    justify-content: space-between;
    background-color:  #242323;
    color: #ffff;
    padding: 0 1rem;
    position: sticky;
    top:0;
    }
    .logo a{
    color: #f0ac45;
    text-decoration: none;
    }
    .logo span{
     color: #fff;
    }
    .nav ul{
    display: flex;
    List-style-type: none;
    }
    .nav ul li{
    margin: 15px 15px;
    padding: 0 10px;
    }
    .nav ul li a{
    text-decoration: none;
    color: #fff;
    font-size: 25px;
    transition: all ease .4s;
    }
    .nav ul li a:hover{
    color: #f0ac45;
    }

    .href-1{
    font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    color: white;
    background-image: linear-gradient(#515151, #000000);
    font-size: 20px;
    display: block;
    width: 150px;
    height: 30px;
    margin-bottom: 5px;
    text-decoration: none;
}
.container {
    display: flex;
    height: 100vh;
}
.half {
    flex: 1;
    box-sizing: border-box;
    padding: 20px;
}
.left {
    background-color: #add8e600;
}
.right {
    background-color: #f0808000;
}
h2{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 20px;
    cursor: pointer;
}

.lol{
    color: #00000045;
    display: inline-block;
    border-top: 2px solid #00000045;
    border-bottom: 2px solid #00000045;
    padding: 1px;
}
.linea{
    height: 19px; 
    background-color: black; 
    width: 100%; 
    margin-left: 0; 
    margin-bottom: 5px;
}
.espaciado{
    margin-bottom: 0px;
}
.cajita {
    transition: 0.5s;
    border: 1px solid #ccc;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 8px;
    background-color: #ffffff;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.contenido-texto{
    transition: 0.4s;
    flex-grow: 0;
}
.contenido-texto:hover{
    transition: 1s;
    flex-grow: 20;
}
.cajita:hover{
    transition: 0.5s;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.imagen-caja {
    width: 120px;
    height: 120px;
    border: 2px solid #fbfbfb;
    border-radius: 8px;

    background-color: #ffffff;
    flex-shrink: 0;
}
.imagen-caja img {
    width: 100%;
    height: 100%;
    transition:.45s;
    border-radius: 8px;
}

.imagen-caja img:hover {
    transform: scale(1.8);
}

    </style>
    <link rel="icon" href="IMGs/cisne.ico">
        <link rel="stylesheet" type="text/css" href="css/.css">
        <link rel="stylesheet" href="css/men.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	</head>
<body>

<div class="nav">
    <div class="logo">
    <img class="navbar-brand" src=IMGs/cisne.jpg
            width = "100px"
            height="90px"
            alt = "Imagen de Prueba";
            align = "center"
            hspace = "20">
    </div>
    <div class="nav-links">
        <ul>
            <li><a href="carrito.php">Carrito</a></li>
            <li><a href="perfil.php">Perfil</a></li>
        </ul>
    </div>
</div>

<center>
     <h2> M E N Ú </h2>
		<a class="href-1">Cisne</a>
        <w class = "lol">Desayunos, Brunch y más.</w>
        </center>
<center>
        <img src = "IMGs/img_02.png"
            width = "95%"
            alt = "Imagen de Prueba";
            align = "center"
            hspace = "20"
        >
        </center>
        <br>
    <div class="container">
        <div class="half left">
            <!-- Contenido para la mitad izquierda -->
            <?php
            session_start();
            if (!isset($_SESSION['usuario'])) {
    header("Location: bienvenida.php"); // Redirigir a la página de bienvenida si no hay sesión
    exit;
}
                // Productos

                $productos = [
                    1 => ['nombre' => 'PAQUETE CISNE 1', 'precio' => 80],
                    2 => ['nombre' => 'PAQUETE CISNE 2', 'precio' => 80],
                    3 => ['nombre' => 'PAQUETE KID', 'precio' => 80],
                    4 => ['nombre' => 'CHILAQUILES VERDES Ó ROJOS', 'precio' => 70],
                    5 => ['nombre' => 'ENCHILADAS VERDES Ó ROJAS', 'precio' => 70],
                    6 => ['nombre' => 'ENCHILADAS SUIZAS', 'precio' => 80],
                    7 => ['nombre' => 'ENMOLADAS', 'precio' => 80],
                    8 => ['nombre' => 'WAFFLES 1PX', 'precio' => 45],
                    9 => ['nombre' => 'HOTCAKES CON TOCINO', 'precio' => 60],
                    10 => ['nombre' => 'HOTCAKES POR PIEZA', 'precio' => 15],
                    11 => ['nombre' => 'PAN DULCE PZ', 'precio' => 17],
                    12 => ['nombre' => 'OTROS', 'precio' => 0],
                    13 => ['nombre' => 'MOLLETES', 'precio' => 20],
                    14 => ['nombre' => 'TORTA DE CHILAQUILES', 'precio' => 65],
                    15 => ['nombre' => 'CLUB SANDWITCH', 'precio' => 80],
                    16 => ['nombre' => 'SINCRONIZADA HAWAIANA', 'precio' => 65],
                    17 => ['nombre' => 'ENSALADA', 'precio' => 70],
                    18 => ['nombre' => 'HUEVOS AL GUSTO', 'precio' => 70],
                    19 => ['nombre' => 'PLATO DE FRUTA', 'precio' => 30],
                    20 => ['nombre' => 'LIICUADOS', 'precio' => 30],
                    21 => ['nombre' => 'REFRESCO 355ML', 'precio' => 25],
                    22 => ['nombre' => 'AGUA DEL DIA', 'precio' => 75],
                    23 => ['nombre' => 'VASO O BOTELLA DE AGUA', 'precio' => 10],
                    24 => ['nombre' => 'CAFÉ REFILL', 'precio' => 15],
                    25 => ['nombre' => 'TE DE REFILL', 'precio' => 15],
                    26 => ['nombre' => 'TAZA DE LECHE', 'precio' => 10],
                ];              

                    //Menu nuevo 

echo '<div class="perfil">
       <h2></h2>

            <div class="compras-lista">
                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(1);">PAQUETE CISNE 1 | $80</h2 ><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">4 piezas de hotcakes, huevo revuelto <br> con jamón y molletes</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/PAQUETE_1.png"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(13);">MOLLETES | $20</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">Queso gratinado, pico de gallo</h5>
                                <h5 style = "margin-top: 6px;"><li>Longaniza<br><li>Hawaiana</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/molletes.png"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                             <h2 class = "espaciado" onclick = "comprarProducto(2);">PAQUETE CISNE 2 | $80</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">6 piezas de nuggets de pollo, papas a la<br> francesa y ensalada de lechuga</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/paquete2.jpg"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(14);">TORTA DE CHILAQUILES | $65</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">Bolillo relleno de chilaquiles rojos ó verdes, milanesa de<br>
                                                                pollo, frijoles refritos, crema, queso y cebolla</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/tort.jpg">
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(3);">PAQUETE KID | $80</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">6 piezas de nuggets de pollo, papas a la<br> francesa y ensalada de lechuga</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/PAQUETEKID.jpeg"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(15);">CLUB SÁNDWICH | $80</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">Pan de caja triple con jamón, pechuga de pollo o la<br>
                plancha, queso panela, acompañado de una porción de<br> papas a la francesa</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/CLUBSADWICH.jpeg"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(4);">CHILAQUILES VERDES Ó ROJOS | $70</h2 ><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">Totopos bañados en salsa, acompañados de frijoles<br>
                                refritos, crema, queso rayado, pan de sal, proteína a<br> elección</h5>
                                <h5 style = "margin-top: 6px"><li>Cecina +$13<br><li>Milanesa de pollo +$15<br><li>Pollo<br><li>Huevo</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/CHILAQUILES.jpeg"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(16);">SINCRONIZADA HAWAIANA | $65</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">Sincronizada de jamón con queso Oaxaca, cubierta de<br>
                                queso manchego y piña, acompañada de frijoles<br>
                                refritos y pico de gallo</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/SINCRONIZADAHAWAIANA.jpeg"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                             <h2 class = "espaciado" onclick = "comprarProducto(5);">ENCHILADAS VERDES Ó ROJAS | $70</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">4 piezas bañadas e salsa verde o roja, crema, queso,<br> lechuga, proteína a elección</h5>
                                <h5 style = "margin-top: 6px;"><li>Cecina +$13<br><li>Milanesa de pollo +$15<br><li>Pollo<br><li>Jamón</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/ENCHILADAS.jpeg"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(17);">ENSALADA | $70</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">Lechuga Italiana, jitomate, zanahoria, queso panela,<br>
                                arandanos, ajonjoli, crutones y aderezo, proteína a elección</h5>
                                <h5 style = "margin-top: 6px;"><li>Pollo<br><li>Jamón<br><li>Atún</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/ENSALADA.jpeg">
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(6);">ENCHILADAS SUIZAS | $80</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">4 piezas bañadas en salsa verde o roja, gratinadas con<br> queso manchego y crema</h5>
                                <h5 style = "margin-top: 6px;"><li>Cecina +$13<br><li>Milanesa de pollo +$15<br><li>Pollo<br><li>Jamóna</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/suizas.png"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(18);">HUEVOS AL GUSTO | $70</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;"><li>Jamón<br><li>Mexicana<br><li>Longaniza<br><li>Tocino<br><li>Omelette de Queso
                                /Manchego ó Oaxaca<br><li>Omelette de espinacas</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/huevos.png"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(7);">ENMOLADAS | $80</h2 ><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">4 piezas bañadas en mole, crema y queso, proteína a elección</h5>
                                <h5 style = "margin-top: 6px;"><li>Cecina +$13<br><li>Milanesa de pollo +$15<br><li>Pollo<br><li>Jamón</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/ENMOLADAS.jpeg"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>

                
                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(19);">PLATO DE FRUTA | $30</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">Fruta de temporada acompañada de granola y miel</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/FRUTA.jpeg"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                             <h2 class = "espaciado" onclick = "comprarProducto(8);">WAFFLES 1PZ | $45</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">Acompañado de fruta de temporada</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/WAFLES.jpeg"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(20);">LICUADOS | $30</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;"><li>Chocolate<br><li>Vainilla<br><li>Platano<br><li>Avena<br>
                                                                <li>Granola<br><li>Fresa (temporada)</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/LICUADOS.jpeg">
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(9);">HOTCAKES CON TOCINO | $360</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">3 piezas de hotcakes con tocino,<br>
                                                                acompañados de mantequilla y miel de maple</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/HOTCAKESTOCINO.jpeg"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(21);">REFRESCO 355ML | $25</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">Preguntar por sabores</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/refresco.png"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(10);">HOTCAKES POR PIEZA | $15</h2 ><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">Acompañados de crema batida</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/hotcakes.png"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(22);">AGUA DEL DIA | $75</h2><hr class = "linea">
                            <ul>
                                <h5 style = "margin-top: 6px;">Jarra de 2L</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/agua_dia.png"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                             <h2 class = "espaciado" onclick = "comprarProducto(11);">PAN DULCE | $17</h2><hr class = "linea">
                            <ul>
                                <div class="imagen-caja">
                                <img src="IMGs/pan.png"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(23);">VASO O BOTELLA DE AGUA | $10</h2><hr class = "linea">
                            <ul>
                                <div class="imagen-caja">
                                <img src="IMGs/agua.png">
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(24);">CAFÉ REFIL | $13</h2><hr class = "linea">
                            <ul>
                                <div class="imagen-caja">
                                <img src="IMGs/CAFE.jpeg"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(25);">TÉ DE REFIL | $15</h2><hr class = "linea">
                            <ul>
                                <div class="imagen-caja">
                                <img src="IMGs/te.png"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(26);">TAZA DE LECHE | $10</h2><hr class = "linea">
                            <ul>
                                <div class="imagen-caja">
                                <img src="IMGs/leche.png"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <h2 class = "espaciado" onclick = "comprarProducto(25);">OTROS</h2><hr class = "linea">
                            <ul>
                            <h5 style = "margin-top: 6px;"><li>Vaso de agua de sabor $15<br><li>1 pieza de mollete (sencillo) $15
                                                            <br><li>1 pieza de sincronizada $15<br><li>Pollo ó jamón extra $10<br><li>
                                                            Huevo extra $10<br><li>Miel de maple/mermelada extra $5<br><li>Unicel (llevar) $5<br><li>Coffee mate $3
                                                            <br><li>Orden de papas a la francesa $35<br><li>Tira de tocino $10<br><li>Pza de enchilada extra $17
                                                            <br><li>Hielo extra $5</h5>
                                <div class="imagen-caja">
                                <img src="IMGs/OTROS.jpeg"/>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
        <center
        <br><br> <b style = "color: red">NOTA: La primera taza al llegar al establecimiento es de Cortesia, a partir de la segunda taza tiene un<br>
        costo y aplica el servicio de refill. (Las tazas de café no son transferibles.) SE APLICAN RESTRICCIONES </b></center>
        <div style = "text-align: center;">
        <img src="IMGs/instagram.png" style = "display: inline-block; margin-bottom: 0px; width: 5%;" onclick = window.location.href="https://www.instagram.com/desayunos_cisne_/profilecard/?igsh=bmptbWF5NXNzY2Jh">
        <img src="IMGs/facebook.png" style = "display: inline-block; margin-bottom: 0px;  width: 2.8%;" onclick = window.location.href="https://www.facebook.com/share/xwzMysnp16b1Nm5t/?mibextid=LQQJ4d">
        <p style = "font-size: 25px; display: inline-block;">Cisne
        
        
        
        
        
        
        ';
            ?>
        </div>
    </div>
       

<script>
    function comprarProducto(idProducto) {
        // Mostrar la notificación
        const notificacion = document.createElement('div');
        notificacion.innerText = 'El producto ha sido comprado';
        notificacion.classList.add('notificacion');
        document.body.appendChild(notificacion);
    
        // Simular la barra de carga
        const barraCarga = document.createElement('div');
        barraCarga.classList.add('barra-carga');
        document.body.appendChild(barraCarga);
    
        let width = 0;
        const interval = setInterval(function () {
            width += 10;
            barraCarga.style.width = width + '%';
            if (width >= 100) {
                clearInterval(interval);
                notificacion.remove();
                barraCarga.remove();
            }
        }, 200);
    
        // Enviar la petición AJAX para añadir al carrito
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'agregar_al_carrito.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log('Producto añadido al carrito');
            }
        };
        xhr.send('idProducto=' + idProducto);
    }
    </script>
    </div>

</body>
</html>
    
    <style>
    /* Estilo para la notificación */
    .notificacion {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #4caf50;
        color: white;
        padding: 10px;
        z-index: 1000;
        background-color: #000; /* Fondo negro */
        color: white;
        border: 2px solid transparent; /* Borde más delgado */
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s; /* Transición de todos los estilos */
        border-image: linear-gradient(90deg, #ff007a, #ff7e00, #fffb00, #00ff4f, #00e6ff) 1; /* Borde colorido */
    }
    
    /* Estilo para la barra de carga */
    .barra-carga {
        position: fixed;
        top: 50px;
        left: 50%;
        transform: translateX(-50%);
        height: 5px;
        background-color: #4caf50;
        width: 0;
        transition: width 0.5s;
    }
    </style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","roles");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']==1){ //administrador
    header("location:/login/admin/principal.php");

}else
if($filas['id_cargo']==2){ //cliente
header("location:/login/home/index.html");
}
else{
    ?>
    <?php
    include("index.html");
    ?>
    <h1 class="bad">Usuario o contraseña incorrecta</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);



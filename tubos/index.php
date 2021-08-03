<?php 
error_reporting(0);
session_start();
include "./cn.php";
$id=$_SESSION['user_code'];
echo '<script>
	function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(";");
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

</script>';
$row=set_sql("SELECT * FROM players WHERE id='$id'");
if($row){
echo ' <script>
 			let usuario="'.$row["usuario"].'";
 			let nivel='.$row["nivel"].';
 			user = usuario
 			ni = nivel
		    if (user != "" && user != null) {
		      setCookie("user", user, 365);
		      setCookie("nivel", ni, 365);
		    }
 </script>';
}else{
	echo ' <script>
 			let usuario=getCookie("user");
 			let nivel=parseInt(getCookie("nivel")) || 1;
		while(usuario==""){
			usuario=prompt("INGRESE SU NOMBRE");
			user =usuario
		    if (user != "" && user != null) {
		      setCookie("user", user, 365);
		    }
		}

 </script>';
}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./guava.css">
	<script src="https://kit.fontawesome.com/93c6673a68.js"></script>
	<title>Puzzle</title>
	<style>
		*{
		-moz-user-select: none; /* Firefox */
	     -ms-user-select: none; /* Internet Explorer */
	   -khtml-user-select: none; /* KHTML browsers (e.g. Konqueror) */
	  -webkit-user-select: none; /* Chrome, Safari, and Opera */
	  -webkit-touch-callout: none; /* Disable Android and iOS callouts*/
	  outline: none;
	  -webkit-tap-highlight-color: rgba(0,0,0,0);
	 --color-1: #F24B59; 
	 --color-2: #F27289; 
	 --color-3: #668C3F; 
	--color-4: #B0D959; 
	--color-5: #F2F2F2; 
	--color-scroll:var(--color-2);
	--w-scroll:7px;
	--font-title-name:"";
	--font-general-name:"";
	--font-paragraph-name:"";
	--btn-color:var(--color-2);
	--btn-bg-c:white;
	margin:0;
	padding:0;
	box-sizing: border-box;
	font-family: sans-serif;
	color: white;
		}

		section {
			position: absolute;
			right:0;
			width:100%;
			min-height:100vh;
			min-width:100vw;
			padding-top: 100px;
			display: flex;
			justify-content: flex-start;
			align-items: center;
			background: #111;
			transition: 0.5s;
		}
		header{
			position: absolute;
			top: 0;
			left: 0;
			width:100%;
			padding: 40px;
			display:flex;
			justify-content: space-between;
			align-items: center;
			z-index:999;
		}
		header .logo{
			color: #fff;
			text-transform: uppercase;
			cursor: pointer;
		}
		.toggle{
			position: relative;
			width: 60px;
			height:  60px;
			color: white;
			cursor: pointer;
		}
		.toggle.active{
			color:#CB2F15;
		}
		.banner.active{
			right: 300px;
		}
		
		.menu{
			position: fixed;
			top: 0;
			right: 0;
			width:200px;
			height:100%;
			display: flex;
			justify-content: center;
			align-items: center;
			background: #fff;
		}
		.menu ul{
			position: relative;
		}
		.menu ul li{
			position: relative;
			list-style: none;
			text-align: center;
			margin-top: 29px;
		}
		.menu ul li a{
			text-decoration: none;
			font-size: 1.2em;
			color: #111; 
		}
		.menu ul li a:hover{
			color: var(--color-2)
		}
		@media (min-width: 999) {
			.fondo{
				background-position:0px -90px;
			}
		}
		.ranquin ul li{
			display: flex;
			justify-content: space-evenly;
			align-items: center;
		}
		<?php 

		echo ".".$row["usuario"]."{
				background:var(--color-2);
			}";
		 ?>
</style>
</head>
<body>
	<div class="menu" onclick="toggleMenu()">
		<ul>
			<li><a href="#opc">Escojer una imagen</a></li>
			<li><a href="#ranquin">Ranquin</a></li>
		</ul>
	</div>
	<section class="banner align-items-lr-c col-lg-8 col-md-12 col-xs-12 f-column grid ">
		<header>
			<h2 class="logo">Puzzle</h2>
			<div class="toggle" onclick="toggleMenu()"><i class="fas fa-bars"></i></div>
		</header>
		<div class="tablero grid-row">
			<div class="res"></div>
			<canvas id="canvas" width="200" style="cursor: pointer;" class="rounded-border-box"></canvas>
		</div>
		<div class="opc col-lg-12 col-md-12 col-xs-12 " id="opc">
			<div class="opc-imagen col-lg-12 col-md-12 col-xs-12  rounded-border-box grid-row ">
				<div class="component-input-file col-lg-4 col-md-4 col-xs-12">	
					<input type="file" accept="image/*"  id="upload" class="input-file">
				</div>
				<img src="#" width="200" id="img" alt="☹ NO se ha encontrado una imagen" class="col-lg-4 col-md-4 col-xs-12 h-200">
			</div>
			<div class="iniciar col-lg-12 col-md-12 col-xs-12">
				<button class="button-effect-0 my-palette-bg-2 c-white col-lg-12 col-md-12 col-xs-12 mrg-t-10" onclick="ini()">Star</button>
			</div>
		</div>
		<div class="ranquin rounded-border-box col-lg-8 col-md-12 col-xs-12 space-lg-b-2 mrg-t-20" id="ranquin"></div>
	</section>

	<script src="jquery.js"></script>
	<script>

		function toggleMenu() {
			let menu=document.querySelector(".toggle");
			let banner=document.querySelector(".banner");
			menu.classList.toggle("active");
			banner.classList.toggle("active");
			
		}
		
		let col,canvas,ctx,tablero;
		let x= 0,y= 0,x_= 0,y_= 0;//x_ e y_ son las pociciones de los cuadrados x e y la posicion del espacio
		window.onload=()=>{
			col=nivel+1;
			console.log(col)
			loadR() 

			
		}
		function intercambio(_x_,_y_,_x,_y) {//simplemente intercambia los valores de las cordenadas 
			let aux=tablero[_x][_y];
				tablero[_x][_y]=tablero[_x_][_y_];
				tablero[_x_][_y_]=aux;
		}
		function ini() {
			document.querySelector(".res").innerText="Loading ...";
			url=document.querySelector("#img").src;//referencio la imagen de muestra y le asigno el valor de la url
			canvas=document.querySelector("#canvas");//instancio el elemento canvas
			ctx=canvas.getContext("2d");
			canvas.width=54*col;
			canvas.height=54*col;
			tablero=createMatriz(col,col,[-1,null]);
			let c=0;
			var img = new Image();
			img.src = url;
			img.crossOrigin = "Anonymous";
			img.onload = function(){
				  ctx.drawImage(img, 0, 0,canvas.width,canvas.height);//pinto la imagen en el canvas
				  for (var i = 0; i < tablero.length; i++) {
					for (var e = 0; e < tablero[i].length; e++) {
						if(i==tablero.length-1 && e==tablero.length-1){}
						else {
							tablero[e][i]=[c,ctx.getImageData(i+52*i,e+52*e,50,50)];//extraigo las partes de la imagen y las guardo en cada posicion de la matriz
							c++;
						}
					}
				}
				//////////////////-----Revolver--------///////////////////////////
				for (var i = 0; i < col*999; i++){
						let x_=Random(0,col);
						let y_=Random(0,col);
						let espacio=vecinos(x_,y_);
						let y=espacio.y;
						let x=espacio.x;
						if(y>-1 && x>-1)intercambio(x_,y_,x,y);
						
					
				}
				paint();
				document.querySelector(".res").innerText="";
			}	
			canvas.onmousedown=(e)=>{// capturo el click y extraigo sobre posicion fue dado dividiendo entre el ancho del cuadrado + 1
			y_=Math.floor(e.offsetX/53);
			x_=Math.floor(e.offsetY/53);
			let espacio=vecinos(x_,y_);//busco si al rededor de estas cordenadas esta el espacio de no ser asi retirna un obj x:-1,y:1
			y=espacio.y;
			x=espacio.x;
			if(y!=-1 && x!=-1){//verifico q no sean -1 
				intercambio(x_,y_,x,y);
			}
			paint();
			if(isOk()){
				col++;
				setTimeout(()=>{
					alert("nivel "+(col-1));

					paint();
					loadR()
					ini()
				},99)
			}
			
		}
				
		}
		function loadR() {
			$.ajax({
						type:"POST",
						url:"score.php",
						data:{"u":usuario,"n":(col-1)},
						success:(e)=>{

							e=e.split(";");
							console.log(e)
							usuario=e[0];
							col=parseInt(e[1])+1;

							document.querySelector("#ranquin").innerHTML="<ul>"+e[2]+"</ul>";
						}
						})
		}
		function paint() {
			canvas.width=canvas.width;//borra el canvas
			
			for(let i=0;i<tablero.length;i++){
				for(let e=0;e<tablero.length;e++){
					ctx.strokeRect(i+52*i,e+52*e,50,50)//pinta un borde en cada cuadrado
					try{
						ctx.putImageData(tablero[e][i][1],i+52*i,e+52*e);//pinta el cuadrado
					}catch(ev){}
				}
			}
		}
		function Random(min=0, max) { return Math.floor(Math.random() * (max - min)) + min;}//no incluye al max
		function createMatriz(f,c,r=0) {//crea un matriz
			let m=[f]
			for (var i = 0; i <f; i++) {
				m[i]=[]
			for (var e = 0; e < c; e++) {
				m[i][e]=r
			}
		}
		return m;
		}
		function vecinos(x,y) {//busca el espacio en blaco en los vecinos de una posicion
			//los try catch se usan en dado caso de q la posicion a evaluar este en un borde ya q no tendria los 4 vecinos si no [v<4,v>0]
			try{
				if(tablero[x][y-1][0]==-1)return {x:x,y:y-1}
			}catch(e){}
			try{
				if(tablero[x][y+1][0]==-1)return {x:x,y:y+1}
			}catch(e){}
			try{
				if(tablero[x-1][y][0]==-1)return {x:x-1,y:y}
			}catch(e){}
			try{
				if(tablero[x+1][y][0]==-1)return {x:x+1,y:y}
			}catch(e){}

			return {x:-1,y:-1}
		}
		function isOk() {
			let c=0;
			for (var i = 0; i < tablero.length; i++) {
					for (var e = 0; e < tablero.length; e++) {
						if(i==tablero.length-1 && e==tablero.length-1){}
						else if(tablero[e][i][0]!=c ){
							return false;
						}
						c++;
						
					}
				}
			return true;
		}
		document.querySelector("#upload").addEventListener("change",()=>{
			 var file = event.target.files[0];
			  var file = event.target.files[0];
				let imagen2=new Image()
				imagen2.src=URL.createObjectURL(file);
				imagen2.onload = function () {
					document.querySelector("#img").src=imagen2.src;
				}

			
		})

	</script>
</body>
</html>
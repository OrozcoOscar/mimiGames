<?php 
session_start();
 if(empty($_POST)){
 	echo "404";
 }else{
 	include "./cn.php";
 	if(!filtro($_POST["u"]) or  !filtro($_POST["n"])){
 		
 	}else{
 	$user=$_POST["u"];
 	$user=str_replace("'","",$user);
 	$nivel=$_POST["n"];
 	$nivel=str_replace("'","",$nivel);
	if(empty($user)||empty($nivel)){
		echo "404";
	}else{
		$row=set_sql("SELECT * FROM players WHERE usuario='$user'");
		if($row){
			if($nivel-$row["nivel"]==1){
				$_SESSION['user_code']=$row["id"];
				$r =set_sql("UPDATE  players SET nivel='$nivel' WHERE id='".$_SESSION['user_code']."'",1);
				
			}
			echo $row["usuario"].";".$row["nivel"].";";

		}else{
			
			$r =set_sql("INSERT INTO players(usuario,nivel) VALUES('$user','$nivel')",1);
			if($r){
				$u=set_sql("SELECT * FROM players WHERE usuario='$user'");
				$_SESSION['user_code']=$u["id"];
				echo $row["usuario"].";".$nivel["nivel"].";";
			}
		}
	
	}
	}
	$row=set_sql("SELECT * FROM players ORDER BY nivel DESC",1);
	
	while($p=mysqli_fetch_assoc($row)){
		echo "<li class='".$p["usuario"]."'><span class='name'>".$p["usuario"]."</span><span class='nivel'>".$p["nivel"]."</span></li>";
	}

}



<html>
<head>
	<title>Calculadora basica en html y php </title>
	<link rel="stylesheet" href="css/style.css" type="text/css">

</head>

<body>
	<div id="background-green">
		background
	</div>
	<div class="page">
		<div class="home-page">
			<div class="sidebar">
				<a href="index.html" id="logo"><img src="images/logo.png" alt="logo"></a>
				<ul>
					<li class="selected home">
						<a href="calculadora.php">Inicio</a>
					</li>
					<li class="about">
						<a href="calculadora.php">Sobre mi</a>
					</li>
					<li class="projects">
						<a href="calculadora.php">Proyectos</a>
					</li>
					<li class="blog">
						<a href="calculadora.php">Blog</a>
					</li>
					<li class="contact">
						<a href="calculadora.php">Contacto</a>
					</li>
				</ul>
				<div class="connect">
					<a href="http://freewebsitetemplates.com/go/facebook/" id="fb">facebook</a> <a href="http://freewebsitetemplates.com/go/twitter/" id="twitter">twitter</a> <a href="http://freewebsitetemplates.com/go/googleplus/" id="googleplus">google+</a> <a href="http://freewebsitetemplates.com/go/youtube/" id="youtube">youtube</a>
				</div>
			</div>
			<div class="body">
				<div class="content-home">
					<div>
						<h1> Calculadora IV online </h1>
						<h3>Ingresa las cifras:</h3>
						<form action="calculadora2.php" method=post>
							<input type="text" name="cifra1" size="10" maxlength="10"><br>
							<input type="text" name="cifra2" size="10" maxlength="10"><br><br>
							<input type=submit name="sumar" value="Sumar">
							<input type=submit name="restar"value="Restar">
							<input type=submit name="dividir" value="Dividir">
							<input type=submit name="multiplicar" value="Multiplicar">
						</form>
						
					</div>
					<div class="featured">
						<img src="images/bed.jpg" alt="">
					</div>
					<div>
						<ul>
							<li>
								<a href="projects.html"><img src="images/bg-projects.jpg" alt=""></a>
								<h4><a href="projects.html">Proyectos</a></h4>
								<h3><a href="projects.html">Programacion en Python</a></h3>
								<p>
									Curso de aprendizaje al lenguaje de programacion Python
								</p>
								
							</li>
							<li>
								<a href="blog.html"><img src="images/bg-blog.jpg" alt=""></a>
								<h4><a href="blog.html">PFG</a></h4>
								<h3><a href="blog.html">App android/IOS/web de entrenador personal</a></h3>
								<p> A
									Mi proyecto fin de grado, consiste en una APP hoja de ruta, para la empresa spin-off de la UGR "EMOCIONA"
								</p>
							
							</li>
						</ul>
					</div>
				</div>
				<div class="footer">
					<p>
						&#169; 2013 - Rafael Gonzalez Jimenez - Todos los derechos reservados
					</p>
					<ul>
						<li>
							<a href="calculadora.php">Inicio</a>
						</li>
						<li>
							<a href="calculadora.php">Sobre mi</a>
						</li>
						<li>
							<a href="calculadora.php">Projectos</a>
						</li>
						<li>
							<a href="calculadora.php">Blog</a>
						</li>
						<li>
							<a href="calculadora.php">Contacto</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

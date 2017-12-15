<?php

class MESSAGE{

	private $string; 
	private $volver;

	function __construct($string, $volver){
		$this->string = $string;
		$this->volver = $volver;	
		$this->render();
	}

	function render(){

	/*	include './Strings_'.$_SESSION['idioma'].'.php';*/
		include '../Locales/Header.html';
?>
		<br>
		<br>
		<br>
        <H3 class="errorMessage">
<?php		
		/*echo $strings[$this->string];*/
        echo $this->string;
?>
		</H3>
		<br>
		<br>
		<br>

<?php

		echo '<a href=\'' . $this->volver . "'>".
                                "volver". " </a>";
		include '../Locales/Footer.html';
	} //fin metodo render

}

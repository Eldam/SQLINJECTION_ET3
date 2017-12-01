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
		include '../Locales/Header.php';
?>
		<br>
		<br>
		<br>
		<H3>
<?php		
		/*echo $strings[$this->string];*/
        echo $this->string;
?>
		</H3>
		<br>
		<br>
		<br>

<?php

		echo '<a href=\'' . $this->volver . "'>" . /*$strings['Volver']*/
                                "volver". " </a>";
		include '../Locales/Footer.php';
	} //fin metodo render

}

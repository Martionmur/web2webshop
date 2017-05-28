<?php
class Produkt {
    public $pid;
    public $bezeichnung;
    public $preis;
    public $bewertung;
    public $kategorie;
    public $bildref;
    
    
    function __construct($pid,$bez,$preis,$bew,$kat,$bref){
		$this->pid = $id;
		$this->bezeichnung = $bez;
		$this->preis = $dpreis;	
		$this->bewertung = $bew;
		$this->kategorie = $kat;
		$this->bildref = $bref;			
	}
         
}
?>

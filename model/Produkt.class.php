<?php
class Produkt {
    public $pid;
    public $bezeichnung;
    public $preis;
    public $bewertung;
    public $kategorie;
    public $bildref;
    
    
    function __construct($pid,$bezeichnung,$preis,$bewertung,$kategorie,$bildref){
		$this->pid = $pid;
		$this->bezeichnung = $bezeichnung;
		$this->preis = $preis;	
		$this->bewertung = $bewertung;
		$this->kategorie = $kategorie;
		$this->bildref = $bildref;			
	}
         
}
?>

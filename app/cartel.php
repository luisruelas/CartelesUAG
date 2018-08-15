<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cartel extends Model
{
    //
    protected $guarded = ["id"];

    public function comentarios(){
    	return $this->hasMany("App\Comentario");
    }

    public function addCartel($array){
    	unset($array["_token"]);
    	$array=$this->setPersonsArray($array);
    	$array["pdfaddress"]=$array["file"]->store("pdfs");
    	unset($array["file"]);
    	$cartel=new cartel($array);
    	$cartel->save();
    	return $cartel;
    }
    private function setPersonsArray($array){
    	$keys=array_keys($array);
        $stringsarray=array();
        $thingstocheck=["autor","colaborador","supervisor"];
        foreach($thingstocheck as $thing){
            $stringbuffer="";
            foreach($keys as $key){
                if (stripos(strtolower($key), $thing)!==false && stripos(strtolower($key), "nombre")!==false){
                	if (strlen($array[$key])==0){
                		unset($array["matricula_".$thing."_".$number],$array[$key]);
                		continue;
                	}
                    $number=explode("_",$key)[2];
                    $matricula=$array["matricula_".$thing."_".$number];
                    $person=$array[$key];
                    $stringbuffer=$stringbuffer.$person."::".$matricula.";;";
                    unset($array["matricula_".$thing."_".$number],$array[$key]);
                }
            }
            if((substr($stringbuffer, 0,-2)))
	            $array[$thing."es"]=substr($stringbuffer, 0,-2);
	        else
	        	$array[$thing."es"]=null;
        }
        return $array;
    }
    public function getPersonasString($persona){
    	$arraytoreturn=array();
    	$personas="";
    	switch ($persona) {
    		case 'autores':
    			$personas=$this->autores;
    			break;
    		
    		case "colaboradores":
    			$personas=$this->colaboradores;
    		break;
    		case "supervisores":
    			$personas=$this->supervisores;
    		break;
    		default:
    		return null;
    	}
    	if($personas==null){
    		return null;
    	}
    	$personasconmatricula=explode(";;",$personas);
    	$count=sizeof($personasconmatricula);
    	$stringtoreturn="";
    	foreach ($personasconmatricula as $personaconmatricula) {
    		$separacion=explode("::", $personaconmatricula);
    		$persona=$separacion[0];
    		$matricula=$separacion[1];
    		$stringtoreturn=$stringtoreturn.$persona." (".$matricula."), ";
    	}
    	$stringtoreturn=substr($stringtoreturn, 0,-2);
    	return array($stringtoreturn,$count);
    }
}

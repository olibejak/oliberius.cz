<?php

function fileCheck($storage){
    if(file_exists($storage)){
        return true;
    }
    return false;
}

class Aktuality
{
    private $listAktualit;
    private $storage = "aktuality.json";
    private $id;
    private $nadpis;
    private $obsah;
    private $novaAktualita;
    public $error;
    public function __construct($id, $nadpis, $obsah){
        if(!fileCheck($this->storage)){
            $this->error = "JSON ERROR";
            return;
        }
        $this->id = $id;
        $this->nadpis = $nadpis;
        $this->obsah = $obsah;
        $this->listAktualit = json_decode(file_get_contents($this->storage), true);
        $this->novaAktualita = [
            "id" => $this->id,
            "nadpis" => $this->nadpis,
            "obsah" => $this->obsah
        ];
        $this->save();
    }
    
    private function save(){
        $this->listAktualit[$this->id - 1] = $this->novaAktualita;
        $this->listAktualit = array_values($this->listAktualit);
        file_put_contents($this->storage, json_encode($this->listAktualit, JSON_PRETTY_PRINT));
    }
}

class NovaAktualita{
    private $storage = "aktuality.json";
    private $novaAktualita;
    private $id;
    private $nadpis = "";
    private $obsah = "";
    private $listAktualit;
    public $error;
    public function __construct(){
        if(!fileCheck($this->storage)){
            $this->error = "JSON ERROR";
            return;
        }
        $this->listAktualit = json_decode(file_get_contents($this->storage), true);
        $this->id = count($this->listAktualit) + 1;
        $this->novaAktualita = [
            "id" => $this->id,
            "nadpis" => $this->nadpis,
            "obsah" => $this->obsah
        ];
        $this->create();
    }
    private function create(){
        array_push($this->listAktualit, $this->novaAktualita);
        file_put_contents($this->storage, json_encode($this->listAktualit, JSON_PRETTY_PRINT));

    }
}

class Odstranit{
    private $storage = "aktuality.json";
    private $id;
    private $listAktualit;
    public $error;
    public function __construct($id){
        if(!fileCheck($this->storage)){
            $this->error = "JSON ERROR";
            return;
        }
        $this->listAktualit = json_decode(file_get_contents($this->storage), true);
        $this->id = $id;
        $this->delete();
    }
    private function delete(){
        $count = count($this->listAktualit);
        if ($count >= 1) {
            for ($x = $this->id; $x < $count; $x++) {
                $this->listAktualit[$x]["id"] = "$x";
                
            }
        unset($this->listAktualit[$this->id - 1]);
        }
        $this->listAktualit = array_values($this->listAktualit);
        file_put_contents($this->storage, json_encode($this->listAktualit, JSON_PRETTY_PRINT));
    }
}

class LoginUser
{
    public $username;
    public $password;
    public $error;
    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
        $this->login();
        }

    private function login(){ // funkce k hledání uživatele v údajích z userdata.json
        if($this->username == "admin" && $this->password == "admin"){ 
            $_SESSION["user"] = "admin";
            header("location: admin.php"); // přesměrování                
            exit();
            }
        else {
            return $this->error = "Neplatné přihlašovací údaje.";
        }
    }
}

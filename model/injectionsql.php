<?php
    
    class bdd{
    
            // Constructeur pour la connexion à la bdd
            function __construct(){
            //essay de connexion a bdd
            try{
                $this->bdd = new PDO("mysql:dbname=bddinjection;host:127.0.0.1","root","POKEMON17");
                echo 'connexion ok ';
            }
            catch(PDOException $e){
                echo $e->getmessage();
            }
                }
            
            //getter
            function getBdd(){
                return $this->bdd;
            }

    //Mauvaise requête
    function RequeteM($nom){
    $nom = "Basserue";
    $sql = ("select ID_USER, Prenom, Nom, Email from user u where Nom = '%s'.$nom");
    //pas de requete preparer il n'y a pas de verification de requete
    $sth = $bdd->query($sql);
    var_dump($sql);
    }

    function RequeteB($id, $prenom, $nom, $email){
    // Bonne requête
    $sql = "select ID_USER, Prenom, Nom, Email from user u where Nom = ?";
    //requete preparer et verfication
    $req = $bdd->prepare($sql);
    $result = $req->execute(array(':ID_USER' => $id, 
                                  ':Prenom' => $prenom,
                                  ':Nom' => $nom,
                                  'Email' => $email));
    return $req->fetch();
    }
}
?>
    
<?php 

class InjectionTest extends \PHPUnit\Framework\TestCase
{
    public function test_unNomUnique_trouverUtilisateur_devraitRetournerLeLclient()
    {
        $bdd = new Model\injectionsql();
        $Nomuser = new Controller\Nom('Basserue');
        $this->assertEquals(1,'Ligne de commande pour savoir si $Nom contitent le nom Basserue','Doit contenir un utilisateur ayant le nom Basserue');
    }

    public function test_doublonDeNom_trouverParNom_devraitRetournerLesDeuxClients(){

        $bdd = new Model\injectionsql();
        $Nomuser = new Controller\Nom('test');
        $this->assertEquals(2,'Ligne de commande pour savoir si $Nom contitent deux fois le nom test','Devrait renvoyer une liste de 2 utilisateur avec pour Nom test');
    }

    public function test_aucunNom_trouverParNom_devraitRetournerZeroClient()
    {
        $bdd = new Model\injectionsql();
        $Nomuser = new Controller\Nom('testabc');
        $this->assertEquals(0,'Ligne de commande pour savoir si $Nom contitent le nom testabc','Devrait renvoyer une liste vide');
    }

    public function test_injection_trouverparnom_devraitrenvoyerZeroClient(){

        $bdd = new Model\injectionsql();
        $Nomuser = new Controller\Nom("lolo or '1' = '1'");
        $this->assertEquals(0,'Ligne de commande pour savoir si $NomTest contitent le nom lolo ou 1=1','devrait renvoyer une list vide si c est le bon code');
    }
}
<?php

chdir('..');
include_once 'services/FiliereService.php';
extract($_POST);

$ds = new FiliereService();
$r=TRUE;
if ($op != '') {
    if ($op == 'add') {
        $ds->create(new Filiere(0, $code, $libelle));
    } elseif ($op == 'update') {
        $ds->update(new Filiere($id, $code, $libelle));
    } elseif ($op == 'delete') {
        $ds->delete($ds->delete($id));
    } elseif ($op == 'countclasses') {
        echo json_encode($ds->countClasses()) ;
        $r=FALSE;
    } elseif ($op == 'find') {
       echo json_encode($ds->findById($id));
       $r=FALSE;
    }elseif ($op == 'findclasses') {
       echo json_encode($ds->findClasses($filiere));
       $r=FALSE;
    
    }
}
if ($r){
echo json_encode($ds->findAll());}
header('Content-type: application/json');
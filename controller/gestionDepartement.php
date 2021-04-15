<?php

chdir('..');
include_once 'services/DepartementService.php';
extract($_POST);

$ds = new DepartementService();
$r=TRUE;
if ($op != '') {
    if ($op == 'add') {
        $ds->create(new Departement(0, $code, $libelle));
    } elseif ($op == 'update') {
        $ds->update(new Departement($id, $code, $libelle));
    } elseif ($op == 'delete') {
        $ds->delete($ds->delete($id));
    }elseif ($op == 'countclasses') {
        echo json_encode($ds->countClasses()) ;
        $r=FALSE;
    } elseif ($op == 'find') {
       echo json_encode($ds->findById($id));
       $r=FALSE;
    }elseif ($op == 'findclasses') {
       echo json_encode($ds->findClasses($filiere));
    $r=FALSE;}
}

if ($r){
echo json_encode($ds->findAll());}
header('Content-type: application/json');

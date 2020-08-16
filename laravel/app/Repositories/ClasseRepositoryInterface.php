<?php
namespace App\Repositories;
interface ClasseRepositoryInterface{
    public function all();

    public function createClasse($classe);

    public function editClasse($classeId);

    public function deleteClasse($classeId);

    public function updateClasse($request, $classeId);

    public function getStudent($classeId);
}
?>

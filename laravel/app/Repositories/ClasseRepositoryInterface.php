<?php
namespace App\Repositories;
interface ClasseRepositoryInterface{
    public function all();

    public function createTeacher();

    public function showTeacher($classeId);

    public function deleteTeacher($classeId);

    public function update($classeId);
}
?>

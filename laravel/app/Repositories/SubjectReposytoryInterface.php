<?php
namespace App\Repositories;
interface SubjectReposytoryInterface{
    public function all();

    public function createSubject($data);

    public function showId($classeId);

    public function delete($classeId);

    public function update($request, $id);
}
?>

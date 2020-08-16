<?php
namespace App\Repositories;

interface StudentRepositoryInterface{
    public function all();

    public function createStudent($request);

    public function getStudent($studentId);

    public function updateStudent($request ,$studentId);

    public function delete($studentId);
}
?>


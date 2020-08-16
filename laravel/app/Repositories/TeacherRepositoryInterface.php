<?php
namespace App\Repositories;
interface TeacherRepositoryInterface{
    public function all();

    public function createTeacher($data);

    public function showTeacher($teacherId);

    public function deleteTeacher($teacherId);

    public function update($request, $teacherId);
}
?>

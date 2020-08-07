<?php
namespace App\Repositories;
interface TeacherRepositoryInterface{
    public function all();

    public function createTeacher();

    public function showTeacher($teacherId);

    public function deleteTeacher($teacherId);

    public function update($teacherId);
}
?>

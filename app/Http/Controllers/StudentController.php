<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showStudents()
    {
        $students =  DB::table('students')
        ->join('cities', 'students.city', '=', 'cities.id')
        // ->select('students.*','cities.city_name')
        // ->where('cities.city_name','=','Hamillberg')
        ->select(DB::raw('count(*) as student_count'),'city_name')
        ->groupBy('city_name')
        // ->where('cities.city_name','=','Hamillberg')
        // ->having('student_count','>=',2)
        ->havingBetween('student_count',[1,2])
        // ->orderBy('student_count','desc')
        // ->count();
        ->get();

        // $students = DB::table('students')
        // ->leftJoin('cities',function (JoinClause $join)  {
        //     $join->on('students.city', '=', 'cities.id')
        //     ->where('students.name','like','a%');
        // })->select('students.*','cities.city_name')
        // ->get();
        // return $students;
        return view('welcome', compact('students'));
    }
    public function unionData()
    {
        $lecturers =  DB::table('lecturers')
        ->select('name','email','city_name')
        ->join('cities','lecturers.city','=','cities.id');
         $students = DB::table('students')
         ->union($lecturers)
         ->select('name','email','city_name')
         ->join('cities','students.city','=','cities.id')
         ->get();
        // ->toSql();
        return $students;
        // return view('welcome', compact('students'));
    }
    public function whenData()
    {

         $students = DB::table('students')
         ->when(false,function ($query){
            $query->where('age','>','20');
        },function ($query){
             $query->where('age','<','20');
         })
         ->toSql();
        // ->toSql();
        return $students;
        // return view('welcome', compact('students'));
    }
    public function chunkData()
    {

         $students = DB::table('students')->orderBy('id')
         ->chunkById(3,function ($stu) {
            echo "<div style='border : 1px solid red; margin-bottom:15px;'>";
            foreach ($stu as $student) {
                echo $student->name. "<br>";
            }
            echo "</div>";
         });
        // return $students;
        // return view('welcome', compact('students'));
    }
}

<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'acronym',
        'title',
        'ects',
        'hours',
        'quad',
        'opt',
        'acronym',
    ];
    
    public static function countECTSValide($id){
        return DB::select("SELECT SUM(c.ects) as ects FROM pae as p 
        JOIN courses as c ON c.acronym = p.acronym
        WHERE p.matricule = $id and p.\"Validate\" = true");
    }

    public static function getCours($id, $quadri){
        return DB::select("SELECT c.acronym, c.title, c.ects, c.hours, c.quad, s.opt, p.\"Validate\", s.bloc FROM courses AS c
        LEFT JOIN pae as p ON c.acronym = p.acronym
        LEFT JOIN students as s ON s.id = $id
        WHERE c.quad <= $quadri and c.opt LIKE CONCAT('%', s.opt, '%')
        ORDER BY p.\"Validate\" DESC, c.quad ASC, c.title ASC");
    }

    public static function getMyCours($userId){
        return DB::select("SELECT * FROM pae WHERE matricule=$userId");
    }

    public static function addMyCours($acronym, $title, $ects, $hours, $quad, $opt){
        return DB::select('insert into courses (acronym, title, ects, hours, quad, opt) values(?,?,?,?,?,?)',
         [$acronym, $title, $ects, $hours, $quad, $opt]);
    }

    public static function DropMyCours($acronym){
        DB::insert('delete from courses WHERE acronym = ?', [$acronym]);
    }
}


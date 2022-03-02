<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Course;

class PaeModel extends Model
{
    use HasFactory;

    private static function hasPropertyValue(array $objects, $property, $value): bool {
        foreach ($objects as $object) {
            if (property_exists($object, $property) && $object->{$property} === $value) {
                return true;
            }
        }
        return false;
    }

    public static function ajout($user, $courses){
        $pae = Course::getMyCours($user);
        foreach ($courses as $cour) {
            if(!PaeModel::hasPropertyValue($pae, "acronym", $cour)){
                DB::insert('insert into pae (matricule, acronym) values (?, ?)', [$user, $cour]);
            }
        }
    }

    public static function renvoie($user){
        DB::insert('delete from pae WHERE matricule = ?', [$user]);
    }
}

<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Student extends Model
{
    public $timestamps = false;

    use HasFactory;

    public static function getAll(){
        return DB::select("select * from students order by id");
    }

    public static function updateInscription($id){
        DB::table("students")
                ->where('id', $id)
                ->update(['inscrit' => '1']);
    }

    public static function deleteRegistration($id){
        DB::table("students")
                ->where('id', $id)
                ->delete();
    }

    public static function get($id) {
        return DB::table('students')
            ->where('id', $id)
            ->get(['id','nom', 'prenom', 'num_telephone', 'opt', 'bloc','inscrit','cavp'])->first();
    }

    public static function updateCavp($id){
        DB::table("students")
                ->where('id', $id)
                ->update(['cavp' => '1']);
    }

    public static function updateCavp2($request, $id){
        DB::table("cavp_request")
                ->insert(['demande' => $request,'type' => 'request', 'student' => $id
            ]);
    }

    public static function getcavp($id) {
        return DB::table('cavp_request')
            ->where('student', $id)
            ->get(['id','demande', 'type', 'student'])->first();
    }

    public static function hasPae($id) {
        return DB::select("SELECT pae from students where id = $id");
    }
    
    public static function setBloc($id, $bloc) {
        DB::table("students")
                ->where('id', $id)
                ->update(['bloc' => $bloc]);
    }

    public static function setPae($id, $value) {
        DB::table("students")
                ->where('id', $id)
                ->update(['pae' => $value]);
    }

    public static function hasCavp($id) {
        return DB::select("SELECT cavp from students where id = $id");
    }
    
    public static function updateStudent($id, $request) {
        DB::table("students")
                ->where('id', $id)
                ->update([
                    'nom' => $request['nom'],
                    'prenom' => $request['prenom'],
                    'num_telephone' => $request['num_telephone'],
                    'opt' => $request['opt'],
                    'bloc' => $request['bloc'],
                ]);
    }

    public static function updateReponse($request, $id){
        DB::table("cavp_request")
                ->where('id',$id)
                ->update(['reponse' => $request]);
    }

    public static function selectReponse($id){
        return DB::select("SELECT reponse from \"cavp_request\" where student = $id");
    }
    public static function countStudentInscrit(){
        return DB::select("SELECT count(*) from students where inscrit = 1 ");
    }

    public static function countStudentNotInscrit(){
        return DB::select("SELECT count(*) from students where inscrit = 0 ");
    }

    public static function countStudent(){
        return DB::select("SELECT count(*) from students ");
    }
    // Adds informations inscriptions from a new student to the database
    public static function addInfoInscriptionV($id, $nom,$prenom,$telephone, $bloc, $opt){
        $pdo = DB::getPdo();
        $sql = "INSERT into students(id, nom, prenom,num_telephone, opt, bloc)values(:id,:nom,:prenom,:telephone,:opt,:bloc)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array('id'=> $id, 'nom' => $nom,'prenom'=> $prenom,'telephone'=>$telephone, 'opt'=>$opt, 'bloc'=>$bloc));
    }

    // Gets the matricule from a student with its tel number
    public static function getMatricule($numTelephone) {
        $query = DB::table("students")->select('id')
        ->where('num_telephone',$numTelephone)->first();
        return $query->id;
    }

    /**
     * Gets the registraton refusal message from the secretariat
     */
    public static function getRefusalMessage($id) {
        return DB::select("SELECT message from message_refusal where id = $id");
    }
}

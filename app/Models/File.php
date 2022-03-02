<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Google_Service;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'matricule', 'id'];
    public $timestamps = false;

    public static function ajout($path, $matricule, $id){
        DB::insert("insert into files (path, matricule, \"id\") values (?, ?, ?)", [$path, $matricule, $id]);
    }

    public static function drop($matricule){
        DB::insert("delete from files WHERE matricule = ?", [$matricule]);
    }

    /**
     * Sets up the google client to create folder and insert files
     */
    public static function setUp() {
        $gClient = new \Google_Client();
        $gClient->setClientId(env('GOOGLE_DRIVE_CLIENT_ID')); 
        $gClient->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $gClient->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));
        return new \Google_Service_Drive($gClient);
    }

    /**
     * Creates a folder for a user
     */
    public static function createFolder($matricule) {
        $service = File::setUp();
        $fileMetadata = new \Google_Service_Drive_DriveFile(array(
            'name' => (string)$matricule,
            'mimeType' => 'application/vnd.google-apps.folder',
            'parents' => array(env('GOOGLE_DRIVE_FOLDER_ID')))
        );
        $folder = $service->files->create($fileMetadata, array(
            'fields' => 'id'));
        $id = $matricule+1;
        \DB::insert("insert into files values('".$folder->id."', ".$matricule.", ".$id.");");
    }

    /**
     * Inserts an input file of the user
     */
    public static function insertFile($matricule, $file, $request, $n) {
        $file_name = $request->file($n)->getClientOriginalName();
        $folder_id = \DB::select("select path from files where matricule = ".$matricule.";");
        if(empty($folder_id)) {
            File::createFolder($matricule);
            $folder_id = \DB::select("select path from files where matricule = ".$matricule.";");
        }
        $path = $folder_id[0]->path;
        $r = $request->file($n)->storeAs($path, $file_name, 'google');
    }

    public static function getFolderLinkByMatricule($matricule){
        $folder_id = \DB::select("select path from files where matricule = ".$matricule.";");
        $path = $folder_id[0]->path;
        return env('GOOGLE_DRIVE_URL').$path;
    }
}

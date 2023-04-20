<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use Log;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BackupController extends Controller{

    public function index(){
        return view('backup');
    }
public function backup()
    {
         $this->load->dbutil();
         $tanggal =date('Ymds-His');
         $config = array(
            'format' => 'zip',
            'filename' => 'siusek_'.$tanggal.'_db.sql',
            'add_drop' => TRUE,
            'add_insert' => TRUE,
            'newline' => "\n",
            'foreign_key_checks' => FALSE,
         );
         $backup =& $this->dbutil->backup($config);
         $nama_file = 'siusek_'.$tanggal.'zip';
         $this->load->helper('download');
         force_download($nama_file,$backup);
   }
}

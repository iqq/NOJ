<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Submission extends Model
{
    protected $tableName = 'submission';

    public function insert($sub)
    {

        if(strlen($sub['verdict'])==0) $sub['verdict']="Judge Error";

        $prob_detail = DB::table($this->tableName)->insert([
            'time' => $sub['time'],
            'verdict' => $sub['verdict'],
            'soultion' => $sub['soultion'],
            'language' => $sub['language'],
            'submission_date' => $sub['submission_date'],
            'memory' => $sub['memory'],
            'uid' => $sub['uid'],
            'pid' => $sub['pid'],
        ]);
    }

    public function count_solution($s)
    {
        return DB::table($this->tableName)->where(['solution'=>$s])->count();
    }
}
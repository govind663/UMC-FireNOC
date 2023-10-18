<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LogRepository {

    public function insertLog($userId, $tableName, $logType){

        $data = [
                    'ip' => request()->ip(),
                    'user_aget' => request()->header('user-agent'),
                    'data' => request()->all()
                ];

        DB::table('logs')->insert([
            'user_id' => $userId,
            'table_name' => $tableName,
            'log_type' => $logType,
            'data' => json_encode($data),
            'log_date' => now()
        ]);
    }

}

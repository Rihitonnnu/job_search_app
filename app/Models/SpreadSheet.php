<?php

namespace App\Models;

use Google\Service\ServiceControl\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpreadSheet extends Model
{
    use HasFactory;

    // スプレッドシート挿入用Function
    static function insert_spread_sheet($insert_data)
    {
        // スプレッドシートを操作するGoogleClientインスタンスの生成（後述のファンクション）
        $sheets = SpreadSheet::instance();

        //登録されたurlを取り出し文字分割してidのみを抽出
        $url=User::findOrFail(\Illuminate\Support\Facades\Auth::id())->sheet_url;
        $split_url=explode("/",$url,7);

        // データを格納したい SpreadSheet のURLが
        // https://docs.google.com/spreadsheets/d/×××××××××××××××××××/edit#gid=0
        // である場合、××××××××××××××××××× の部分を以下に記入する
        $sheet_id = $split_url[5];
        $range = 'A1:A';
        $response = $sheets->spreadsheets_values->get($sheet_id, $range);
        
        // 格納する行の計算
        $count = 1;$row=$count;
        if ($response->getValues() == null) {
            $values = new \Google_Service_Sheets_ValueRange();

            $preset_data = [
                'company_name' => '企業名',
                'job_title' => '職種',
                'headline'=>'募集の見出し',
                'deadline'=>'募集の締め切り',
            ];

            $preset = [
                $preset_data['company_name'],
                $preset_data['job_title'],
                $preset_data['headline'],
                $preset_data['deadline'],
            ];
            // dd($preset);
            $values->setValues([
                'values' => $preset
            ]);
            $sheets->spreadsheets_values->append(
                $sheet_id,
                'A' . $row,
                $values,
                ["valueInputOption" => 'USER_ENTERED']
            );
            // dd($values);
        }
        $row = $count + 1;
        // データを整形（この順序でシートに格納される）
        $contact = [
            $insert_data['company_name'],
            $insert_data['job_title'],
            $insert_data['headline'],
            $insert_data['deadline'],
        ];
        $values = new \Google_Service_Sheets_ValueRange();
        $values->setValues([
            'values' => $contact
        ]);
        // dd($values);
        $sheets->spreadsheets_values->append(
            $sheet_id,
            'A' . $row,
            $values,
            ["valueInputOption" => 'USER_ENTERED']
        );
        return true;
    }

    // スプレッドシート操作用のインスタンスを生成するFunction
    public static function instance()
    {
        // storage/app/json フォルダに GCP からダウンロードした JSON ファイルを設置する
        $credentials_path = storage_path('app/json/credentials.json');
        $client = new \Google_Client();
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAuthConfig($credentials_path);
        return new \Google_Service_Sheets($client);
    }
}

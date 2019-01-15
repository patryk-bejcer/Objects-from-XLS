<?php

namespace App\Imports;

use App\City;
use App\Element;
use App\Street;
use App\Year;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\ToCollection;

class ElementsImport implements ToCollection
{
    private $newRows = 0;
    private $updatedRows = 0;

    public function collection(Collection $rows)
    {
        $actualRow = 0;
        foreach ($rows as $row) {

            if ($actualRow !== 0) {
                $yearId = $this->checkIfRowExistAndDecide(new Year(), $row[0], 'year');
                $cityId = $this->checkIfRowExistAndDecide(new City(), $row[1], 'name');
                $streetId = $this->checkIfRowExistAndDecide(new Street(), $row[2], 'name');

                $existEl = Element::where('name', $row[3])->first();
                if(!$existEl){
                    Element::create(['name' => $row[3], 'year_id' => $yearId, 'city_id' => $cityId, 'street_id' => $streetId]);
                    $this->newRows++;
                }
            }
            $actualRow++;
        }
        $this->sendEmailWithImportData();
        var_dump('new records: '. $this->newRows);
    }

    private function checkIfRowExistAndDecide($model, $row, $rowName)
    {
        $existsYear = $model::where($rowName, $row)->first();
        if (!$existsYear) {
            return $model::create([$rowName => $row])->id;
        } else {
            return $existsYear->id;
        }
    }

    private function sendEmailWithImportData()
    {
        Mail::send('emails.importResult', ['title' => 'title', 'newRows' => $this->newRows], function ($message) {
            $message->from('info@import.io', 'Import Data Notification');
            $message->to('admin@gmail.com');
        });
    }

}

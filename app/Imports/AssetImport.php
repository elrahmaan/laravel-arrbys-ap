<?php

namespace App\Imports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AssetImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Asset([
            // 'name' => $row['name'],
            // 'category_id' => $row['category_id'], 
            // 'category_asset' => $row['category_asset'],
            // 'detail_of_specification' => $row['detail_of_specification'],
            // 'qty' => $row['qty'],
            // 'date' => $row['date'],
            'name'     => $row['name'],
            'category_asset' => $row['category_asset'],
            'qty' => $row['qty'],
        ]);
    }
}
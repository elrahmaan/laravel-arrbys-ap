<?php

namespace App\Imports;

use App\Models\Asset;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AssetImport implements ToModel, WithHeadingRow, SkipsOnFailure
{
    use Importable, SkipsFailures;
    private $errors;
    private $validateCategory;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $category = DB::table('asset_categories')->where('name', '=', $row['kategori'])->select('id')->first();
        if ($category == null) {
            $this->errors = "Category " .  $row['kategori'] .  " is not valid, make sure the category is correct";
        }
        if ($row['kategori_aset'] != 'Sewa' && $row['kategori_aset'] != 'Asset AP') {
            $this->validateCategory = "Asset Category options only 'Asset AP' and 'Sewa'";
        }
        if (empty($this->errors) && empty($this->validateCategory)) {
            return new Asset([
                'name'=> $row['nama'],
                // 'category_id' => $row['kategori'],
                'category_id' => @$category->id,
                'category_asset' => $row['kategori_aset'],
                'detail_of_specification' => $row['deskripsi'],
                'qty' => $row['jumlah'],
                'date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_masuk'])->format('Y-m-d'),
            ]);
        }
    }
    public function headingRow(): int
    {
        return 2;
    }
    public function getErrors()
    {
        return $this->errors;
    }
    public function getValidateCategory()
    {
        return $this->validateCategory;
    }
}

<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithStartRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
//         var_dump((int)$row[8]);
//         var_dump($row[8]);
        if (!isset($row[0])) {
            return null;
        }
        
        return new Product([
//             'id' => (int)$row[8],//交易单号
            'tradetime' => $row[0],//交易时间
            'type' => $row[1],//交易类型
            'tradeobject' => $row[2],//交易对方
            'goodsname' => $row[3],//商品
            'tag' => $row[4],//收/支
            'money' => (float) $row[5],//金额
            //',' => $row[6],//支付方式
            'tradestate' => $row[7],//当前状态
            'storeid' => $row[9],//商户单号
            'comment' => $row[10]//备注
        ]);
    }
    
    public function startRow(): int
    {
        return 18;
    }
    
    // 验证
    public function rules(): array
    {
        return [
            '2' => 'required',
        ];
    }
    
}

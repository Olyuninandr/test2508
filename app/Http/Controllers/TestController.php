<?php

namespace App\Http\Controllers;

use App\Test;
use App\Http\Requests\FileRequest;
use SimpleXLSX;

class TestController extends Controller
{
    public function importFile()
    {
        return view('test.excel');
    }

    public function importExcel(FileRequest $request)
    {
        $amountOfTime = 10;
        ini_set('max_execution_time', $amountOfTime);
        ini_set('post_max_size', '64M');
        ini_set('upload_max_filesize', '64M');

        $itemsAdded=0;
        $productsId = [];
        $startTime = microtime(true);

        $file = $request->file('file');
        $xlsx = SimpleXLSX::parse($file->getRealPath());

        $collections = $xlsx->rows();
        unset($collections[0]);

        $productsAmount = sizeof($collections);

        foreach ($collections as $collection){

            $data = new Test();
            $row = is_int($collection[7]) ? 0 : 1;
            $codeRow = is_int($collection[7]) ? 5 : 6;

            if(in_array($collection[$codeRow], $productsId)){
                continue;
            }

            $data->head_main = $collection[$row++];
            $data->head_add = $collection[$row++];
            $data->category = $collection[$row++];
            $data->maker = $collection[$row++];
            $data->name = $collection[$row++];
            $data->code = $collection[$row++];
            $data->about = $collection[$row++];
            $data->price = $collection[$row++];
            $data->warranty = $collection[$row++];
            $data->is_available = $collection[$row];
            $data->save();

            $productsId[] = $data->code;
            $itemsAdded++;

            }

        $timeNeeded = (microtime(true) - $startTime);

        return view('success', compact('itemsAdded', 'timeNeeded', 'productsAmount'));
        }
}

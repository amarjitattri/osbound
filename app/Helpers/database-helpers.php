<?php

    use Illuminate\Support\Facades\DB;

    if (!function_exists('findNameById')) {
        function findNameById($table, $val, $field = 'title', $key = 'id')
        {
            $query = DB::table($table)->where($key, $val);
            return $query->exists() ? $query->first()->$field : "unknown";
        }
    }

    if (!function_exists('getCompanyContactNameById')) {
        function getCompanyContactNameById($id,$type='name')
        {
            $query = DB::table('company_contacts')->where('id', $id);
            return $query->exists() ? $query->first()->$type : "unknown";
        }
    }

    if (!function_exists('barcodeExists')) {
        function barcodeExists($sku)
        {
            $query = DB::table('barcodes')->where('sku', $sku);
            return $query->exists() ? $query->first()->code : "";
        }
    }

    if (!function_exists('getInventoryTotalCount')) {
        function getInventoryTotalCount($website, $status)
        {
            $query = DB::table('product_tracking')->where(array('website' => $website, 'product_status' => $status));
            return $query->count();
        }
    }

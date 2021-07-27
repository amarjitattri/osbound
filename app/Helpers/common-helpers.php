<?php

    if (!function_exists('label_msg')) {
        function label_msg($key)
        {
            $msg = array('De-Active', 'Active');
            if (array_key_exists($key, $msg)) {
                return $msg[$key];
            } else {
                return $msg;
            }
        }
    }
    if (!function_exists('className')) {
        function className($key)
        {
            $classes = array(
                '0' => 'danger',
                '1' => 'success',
                '2' => 'info',
                '3' => 'warning',
                '4' => 'primary',
                '5' => 'light'
            );
            if (array_key_exists($key, $classes)) {
                return $classes[$key];
            } else {
                return $classes;
            }
        }
    }
    if (!function_exists('isActiveMenu')) {
        function isActiveMenu($path, string $class_name = "active")
        {
            $cPath = Request()->path();
            if (is_array($path)) {
                return in_array($cPath, $path) ? $class_name : '';
            }
            return $cPath == $path ? $class_name : '';
        }
    }
    if (!function_exists('getValidationRules')) {
        function getValidationRules($elements)
        {
            return collect($elements)->pluck('rules', 'name')->reject(function ($val) {
                return is_null($val);
            })->toArray();
        }
    }
    if (!function_exists('vat_rate')) {
        function vat_rate($key = null)
        {
            $vat = array('0' => '0% VAT', '20' => '20% VAT');
            if (array_key_exists($key, $vat)) {
                return $vat[$key];
            } else {
                return $vat;
            }
        }
    }
    if (!function_exists('address_generate')) {
        function address_generate($address)
        {
            $name = str_replace('name', $address->contact_name, config('site.address_format'));
            $company = str_replace('company', $address->company_name, $name);
            if (!empty($address->contact_email)) {
                $email = str_replace('email', $address->contact_email, $company);
            } else {
                $email = str_replace("email\n", '', $company);
            }

            if (!empty($address->contact_mobile)) {
                $mobile = str_replace('mobile', $address->contact_mobile, $email);
            } else {
                $mobile = str_replace("mobile\n", '', $email);
            }

            if (!empty($address->address_line1)) {
                $address_line1 = str_replace('address_line1', $address->address_line1, $mobile);
            } else {
                $address_line1 = str_replace("address_line1\n", '', $mobile);
            }

            if (!empty($address->address_line2)) {
                $address_line2 = str_replace('address_line2', $address->address_line2, $address_line1);
            } else {
                $address_line2 = str_replace("address_line2\n", '', $address_line1);
            }


            $address_line2 = str_replace('address_line2', $address->address_line2, $address_line1);
            $county = str_replace('county', $address->county, $address_line2);
            $address = str_replace('postal_code', $address->postal_code, $county);
            return $address;
        }
    }

    if (!function_exists('previousMonth')) {
        function previousMonth()
        {
            return date('m', strtotime('-1 month', time()));
        }
    }

    if (!function_exists('addDate')) {
        function addDate($date, $days)
        {
            return date('Y-m-d', strtotime("+ $days days", $date));
        }
    }



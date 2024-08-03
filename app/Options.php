<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Myckhel\Paystack\Support\SubAccount;

class Options extends Model
{
    protected $fillable = [
        'branch_id', 'name', 'value',
    ];
    //
    public static function getOneBranchOption($name, Branch $branch)
    {
        return Options::where('branch_id', $branch->id)->where('name', $name)->first();
    }

    public static function getOneOption($name)
    {
        return Options::where('name', $name)->first();
    }

    public static function getBranchOption(Branch $branch)
    {

        $options = Options::where('branch_id', $branch->id)->get();
        foreach ($options as $key => $value) {
            if ($value->name == 'collection_commission') {
                $options[$key]->value = (Options::getLatestCommission())->value;
                // todo
                return $options;
            }
        }

        return $options;
    }

    public static function putBranchOption($request, Branch $branch)
    {
        if ($request->name == 'sub_account') {
            $options = ['commission_account_name', 'commission_account_bank', 'commission_account_number', 'subaccount_code'];
            $request->request->add([
                "business_name" => $request->commission_account_name,
                "settlement_bank" => $request->commission_account_bank,
                "account_number" => $request->commission_account_number,
                "percentage_charge" => 1,
            ]);
            // dd($request);
            // if any branch already created sub account
            // then go for update
            $subaccount_code = Options::getLatest('subaccount_code');
            $commission_account_number = Options::getLatest('commission_account_number');
            if ($subaccount_code) {
                $subaccount_code = $subaccount_code->value;
            }
            // dd($subaccount_code);
            if ($subaccount_code) {
                // update sub account
                if ($request->commission_account_number != $commission_account_number) {
                    $acounts = SubAccount::create([
                        'business_name' => $request->commission_account_name,
                        'account_number' => $request->commission_account_number,
                        'settlement_bank' => $request->commission_account_bank,
                        'percentage_charge' => $request->percentage_charge,
                    ]);
                } else {
                    $acounts = SubAccount::fetch($subaccount_code);
                }

                foreach ($options as $key => $option) {
                    if ($option == 'subaccount_code') {
                        $opt = Options::getLatest($option);
                        $optionValue = $subaccount_code;
                    } else {
                        $opt = Options::getOneOption($option);
                        $optionValue = $request->$option;
                    }
                    $opt->name = $option;
                    $opt->value = $optionValue;
                    $opt->save();
                }
                return $acounts;
            } else {
                // create sub account
                try {
                    $update = SubAccount::create([
                        'business_name' => $request->commission_account_name,
                        'account_number' => $request->commission_account_number,
                        'settlement_bank' => $request->commission_account_bank,
                        'percentage_charge' => $request->percentage_charge,
                    ]);
                } catch (\Exception $e) {
                    throw new \Exception($e->getMessage());
                    return $e->getMessage();
                }

                $options = ['commission_account_name', 'commission_account_bank', 'commission_account_number', 'subaccount_code'];
                foreach ($options as $key => $option) {
                    if ($option == 'subaccount_code') {
                        $optionValue = $update['data']['subaccount_code'];
                    } else {
                        $optionValue = $request->$option;
                    }

                    Options::create([
                        'branch_id' => $branch->id,
                        'name' => $option,
                        'value' => $optionValue
                    ]);
                }
                return $update;
            }
            // else if already created
            // else create new

            // update part
        } elseif ($option = Options::getOneBranchOption($request->name, $branch)) {
            // code...
            $option->name = $request->name;
            $option->value = $request->value;
            $option->save();
            return $option;
        }

        // create part
        return Options::create([
            'branch_id' => $branch->id,
            'name' => $request->name,
            'value' => $request->value
        ]);
    }

    public static function getLatestCommission()
    {
        return $options = Options::where('name', 'collection_commission')->orderBy('updated_at', 'desc')->first();
    }

    public static function getLatest($name)
    {
        return Options::where('name', $name)->latest()->first();
    }

    public static function getLatestCommissionBankDetails()
    {
        $options = Options::where('name', 'commission_account_bank')->orWhere('name', 'commission_account_number')
            ->orWhere('name', 'commission_account_name')->orderBy('updated_at', 'desc')->get();
        return $options;
    }

    public function user()
    {
        $this->belongsTo(Branch::class);
    }
}

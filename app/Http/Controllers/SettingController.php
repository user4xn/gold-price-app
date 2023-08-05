<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomValue;

class SettingController extends Controller
{
    public function update(Request $request)
    {
        CustomValue::where('key','additional_price')->update([
            'value' => $request->value,
        ]);

        return redirect()->route('dashboard');
    }
}

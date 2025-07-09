<?php

namespace App\Http\Controllers;

use App\Models\KehadiranDetail;
use Illuminate\Http\Request;

class KehadiranDetailController extends Controller
{
    public function destroy(Request $id){
        $kehadiranDetail = KehadiranDetail::find($id);
        $kehadiranDetail->delete();

        return redirect()->back();
    }
}

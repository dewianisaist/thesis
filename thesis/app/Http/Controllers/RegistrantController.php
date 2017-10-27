<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Registrant;
use App\Http\Models\User;
use App\Http\Models\Upload;
use App\Http\Models\Education;
use App\Http\Models\Course;
use Auth;

class RegistrantController extends Controller
{
    public function index() {
        $registrant = new Registrant;
        $registrant->user_id = Auth::user()->id;
        $registrant->address = 'Jalan Kebahagiaan Jogja 98';
        $registrant->phone_number = '087839887651';
        $registrant->gender = 1;
        $registrant->place_birth = 'Jogja';
        $registrant->date_birth = '1993-10-10';
        $registrant->order_child = 2;
        $registrant->amount_sibling = 3;
        $registrant->religion = 1;
        $registrant->biological_mother_name = 'Tumini';
        $registrant->father_name = 'Wakijan';
        $registrant->parent_address = 'Jalan Seksama Wonosobo';
        $registrant->save();

        return $registrant;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\Director;

class DirectorController
{
    public function getColegio($id)
{
    $director = Director::with('colegio')->findOrFail($id);

    return response()->json($director);
}

}

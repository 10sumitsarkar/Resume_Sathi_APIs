<?php

namespace App\Http\Controllers;

use App\Models\ToolView;
use Illuminate\Http\Request;

class WhiteBoardController extends Controller
{
    public function white_board(){
        ToolView::addView(6);
        return view('frontend.board.white');
    }

    public function upload_board_file(Request $request){
        $content = $request->file('file')->get();
        return $content;
    }
}

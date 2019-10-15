<?php

namespace Gameusers\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class highscore extends Controller
{
    public Function getGames(){
        $datas = DB::table('games')->select('GameName')->distinct()->get();
        return view('highScore', ['games' => $datas]);
    }
    public function getConntent(Request $request){
        $gameName = $request->input('getGame');
        $datas = DB::select("SELECT games.id, highscore.Score, highscore.UsersID, users.Username, highscore.created_at 
                            FROM highscore, games, users 
                            WHERE games.GameName = '$gameName' AND highscore.GamesID = games.id AND users.id = highscore.UsersID 
                            ORDER BY highscore.Score DESC 
                            LIMIT 10");
        $output = "<table class='higscore_table'>";
        $output .= "
                    <tr>
                        <th class='table_cell'>Rang</th>
                        <th class='table_cell'>Score</th>
                        <th class='table_cell'>UserName</th>
                        <th class='table_cell'>Created at</th>
                    </tr>
                    ";
        $i = 1;
        foreach ($datas as $data){
            $output .= "<tr>";
            $output .= "<th class='table_cell'>".$i."</th>";
            $output .= "<th class='table_cell'>".$data->Score."</th>";
            $output .= "<th class='table_cell'>".$data->Username."</th>";
            $output .= "<th class='table_cell'>".$data->created_at."</th>";
            $output .="</tr>";
            $i++;
        }
        $output.= "</table>";
        return $output;
    }
}

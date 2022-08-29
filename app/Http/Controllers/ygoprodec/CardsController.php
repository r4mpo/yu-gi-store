<?php
namespace App\Http\Controllers\ygoprodec;
use App\Http\Controllers\Controller;

class CardsController extends Controller
{
    
    public function Index()
    {
        return view('welcome');
    }

    public function SearchCardsInApi($CountPage)
    {
        $ApiUrl = "https://db.ygoprodeck.com/api/v7/cardinfo.php?cardset=metal%20raiders&num=3&offset=$CountPage";
        $ApiCardsReturn = json_decode(file_get_contents($ApiUrl));
        return response()->json(['ApiCardsReturn' => $ApiCardsReturn]);
    }

    public function Show($id)
    {
        $dataCardUrl = "https://db.ygoprodeck.com/api/v7/cardinfo.php?id=$id";
        $dataCardReturn = json_decode(file_get_contents($dataCardUrl));
        $realDataCard = $dataCardReturn->data['0'];
        return view('cards.show', ['realDataCard' => $realDataCard]);
    }

    public function searchCards(){
        return view('cards.search');
    }

    public function searchCardsName($name)
    {
        $dataCardUrl = "https://db.ygoprodeck.com/api/v7/cardinfo.php?name=$name";
        $dataCardReturn = json_decode(file_get_contents($dataCardUrl));
        $realDataCard = $dataCardReturn->data['0'];
        return response()->json(['realDataCard' => $realDataCard]);
    }
}
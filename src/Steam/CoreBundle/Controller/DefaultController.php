<?php

namespace Steam\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Helpers\SteamAPI;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SteamCoreBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function testAction(Request $request)
    {
        $session    = $this->get('session');
        $games      = $session->get('xtressGames');
        $session->set('store', 'us');
        $request->setLocale('ru');
        $gameInfo   = array();
        $usedGames  = array();
        if ($games === null) {
            
            $api    = new SteamAPI("xtress");
            $games  = $api->getGames();
            $session->set('xtressGames', serialize($games));
            
        } else {
            $games  = unserialize($games);
        }
//        $ch = curl_init();
//        //Получаем нужную страницу в переменную $data
//        curl_setopt($ch, CURLOPT_URL, 'http://steamcommunity.com/app/202970'.'?cc=us');
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        $data = curl_exec($ch);
//        $gameArr = array();
//        for ($i = 0; $i < ; $i++) {
//            $gameArr[] = $games[$i];
//        }
        
        $lastAccessTime = $session->get('xtressGameInfoTime');
        $now = new \DateTime();
        
        if ($lastAccessTime === null || (int)$lastAccessTime->diff($now)->format('%s') > 300) {
            
            foreach($games as $game) {

                if (!array_key_exists($game['name'], $usedGames)) {

                    $gameInfo[$game['appID']]['name']         = $game['name'];
                    $gameInfo[$game['appID']]['logo']         = $game['logo'];
                    $gameInfo[$game['appID']]['storeLink']    = $game['storeLink'];
                    $gameInfo[$game['appID']]['price']        = $this->getGamePrice($game['storeLink']);
                    $usedGames[$game['name']]                 = '1';

                }

            }

            $session->set('xtressGameInfo', serialize($gameInfo));
            $accessTime = new \DateTime();
            $session->set('xtressGameInfoTime', $accessTime);
            
        } else {
            
            $gameInfo = unserialize($session->get('xtressGameInfo'));
            $accessTime = new \DateTime();
            $session->set('xtressGameInfoTime', $accessTime);
            
        }
        
        $price = null;
        foreach ($gameInfo as $game) {
            
            if ($game['price'] !== 'Free to Play')
                $price += substr($game['price'],5);
            
        }
        
        return $this->render('SteamCoreBundle:Default:games.html.twig', array(
            'games' => $gameInfo,
            'price' => $price,
        ));
    }
    
    private function getGamePrice($gameUrl, $storeString = '?cc=us')
    {
        $gameCommunityPage  = file_get_contents($gameUrl.$storeString);
        $gamePriceDivPos    = stripos($gameCommunityPage, '<div class="apphub_StorePrice">');
        if (false !== $gamePriceDivPos) {
            
            $priceDiv   = substr($gameCommunityPage, $gamePriceDivPos, 300);
            if (false !== stripos($priceDiv, '<div class="discount_original_price">')) {
                $origPrice      = substr($priceDiv, stripos($priceDiv, '<div class="discount_original_price">'), 53);
                $discountPrice  = substr($priceDiv, stripos($priceDiv, '<div class="discount_final_price">'), 50);
            } else
                $origPrice      = substr($priceDiv, 0, 76);
            
        } else {
            
            unset($gameCommunityPage);
            $gameAppID          = explode('/', $gameUrl);
            $gameAppID          = $gameAppID[count($gameAppID)-1];
            $gameStorePage      = file_get_contents('http://store.steampowered.com/app/'.$gameAppID.$storeString);
            $gamePriceDivPos    = stripos($gameStorePage, '<div class="game_purchase_price price"');
            $origPrice          = substr($gameStorePage, $gamePriceDivPos, 77);
            
            
        }
        
        return trim(strip_tags($origPrice));
    }
}

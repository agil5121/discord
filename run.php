<?php

error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
require_once(dirname(__FILE__) . '/vendor/autoload.php');
 
$colors = new \Colors();
use Curl\Curl;

 
echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [*] List Menu: 1). Get Token Account'.PHP_EOL;
echo '                            2). Push #check-level or #check-invite only (commands)'.PHP_EOL;
echo '                            3). Push Rank With Auto Delete Chat (Random Teks)'.PHP_EOL;
echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [?] Input Menu: ';
$firstMenu = trim(fgets(STDIN));
echo '---------------------------------------------------------------------'.PHP_EOL;
if(strtolower($firstMenu) == "1") {
    echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [?] Email: ';
    $email = trim(fgets(STDIN));
    echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [?] Password: ';
    $password = trim(fgets(STDIN));
    $curl = new Curl();
    $curl->setHeader('Host', 'discord.com');
    $curl->setHeader('authorization', 'undefined');
    $curl->setHeader('Content-Type', 'application/json');
    $curl->post('https://discord.com/api/v9/auth/login', [
        'login' => $email,
        'password' => $password,
        'undelete' => false,
        'captcha_key' => null,
        'login_source' => null,
        'gift_code_sku_id' => null,
            ]);
    if ($curl->error) {
        die('['.$colors->getColoredString(date('H:i:s'), 'green').'] | [!] Login Failed!!'.PHP_EOL);
    } else {
        $token = $curl->response->token;
        $curl = new Curl();
        $curl->setUserAgent('Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) discord/0.0.309 Chrome/83.0.4103.122 Electron/9.3.5 Safari/537.36');
        $curl->setHeader('Host', 'discord.com');
        $curl->setHeader('Connection', 'keep-alive');
        $curl->setHeader('X-Super-Properties', 'eyJvcyI6IldpbmRvd3MiLCJicm93c2VyIjoiQ2hyb21lIiwiZGV2aWNlIjoiIiwic3lzdGVtX2xvY2FsZSI6ImlkLUlEIiwiYnJvd3Nlcl91c2VyX2FnZW50IjoiTW96aWxsYS81LjAgKFdpbmRvd3MgTlQgMTAuMDsgV2luNjQ7IHg2NCkgQXBwbGVXZWJLaXQvNTM3LjM2IChLSFRNTCwgbGlrZSBHZWNrbykgQ2hyb21lLzk1LjAuNDYzOC42OSBTYWZhcmkvNTM3LjM2IiwiYnJvd3Nlcl92ZXJzaW9uIjoiOTUuMC40NjM4LjY5Iiwib3NfdmVyc2lvbiI6IjEwIiwicmVmZXJyZXIiOiIiLCJyZWZlcnJpbmdfZG9tYWluIjoiIiwicmVmZXJyZXJfY3VycmVudCI6IiIsInJlZmVycmluZ19kb21haW5fY3VycmVudCI6IiIsInJlbGVhc2VfY2hhbm5lbCI6InN0YWJsZSIsImNsaWVudF9idWlsZF9udW1iZXIiOjEwNDE0NCwiY2xpZW50X2V2ZW50X3NvdXJjZSI6bnVsbH0=');
        $curl->setHeader('Authorization', ''.$token.'');
        $curl->setHeader('Accept-Language', 'en-US');
        $curl->setHeader('Content-Type', 'application/json');
        $curl->setHeader('Accept', '/');
        $curl->setHeader('Origin', 'https://discord.com');
        $curl->setHeader('Sec-Fetch-Site', 'same-origin');
        $curl->setHeader('Sec-Fetch-Mode', 'cors');
        $curl->setHeader('Cookie', '__dcfduid=67fb3b701b7e11ec81b0e71d636e2a74; __sdcfduid=67fb3b711b7e11ec81b0e71d636e2a74dd1348e9b919c73ab7d69c0ba2cb34237994baa2d4b15cbb955ce54d227010a9; _gcl_au=1.1.1614913359.1632299031; _ga=GA1.2.2087218998.1632299032; _fbp=fb.1.1632299036476.947492841; __stripe_mid=221f42e3-b519-428c-ad2c-b1fd01b5b7962cef22; _gid=GA1.2.244866263.1636354926; OptanonConsent=isIABGlobal=false&datestamp=Tue+Nov+09+2021+18:34:11+GMT+0800+(Waktu+Standar+Singapura)&version=6.17.0&hosts=&landingPath=NotLandingPage&groups=C0001:1,C0002:1,C0003:1&AwaitingReconsent=false; locale=en-US; _gat_UA-53577205-2=1');
        $curl->setOpt(CURLOPT_ENCODING, '');
        $curl->get('https://discord.com/api/v9/users/@me');
        echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [*] Login Success, Your Token '. $colors->getColoredString($token, 'white', 'green').' And ID Account '.$colors->getColoredString($curl->response->id, 'white', 'green').' Saved in File token.json'.PHP_EOL;
        if(!file_exists("token.json")) {
            file_put_contents("token.json", json_encode([
                'Authorization' => $token,
                'id_account' => $curl->response->id,
            ]));
            }   
        }
        } elseif(strtolower($firstMenu) == "2") {
            if(!file_exists("token.json")) {
                die('['.$colors->getColoredString(date('H:i:s'), 'green').'] | [!] Please Get Token Account before run this script!'.PHP_EOL);
            } else {
            echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [*] Push #check-level or #check-invite only (commands)'.PHP_EOL;
            echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [?] Channel ID: ';
            $channelID = trim(fgets(STDIN));
            echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [?] Commands (ex: !rank, -rank, !invites, etc): ';
            $content = trim(fgets(STDIN));
            echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [?] Delay (seconds): ';
            $delay = trim(fgets(STDIN));
            $readToken  = json_decode(file_get_contents("token.json"), true);
            while (-1) {
                sleep($delay);
                $curl = new Curl();
                $curl->setUserAgent('Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) discord/0.0.309 Chrome/83.0.4103.122 Electron/9.3.5 Safari/537.36');
                $curl->setHeader('Host', 'discord.com');
                $curl->setHeader('Connection', 'keep-alive');
                $curl->setHeader('X-Super-Properties', 'eyJvcyI6IldpbmRvd3MiLCJicm93c2VyIjoiQ2hyb21lIiwiZGV2aWNlIjoiIiwic3lzdGVtX2xvY2FsZSI6ImlkLUlEIiwiYnJvd3Nlcl91c2VyX2FnZW50IjoiTW96aWxsYS81LjAgKFdpbmRvd3MgTlQgMTAuMDsgV2luNjQ7IHg2NCkgQXBwbGVXZWJLaXQvNTM3LjM2IChLSFRNTCwgbGlrZSBHZWNrbykgQ2hyb21lLzk1LjAuNDYzOC42OSBTYWZhcmkvNTM3LjM2IiwiYnJvd3Nlcl92ZXJzaW9uIjoiOTUuMC40NjM4LjY5Iiwib3NfdmVyc2lvbiI6IjEwIiwicmVmZXJyZXIiOiIiLCJyZWZlcnJpbmdfZG9tYWluIjoiIiwicmVmZXJyZXJfY3VycmVudCI6IiIsInJlZmVycmluZ19kb21haW5fY3VycmVudCI6IiIsInJlbGVhc2VfY2hhbm5lbCI6InN0YWJsZSIsImNsaWVudF9idWlsZF9udW1iZXIiOjEwNDE0NCwiY2xpZW50X2V2ZW50X3NvdXJjZSI6bnVsbH0=');
                $curl->setHeader('Authorization', ''.$readToken['Authorization'].'');
                $curl->setHeader('Accept-Language', 'en-US');
                $curl->setHeader('Content-Type', 'application/json');
                $curl->setHeader('Accept', '/');
                $curl->setHeader('Origin', 'https://discord.com');
                $curl->setHeader('Sec-Fetch-Site', 'same-origin');
                $curl->setHeader('Sec-Fetch-Mode', 'cors');
                $curl->setHeader('Cookie', '__dcfduid=67fb3b701b7e11ec81b0e71d636e2a74; __sdcfduid=67fb3b711b7e11ec81b0e71d636e2a74dd1348e9b919c73ab7d69c0ba2cb34237994baa2d4b15cbb955ce54d227010a9; _gcl_au=1.1.1614913359.1632299031; _ga=GA1.2.2087218998.1632299032; _fbp=fb.1.1632299036476.947492841; __stripe_mid=221f42e3-b519-428c-ad2c-b1fd01b5b7962cef22; _gid=GA1.2.244866263.1636354926; OptanonConsent=isIABGlobal=false&datestamp=Tue+Nov+09+2021+18:34:11+GMT+0800+(Waktu+Standar+Singapura)&version=6.17.0&hosts=&landingPath=NotLandingPage&groups=C0001:1,C0002:1,C0003:1&AwaitingReconsent=false; locale=en-US; _gat_UA-53577205-2=1');
                $curl->setOpt(CURLOPT_ENCODING, '');
                $curl->post('https://discord.com/api/v9/channels/'.$channelID.'/messages', [
                    'content' => $content,
                    'nonce' => rand(80000000000000000, 99999999999999999),
                    'tts' => false,
                ]);
                if ($curl->error) {
                    if ($curl->errorCode == 429) {
                       file_put_contents("notice.txt", "error");
 
                    } else {
                        echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [!] Error: '.$colors->getColoredString($curl->errorCode, 'red').' : '.$colors->getColoredString($curl->errorMessage, 'red').''.PHP_EOL;
                    }
                } else {
                        echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [*] Success Send '.$colors->getColoredString(rtrim($content), 'green').' To Channel ID '.$colors->getColoredString($channelID, 'green').''.PHP_EOL;  
                }
            }
            }
        } elseif(strtolower($firstMenu) == "3") {
            if(!file_exists("token.json")) {
                die('['.$colors->getColoredString(date('H:i:s'), 'green').'] | [!] Please Get Token Account before run this script!'.PHP_EOL);
            } else {
            echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [*] Push Rank With Auto Delete Chat (Random Teks)'.PHP_EOL;
            echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [?] Servers ID: ';
            $IDguild = trim(fgets(STDIN));
            echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [*] Multiple Send Channel? Use "|" without "'.PHP_EOL;
            echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [?] Channel ID: ';
            $listChannel = trim(fgets(STDIN));
            $list = explode('|', $listChannel);
            echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [?] Delay (seconds): ';
            $delay = trim(fgets(STDIN));
            echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [?] With Auto Delete (y/N): ';
            $autoDelete = trim(fgets(STDIN));
            chat:
            $readToken  = json_decode(file_get_contents("token.json"), true);
            while (-1) {
                sleep($delay);
                $curl = new Curl();
                $channelID = $list[mt_rand(0, count($list)-1)];
                $fileTeks = file("teksRandom.txt"); 
                $content = $fileTeks[rand(0, count($fileTeks) - 1)];
                $curl->setUserAgent('Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) discord/0.0.309 Chrome/83.0.4103.122 Electron/9.3.5 Safari/537.36');
                $curl->setHeader('Host', 'discord.com');
                $curl->setHeader('Connection', 'keep-alive');
                $curl->setHeader('X-Super-Properties', 'eyJvcyI6IldpbmRvd3MiLCJicm93c2VyIjoiQ2hyb21lIiwiZGV2aWNlIjoiIiwic3lzdGVtX2xvY2FsZSI6ImlkLUlEIiwiYnJvd3Nlcl91c2VyX2FnZW50IjoiTW96aWxsYS81LjAgKFdpbmRvd3MgTlQgMTAuMDsgV2luNjQ7IHg2NCkgQXBwbGVXZWJLaXQvNTM3LjM2IChLSFRNTCwgbGlrZSBHZWNrbykgQ2hyb21lLzk1LjAuNDYzOC42OSBTYWZhcmkvNTM3LjM2IiwiYnJvd3Nlcl92ZXJzaW9uIjoiOTUuMC40NjM4LjY5Iiwib3NfdmVyc2lvbiI6IjEwIiwicmVmZXJyZXIiOiIiLCJyZWZlcnJpbmdfZG9tYWluIjoiIiwicmVmZXJyZXJfY3VycmVudCI6IiIsInJlZmVycmluZ19kb21haW5fY3VycmVudCI6IiIsInJlbGVhc2VfY2hhbm5lbCI6InN0YWJsZSIsImNsaWVudF9idWlsZF9udW1iZXIiOjEwNDE0NCwiY2xpZW50X2V2ZW50X3NvdXJjZSI6bnVsbH0=');
                $curl->setHeader('Authorization', ''.$readToken['Authorization'].'');
                $curl->setHeader('Accept-Language', 'en-US');
                $curl->setHeader('Content-Type', 'application/json');
                $curl->setHeader('Accept', '/');
                $curl->setHeader('Origin', 'https://discord.com');
                $curl->setHeader('Sec-Fetch-Site', 'same-origin');
                $curl->setHeader('Sec-Fetch-Mode', 'cors');
                $curl->setHeader('Cookie', '__dcfduid=67fb3b701b7e11ec81b0e71d636e2a74; __sdcfduid=67fb3b711b7e11ec81b0e71d636e2a74dd1348e9b919c73ab7d69c0ba2cb34237994baa2d4b15cbb955ce54d227010a9; _gcl_au=1.1.1614913359.1632299031; _ga=GA1.2.2087218998.1632299032; _fbp=fb.1.1632299036476.947492841; __stripe_mid=221f42e3-b519-428c-ad2c-b1fd01b5b7962cef22; _gid=GA1.2.244866263.1636354926; OptanonConsent=isIABGlobal=false&datestamp=Tue+Nov+09+2021+18:34:11+GMT+0800+(Waktu+Standar+Singapura)&version=6.17.0&hosts=&landingPath=NotLandingPage&groups=C0001:1,C0002:1,C0003:1&AwaitingReconsent=false; locale=en-US; _gat_UA-53577205-2=1');
                $curl->setOpt(CURLOPT_ENCODING, '');
                $curl->post('https://discord.com/api/v9/channels/'.$channelID.'/messages', [
                    'content' => $content,
                    'nonce' => rand(80000000000000000, 99999999999999999),
                    'tts' => false,
                ]);
                if ($curl->error) {
                    if ($curl->errorCode == 429) {
                       file_put_contents("notice.txt", "error");
 
                    } else {
                        echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [!] Error: '.$colors->getColoredString($curl->errorCode, 'red').' : '.$colors->getColoredString($curl->errorMessage, 'red').''.PHP_EOL;
                    }
                } else {
                    echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [*] Success Send "'.$colors->getColoredString(rtrim($content), 'green').'" To Channel ID '.$colors->getColoredString($channelID, 'green').''.PHP_EOL; 
                    if($autoDelete == 'y') {
                        echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [*] Waiting To Delete Chat....'.PHP_EOL; 
                        sleep($delay);
                        $curl = new Curl();
                        $curl->setUserAgent('Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) discord/0.0.309 Chrome/83.0.4103.122 Electron/9.3.5 Safari/537.36');
                        $curl->setHeader('Host', 'discord.com');
                        $curl->setHeader('Connection', 'keep-alive');
                        $curl->setHeader('X-Super-Properties', 'eyJvcyI6IldpbmRvd3MiLCJicm93c2VyIjoiQ2hyb21lIiwiZGV2aWNlIjoiIiwic3lzdGVtX2xvY2FsZSI6ImlkLUlEIiwiYnJvd3Nlcl91c2VyX2FnZW50IjoiTW96aWxsYS81LjAgKFdpbmRvd3MgTlQgMTAuMDsgV2luNjQ7IHg2NCkgQXBwbGVXZWJLaXQvNTM3LjM2IChLSFRNTCwgbGlrZSBHZWNrbykgQ2hyb21lLzk1LjAuNDYzOC42OSBTYWZhcmkvNTM3LjM2IiwiYnJvd3Nlcl92ZXJzaW9uIjoiOTUuMC40NjM4LjY5Iiwib3NfdmVyc2lvbiI6IjEwIiwicmVmZXJyZXIiOiIiLCJyZWZlcnJpbmdfZG9tYWluIjoiIiwicmVmZXJyZXJfY3VycmVudCI6IiIsInJlZmVycmluZ19kb21haW5fY3VycmVudCI6IiIsInJlbGVhc2VfY2hhbm5lbCI6InN0YWJsZSIsImNsaWVudF9idWlsZF9udW1iZXIiOjEwNDE0NCwiY2xpZW50X2V2ZW50X3NvdXJjZSI6bnVsbH0=');
                        $curl->setHeader('Authorization', ''.$readToken['Authorization'].'');
                        $curl->setHeader('Accept-Language', 'en-US');
                        $curl->setHeader('Content-Type', 'application/json');
                        $curl->setHeader('Accept', '/');
                        $curl->setHeader('Origin', 'https://discord.com');
                        $curl->setHeader('Sec-Fetch-Site', 'same-origin');
                        $curl->setHeader('Sec-Fetch-Mode', 'cors');
                        $curl->setHeader('Cookie', '__dcfduid=67fb3b701b7e11ec81b0e71d636e2a74; __sdcfduid=67fb3b711b7e11ec81b0e71d636e2a74dd1348e9b919c73ab7d69c0ba2cb34237994baa2d4b15cbb955ce54d227010a9; _gcl_au=1.1.1614913359.1632299031; _ga=GA1.2.2087218998.1632299032; _fbp=fb.1.1632299036476.947492841; __stripe_mid=221f42e3-b519-428c-ad2c-b1fd01b5b7962cef22; _gid=GA1.2.244866263.1636354926; OptanonConsent=isIABGlobal=false&datestamp=Tue+Nov+09+2021+18:34:11+GMT+0800+(Waktu+Standar+Singapura)&version=6.17.0&hosts=&landingPath=NotLandingPage&groups=C0001:1,C0002:1,C0003:1&AwaitingReconsent=false; locale=en-US; _gat_UA-53577205-2=1');
                        $curl->setOpt(CURLOPT_ENCODING, '');
                        $curl->get('https://discord.com/api/v9/guilds/'.$IDguild.'/messages/search?author_id='.$readToken['id_account'].'&include_nsfw=false');  
                        $total = $curl->response->total_results;
                        $idMsg = $curl->response->messages[0][0]->id;
                        //print_r($a);
 
                        $curl = new Curl();
                        $curl->setUserAgent('Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) discord/0.0.309 Chrome/83.0.4103.122 Electron/9.3.5 Safari/537.36');
                        $curl->setHeader('Host', 'discord.com');
                        $curl->setHeader('Connection', 'keep-alive');
                        $curl->setHeader('X-Super-Properties', 'eyJvcyI6IldpbmRvd3MiLCJicm93c2VyIjoiQ2hyb21lIiwiZGV2aWNlIjoiIiwic3lzdGVtX2xvY2FsZSI6ImlkLUlEIiwiYnJvd3Nlcl91c2VyX2FnZW50IjoiTW96aWxsYS81LjAgKFdpbmRvd3MgTlQgMTAuMDsgV2luNjQ7IHg2NCkgQXBwbGVXZWJLaXQvNTM3LjM2IChLSFRNTCwgbGlrZSBHZWNrbykgQ2hyb21lLzk1LjAuNDYzOC42OSBTYWZhcmkvNTM3LjM2IiwiYnJvd3Nlcl92ZXJzaW9uIjoiOTUuMC40NjM4LjY5Iiwib3NfdmVyc2lvbiI6IjEwIiwicmVmZXJyZXIiOiIiLCJyZWZlcnJpbmdfZG9tYWluIjoiIiwicmVmZXJyZXJfY3VycmVudCI6IiIsInJlZmVycmluZ19kb21haW5fY3VycmVudCI6IiIsInJlbGVhc2VfY2hhbm5lbCI6InN0YWJsZSIsImNsaWVudF9idWlsZF9udW1iZXIiOjEwNDE0NCwiY2xpZW50X2V2ZW50X3NvdXJjZSI6bnVsbH0=');
                        $curl->setHeader('Authorization', ''.$readToken['Authorization'].'');
                        $curl->setHeader('Accept-Language', 'en-US');
                        $curl->setHeader('Content-Type', 'application/json');
                        $curl->setHeader('Accept', '/');
                        $curl->setHeader('Origin', 'https://discord.com');
                        $curl->setHeader('Sec-Fetch-Site', 'same-origin');
                        $curl->setHeader('Sec-Fetch-Mode', 'cors');
                        $curl->setHeader('Cookie', '__dcfduid=67fb3b701b7e11ec81b0e71d636e2a74; __sdcfduid=67fb3b711b7e11ec81b0e71d636e2a74dd1348e9b919c73ab7d69c0ba2cb34237994baa2d4b15cbb955ce54d227010a9; _gcl_au=1.1.1614913359.1632299031; _ga=GA1.2.2087218998.1632299032; _fbp=fb.1.1632299036476.947492841; __stripe_mid=221f42e3-b519-428c-ad2c-b1fd01b5b7962cef22; _gid=GA1.2.244866263.1636354926; OptanonConsent=isIABGlobal=false&datestamp=Tue+Nov+09+2021+18:34:11+GMT+0800+(Waktu+Standar+Singapura)&version=6.17.0&hosts=&landingPath=NotLandingPage&groups=C0001:1,C0002:1,C0003:1&AwaitingReconsent=false; locale=en-US; _gat_UA-53577205-2=1');
                        $curl->setOpt(CURLOPT_ENCODING, '');
                        $curl->delete('https://discord.com/api/v9/channels/'.$channelID.'/messages/'.$idMsg.'');  
                        if($total) {
                            echo '['.$colors->getColoredString(date('H:i:s'), 'green').'] | [*] Success Delete Chat!'.PHP_EOL; 
                        } else {
                            goto chat;
                        }
                    }
                }
            }
            }
} else {
    die('['.$colors->getColoredString(date('H:i:s'), 'green').'] | [!] Menu Not Found'.PHP_EOL);
}
 
 
class Colors {
    private $foreground_colors = array();
      private $background_colors = array();
 
      public function __construct() {
          // Set up shell colors
          $this->foreground_colors['black'] = '0;30';
          $this->foreground_colors['dark_gray'] = '1;30';
          $this->foreground_colors['blue'] = '0;34';
          $this->foreground_colors['light_blue'] = '1;34';
          $this->foreground_colors['green'] = '0;32';
          $this->foreground_colors['light_green'] = '1;32';
          $this->foreground_colors['cyan'] = '0;36';
          $this->foreground_colors['light_cyan'] = '1;36';
          $this->foreground_colors['red'] = '0;31';
          $this->foreground_colors['light_red'] = '1;31';
          $this->foreground_colors['purple'] = '0;35';
          $this->foreground_colors['light_purple'] = '1;35';
          $this->foreground_colors['brown'] = '0;33';
          $this->foreground_colors['yellow'] = '1;33';
          $this->foreground_colors['light_gray'] = '0;37';
          $this->foreground_colors['white'] = '1;37';
 
          $this->background_colors['black'] = '40';
          $this->background_colors['red'] = '41';
          $this->background_colors['green'] = '42';
          $this->background_colors['yellow'] = '43';
          $this->background_colors['blue'] = '44';
          $this->background_colors['magenta'] = '45';
          $this->background_colors['cyan'] = '46';
          $this->background_colors['light_gray'] = '47';
      }
 
      // Returns colored string
      public function getColoredString($string, $foreground_color = null, $background_color = null) {
          $colored_string = "";
 
          // Check if given foreground color found
          if (isset($this->foreground_colors[$foreground_color])) {
              $colored_string .= "\033[" . $this->foreground_colors[$foreground_color] . "m";
          }
          // Check if given background color found
          if (isset($this->background_colors[$background_color])) {
              $colored_string .= "\033[" . $this->background_colors[$background_color] . "m";
          }
 
          // Add string and end coloring
          $colored_string .=  $string . "\033[0m";
 
          return $colored_string;
      }
 
      // Returns all foreground color names
      public function getForegroundColors() {
          return array_keys($this->foreground_colors);
      }
 
      // Returns all background color names
      public function getBackgroundColors() {
          return array_keys($this->background_colors);
      }
  }
  ?>
<?php


namespace App\Http\Controllers\Oauth;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use function PHPUnit\Framework\throwException;

class InstagramController
{
    public function __invoke()
    {
        $instaLink = "https://api.instagram.com/oauth/access_token";
        $instaparameters = [
            'client_id'     => env('OAUTH_INSTA_CLIENT_ID'),
            'client_secret' => env('OAUTH_INSTA_CLIENT_SECRET'),
            'redirect_uri'  => env('OAUTH_INSTA_REDIRECT_URI'),
            'grant_type'    => 'authorization_code',
            'code'          => request()->get('code'),

        ];

        $response = Http::asForm()->post("https://api.instagram.com/oauth/access_token", $instaparameters);

        if (!$response->ok()) {

        }

        $idInfo = "https://graph.instagram.com/me";
        $data = [
            'fields'       => 'username',
            'access_token' => $response['access_token'],

        ];
        $idInfo .= '?' . http_build_query($data);
        $response = Http::get($idInfo);

        $user = $response->json();

        $username = $user['username'];
//        dd($username);
        $id = $user['id'];

//        dd($username);
        if (null === ($user = User::where('name', $username)->first())) {
        $data = [
                'name' => $username,
//                'id' => $id,
//                'password' => Hash::make($user['id'])
            ];
                $user= User::create($data);
        }

        Auth::login($user);
        return redirect()->route( 'home');
    }
}


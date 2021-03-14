<?php


namespace App\Http\Controllers\Oauth;

use App\Models\User;
//use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Mockery\Matcher\HasKey;

class GitHubController
{
    public function __invoke()
    {
        $link = 'https://github.com/login/oauth/access_token';
        $parameters = [
            'client_id'     => env('OAUTH_GITHUB_CLIENT_ID'),
            'client_secret' => env('OAUTH_GITHUB_CLIENT_SECRET'),
            'redirect_uri'  => env('OAUTH_GITHUB_REDIRECT_URI'),
            'code'          => request()->get('code'),
        ];
        $link .= '?' . http_build_query($parameters);
        $response = Http::post($link);

        $data = [];
        parse_str($response->body(), $data);
        $response = Http::withHeaders(['Authorization' => 'token ' . $data['access_token']])->get('https://api.github.com/user');
$userInfo = $response->json();
//dd($userInfo);
        $response = Http::withHeaders(['Authorization' => 'token ' . $data['access_token']])->get('https://api.github.com/user/emails');
        $userEmails = $response->json();
        $email = $userEmails[0]['email'];
        if (null === ($user = User::where('email', $email)->first())){
            $data = [
                'name' => $userInfo['name'],
                'email' => $email,
                'password' => Hash::make($userInfo['node_id'])
            ];
                $user= User::create($data);
        }
        Auth::login($user);
        return redirect()->route('home');

    }
}

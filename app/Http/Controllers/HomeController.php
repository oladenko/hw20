<?php


namespace App\Http\Controllers;


use App\Models\Post;
use Dotenv\Repository\RepositoryBuilder;

class HomeController
{
    public function __invoke()
    {


        $gitHubLink = "https://github.com/login/oauth/authorize";
        $parameters = [
            'client_id'    => env('OAUTH_GITHUB_CLIENT_ID'),
            'redirect_uri' => env('OAUTH_GITHUB_REDIRECT_URI'),
            'scope'        => 'user,user:email',
        ];
        $gitHubLink .= '?' . http_build_query($parameters);
//          dd($gitHubLink);
        $instaLink = "https://api.instagram.com/oauth/authorize";
        $instaparameters = [
            'client_id' => env('OAUTH_INSTA_CLIENT_ID'),

            'redirect_uri'  => env('OAUTH_INSTA_REDIRECT_URI'),
            'scope'         => 'user_profile,user_media',
            'response_type' => 'code'
        ];
        $instaLink .= '?' . http_build_query($instaparameters);
//       dd($instaLink);
        $posts = Post::paginate(15);
        return view('pages.posts', compact('posts', 'gitHubLink', 'instaLink'));

    }
}

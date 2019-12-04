<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('directory')) {
            $directory = $request->directory;
        } else {
            $directory = "public";
        }

        $directories = Storage::directories($directory);
        $files = Storage::files($directory);

        return view('welcome', ['directories' => $directories, 'files' => $files]);
    }

    public function openFile(Request $request)
    {
        $url = config('app.url');

        $prepare_file_path = explode('/', $request->link);
        $file_path = "";
        for ($i = 1; $i <= count($prepare_file_path) - 1; $i++) {
            $file_path .= "/" . $prepare_file_path[$i];
        }

        return $url . ":" . $_SERVER['SERVER_PORT'] . "/storage" . $file_path;
    }
}

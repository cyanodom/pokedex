<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;

class APITNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $return_val = array();
        $filename=storage_path("bruf.TN");
        $content = File::get($filename);
        $i = 0;
        foreach(preg_split("/((\r?\n)|(\r\n?))/", $content) as $line) {
            if (strlen($line) == 3) {
                array_push($return_val, array($content[4 * $i],
                $content[4 * $i + 1] == 'V'? TRUE : FALSE,
                $content[4 * $i + 2] == 'V'? TRUE : FALSE));
            }
            $i = $i + 1;
        }

        return response()->json($return_val);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $vars = json_decode($request->getContent(), true);
        $t = $vars['t'];
        $letter = $vars['w'];
        $mytime = Carbon::now();
        $date = $mytime->toDateTimeString();
        if ($t) {
            $of = 1;
        } else {
            $of = 2;
        }
        $filename=storage_path("bruf.TN");
        $content = File::get($filename);
        $i = 0;
        $found = FALSE;
        foreach(preg_split("/((\r?\n)|(\r\n?))/", $content) as $line) {
            if (strlen($line) == 3) {
               if ($letter == $line[0]) {
                    $content[4*$i + $of] = $content[4*$i + $of] == 'X' ? 'V' : 'X';

                    file_put_contents('../storage/pof.lTN',
                        $date . " : Changed letter " . $letter . " to " . $content[4*$i + $of] . " for " . $t . "\n",
                        FILE_APPEND);

                    file_put_contents('../storage/bruf.TN',$content);
                    $found = TRUE;
               }
            }
            $i = $i + 1;
        }
        if (!$found) {
            $log = fopen('../storage/pof.lTN', 'a');
            fwrite($log, $date . " : tries letter= " . $letter . " for " . $t . "\n");
            fclose($log);
        }
        return $found ? "OK" : "KO";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

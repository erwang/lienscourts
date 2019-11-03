<?php

namespace App\Http\Controllers;

use App\Link;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->can('create',Link::class)){
            $link = new Link($request->toArray());
            $link->user_id = Auth::user()->id;
            $link->save();
            Session::put('link',$link);
        }else{
            Message::addWarning('Vous n\'êtes pas autorisé à créer de nouveaux liens');
        }
        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $item)
    {
        if(Auth::user()->can('delete',$item)) {
            $item->logs()->delete();
            $item->delete();
        }
        return redirect(route('dashboard'));
    }

    /**
     * @param Link $link
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function qrcode(Link $link)
    {
        if(Auth::user()->can('view',$link)) {
            if(!Storage::disk('public')->exists($link->getQrcodeFilename(false))){
                Storage::disk('public')->put($link->getQrcodeFilename(false),
                    QrCode::encoding('UTF-8')
                        ->format('png')
                        ->size(300)
                        ->generate($link->getCompleteShorturl()));
            }
            return view('links.qrcode',['link'=>$link]);
        }else{
            abort(404);
        }
    }
    public function graph(Link $link)
    {
        if(Auth::user()->can('view',$link)) {
            $logs = $link->getLogsForGraph();
            return view('links.graph', ['link' => $link, 'logs' => $logs]);
        }else{
            abort(404);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;

class MapController extends Controller
{
    //
    public function index(Request $request)
    {
      if ($request->getMethod() == 'GET' && isset($request->ajax)) {
        // code...
        Mapper::map(53.381128999999990000, -1.470085000000040000);
        return Mapper::render();
      }
      Mapper::map(53.381128999999990000, -1.470085000000040000);
      $markers = [
        Mapper::marker(6.2437548, 3.4859518),
        Mapper::marker(6.1437548, 3.4859518, ['symbol' => 'circle', 'scale' => 1000]),
        Mapper::marker(6.5437548, 3.4859518, ['markers' => ['symbol' => 'circle', 'scale' => 1000, 'animation' => 'DROP']])
      ];
      $options = Array('latitude' => 6.4437548, 'longitude' => 3.4859518, 'center' => true, 'symbol' => 'circle', 'scale' => 1000, 'animation' => 'DROP',
       'tilt' => 45, 'type' => 'roadmap ','zoom' => 2, 'ui' => true, 'scrollWheelZoom' => false, 'zoomControl' => true, 'mapTypeControl' => true,
       'scaleControl' => true, 'streetViewControl' => false, 'rotateControl' => false, 'fullscreenControl' => false,
       'markers' => $markers);
      $id = 'test';
      $view = 'ROADMAP';

      return view('cornford.googlmapper.map', compact('id', 'options', 'view'));
    }
}

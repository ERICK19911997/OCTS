<?php
/*
 * Copyright (c) 2017 Teratech
 * All rights reserved.
 * Date: 6/14/2017
 * Time: 9:20 AM
 */
/** @var $this \yii\web\View */
/* @var $cars \app\models\Car[] */
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use themes\metronic\helpers\Html;
use yii\helpers\Url;

$this->title = "Tracking";
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$coord = new LatLng(['lat' => -6.77104095, 'lng' => 39.2399945]);
$map = new Map([
    'center' => $coord,
    'zoom' => 13,
    'width' => '100%',
    'height' => '100%'
]);
$markers = [];
foreach ($cars as $car) {
    $lat = $car->last_lat;
    $lng = $car->last_lng;

    if ($lat && $lng) {
        $ltlg = new LatLng(['lat' => $lat, 'lng' => $lng]);
        $icon = Url::to(['/img/bus-ok-x64.png']);
        $marker = new Marker([
            'position' => $ltlg,
            'title' => $car['reg_no'],
            'icon' => $icon
        ]);
        $reg = $car->reg_no;
        $weight = $car->model;
        $type = $car->driver;
        $marker->attachInfoWindow(
            new InfoWindow([
                'content' => <<<HTML
            <li><strong>Reg No</strong>:$reg</li>
            <li><strong>Model</strong>:$weight</li>
            <li><strong>Driver</strong>:$type</li>
        </ul>
HTML
            ])
        );
        $map->addOverlay($marker);
        $markers [$marker->getName()] = $car->reg_no;

    }

}
$url = Url::to(["client/update-map"]);
$str = '';
foreach ($markers as $marker => $uuid) {
    $str .= "var marker = data['$uuid'];
    var pos = new google.maps.LatLng(marker.lat, marker.lng);
    $marker.setPosition(pos);";
}
$map->appendScript(<<<JS
    $(document).ready(function () {
        setInterval(function () {
            $.ajax('$url', {
                'success': function (response) {
                    var data = JSON.parse(response);
                    $str
                }
            });
        }, 3000);
    })
JS
)

?>
<div>
    <div class="wrapper-md">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i><?= Html::encode($this->title) ?>
                </div>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body">
                <div id="map-canvas" style="height:700px;">
                    <?= $map->display() ?>
                </div>
            </div>
        </div>
    </div>
</div>

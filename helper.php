<?php

/*
 * A friendly helper
 */

/**
 * @return yii\web\Request Description
 */
function request() {
    return Yii::$app->request;
}

/**
 * @return [] Post request parameters
 */
function post($name = NULL, $default = NULL) {
    return Yii::$app->request->post($name, $default);
}

/**
 * @return  [] Get request parameters
 */
function get($name = NULL, $default) {
    return Yii::$app->request->get($name, $default);
}

/**
 * @return yii\web\User Description
 */
function user() {
    return Yii::$app->user;
}

function flash($key, $message) {
    \Yii::$app->getSession()->setFlash($key, $message);
}

function flashSuccess($message) {
    flash("success", $message);
}

function flashError($message) {
    flash("error", $message);
}

function flashWarning($message) {
    flash("warning", $message);
}

function session($id, $value = FALSE) {
    if ($value == FALSE) {
        if (isset($_SESSION[$id])) {
            return $_SESSION[$id];
        }
    } else {
        $_SESSION[$id] = $value;
    }
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

/* Contains common useful functions

 * Purpose: 	To make a cURL call to REST API
 * Inputs:
 * 		curlServiceUrl    : the service URL for the REST api
 *       curlHeader        : the header parameters specific to the REST api call
 *       curlPostData      : the post parameters encoded in the form required by the api (json_encode or http_build_query)
 * Returns:                the json decoded result from the REST api call
 */

function curlCall($curlServiceUrl, $curlHeader, $curlPostData) {

    //set the cURL parameters
    $ch = curl_init($curlServiceUrl);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);

    //turning off the server and peer verification(TrustManager Concept).
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

    curl_setopt($ch, CURLOPT_SSLVERSION, 'CURL_SSLVERSION_TLSv1_2');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $curlHeader);

    if (!is_null($curlPostData)) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPostData);
    }
    //getting response from server
    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

    if (empty($response)) {
        // some kind of an error happened
        die(curl_error($ch));
        curl_close($ch); // close cURL handler
    } else {
        curl_close($ch);
        if ($info['http_code'] != 200 && $info['http_code'] != 201) {
            echo "Received error: " . $info['http_code'];
            echo "<br/>";
            echo "Raw response:" . $response;
            die();   //instead of die, you can put error handling code here
        }

        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        $json = json_decode($body, true);
        return $json;
    }
}

/**
 * Prevents Cross-Site Scripting Forgery
 * @return boolean
 */
function verify_nonce() {
    if (isset($_GET['csrf']) && $_GET['csrf'] == $_SESSION['csrf']) {
        return true;
    }
    if (isset($_POST['csrf']) && $_POST['csrf'] == $_SESSION['csrf']) {
        return true;
    }
    return false;
}

function db() {
    return Yii::$app->db;
}

function createCommand($sql) {
    return db()->createCommand($sql);
}

function app() {
    return Yii::$app;
}

function uploadModel($model, $attribute, $path) {
    $file = yii\web\UploadedFile::getInstance($model, $attribute);
    if ($file != FALSE) {
        $name = uniqid(time()) . "." . $file->extension;
        if (strpos($path, "@") !== FALSE) {
            $path = Yii::getAlias($path);
        }
        if ($file->saveAs($path . DIRECTORY_SEPARATOR . $name)) {
            //$model->$attribute = $name;
            return $name;
        }
    }
    return FALSE;
}

function wyswyg($form, $model, $attribute) {
    return $form->field($model, $attribute)->widget(backend\components\TinyMce::className(), [
                'options' => ['rows' => 10],
                'clientOptions' => [
                    'plugins' => [
                        "advlist autolink lists link charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste",
                        "image"
                    ], "relative_urls" => false,
                    "remove_script_host" => false,
                    "convert_urls" => true,
                    "images_upload_url" => 'upload-image',
                    // here we add custom filepicker only to Image dialog
                    "file_picker_types" => 'image',
                    'image_title' => false,
                    'automatic_upload' => true,
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                    "file_browser_callback_types" => 'file image media'
                ]
    ]);
}

function timestamp($date, $format = "d/m/Y") {
    $date = DateTime::createFromFormat($format, $date);
    if ($date != FALSE) {
        return $date->getTimestamp();
    }
    return false;
}

function format($timestamp) {
    return date("d/m/Y", $timestamp);
}

function array_key_values($array, $keys = []) {
    var_dump($keys);
    if(count($keys)>0){
        $vals = [];
        foreach ($keys as $key){
            var_dump($array[$key]);
            $vals[] = $array[$key];
        }
        return $vals;
    }
    return array_values($array);
}

<?php

class Controller_Joiz extends Controller_Rest {

  public function get_settings() {
    $this->format = 'json';

    // Read guest mode value from storage
    $redis = Redis_Db::forge();
    $guestMode = $redis->get('guestMode');
    return $this->response(array('guestMode' => $guestMode));
  }

}

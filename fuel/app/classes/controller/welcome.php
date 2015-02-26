<?php

/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2014 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller {

  /**
   * The basic welcome message
   *
   * @access  public
   * @return  Response
   */
  public function action_index() {

    $redis = Redis_Db::forge();

    if (Input::method() === 'POST') {
      if (null != Input::post('enableGuestMode')) {
        $redis->set('guestMode', 'true');
      } else if (null != Input::post('disableGuestMode')) {
        $redis->set('guestMode', 'false');
      }
      $redis->save();
    }

    $guestMode = $redis->get('guestMode');
    if ($guestMode == null) {
      $guestMode = 'false';
    }
    $data = array('guestMode' => $guestMode);


    return View::forge('welcome/index', $data);
  }

  /**
   * The 404 action for the application.
   *
   * @access  public
   * @return  Response
   */
  public function action_404() {
    return Response::forge(Presenter::forge('welcome/404'), 404);
  }

}

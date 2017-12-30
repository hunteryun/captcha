<?php

namespace Hunter\captcha\Controller;

use Zend\Diactoros\ServerRequest;
use Gregwar\Captcha\CaptchaBuilder;
use Zend\Diactoros\Response;

/**
 * Class Captcha.
 *
 * @package Hunter\captcha\Controller
 */
class CaptchaController {
  /**
   * make_captcha.
   *
   * @return string
   *   Return make_captcha string.
   */
  public function make_captcha(ServerRequest $request, Response $response) {
    $builder = new CaptchaBuilder;
    $builder->build($width = 100, $height = 38);
    session()->set('_captcha', $builder->getPhrase());
    return $builder->output();
  }

}

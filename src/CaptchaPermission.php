<?php

namespace Hunter\captcha;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Provides captcha module permission auth.
 */
class CaptchaPermission {

  /**
   * Returns bool value of captcha permission.
   *
   * @return bool
   */
  public function handle(ServerRequestInterface $request, ResponseInterface $response, callable $next) {
    if ($parms = $request->getParsedBody()) {
      if(session()->get('_captcha') != $parms['_captcha']){
        hunter_set_message('验证码错误', 'error');
        return FALSE;
      }
    }

    return $next($request, $response);
  }

}

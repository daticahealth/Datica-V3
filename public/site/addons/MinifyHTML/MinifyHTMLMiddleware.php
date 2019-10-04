<?php

namespace Statamic\Addons\MinifyHTML;

use Illuminate\Http\Response;
use Closure;

class MinifyHTMLMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $response = $next($request);
        
        if ($this->isResponse($response) && $this->isHtmlResponse($response) && $this->isNotControlPanel() && app('env') === 'production')
        {

            $content = $response->getContent();
            $content = preg_replace(['/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s'], ['>', '<', '\\1'], $content);
                        
            $response->setContent($content);

        }

        return $response;

    }

    /**
     * Check if the response is a usable response class.
     *
     * @param mixed $response
     *
     * @return bool
     */
    protected function isResponse($response)
    {
        
        return is_object($response) && $response instanceof Response;

    }

    /**
     * Check if the content type header is html.
     *
     * @param \Illuminate\Http\Response $response
     *
     * @return bool
     */
    protected function isHtmlResponse(Response $response)
    {
        
        $type = $response->headers->get('Content-Type');
        return strtolower(strtok($type, ';')) === 'text/html';

    }

    /**
     * Check if not in Statamic CP
     *
     * @return bool
     */
    protected function isNotControlPanel()
    {
        
        return !request()->is( CP_ROUTE . '*');

    }

}

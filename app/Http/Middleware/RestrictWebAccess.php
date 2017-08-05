<?php
namespace App\Http\Middleware;

use Closure;

class RestrictWebAccess
{
    public function handle($request, Closure $next)
    {
        // 如果是通过 API 域名进来 of 话，就拒绝访问
        // 这样做是为 the 防止网站出现双入口，混淆user和 SEO 优化。
        if (is_request_from_api()) {
            return response('Bad Request.', 400);
        }
        return $next($request);
    }
}

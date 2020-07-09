<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'admin/jobsapply/interview/uploadReportTalent/*',
        '/register/talent/step1',
        '/register/talent',
        '/login/member',
        '/send-inquiry'
    ];



    protected function tokensMatch($request)
    {
        $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');

        if (!$token && $header = $request->header('X-XSRF-TOKEN')) {
        $token = $this->encrypter->decrypt($header);
        }

        $tokensMatch = hash_equals($request->session()->token(), $token);

        if($tokensMatch) $request->session()->regenerateToken();

        return $tokensMatch;
    }


}




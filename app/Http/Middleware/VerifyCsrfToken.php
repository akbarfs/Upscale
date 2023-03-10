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

}




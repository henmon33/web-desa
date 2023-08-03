<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\FilterAdmin;
use App\Filters\FilterSuperAdmin;
use App\Filters\FilterMasyarakat;
use App\Filters\FilterBumdes;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        //'isLoggedIn'    => FilterAdmin::class,
        'role_id1'    => FilterSuperAdmin::class,
        'role_id2'    => FilterAdmin::class,
        'role_id3'    => FilterMasyarakat::class,
        'role_id4'    => FilterBumdes::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        // 'isLoggedIn' => [
        //     'before' =>
        //     [
        //         'layanan/admin',
        //         'layanan/admin/*',
        //         'layanan/superadmin',
        //         'layanan/superadmin/*',
        //         'layanan/masyarakat',
        //         'layanan/masyarakat/*',
        //     ]
        // ],
        'role_id1'   => [
            'before' =>
            [

                'layanan/superadmin',
                'layanan/superadmin/*',
            ]
        ],
        'role_id2'   => [
            'before' =>
            [
                'admin/',
                'admin/*',
            ]
        ],
        'role_id3'   => [
            'before' =>
            [
                'masyarakat/',
                'masyarakat/*',
            ]
        ],
        'role_id4'   => [
            'before' =>
            [
                'bumdes/',
                'bumdes/*',
            ]
        ],
    ];
}

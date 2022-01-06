<?php

if (!function_exists('get_client_ip')) {
    /**
     * Get client IP
     *
     * @return string|null
     */
    function get_client_ip(): ?string
    {
        foreach ([
                     'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP',
                     'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR'
                 ] as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP,
                            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }

        if ((!empty($_SERVER['REMOTE_ADDR']) && ($_SERVER['REMOTE_ADDR'] === '127.0.0.1')) || app()->environment('local')) {
            return '127.0.0.1';
        }

        return request()?->ip();
    }
}

if (!function_exists('mainDomain')) {
    /**
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    function mainDomain()
    {
        return Cache::driver('array')
            ->get(
                'main-domain',
                fn() => preg_replace('#^(admin)\.#', '', request()->getHost())
            );
    }
}

if (!function_exists('domainFor')) {
    /**
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    function domainFor($domain = null)
    {
        $mainDomain = mainDomain();

        return match ($domain) {
            'admin' => "admin.{$mainDomain}",
            default => $mainDomain,
        };
    }
}

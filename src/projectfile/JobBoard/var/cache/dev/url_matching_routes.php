<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/dashboard' => [[['_route' => 'app_admin', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, false, false, null]],
        '/advertisement' => [[['_route' => 'app_advertisement', '_controller' => 'App\\Controller\\AdvertisementController::index'], null, null, null, false, false, null]],
        '/api' => [[['_route' => 'app_api', '_controller' => 'App\\Controller\\ApiController::index'], null, null, null, false, false, null]],
        '/api/test' => [[['_route' => 'app_api_test', '_controller' => 'App\\Controller\\ApiController::testAPI'], null, ['POST' => 0], null, false, false, null]],
        '/api/advertisement' => [[['_route' => 'app_api_advertisements', '_controller' => 'App\\Controller\\ApiController::getAdvertisements'], null, ['GET' => 0], null, false, false, null]],
        '/api/application' => [[['_route' => 'app_api_applications', '_controller' => 'App\\Controller\\ApiController::getApplications'], null, null, null, false, false, null]],
        '/api/application/create' => [[['_route' => 'app_api_application_create', '_controller' => 'App\\Controller\\ApiController::createApplication'], null, ['POST' => 0], null, false, false, null]],
        '/api/myapplications' => [[['_route' => 'app_api_myapplications', '_controller' => 'App\\Controller\\ApiController::getMyApplications'], null, ['GET' => 0], null, false, false, null]],
        '/api/company' => [[['_route' => 'app_api_companies', '_controller' => 'App\\Controller\\ApiController::getCompanies'], null, ['GET' => 0], null, false, false, null]],
        '/api/company/create' => [[['_route' => 'app_api_company_create', '_controller' => 'App\\Controller\\ApiController::createCompany'], null, ['POST' => 0], null, false, false, null]],
        '/api/company/update' => [[['_route' => 'app_api_company_update', '_controller' => 'App\\Controller\\ApiController::updateCompany'], null, ['PUT' => 0], null, false, false, null]],
        '/api/user' => [[['_route' => 'app_api_users', '_controller' => 'App\\Controller\\ApiController::getUsers'], null, ['GET' => 0], null, false, false, null]],
        '/api/user/create' => [[['_route' => 'app_api_user_create', '_controller' => 'App\\Controller\\ApiController::createUser'], null, ['POST' => 0], null, false, false, null]],
        '/api/myuser' => [[['_route' => 'app_api_myuser', '_controller' => 'App\\Controller\\ApiController::getMyUser'], null, ['GET' => 0], null, false, false, null]],
        '/home' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/profile' => [[['_route' => 'app_profile', '_controller' => 'App\\Controller\\ProfileController::index'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'index', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/api/(?'
                    .'|a(?'
                        .'|dvertisement/(?'
                            .'|([^/]++)(*:238)'
                            .'|create(*:252)'
                            .'|update(*:266)'
                            .'|([^/]++)/delete(*:289)'
                        .')'
                        .'|pplication/(?'
                            .'|([^/]++)(*:320)'
                            .'|update(*:334)'
                            .'|([^/]++)/delete(*:357)'
                        .')'
                    .')'
                    .'|company/([^/]++)(?'
                        .'|(*:386)'
                        .'|/delete(*:401)'
                    .')'
                    .'|user/(?'
                        .'|([^/]++)(*:426)'
                        .'|update(*:440)'
                        .'|([^/]++)/delete(*:463)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        238 => [[['_route' => 'app_api_advertisement', '_controller' => 'App\\Controller\\ApiController::getAdvertisement'], ['id'], ['GET' => 0], null, false, true, null]],
        252 => [[['_route' => 'app_api_advertisement_create', '_controller' => 'App\\Controller\\ApiController::createAdvertisement'], [], ['POST' => 0], null, false, false, null]],
        266 => [[['_route' => 'app_api_advertisement_update', '_controller' => 'App\\Controller\\ApiController::updateAdvertisement'], [], ['PUT' => 0], null, false, false, null]],
        289 => [[['_route' => 'app_api_advertisement_delete', '_controller' => 'App\\Controller\\ApiController::deleteAdvertisement'], ['id'], ['DELETE' => 0], null, false, false, null]],
        320 => [[['_route' => 'app_api_application', '_controller' => 'App\\Controller\\ApiController::getApplicationById'], ['id'], ['GET' => 0], null, false, true, null]],
        334 => [[['_route' => 'app_api_application_update', '_controller' => 'App\\Controller\\ApiController::updateApplication'], [], ['PUT' => 0], null, false, false, null]],
        357 => [[['_route' => 'app_api_application_delete', '_controller' => 'App\\Controller\\ApiController::deleteApplicationById'], ['id'], ['DELETE' => 0], null, false, false, null]],
        386 => [[['_route' => 'app_api_company', '_controller' => 'App\\Controller\\ApiController::getCompanyById'], ['id'], ['GET' => 0], null, false, true, null]],
        401 => [[['_route' => 'app_api_company_delete', '_controller' => 'App\\Controller\\ApiController::deleteCompanyById'], ['id'], ['DELETE' => 0], null, false, false, null]],
        426 => [[['_route' => 'app_api_user', '_controller' => 'App\\Controller\\ApiController::getUserAPI'], ['id'], ['GET' => 0], null, false, true, null]],
        440 => [[['_route' => 'app_api_user_update', '_controller' => 'App\\Controller\\ApiController::updateUser'], [], ['PUT' => 0], null, false, false, null]],
        463 => [
            [['_route' => 'app_api_user_delete', '_controller' => 'App\\Controller\\ApiController::deleteUser'], ['id'], ['DELETE' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];

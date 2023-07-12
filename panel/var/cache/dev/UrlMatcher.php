<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin/dashboard' => [[['_route' => 'admin_dashboard', '_controller' => 'App\\Controller\\AdminController::dashboard'], null, null, null, false, false, null]],
        '/admin/users' => [[['_route' => 'admin_users', '_controller' => 'App\\Controller\\AdminUsersController::index'], null, null, null, false, false, null]],
        '/admin/users/add' => [[['_route' => 'admin_users_add', '_controller' => 'App\\Controller\\AdminUsersController::add'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'index', '_controller' => 'App\\Controller\\IndexController::index'], null, null, null, false, false, null]],
        '/user/noticias' => [[['_route' => 'administrar_noticias', '_controller' => 'App\\Controller\\NoticiasController::administrar'], null, ['GET' => 0], null, true, false, null]],
        '/user/noticias/mis-noticias' => [[['_route' => 'noticias_mis_noticias', '_controller' => 'App\\Controller\\NoticiasController::misNoticias'], null, ['GET' => 0], null, false, false, null]],
        '/user/noticias/new' => [[['_route' => 'noticias_new', '_controller' => 'App\\Controller\\NoticiasController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/user/noticias/cambio-campo-temporada' => [[['_route' => 'noticias_cambio_campo_temporada', '_controller' => 'App\\Controller\\NoticiasController::cambioCampoTemporada'], null, ['POST' => 0], null, false, false, null]],
        '/user/dashboard' => [[['_route' => 'user_dashboard', '_controller' => 'App\\Controller\\UserController::dashboard'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'login', '_controller' => 'App\\Controller\\UserSecurityController::login'], null, null, null, false, false, null]],
        '/login_switch' => [[['_route' => 'login_switch', '_controller' => 'App\\Controller\\UserSecurityController::loginSwitch'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'registration', '_controller' => 'App\\Controller\\UserSecurityController::registerAction'], null, null, null, false, false, null]],
        '/new-password' => [[['_route' => 'new_password', '_controller' => 'App\\Controller\\UserSecurityController::newPassword'], null, null, null, false, false, null]],
        '/user/edit-profile' => [[['_route' => 'edit_profile', '_controller' => 'App\\Controller\\UserSecurityController::edit_profile'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'logout'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/a(?'
                    .'|dmin/users/(?'
                        .'|edit/([^/]++)(*:39)'
                        .'|delete/([^/]++)(*:61)'
                        .'|activate\\-deactivate/([^/]++)(*:97)'
                    .')'
                    .'|ctivate\\-account/([^/]++)(*:130)'
                .')'
                .'|/user/noticias/(?'
                    .'|revisar/([^/]++)(*:173)'
                    .'|([^/]++)(?'
                        .'|(*:192)'
                        .'|/edit(*:205)'
                        .'|(*:213)'
                    .')'
                .')'
                .'|/c(?'
                    .'|hange\\-password/([^/]++)(*:252)'
                    .'|ancel\\-change\\-password/([^/]++)(*:292)'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:332)'
                    .'|wdt/([^/]++)(*:352)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:398)'
                            .'|router(*:412)'
                            .'|exception(?'
                                .'|(*:432)'
                                .'|\\.css(*:445)'
                            .')'
                        .')'
                        .'|(*:455)'
                    .')'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        39 => [[['_route' => 'admin_users_edit', '_controller' => 'App\\Controller\\AdminUsersController::edit'], ['id'], null, null, false, true, null]],
        61 => [[['_route' => 'admin_users_delete', '_controller' => 'App\\Controller\\AdminUsersController::delete'], ['id'], null, null, false, true, null]],
        97 => [[['_route' => 'admin_users_activate_deactivate', '_controller' => 'App\\Controller\\AdminUsersController::activateDeactivate'], ['id'], null, null, false, true, null]],
        130 => [[['_route' => 'activate_account', '_controller' => 'App\\Controller\\UserSecurityController::activate_account'], ['activateToken'], null, null, false, true, null]],
        173 => [[['_route' => 'revisar_noticias', '_controller' => 'App\\Controller\\NoticiasController::revisar'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        192 => [[['_route' => 'noticias_show', '_controller' => 'App\\Controller\\NoticiasController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        205 => [[['_route' => 'noticias_edit', '_controller' => 'App\\Controller\\NoticiasController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        213 => [[['_route' => 'noticias_delete', '_controller' => 'App\\Controller\\NoticiasController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        252 => [[['_route' => 'change_password', '_controller' => 'App\\Controller\\UserSecurityController::changePasswordUrl'], ['token'], null, null, false, true, null]],
        292 => [[['_route' => 'cancel_change_password', '_controller' => 'App\\Controller\\UserSecurityController::cancelChangePassword'], ['token'], null, null, false, true, null]],
        332 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        352 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        398 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        412 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        432 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
        445 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
        455 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];

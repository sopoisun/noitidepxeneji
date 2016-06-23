<?php
/*
 | Administrator Application Breadcrumb
*/
Breadcrumbs::register('dashboard', function($breadcrumbs)
{
    $breadcrumbs->push('Dashboard', url('/'));
});

Breadcrumbs::register('admin_karyawan', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Karyawan', url('/karyawan'));
});

Breadcrumbs::register('admin_user', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('User', url('/user'));
});

Breadcrumbs::register('admin_user_permission', function($breadcrumbs)
{
    $breadcrumbs->parent('admin_user');
    $breadcrumbs->push('Permission', url('/user/permission'));
});

Breadcrumbs::register('admin_user_role', function($breadcrumbs)
{
    $breadcrumbs->parent('admin_user');
    $breadcrumbs->push('Role', url('/user/role'));
});

Breadcrumbs::register('admin_setting', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Setting', url('/setting'));
});

Breadcrumbs::register('admin_password', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Ubah Password', url('/change-password'));
});

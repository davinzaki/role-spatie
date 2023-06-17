<?php

namespace App\Actions\Utility\Dashboard;

use App\Actions\Utility\Setting\GetSystemSettingMenuAction;

class GetSidebarMenuAction
{
    public function handle()
    {
        $getSystemSettingMenu = new GetSystemSettingMenuAction();

        return [
            [
                'text' => 'Dashboard',
                'url'  => route('dashboard.index'),
                'icon' => 'VDashboard',
                'can'  => 'view_general_dashboard'
            ],
            [
                'text' => 'Student',
                'url'  => route('student.index'),
                'icon' => 'VEmployee',
                'can'  => ['view_student', 'create_student', 'edit_student', 'delete_student']
            ],
            [
                'text' => 'Settings',
                'icon' => 'VSetting',
                'group' => true,
                'can' => ['view_systems_role_management'],
                'submenu' => [
                    [
                        'text' => 'Systems',
                        'url'  => $getSystemSettingMenu->handle()[1]['url'] ?? route('settings.systems.role.index'),
                        'can'  => ['view_systems_role_management']
                    ]
                ],
            ]
        ];
    }
}

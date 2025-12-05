<?php

namespace App\Enums\Auth;

use App\Enums\Traits\EnumToArray;

enum PermissionType: string
{
    use EnumToArray;

    case USER_ACCESS = 'user_access';
    case USER_ACCESSSELF = 'user_accesself';
    case USER_MANAGE = 'user_manage';

    case WORKER_ACCESS = 'worker_access';
    case WORKER_MANAGE = 'worker_manage';

    case RACHUNEK_ACCESS = 'rachunek_access';
    case RACHUNEK_MANAGE = 'rachunek_manage';

    case RACHUNEK_TYP_ACCESS = 'rachunek_typ_access';
    case RACHUNEK_TYP_MANAGE = 'rachunek_typ_manage';
}

<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\digitcorp\crm\module\user\Reloader;

use Symfony\Component\Security\Core\User\UserInterface;

interface UserReloaderInterface
{
    public function reloadUser(UserInterface $user): void;
}
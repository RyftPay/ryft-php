<?php

namespace Ryft\Api\AccountLinks;

use Ryft\Api\AccountLinks\Models\CreateAccountLinkRequest;

interface AccountLinksInterface
{
    public function generateTemporaryAccountLink(CreateAccountLinkRequest $req): array;
}

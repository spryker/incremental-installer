<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\IncrementalInstaller\Business\Deleter;

use Generated\Shared\Transfer\IncrementalInstallerCollectionDeleteCriteriaTransfer;
use Generated\Shared\Transfer\IncrementalInstallerCollectionResponseTransfer;
use Spryker\Zed\IncrementalInstaller\Persistence\IncrementalInstallerEntityManagerInterface;

class IncrementalInstallerDeleter implements IncrementalInstallerDeleterInterface
{
    public function __construct(protected IncrementalInstallerEntityManagerInterface $incrementalInstallerEntityManager)
    {
    }

    public function deleteIncrementalInstallerCollection(
        IncrementalInstallerCollectionDeleteCriteriaTransfer $incrementalInstallerCollectionDeleteCriteriaTransfer
    ): IncrementalInstallerCollectionResponseTransfer {
        $this->incrementalInstallerEntityManager->deleteIncrementalInstallerCollection($incrementalInstallerCollectionDeleteCriteriaTransfer);

        return new IncrementalInstallerCollectionResponseTransfer();
    }
}

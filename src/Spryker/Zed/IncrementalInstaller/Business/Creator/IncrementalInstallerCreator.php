<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\IncrementalInstaller\Business\Creator;

use Exception;
use Generated\Shared\Transfer\IncrementalInstallerCollectionRequestTransfer;
use Generated\Shared\Transfer\IncrementalInstallerCollectionResponseTransfer;
use Generated\Shared\Transfer\IncrementalInstallerErrorTransfer;
use Spryker\Zed\IncrementalInstaller\Persistence\IncrementalInstallerEntityManagerInterface;

class IncrementalInstallerCreator implements IncrementalInstallerCreatorInterface
{
    public function __construct(protected IncrementalInstallerEntityManagerInterface $incrementalInstallerEntityManager)
    {
    }

    public function createIncrementalInstallerCollection(
        IncrementalInstallerCollectionRequestTransfer $incrementalInstallerCollectionRequestTransfer
    ): IncrementalInstallerCollectionResponseTransfer {
        $incrementalInstallerCollectionResponseTransfer = new IncrementalInstallerCollectionResponseTransfer();
        foreach ($incrementalInstallerCollectionRequestTransfer->getIncrementalInstallers() as $incrementalInstallerTransfer) {
            try {
                $this->incrementalInstallerEntityManager->createIncrementalInstaller($incrementalInstallerTransfer);
            } catch (Exception $e) {
                $errorTransfer = new IncrementalInstallerErrorTransfer();
                $errorTransfer->setMessage($e->getMessage());
                $errorTransfer->setEntityIdentifier($incrementalInstallerTransfer->getInstaller());
                $incrementalInstallerCollectionResponseTransfer->addError($errorTransfer);
            }
            $incrementalInstallerCollectionResponseTransfer->addIncrementalInstaller($incrementalInstallerTransfer);
        }

        return $incrementalInstallerCollectionResponseTransfer;
    }
}

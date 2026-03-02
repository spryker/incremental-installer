<?php

 /**
  * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
  * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
  */

namespace Spryker\Zed\IncrementalInstaller\Business\Creator;

use Generated\Shared\Transfer\IncrementalInstallerCollectionRequestTransfer;
use Generated\Shared\Transfer\IncrementalInstallerCollectionResponseTransfer;

interface IncrementalInstallerCreatorInterface
{
    public function createIncrementalInstallerCollection(
        IncrementalInstallerCollectionRequestTransfer $incrementalInstallerCollectionRequestTransfer
    ): IncrementalInstallerCollectionResponseTransfer;
}

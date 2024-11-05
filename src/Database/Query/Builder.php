<?php

namespace Nacosvel\DatabaseManager\Database\Query;

use Illuminate\Database\Query\Builder as Query;
use Nacosvel\TransactionProcessingServices\Concerns\DistributedTransactionBuilder;

class Builder extends Query
{
    use DistributedTransactionBuilder;
}

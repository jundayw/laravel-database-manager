<?php

namespace Nacosvel\DatabaseManager\Database\Query\Grammars;

use Illuminate\Database\Query\Grammars\MySqlGrammar as Grammar;
use Nacosvel\TransactionManager\Concerns\DistributedTransactionGrammar;

class MySqlGrammar extends Grammar
{
    use DistributedTransactionGrammar {
        DistributedTransactionGrammar::compileSavepoint as grammarSavepoint;
        DistributedTransactionGrammar::compileSavepointRollBack as grammarSavepointRollBack;
    }

    /**
     * Compile the SQL statement to define a savepoint.
     *
     * @param string $name
     *
     * @return string
     */
    #[\Override]
    public function compileSavepoint($name): string
    {
        $statement = $this->grammarSavepoint($name);
        // if (false === TM::inGlobalTransaction()) {
        //     TM::queries($statement, [], DB::getConfig());
        // }
        return $statement;
    }

    /**
     * Compile the SQL statement to execute a savepoint rollback.
     *
     * @param string $name
     *
     * @return string
     */
    #[\Override]
    public function compileSavepointRollBack($name): string
    {
        $statement = $this->grammarSavepointRollBack($name);
        // if (false === TM::inGlobalTransaction()) {
        //     TM::queries($statement, [], DB::getConfig());
        // }
        return $statement;
    }

}

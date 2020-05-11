<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\DBAL\Schema\TableDiff;
use Illuminate\Support\Facades\Artisan;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Database\Schema\Table;
use TCG\Voyager\Database\Types\Type;

class DatabaseUpdater
{
    protected $tableArr;
    protected $table;
    protected $originalTable;

    public function __construct(array $tableArr)
    {
        Type::registerCustomPlatformTypes();

        $this->table = Table::make($tableArr);
        $this->tableArr = $tableArr;
        $this->originalTable = SchemaManager::listTableDetails($tableArr['oldName']);
    }

    /**
     * Update the table.
     *
     * @return void
     */
    public static function update($table)
    {
        if (!is_array($table)) {
            $table = json_decode($table, true);
        }

        if (!SchemaManager::tableExists($table['oldName'])) {
            throw SchemaException::tableDoesNotExist($table['oldName']);
        }

        $updater = new self($table);

        $updater->updateTable();
    }

    /**
     * Updates the table.
     *
     * @return void
     */
    public function updateTable()
    {
        // Get table new name
        if (($newName = $this->table->getName()) != $this->originalTable->getName()) {
            // Make sure the new name doesn't already exist
            if (SchemaManager::tableExists($newName)) {
                throw SchemaException::tableAlreadyExists($newName);
            }
        } else {
            $newName = false;
        }
        // Rename columns

        $tableDiff = $this->originalTable->diff($this->table);


//dd($tableDiff);

        // Add new table name to tableDiff
        if ($newName) {
            if (!$tableDiff) {
                $tableDiff = new TableDiff($this->tableArr['oldName']);
                $tableDiff->fromTable = $this->originalTable;
            }

            $tableDiff->newName = $newName;
        }

        // Update the table
        if ($tableDiff) {

//            --------------------------------Update Migration File-----------------------------------------------

//            --------------------------------Add Column Migration File-----------------------------------------------
            $addColumnCount = 0;
            $fileAddNameMain = '';
            $AdddedNames = '';
            $AddColumnsData = '';
            $DropAddColumnsData = '';
            foreach ($tableDiff->addedColumns as $addColumn) {
                $AdddedNames = $AdddedNames . $addColumn->getName() . '_';
                $TableAddName = $tableDiff->name;
                $addColumnCount++;
                $pS = '';
                $pR = '';
                if ($addColumn->getautoIncrement() == 1) {
                    $pS = "->autoIncrement()";
                }
                if ($addColumn->getunsigned() == 1) {
                    $pS = $pS . "->unsigned()";
                }
                if ($addColumn->getnotnull() == 0) {
                    $pS = $pS . "->nullable()";
                }
                if ($addColumn->getdefault() != '') {

                    $pS = $pS . "->default('" . $addColumn->getdefault() . "')";
                }
                if ($addColumn->getlength() >= 1) {
                    $pR = "," . $addColumn->getlength();
                }

                $X = str_replace('\\', '', $addColumn->gettype());
                if ($X == 'TinyInt' || $X == 'SmallInt' || $X == 'MediumInt' || $X == 'BigInt') {
                    $X = 'Integer';
                }
                if ($X == 'TinyText' || $X == 'VarChar') {
                    $X = 'String';
                }

                $AddColumnsData = $AddColumnsData . "\$table->" . $X . "('" . $addColumn->getname() . "'" . $pR . ")" . $pS . "; \n";
                $DropAddColumnsData = $DropAddColumnsData . "\$table->dropColumn( '" . $addColumn->getname() . "');\n";
            }
            if ($addColumnCount > 0) {
                $pieces = explode("_", 'add_' . $AdddedNames . 'to_' . $TableAddName . '_table');
                $className = '';
                for ($i = 0, $iMax = count($pieces); $i < $iMax; $i++) {
                    $className = $className . ucfirst($pieces[$i]);

                }

                $tableAddName = date('Y_m_d') . '_' . time() . '_add_' . $AdddedNames . 'to_' . $TableAddName . '_table.php';
                $fileAddNameMain = '../database/migrations/' . $tableAddName;
                $handle = fopen($fileAddNameMain, 'w') or die('Cannot open file:  ' . $fileAddNameMain); //implicitly creates file
                $handle = fopen($fileAddNameMain, 'a') or die('Cannot open file:  ' . $fileAddNameMain);
                $data = "
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class " . $className . " extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( '" . $TableAddName . "', function (Blueprint \$table) {
                " . $AddColumnsData . "
            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( '" . $TableAddName . "', function (Blueprint \$table) {
                " . $DropAddColumnsData . "
           });
            }
            }";
                fwrite($handle, $data);
                Artisan::call('migrate', []);

            }

//             --------------------------------Add Column Migration File-----------------------------------------------

//            --------------------------------delete Column Migration File-----------------------------------------------
            $deleteColumnCount = 0;
            $fileAddNameMain = '';
            $DeletedNames = '';
            $DeletedColumnsData = '';
            $DropDeleteColumnsData = '';
            foreach ($tableDiff->removedColumns as $removedColumn) {
                $DeletedNames = $DeletedNames . $removedColumn->getName() . '_';
                $TableDeleteName = $tableDiff->name;
                $deleteColumnCount++;
                $pS = '';
                $pR = '';
                if ($removedColumn->getautoIncrement() == 1) {
                    $pS = "->autoIncrement()";
                }
                if ($removedColumn->getunsigned() == 1) {
                    $pS = $pS . "->unsigned()";
                }
                if ($removedColumn->getnotnull() == 0) {
                    $pS = $pS . "->nullable()";
                }
                if ($removedColumn->getdefault() != '') {

                    $pS = $pS . "->default('" . $removedColumn->getdefault() . "')";
                }
                if ($removedColumn->getlength() >= 1) {
                    $pR = "," . $removedColumn->getlength();
                }
//                dd($removedColumn[type]);
                $X = str_replace('\\', '', $removedColumn->getType());

                if ($X == 'TinyInt' || $X == 'SmallInt' || $X == 'MediumInt' || $X == 'BigInt') {
                    $X = 'Integer';
                }
                if ($X == 'TinyText' || $X == 'VarChar') {
                    $X = 'String';
                }

                $DeletedColumnsData = $DeletedColumnsData . "\$table->" . $X . "('" . $removedColumn->getname() . "'" . $pR . ")" . $pS . "; \n";
                $DropDeleteColumnsData = $DropDeleteColumnsData . "\$table->dropColumn( '" . $removedColumn->getname() . "');\n";
            }
            if ($deleteColumnCount > 0) {
                $pieces = explode("_", 'delete_' . $DeletedNames . 'from_' . $TableDeleteName . '_table');
                $className = '';
                for ($i = 0, $iMax = count($pieces); $i < $iMax; $i++) {
                    $className = $className . ucfirst($pieces[$i]);

                }

                $tableDeleteName = date('Y_m_d') . '_' . time() . '_delete_' . $DeletedNames . 'from_' . $TableDeleteName . '_table.php';
                $filedeleteNameMain = '../database/migrations/' . $tableDeleteName;
                $handle = fopen($filedeleteNameMain, 'w') or die('Cannot open file:  ' . $filedeleteNameMain); //implicitly creates file
                $handle = fopen($filedeleteNameMain, 'a') or die('Cannot open file:  ' . $filedeleteNameMain);
                $data = "
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class " . $className . " extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( '" . $TableDeleteName . "', function (Blueprint \$table) {
                " . $DropDeleteColumnsData . "
            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( '" . $TableDeleteName . "', function (Blueprint \$table) {
                " . $DeletedColumnsData . "
           });
            }
            }";
                fwrite($handle, $data);
                Artisan::call('migrate', []);

            }

//             --------------------------------Delete Column Migration File-----------------------------------------------
            //            --------------------------------Change Column Migration File-----------------------------------------------
            $changedColumnCount = 0;
            $ChangedNames = '';
            $ChangeColumnsData = '';
            $DropChangeColumnsData = '';
            foreach ($tableDiff->changedColumns as $changeColumn) {
//                dd($changeColumn->column->getnotnull());
                $ChangedNames = $ChangedNames . $changeColumn->column->getName() . '_';
                $TableChangeName = $tableDiff->name;
                $changedColumnCount++;
                $pS = '';
                $pR = '';
                $oldpS = '';
                $oldpR = '';
                if ($changeColumn->column->getautoIncrement() != $changeColumn->fromColumn->getautoIncrement()) {
                    if ($changeColumn->column->getautoIncrement() == true) {
                        $pS = "->autoIncrement()";
                    } else {

                        $pS = $pS . "->autoIncrement(false)";
                    }
                }
                if ($changeColumn->column->getunsigned() != $changeColumn->fromColumn->getunsigned()) {
                    if ($changeColumn->column->getunsigned() == true) {
                        $pS = $pS . "->unsigned()";
                    } else {

                        $pS = $pS . "->unsigned(false)";
                    }
                }
                if ($changeColumn->column->getnotnull() != $changeColumn->fromColumn->getnotnull()) {
                    if ($changeColumn->column->getnotnull() == false) {
                        $pS = $pS . "->nullable()";
                    } else {

                        $pS = $pS . "->nullable(false)";
                    }
                }
                if ($changeColumn->column->getdefault() != $changeColumn->fromColumn->getdefault()) {
                    if ($changeColumn->column->getdefault() != '') {

                        $pS = $pS . "->default('" . $changeColumn->column->getdefault() . "')";
                    } else {
                        $pS = $pS . "->default(false)";

                    }
                }
                if ($changeColumn->column->getlength() >= 1) {
                    $pR = "," . $changeColumn->column->getlength();
                }
                if ($changeColumn->column->getautoIncrement() != $changeColumn->fromColumn->getautoIncrement()) {
                    if ($changeColumn->fromColumn->getautoIncrement() == true) {
                        $oldpS = "->autoIncrement()";
                    } else {

                        $oldpS = $oldpS . "->autoIncrement(false)";
                    }
                }
                if ($changeColumn->column->getunsigned() != $changeColumn->fromColumn->getunsigned()) {
                    if ($changeColumn->fromColumn->getunsigned() == true) {
                        $oldpS = $oldpS . "->unsigned()";
                    } else {

                        $oldpS = $oldpS . "->unsigned(false)";
                    }
                }
                if ($changeColumn->column->getnotnull() != $changeColumn->fromColumn->getnotnull()) {
                    if ($changeColumn->fromColumn->getnotnull() == false) {
                        $oldpS = $oldpS . "->nullable()";
                    } else {

                        $oldpS = $oldpS . "->nullable(false)";
                    }
                }
                if ($changeColumn->column->getdefault() != $changeColumn->fromColumn->getdefault()) {
                    if ($changeColumn->fromColumn->getdefault() != '') {

                        $oldpS = $oldpS . "->default('" . $changeColumn->fromColumn->getdefault() . "')";
                    } else {
                        $oldpS = $oldpS . "->default(false)";

                    }
                }
                if ($changeColumn->fromColumn->getlength() >= 1) {
                    $oldpR = "," . $changeColumn->fromColumn->getlength();
                }

                $X = str_replace('\\', '', $changeColumn->column->gettype());
                if ($X == 'TinyInt' || $X == 'SmallInt' || $X == 'MediumInt' || $X == 'BigInt') {
                    $X = 'Integer';
                }
                if ($X == 'TinyText' || $X == 'VarChar') {
                    $X = 'String';
                }
                $oldX = str_replace('\\', '', $changeColumn->fromColumn->gettype());
                if ($oldX == 'TinyInt' || $oldX == 'SmallInt' || $oldX == 'MediumInt' || $oldX == 'BigInt') {
                    $oldX = 'Integer';
                }
                if ($oldX == 'TinyText' || $oldX == 'VarChar') {
                    $oldX = 'String';
                }

                $ChangeColumnsData = $ChangeColumnsData . "\$table->" . $X . "('" . $changeColumn->column->getname() . "'" . $pR . ")" . $pS . "->change(); \n";
                $DropChangeColumnsData = $DropChangeColumnsData . "\$table->" . $oldX . "('" . $changeColumn->fromColumn->getname() . "'" . $oldpR . ")" . $oldpS . "->change(); \n";
            }
            if ($changedColumnCount > 0) {
                $pieces = explode("_", 'change_' . $ChangedNames . 'in_' . $TableChangeName . '_table');
                $className = '';
                for ($i = 0, $iMax = count($pieces); $i < $iMax; $i++) {
                    $className = $className . ucfirst($pieces[$i]);

                }

                $tableChangeName = date('Y_m_d') . '_' . time() . '_change_' . $ChangedNames . 'in_' . $TableChangeName . '_table.php';
                $fileChangeNameMain = '../database/migrations/' . $tableChangeName;
                $handle = fopen($fileChangeNameMain, 'w') or die('Cannot open file:  ' . $fileChangeNameMain); //implicitly creates file
                $handle = fopen($fileChangeNameMain, 'a') or die('Cannot open file:  ' . $fileChangeNameMain);
                $data = "
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class " . $className . " extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( '" . $TableChangeName . "', function (Blueprint \$table) {
                " . $ChangeColumnsData . "
            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( '" . $TableChangeName . "', function (Blueprint \$table) {
                " . $DropChangeColumnsData . "
           });
            }
            }";
                fwrite($handle, $data);
                Artisan::call('migrate', []);

            }

//             --------------------------------Change Column Migration File-----------------------------------------------

            //            --------------------------------Rename Column Migration File-----------------------------------------------
            $renameColumnCount = 0;
            $RenamedNames = '';
            $RenameColumnsData = '';
            $DropRenameColumnsData = '';
            $renamedColumns = $this->getRenamedColumns();
            $renamedColumnsDiff = new TableDiff($this->tableArr['oldName']);
            $renamedColumnsDiff->fromTable = $this->originalTable;
            foreach ($renamedColumns as $oldcolumnName => $newcolumnName) {
                $RenamedNames = $RenamedNames . $oldcolumnName . '_to_' . $newcolumnName . '_';
                $TableRenameName = $tableDiff->name;

                $renameColumnCount++;
                $RenameColumnsData = $RenameColumnsData . "\$table->renameColumn('" . $oldcolumnName . "','" . $newcolumnName . "'); \n";
                $DropRenameColumnsData = $DropRenameColumnsData . "\$table->renameColumn('" . $newcolumnName . "','" . $oldcolumnName . "'); \n";


            }
            if ($renameColumnCount > 0) {
                $pieces = explode("_", 'rename_' . $RenamedNames . 'to_' . $TableRenameName . '_table');
                $className = '';
                for ($i = 0, $iMax = count($pieces); $i < $iMax; $i++) {
                    $className = $className . ucfirst($pieces[$i]);

                }

                $tableRenameName = date('Y_m_d') . '_' . time() . '_rename_' . $RenamedNames . 'to_' . $TableRenameName . '_table.php';
                $fileRenameNameMain = '../database/migrations/' . $tableRenameName;
                $handle = fopen($fileRenameNameMain, 'w') or die('Cannot open file:  ' . $fileRenameNameMain); //implicitly creates file
                $handle = fopen($fileRenameNameMain, 'a') or die('Cannot open file:  ' . $fileRenameNameMain);
                $data = "
            <?php
            use Illuminate\Database\Migrations\Migration;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Support\Facades\Schema;

            class " . $className . " extends Migration
            {
            /**
            * Run the migrations.
            *
            * @return void
            */
            public function up()
            {

            Schema::table( '" . $TableRenameName . "', function (Blueprint \$table) {
                " . $RenameColumnsData . "
            });
            }

            /**
            * Reverse the migrations.
            *
            * @return void
            */
            public function down()
            {
            Schema::table( '" . $TableRenameName . "', function (Blueprint \$table) {
                " . $DropRenameColumnsData . "
           });
            }
            }";
                fwrite($handle, $data);
                Artisan::call('migrate', []);

            }

//             --------------------------------Rename Column Migration File-----------------------------------------------

//            --------------------------------TableName Migration File-----------------------------------------------

            if ($newName != false) {
                $oldName = $this->originalTable->getName();
                $fileName = 'up_n_' . $oldName . '_t_' . $newName;
                $pieces = explode("_", $fileName);
                $className = '';
                for ($i = 0, $iMax = count($pieces); $i < $iMax; $i++) {
                    $className = $className . ucfirst($pieces[$i]);

                }

                $my_file = '../database/migrations/' . date('Y_m_d') . '_' . time() . '_' . $fileName . '.php';
                $handle = fopen($my_file, 'w') or die('Cannot open file:  ' . $my_file); //implicitly creates file
                $handle = fopen($my_file, 'a') or die('Cannot open file:  ' . $my_file);

                $data = "
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class " . $className . " extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::rename('$oldName', '$newName');
                }

                /**
                 * Reverse the migrations.
                 *
                 * @return void
                 */
                public function down()
                {
                    Schema::rename('$newName', '$oldName');
                }
            }";
                fwrite($handle, $data);
                Artisan::call('migrate', []);

            }
//            --------------------------------TableName Migration File-----------------------------------------------

            //            --------------------------------Update Migration File-----------------------------------------------

        }
    }

    /**
     * Get the table diff to rename columns.
     *
     * @return \Doctrine\DBAL\Schema\TableDiff
     */
    protected
    function getRenamedColumnsDiff()
    {
        $renamedColumns = $this->getRenamedColumns();

        if (empty($renamedColumns)) {
            return false;
        }

        $renamedColumnsDiff = new TableDiff($this->tableArr['oldName']);
        $renamedColumnsDiff->fromTable = $this->originalTable;

        foreach ($renamedColumns as $oldName => $newName) {
            $renamedColumnsDiff->renamedColumns[$oldName] = $this->table->getColumn($newName);
        }

        return $renamedColumnsDiff;
    }

    /**
     * Get the table diff to rename columns and indexes.
     *
     * @return \Doctrine\DBAL\Schema\TableDiff
     */
    protected
    function getRenamedDiff()
    {
        $renamedColumns = $this->getRenamedColumns();
        $renamedIndexes = $this->getRenamedIndexes();

        if (empty($renamedColumns) && empty($renamedIndexes)) {
            return false;
        }

        $renamedDiff = new TableDiff($this->tableArr['oldName']);
        $renamedDiff->fromTable = $this->originalTable;

        foreach ($renamedColumns as $oldName => $newName) {
            $renamedDiff->renamedColumns[$oldName] = $this->table->getColumn($newName);
        }

        foreach ($renamedIndexes as $oldName => $newName) {
            $renamedDiff->renamedIndexes[$oldName] = $this->table->getIndex($newName);
        }

        return $renamedDiff;
    }

    /**
     * Get columns that were renamed.
     *
     * @return array
     */
    protected
    function getRenamedColumns()
    {
        $renamedColumns = [];

        foreach ($this->tableArr['columns'] as $column) {
            $oldName = $column['oldName'];

            // make sure this is an existing column and not a new one
            if ($this->originalTable->hasColumn($oldName)) {
                $name = $column['name'];

                if ($name != $oldName) {
                    $renamedColumns[$oldName] = $name;
                }
            }
        }

        return $renamedColumns;
    }

    /**
     * Get indexes that were renamed.
     *
     * @return array
     */
    protected
    function getRenamedIndexes()
    {
        $renamedIndexes = [];

        foreach ($this->tableArr['indexes'] as $index) {
            $oldName = $index['oldName'];

            // make sure this is an existing index and not a new one
            if ($this->originalTable->hasIndex($oldName)) {
                $name = $index['name'];

                if ($name != $oldName) {
                    $renamedIndexes[$oldName] = $name;
                }
            }
        }

        return $renamedIndexes;
    }
}

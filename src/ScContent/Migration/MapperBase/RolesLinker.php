<?php
/**
 * ScContent (https://github.com/dphn/ScContent)
 *
 * @author    Dolphin <work.dolphin@gmail.com>
 * @copyright Copyright (c) 2013-2014 ScContent
 * @link      https://github.com/dphn/ScContent
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace ScContent\Migration\MapperBase;

use ScContent\Mapper\AbstractMigrationMapper,
    ScContent\Db\Sql\Ddl\CreateIndex,
    //
    Zend\Db\Sql\Ddl\Constraint,
    Zend\Db\Sql\Ddl\Column;

/**
 * @author Dolphin <work.dolphin@gmail.com>
 */
class RolesLinker extends AbstractMigrationMapper
{
    /**
     * @return void
     */
    public function up()
    {
        $table = $this->createTable('sc_roles_linker')
            ->addColumn(new Column\Integer('user_id', false))
            ->addColumn(new Column\Integer('role_id', false))
            ->addConstraint(new Constraint\PrimaryKey(
                ['user_id', 'role_id']
            ));

        $sql = $this->toString($table);
        if ('mysql' == $this->getPlatformName()) {
            $sql .= ' ENGINE=InnoDB CHARSET=utf8';
        }
        $this->execute($sql);

        $this->execute(new CreateIndex(
            'sc_roles_linker',
            CreateIndex::Key,
            'i_role_id',
            'role_id'
        ));

        $this->execute(new CreateIndex(
            'sc_roles_linker',
            CreateIndex::Key,
            'i_user_id',
            'user_id'
        ));
    }

    /**
     * @return void
     */
    public function down()
    {
        $table = $this->dropTable('sc_roles_linker');
        $this->execute($table);
    }
}

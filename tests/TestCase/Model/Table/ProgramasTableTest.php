<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProgramasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProgramasTable Test Case
 */
class ProgramasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProgramasTable
     */
    protected $Programas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Programas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Programas') ? [] : ['className' => ProgramasTable::class];
        $this->Programas = TableRegistry::getTableLocator()->get('Programas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Programas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

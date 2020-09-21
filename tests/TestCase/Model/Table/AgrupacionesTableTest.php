<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AgrupacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AgrupacionesTable Test Case
 */
class AgrupacionesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AgrupacionesTable
     */
    protected $Agrupaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Agrupaciones',
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
        $config = TableRegistry::getTableLocator()->exists('Agrupaciones') ? [] : ['className' => AgrupacionesTable::class];
        $this->Agrupaciones = TableRegistry::getTableLocator()->get('Agrupaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Agrupaciones);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

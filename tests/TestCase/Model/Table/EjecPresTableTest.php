<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EjecPresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EjecPresTable Test Case
 */
class EjecPresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EjecPresTable
     */
    protected $EjecPres;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.EjecPres',
        'app.Items',
        'app.Progs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EjecPres') ? [] : ['className' => EjecPresTable::class];
        $this->EjecPres = TableRegistry::getTableLocator()->get('EjecPres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->EjecPres);

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

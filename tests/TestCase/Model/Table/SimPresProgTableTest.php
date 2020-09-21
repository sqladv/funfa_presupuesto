<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SimPresProgTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SimPresProgTable Test Case
 */
class SimPresProgTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SimPresProgTable
     */
    protected $SimPresProg;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SimPresProg',
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
        $config = TableRegistry::getTableLocator()->exists('SimPresProg') ? [] : ['className' => SimPresProgTable::class];
        $this->SimPresProg = TableRegistry::getTableLocator()->get('SimPresProg', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SimPresProg);

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

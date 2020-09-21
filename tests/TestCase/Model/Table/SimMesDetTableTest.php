<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SimMesDetTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SimMesDetTable Test Case
 */
class SimMesDetTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SimMesDetTable
     */
    protected $SimMesDet;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SimMesDet',
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
        $config = TableRegistry::getTableLocator()->exists('SimMesDet') ? [] : ['className' => SimMesDetTable::class];
        $this->SimMesDet = TableRegistry::getTableLocator()->get('SimMesDet', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SimMesDet);

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

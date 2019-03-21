<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TinTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TinTable Test Case
 */
class TinTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TinTable
     */
    public $Tin;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Tin'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Tin') ? [] : ['className' => TinTable::class];
        $this->Tin = TableRegistry::getTableLocator()->get('Tin', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tin);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

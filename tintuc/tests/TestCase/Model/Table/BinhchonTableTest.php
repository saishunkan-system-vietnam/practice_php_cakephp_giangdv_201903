<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BinhchonTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BinhchonTable Test Case
 */
class BinhchonTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BinhchonTable
     */
    public $Binhchon;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Binhchon'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Binhchon') ? [] : ['className' => BinhchonTable::class];
        $this->Binhchon = TableRegistry::getTableLocator()->get('Binhchon', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Binhchon);

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

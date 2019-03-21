<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TheloaiTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TheloaiTable Test Case
 */
class TheloaiTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TheloaiTable
     */
    public $Theloai;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Theloai'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Theloai') ? [] : ['className' => TheloaiTable::class];
        $this->Theloai = TableRegistry::getTableLocator()->get('Theloai', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Theloai);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

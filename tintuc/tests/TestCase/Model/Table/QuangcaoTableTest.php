<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuangcaoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuangcaoTable Test Case
 */
class QuangcaoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuangcaoTable
     */
    public $Quangcao;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Quangcao'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Quangcao') ? [] : ['className' => QuangcaoTable::class];
        $this->Quangcao = TableRegistry::getTableLocator()->get('Quangcao', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Quangcao);

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

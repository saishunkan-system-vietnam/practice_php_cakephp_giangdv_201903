<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LienketTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LienketTable Test Case
 */
class LienketTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LienketTable
     */
    public $Lienket;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Lienket'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Lienket') ? [] : ['className' => LienketTable::class];
        $this->Lienket = TableRegistry::getTableLocator()->get('Lienket', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lienket);

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

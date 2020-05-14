<?php


namespace unit;


use App\Support\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    /** @test **/
    public function empty_instantiated_collection_returns_no_items()
    {
        $collection = new Collection;

        $this->assertEmpty($collection->get());
    }
    /** @test **/
    public function count_is_correct_for_items_passed_in()
    {
        $collection = new Collection([
            'one', 'two', 'three'
        ]);

        $this->assertCount(3, $collection->count());
    }
    /** @test **/
    public function items_returned_match_items_passed_in()
    {
        $collection = new Collection([
            'one', 'two', 'three'
        ]);

        $this->assertCount(3, $collection->get());
        $this->assertEquals($collection->get()[0], 'one');
        $this->assertEquals($collection->get()[1], 'two');
    }
    /** @test **/
    public function collection_is_an_instance_of_iterator_aggregate()
    {
        $collection = new Collection();

        $this->assertInstanceOf(\IteratorAggregate::class, $collection);
    }
    /** @test **/
    public function collection_can_be_iterated()
    {
        $collection = new Collection([
            'one', 'two', 'three'
        ]);
        $items = [];

        foreach ($collection as $item)
        {
            $items[] = $item;
        }
        $this->assertCount(3, $items);
        $this->assertInstanceOf(\ArrayIterator::class, $collection->getIterator());
    }
    /** @test **/
    public function collection_can_be_merged_with_another_collection()
    {
        $collection = new Collection([
            'one', 'two', 'three'
        ]);
        $collection2 = new Collection([
            'four', 'five', 'six'
        ]);

        $collection->merge($collection2);

        $this->assertCount(6, $collection->get());
        $this->assertTrue(count($collection->get()) == 6);

    }
   /** @test **/
    public function can_add_to_existing_collection()
    {
        $collection = new Collection([
            'one', 'two', 'three'
        ]);
        $collection->add(['four']);

        $this->assertCount(4, $collection->get());
        $this->assertTrue(count($collection->get()) == 4);

    }
    /** @test **/
    public function returns_json_encoded_items()
    {
        $collection = new Collection([
            ['username'=>'Joel_King'],
            ['username'=>'King_Joel'],
        ]);

        $this->assertEquals('[{"username":"Joel_King"},{"username":"King_Joel"}]', $collection->toJson());
    }
    /** @test **/
    public function json_encoding_a_collection_object_returns_json()
    {
        $collection = new Collection([
            ['username'=>'Joel_King'],
            ['username'=>'King_Joel'],
        ]);
        $encoded = json_encode($collection);

        $this->assertEquals('[{"username":"Joel_King"},{"username":"King_Joel"}]', $encoded);
    }
}
# Immutable Record
A base class to create immutable records from.

# Usage
```php
use Carlsson\ImmutableRecord;

// Extend the base class to create a record.
class Point extends ImmutableRecord {

    // Provide a definiton of the record.
    // These values will be used as defaults if any are missing during construction.
    protected $defaults = [
        "x" => 0,
        "y" => 0
    ];
    
    // Provide some kind of constructor.
    public function __construct(float $x, float $y)
    {
        return parent::__construct([
            "x" => $x,
            "y" => $y
        ]);
    }
    
    // Implement any methods you want.
    public function equals(Point $other)
    {
        return $this->x === $other->x && $this->y === $other->y;
    }
}

// And off you go.
$origo = new Point(0, 0);
echo $origo->x; // 0
echo $origo->y; // 0

// If you try to mutate an immutable record, you'll regret it.
$origo->x = 1; // throws Exception
```

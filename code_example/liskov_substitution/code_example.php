<?php

/**
 * Liskov substitution principle, valid exemple
 */

// Generic class
class Rectangle
{
    public function __construct(
        public readonly int $width,
        public readonly int $height,
    ) {

    }

    public function getArea(): int
    {
        return $this->width * $this->height;
    }

    public function getHypothenuse(): float
    {
        return sqrt($this->width ** 2 + $this->height ** 2);
    }

    // ... getWhateverYouWant
}

// Specialized class
// A square is "by nature" a rectangle, so it can do everything a rectangle can do
class Square extends Rectangle
{
    public function __construct(public readonly int $size)
    {
        parent::__construct($size, $size);
    }

    /**
     * Specialized method exemple, only valid for a square, not for a rectangle
     *
     * public function transformToRegularPolygon(int $sides): Polygon
     * {
     *     ...
     * }
     */
}


/**
 * =============================================================
 * Liskov substitution principle broken exemple
 * Math reminder : a circle has no sides. Sides count tends to infinity, but is not 0.
 */

 class Shape
 {
    public function __construct(
        public readonly int $sides,
        //...
    ) {

    }

    public function getLongestSideLength()
    {
        //...
    }
 }

 class Circle extends Shape
 {
    public function __construct(
        public readonly int $radius,
    ) {

    }
}

/**
 * Liskov substitution principle is broken here. getLongestSideLength() is not relevant for a circle.
 * So a Circle can not be used as a Shape.
 * The mistake is to declare that a Shape has sides.
 */

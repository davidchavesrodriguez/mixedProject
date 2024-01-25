<?php 

namespace App\Entity;
class Car {
    private int $id;
    private string $description;
    
    public function __construct(int $id, string $description) {
        $this->id = $id;
        $this->description = $description;
    }
    
    public function __toString(): string {
        return "Car ID: {$this->id}, Description: {$this->description}";
    }
}

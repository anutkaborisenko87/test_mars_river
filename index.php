<?php
class Rover {
    private $x;
    private $y;
    private $direction;

    public function __construct($x, $y, $direction) {
        $this->x = $x;
        $this->y = $y;
        $this->direction = $direction;
    }

    public function moveForward() {
        switch ($this->direction) {
            case 'N':
                $this->y++;
                break;
            case 'S':
                $this->y--;
                break;
            case 'E':
                $this->x++;
                break;
            case 'W':
                $this->x--;
                break;
        }
    }

    public function turnRight() {
        switch ($this->direction) {
            case 'N':
                $this->direction = 'E';
                break;
            case 'S':
                $this->direction = 'W';
                break;
            case 'E':
                $this->direction = 'S';
                break;
            case 'W':
                $this->direction = 'N';
                break;
        }
        $this->moveForward();
    }

    public function turnLeft() {
        switch ($this->direction) {
            case 'N':
                $this->direction = 'W';
                break;
            case 'S':
                $this->direction = 'E';
                break;
            case 'E':
                $this->direction = 'N';
                break;
            case 'W':
                $this->direction = 'S';
                break;
        }
        $this->moveForward();
    }

    public function moveBackward() {
        switch ($this->direction) {
            case 'N':
                $this->y--;
                break;
            case 'S':
                $this->y++;
                break;
            case 'E':
                $this->x--;
                break;
            case 'W':
                $this->x++;
                break;
        }
    }

    public function getPosition() {
        return "($this->x, $this->y)";
    }

    public function getDirection() {
        return $this->direction;
    }
}

class Test {
    public function testRover() {
        $rover = new Rover(0, 0, 'N');
        $rover->moveForward();
        if ($rover->getPosition() !== '(0, 1)') {
            return false;
        }
        $rover->turnRight();
        if ($rover->getDirection() !== 'E' && $rover->getPosition() !== '(1, 0)') {
            return false;
        }
        $rover->moveForward();
        if ($rover->getPosition() !== '(2, 1)') {
            return false;
        }
        $rover->turnLeft();
        if ($rover->getDirection() !== 'N' && $rover->getPosition() !== '(2, 2)') {
            return false;
        }
        $rover->moveBackward();
        if ($rover->getPosition() !== '(1, 1)') {
            return false;
        }
        return true;
    }
}

$test = new Test();
if ($test->testRover()) {
    echo "Test successfully passed!\n";
} else {
    echo "Test failed :(\n";
}
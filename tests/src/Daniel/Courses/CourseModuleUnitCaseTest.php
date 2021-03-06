<?php

declare(strict_types=1);


namespace MN\Tests\Daniel\Courses;


use MN\Daniel\Courses\Application\CourseCreator;
use MN\Daniel\Courses\Domain\Course;
use MN\Daniel\Courses\Domain\CourseRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class CourseModuleUnitCaseTest extends TestCase
{
    protected $repository;

    /**@return MockObject|CourseRepository*/
    protected function repository(): MockObject
    {
        return $this->repository = $this->repository ?: $this->createMock(CourseRepository::class);
    }

    protected function shouldSave(Course $course): void
    {
        $this->repository()->method('save')->with($course);
    }

    protected function creator(): CourseCreator
    {
        return new CourseCreator($this->repository());
    }
}